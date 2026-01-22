<?php
header("Content-Type: application/json; charset=UTF-8");

session_start();

require_once '../config/db.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST' || $method === 'DELETE') {

    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {

        http_response_code(401);
        echo json_encode(["message" => "Acces interzis! Trebuie să fiți logat."]);
        exit();
    }
}

$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        $sql = "SELECT products.*, categories.name as cat_name
                FROM products
                LEFT JOIN categories ON products.category_id = categories.id
                ORDER BY products.id DESC";
        $result = $conn->query($sql);

        $products = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $products[] = $row;
            }
        }
        echo json_encode($products);
        break;

    case 'POST':
        if (isset($input['name']) && isset($input['price'])) {
            $name = $conn->real_escape_string($input['name']);
            $desc = $conn->real_escape_string($input['desc']);
            $price = (float)$input['price'];
            $cat = (int)$input['cat'];

            $sql = "INSERT INTO products (name, description, price, category_id)
                    VALUES ('$name', '$desc', '$price', '$cat')";

            if ($conn->query($sql)) {
                http_response_code(201); // Created
                echo json_encode(["message" => "Produs creat", "id" => $conn->insert_id]);
            } else {
                http_response_code(500);
                echo json_encode(["message" => "Eroare DB"]);
            }
        } else {
            http_response_code(400); // Bad Request
            echo json_encode(["message" => "Date incomplete"]);
        }
        break;

    case 'DELETE':
        $id = isset($_GET['id']) ? (int)$_GET['id'] : (isset($input['id']) ? (int)$input['id'] : 0);

        if ($id > 0) {
            $sql = "DELETE FROM products WHERE id = $id";
            if ($conn->query($sql)) {
                echo json_encode(["message" => "Produs șters"]);
            } else {
                http_response_code(500);
                echo json_encode(["message" => "Eroare la ștergere"]);
            }
        } else {
            http_response_code(400);
            echo json_encode(["message" => "ID lipsă"]);
        }
        break;

    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(["message" => "Metodă nepermisă"]);
        break;
}
?>
