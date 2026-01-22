<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function loadEnv($path) {
    if (!file_exists($path)) {
        die("Ошибка: Файл .env не найден! Создайте его в корне проекта.");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        list($name, $value) = explode('=', $line, 2);

        $_ENV[trim($name)] = trim($value);
    }
}

loadEnv(__DIR__ . '/../db.env');

$servername = $_ENV['DB_HOST'];
$username   = $_ENV['DB_USER'];
$password   = $_ENV['DB_PASS'];
$dbname     = $_ENV['DB_NAME'];

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    $conn->set_charset("utf8mb4");

} catch (mysqli_sql_exception $e) {
    die("Ошибка подключения к БД: " . $e->getMessage());
}
?>
