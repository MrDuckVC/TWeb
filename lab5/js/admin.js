function logout() {
    fetch('api/auth.php?action=logout')
        .then(() => window.location.href = 'login.php');
}

function deleteProduct(id, btnElement) {
    if(!confirm('Sigur doriți să ștergeți produsul?')) return;

    fetch(`api/products.php?id=${id}`, { method: 'DELETE' })
    .then(response => response.json())
    .then(data => {
        if (data.message === "Produs șters") {
            btnElement.closest('tr').remove();
        } else {
            alert('Eroare: ' + data.message);
        }
    });
}

document.addEventListener("DOMContentLoaded", function () {
    const addForm = document.getElementById('addProductForm');

    if (addForm) {
        addForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const name = addForm.querySelector('[name="name"]').value.trim();
            const desc = addForm.querySelector('[name="desc"]').value.trim();
            const price = parseFloat(addForm.querySelector('[name="price"]').value);
            const cat = addForm.querySelector('[name="cat"]').value;

            let errors = [];
            if (name.length < 3) errors.push("Numele e prea scurt (min 3)!");
            if (isNaN(price) || price <= 0) errors.push("Prețul trebuie să fie pozitiv!");

            if (errors.length > 0) {
                alert("Eroare:\n" + errors.join("\n"));
                return;
            }

            const productData = { name, desc, price, cat };

            fetch('api/products.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(productData)
            })
            .then(response => {
                if (!response.ok) throw new Error("Eroare server");
                return response.json();
            })
            .then(data => {
                alert("Produs adăugat cu succes ID: " + data.id);

                const tbody = document.querySelector('table tbody');
                const newRow = `
                    <tr>
                        <td>${data.id}</td>
                        <td>${name}</td>
                        <td>${price} MDL</td>
                        <td><button onclick="deleteProduct(${data.id}, this)" class="btn btn-sm btn-danger">Șterge</button></td>
                    </tr>
                `;
                tbody.insertAdjacentHTML('beforeend', newRow);

                addForm.reset();
            })
            .catch(error => alert("Eroare la adăugare!"));
        });
    }
});
