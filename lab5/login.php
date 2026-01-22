<!DOCTYPE html>
<html lang="ro">
<head>
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card p-4 shadow" style="width: 300px;">
        <h3 class="text-center mb-3">Admin Panel</h3>

        <p id="error-msg" class="text-danger text-center small"></p>

        <form> <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Login" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-dark w-100">Intră</button>
        </form>
        <a href="index.php" class="d-block text-center mt-3">Înapoi la site</a>
    </div>

    <script src="js/login.js"></script>
</body>
</html>
