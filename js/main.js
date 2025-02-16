document.addEventListener('DOMContentLoaded', () => {
    fetch('backend/categories.php')
        .then(response => response.json())
        .then(data => {
            const categoryList = document.getElementById('categories');
            data.forEach(category => {
                const card = document.createElement('div');
                card.className = 'card';
                card.innerHTML = `
                    <img src="assets/images/${category.image_url}" alt="${category.name}">
                    <h3>${category.name}</h3>
                `;
                categoryList.appendChild(card);
            });
        });
});
