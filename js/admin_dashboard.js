document.addEventListener("DOMContentLoaded", function() {
    const adminProductList = document.getElementById("admin-product-list");
    if (adminProductList) {
      fetch('../backend/products.php')
        .then(response => response.json())
        .then(products => {
          let output = `<table class="table table-striped">
                          <thead>
                            <tr>
                              <th>ID</th>
                              <th>Name</th>
                              <th>Category</th>
                              <th>Price</th>
                              <th>Image</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>`;
          products.forEach(product => {
            output += `
              <tr>
                <td>${product.product_id}</td>
                <td>${product.product_name}</td>
                <td>${product.category}</td>
                <td>$${parseFloat(product.price).toFixed(2)}</td>
                <td><img src="../assets/images/${product.image}" alt="${product.product_name}" style="width:50px;"></td>
                <td>
                  <a href="edit_product.html?product_id=${product.product_id}" class="btn btn-primary btn-sm">Edit</a>
                  <a href="../backend/delete_product.php?product_id=${product.product_id}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                </td>
              </tr>
            `;
          });
          output += `</tbody></table>`;
          adminProductList.innerHTML = output;
        })
        .catch(error => console.error('Error fetching products:', error));
    }
  });
  