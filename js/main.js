document.addEventListener("DOMContentLoaded", function() {
    const productList = document.getElementById("product-list");
    if (productList) {
      fetch('backend/products.php')
        .then(response => response.json())
        .then(products => {
          let output = '';
          products.forEach(product => {
            output += `
              <div class="product-card">
                <img src="assets/images/${product.image}" alt="${product.product_name}">
                <h3>${product.product_name}</h3>
                <p>Category: ${product.category}</p>
                <p>Price: $${parseFloat(product.price).toFixed(2)}</p>
              </div>
            `;
          });
          productList.innerHTML = output;
        })
        .catch(error => console.error('Error fetching products:', error));
    }
  });
  