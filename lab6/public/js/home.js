document.addEventListener("DOMContentLoaded", function () {
    const container = document.getElementById('products-container');

    fetch('/api/products')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            container.innerHTML = '';

            if (data.length === 0) {
                container.innerHTML = '<p class="text-center">Nu sunt produse disponibile momentan.</p>';
                return;
            }

            data.forEach(product => {
                // Карточка товара
                const html = `
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body">
                                <span class="badge bg-info text-dark mb-2">${product.category}</span>
                                <h5 class="card-title">${product.name}</h5>
                                <p class="card-text text-muted small">${product.description || ''}</p>
                                <h4 class="text-danger fw-bold mt-3">${product.price} MDL</h4>
                            </div>
                        </div>
                    </div>
                `;
                container.innerHTML += html;
            });
        })
        .catch(err => {
            console.error('Eroare API:', err);
            container.innerHTML = `
                <div class="alert alert-danger text-center">
                    Eroare la încărcarea produselor. <br>
                    <small class="text-muted">${err.message}</small>
                </div>
            `;
        });
});
