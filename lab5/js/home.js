document.addEventListener("DOMContentLoaded", function () {

    const bannerElement = document.getElementById('custom-banner');
    if (bannerElement) {
        const banners = [
            "Upgrade Your Power",
            "Best Prices in Moldova",
            "Official Warranty 3 Years"
        ];
        let bannerIndex = 0;

        function rotateBanner() {
            bannerElement.style.opacity = 0;
            setTimeout(() => {
                bannerElement.innerText = banners[bannerIndex];
                bannerElement.style.opacity = 1;
                bannerIndex = (bannerIndex + 1) % banners.length;
            }, 500);
        }
        setInterval(rotateBanner, 3000);
    }

    const productsContainer = document.getElementById('products-container');

    if (productsContainer) {
        function loadProducts() {
            fetch('api/products.php')
                .then(response => response.json())
                .then(data => {
                    productsContainer.innerHTML = '';

                    if (data.length === 0) {
                        productsContainer.innerHTML = '<p class="text-center">Nu sunt produse.</p>';
                        return;
                    }

                    const isDarkMode = document.body.classList.contains('bg-dark');
                    const cardClass = isDarkMode ? 'card h-100 shadow-sm bg-secondary text-white' : 'card h-100 shadow-sm';

                    data.forEach(product => {
                        const cardHTML = `
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="${cardClass}">
                                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                        <span class="fs-1 text-muted">${product.cat_name || 'PC'}</span>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">${product.name}</h5>
                                        <p class="card-text">${product.description}</p>
                                        <h4 class="text-danger">${product.price} MDL</h4>
                                    </div>
                                    <div class="card-footer bg-white border-0">
                                        <button class="btn btn-primary w-100" onclick="alert('Produs ID: ${product.id}')">
                                            Detalii
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `;
                        productsContainer.innerHTML += cardHTML;
                    });
                })
                .catch(error => {
                    console.error('Eroare API:', error);
                    productsContainer.innerHTML = '<p class="text-danger text-center">Eroare la încărcarea datelor.</p>';
                });
        }
        loadProducts();
    }
});
