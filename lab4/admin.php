<?php
session_start();
require_once 'config/db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM products WHERE id=$id");
    header("Location: admin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $cat = $_POST['cat'];

    $sql = "INSERT INTO products (name, description, price, category_id) VALUES ('$name', '$desc', '$price', '$cat')";
    $conn->query($sql);

    $log = "Produs adaugat: $name la pretul $price (" . date('Y-m-d H:i:s') . ")\n";
    $file_path = __DIR__ . '/admin_log.txt';
    file_put_contents($file_path, $log, FILE_APPEND);

    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Gestiune Produse</h1>
        <a href="logout.php" class="btn btn-danger">Ieșire</a>
    </div>

    <div class="card p-3 mb-5 bg-light">
        <h5>Adaugă Produs Nou</h5>
        <form method="POST">
            <div class="row">
                <div class="col-md-3"><input type="text" name="name" class="form-control" placeholder="Nume" required></div>
                <div class="col-md-3"><input type="text" name="desc" class="form-control" placeholder="Descriere"></div>
                <div class="col-md-2"><input type="number" name="price" class="form-control" placeholder="Preț" required></div>
                <div class="col-md-2">
                    <select name="cat" class="form-select">
                        <option value="1">CPU</option>
                        <option value="2">GPU</option>
                        <option value="3">RAM</option>
                    </select>
                </div>
                <div class="col-md-2"><button type="submit" class="btn btn-success w-100">Adaugă</button></div>
            </div>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <thead><tr><th>ID</th><th>Nume</th><th>Preț</th><th>Acțiune</th></tr></thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM products");
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['price']} MDL</td>
                        <td><a href='admin.php?delete={$row['id']}' class='btn btn-sm btn-danger'>Șterge</a></td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="index.php">Înapoi la Site</a>
</body>
</html>
