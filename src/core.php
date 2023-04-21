<?php

use NilPortugues\Sql\QueryBuilder\Builder\GenericBuilder;

class ClientReciever
{
    private $host = DB_HOST;
    private $dbuser = DB_USERNAME;
    private $dbpass = DB_PASSWORD;
    private $dbname = DB_NAME;
    private $tbname = TB_NAME;

    private $qBuilder;
    private $conn;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->conn = new PDO($dsn, $this->dbuser, $this->dbpass, $options);
        } catch (PDOException $e) {
            header("HTTP/1.1 503 Service Unavailable");
            die(json_encode(["error" => $e->getMessage()]));
        }

        $this->qBuilder = new GenericBuilder();
    }

    private function getPlayerData(string $playerName)
    {
        $builder = $this->qBuilder->select();
        $builder->setTable($this->tbname);
        $builder->setColumns(["username", "password"]);
        $builder->where()->like("username", $playerName)->end();

        $stmt = $this->conn->prepare($this->qBuilder->write($builder));
        $values = $this->qBuilder->getValues();
        foreach ($values as $key => &$val) {
            $stmt->bindParam($key, $val);
        }
        $stmt->execute();

        if ($result = $stmt->fetchObject()) {
            $result->hasFound = true;
            $result->password = $result->password;
            return $result;
        }
        return [
            "hasFound" => $result
        ];
    }
    private function isValidBCryptPassword($password, $hash)
    {
        return password_verify($password, $hash);
    }
    private function isValidTextPassword($password, $inGamePassword)
    {
        return $password === $inGamePassword;
    }
    protected function isValidSHAPassword($password, $hash)
    {
        // https://github.com/AuthMe/AuthMeReloaded/blob/master/samples/website_integration/Sha256.php
        // $SHA$salt$hash, where hash := sha256(sha256(password) . salt)
        $parts = explode('$', $hash);
        return count($parts) === 4 && $parts[3] === hash('sha256', hash('sha256', $password) . $parts[2]);
    }
    public function checkLogin(string $playerName, string $playerPassword)
    {
        if (!($result = $this->getPlayerData($playerName))->hasFound) {
            return "error";
        }
        switch (HASH_ALGO) {
            case 'SHA256':
                $isValidPassword = $this->isValidSHAPassword($playerPassword, $result->password);
                break;
            case 'BCRYPT':
                $isValidPassword = $this->isValidBCryptPassword($playerPassword, $result->password);
                break;
            case 'TEXT':
                $isValidPassword = $this->isValidTextPassword($playerPassword, $result->password);
                break;

            default:
                $isValidPassword = false;
                break;
        }
        return $isValidPassword;
    }
}
