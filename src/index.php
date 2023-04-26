<?php
header("content-type: application/json");
error_reporting(0); // warning: use in production only
// session_start();
if (!is_file("./config.php")) {
    die(header("location: ./installer.php"));
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die("EVERYTHING WORK FINE");
}
if (empty($playerName = $_POST['playerName'])) {
    header("HTTP/1.1 401 Unauthorized");
    die(json_encode(['error' => 'The username are missing']));
}
// match hostname
/* $pattern = '/^[a-z0-9]+(\.[a-z0-9]+)*\.codename-t\.com$/i';
if (!preg_match($pattern, $_SERVER['HTTP_HOST'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die(json_encode(['error' => 'Hostname not allowed']));
} */

include "../vendor/autoload.php";
include "./config.php";
include "./core.php";

if (empty($_SERVER['HTTP_X_CLIENT_KEY'])) {
    header("HTTP/1.1 401 Unauthorized");
    die(json_encode(['error' => 'No credentials']));
}
if (!($_SERVER['HTTP_X_CLIENT_KEY'] === CLIENT_KEY)) {
    if (empty($_SESSION['attempt'])) {
        $_SESSION['attempt'] = 0;
    }
    if ($_SESSION['attempt'] >= 5) {
        header('HTTP/1.0 403 Forbidden', TRUE, 403);
        die(json_encode(['error' => 'Request blocked!']));
    }
    $_SESSION['attempt']++;
    die(json_encode(['error' => 'Client mismatch', 'attempt' => $_SESSION['attempt']]));
}
$client = new ClientReciever();

if (empty($_GET['actions'])) {
    header("HTTP/1.1 400 Bad Request");
    die(json_encode(['error' => "Missing action params"]));
}
$actions = $_GET['actions'];

switch ($actions) {
    case 'auth':
        $playerName = $_POST['playerName'];
        // password need to encode with base64
        if (empty($_POST['playerPassword'])) {
            header("HTTP/1.1 401 Unauthorized");
            echo json_encode(['error' => 'The password are missing']);
            exit;
        }
        $playerPassword = base64_decode($_POST['playerPassword']);
        if (($result = $client->checkLogin($playerName, $playerPassword))['isValidPassword']) {
            header("HTTP/1.1 200 OK");
            echo json_encode(['isValidPassword' => true, "data" => ["playerCredit" => $result['credits']]]);
        } else {
            header("HTTP/1.1 401 Unauthorized");
            echo json_encode(['isValidPassword' => false]);
        }
        break;
    case 'updateCredit':
        if (empty($_POST['creditAmount'])) {
            header("HTTP/1.1 400 Bad Request");
            die(json_encode(['error' => "Missing required params"]));
        }
        $creditAmount = $_POST['creditAmount'];
        $updateResult = $client->updatePlayerCredit($creditAmount, $playerName);
        header("HTTP/1.1 200 OK Krub");
        echo json_encode($updateResult);
        break;
    case 'getCredit':
        $result = $client->getPlayerCreditByName($playerName);
        echo json_encode($result);
        break;
    default:
        header("HTTP/1.1 400 Bad Request");
        die(json_encode(['error' => "No route"]));
        break;
}
