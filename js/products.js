document.addEventListener('DOMContentLoaded', () => {
    fetch('backend/products.php')
        .then(response => response.json())
        .then(data => {
            const productList = document.getElementById('product-list');
            data.forEach(product => {
                const card = document.createElement('div');
                card.className = 'card';
                card.innerHTML = `
                    <img src="assets/images/${product.image_url}" alt="${product.name}">
                    <h3>${product.name}</h3>
                    <p>LKR ${product.price}</p>
                `;
                productList.appendChild(card);
            });
        });
});
