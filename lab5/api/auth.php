<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
require_once '../config/db.php';

$input = json_decode(file_get_contents('php://input'), true);
$action = isset($_GET['action']) ? $_GET['action'] : '';

if ($action === 'login') {
    $user = isset($input['username']) ? $conn->real_escape_string($input['username']) : '';
    $pass = isset($input['password']) ? $conn->real_escape_string($input['password']) : '';

    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        echo json_encode(["success" => true, "message" => "Login reușit"]);
    } else {
        http_response_code(401); // Unauthorized
        echo json_encode(["success" => false, "message" => "Login sau parolă greșită!"]);
    }
}
elseif ($action === 'logout') {
    session_destroy();
    echo json_encode(["success" => true, "message" => "Logout reușit"]);
}
else {
    http_response_code(400);
    echo json_encode(["message" => "Acțiune invalidă"]);
}
?>
