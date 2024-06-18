document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search-input");
    const searchResults = document.getElementById("search-results");

    searchInput.addEventListener("keyup", function() {
        const query = searchInput.value;
        if (query.length > 2) { // Начать поиск после ввода 3 символов
            fetch(`search_handler.php?q=${query}`)
                .then(response => response.json())
                .then(data => {
                    searchResults.innerHTML = data.map(item => `
                        <div class="result-item">
                            <img src="${item.image}" alt="${item.name}" class="result-image">
                            <div class="result-details">
                                <h3>${item.name}</h3>
                                <p>${item.description}</p>
                                <p class="price">${item.price} zł</p>
                            </div>
                        </div>
                    `).join('');
                });
        } else {
            searchResults.innerHTML = '';
        }
    });
});
