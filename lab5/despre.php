<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despre Noi - PC Master</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-info" href="index.php">PC MASTER</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Acasă</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Categorii</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Procesoare (CPU)</a></li>
                            <li><a class="dropdown-item" href="#">Plăci Video (GPU)</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Memorii RAM</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link active" href="despre.php">Despre Noi</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contacte</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 100px;">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <h2 class="display-4 text-primary">Cine suntem noi?</h2>
                <p class="lead">Lideri pe piața componentelor IT din Moldova din 2020.</p>
                <p>Misiunea noastră este să oferim acces la cele mai noi tehnologii (NVIDIA, Intel, AMD) la prețuri
                    corecte. Avem o echipă de experți gata să te ajute la asamblarea PC-ului de vis.</p>
            </div>
            <div class="col-lg-6">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded shadow"
                    style="height: 300px;">
                    <h3>FOTO OFICIU</h3>
                </div>
            </div>
        </div>

        <h3 class="text-center mb-4">Întrebări Frecvente (FAQ)</h3>
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">

                <div class="accordion" id="faqAccordion">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne">
                                Oferiți garanție la produse?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <strong>Da, absolut.</strong> Toate produsele noastre vin cu garanție oficială de la
                                producător, valabilă între 24 și 36 de luni.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo">
                                Livrați în toată țara?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Livrăm gratuit în Chișinău pentru comenzi de peste 1000 MDL. În restul țării livrarea se
                                face prin curier rapid în 24-48 ore.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree">
                                Pot returna produsul?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Conform legii, aveți dreptul de a returna produsul în termen de 14 zile calendaristice,
                                dacă acesta este în starea inițială.
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p class="mb-0">PC Master &copy; 2026. Elaborat de studentul Cunev.</p>
            <p class="small text-info mt-1" id="digital-clock">Loading time...</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/common.js"></script> </body>
</body>

</html>
