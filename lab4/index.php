<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'config/db.php';
?>

<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Master - Magazin Componente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-info" href="index.html">PC MASTER</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.html">Acasă</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Categorii
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Procesoare (CPU)</a></li>
                            <li><a class="dropdown-item" href="#">Plăci Video (GPU)</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Memorii RAM</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="despre.html">Despre Noi</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contacte</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="heroCarousel" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-block w-100 bg-secondary d-flex align-items-center justify-content-center text-white"
                    style="height: 400px;">
                    <div class="text-center">
                        <h1>Upgrade Your Power</h1>
                        <p>Cele mai noi procesoare Intel și AMD</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-block w-100 bg-dark d-flex align-items-center justify-content-center text-white"
                    style="height: 400px;">
                    <div class="text-center">
                        <h1>Gaming Ultimate</h1>
                        <p>Plăci video RTX seria 4000</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-block w-100 bg-primary d-flex align-items-center justify-content-center text-white"
                    style="height: 400px;">
                    <div class="text-center">
                        <h1>Viteză Maximă</h1>
                        <p>SSD-uri NVMe de ultimă generație</p>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <div class="container text-center my-3">
        <div class="alert alert-warning fw-bold shadow-sm" role="alert">
            PROMO: <span id="custom-banner" style="transition: opacity 0.5s;">Welcome to PC Master!</span>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-4">Oferte Populare</h2>

        <div class="row g-4">
            <?php
            $sql = "SELECT products.*, categories.name as cat_name
                    FROM products
                    LEFT JOIN categories ON products.category_id = categories.id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <span class="fs-1 text-muted"><?php echo $row['cat_name']; ?></span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <p class="card-text"><?php echo $row['description']; ?></p>
                                <h4 class="text-danger"><?php echo $row['price']; ?> MDL</h4>
                            </div>
                            <div class="card-footer bg-white border-0">
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#buyModal">
                                    Cumpără Acum
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-center'>Nu sunt produse în baza de date.</p>";
            }
            ?>
        </div>
    </div>

    <div class="modal fade" id="buyModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmare Comandă</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Produsul a fost adăugat în coș!</p>
                    <p class="text-muted small">Aceasta este o fereastră modală Bootstrap.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Închide</button>
                    <button type="button" class="btn btn-success">Spre Coș</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3 mt-5">
        <div class="container">
            <p class="mb-0">PC Master &copy; 2026. Elaborat de studentul Cunev.</p>
            <p class="small text-info mt-1" id="digital-clock">Loading time...</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
