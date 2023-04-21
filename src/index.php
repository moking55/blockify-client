<?php
if (!is_file("./config.php")) {
    die(header("location: ./installer.php"));
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 403 Forbidden', TRUE, 403);
    die("EVERYTHING WORK FINE");
}
include "../vendor/autoload.php";
include "./config.php";
include "./core.php";

header("content-type: application/json");
$client = new ClientReciever();
$playerName = $_POST['playerName'];

// password need to encode with base64
$playerPassword = base64_decode($_POST['playerPassword']);

if ($client->checkLogin($playerName, $playerPassword)) {
    header("HTTP/1.1 200 OK");
    echo json_encode(['isValidPassword' => true]);
} else {
    header("HTTP/1.1 401 Unauthorized");
    echo json_encode(['isValidPassword' => false]);
}