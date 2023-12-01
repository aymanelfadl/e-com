document.addEventListener('DOMContentLoaded', function () {
    function updateCart(productPrice, productId) {
        var cartPriceElement = document.querySelector('.cart_price');
        var cartCountElement = document.getElementById('cartCount');
    
        // Get the current cart count value
        var currentCount = parseFloat(cartCountElement.innerText);
    
        // Increment the count by 1
        var newCount = currentCount + 1;
    
        // Update the cart count element with the new count
        cartCountElement.innerText = newCount;
    
        // Get the current total price
        var totalPriceText = cartPriceElement.innerText;
        var currentTotalPrice = parseFloat(totalPriceText.replace(' MAD', ''));
    
        // Check if currentTotalPrice is a valid number
        isNaN(currentTotalPrice) ? currentTotalPrice = 0 : currentTotalPrice += productPrice;
    
        // Update the cart price element
        cartPriceElement.innerText = currentTotalPrice.toFixed(2) + ' MAD';
    }
    
    
    $('.addToCartButton').on('click', function () {
        var productId = $(this).data('product-id');
        var userId = $(this).data('user-id'); // You need to obtain the user ID
    
        // Send the data to the server for insertion into the 'panier' table
        $.ajax({
            url: 'php/update_cart.php',
            method: 'POST',
            data: { user_id: userId, product_id: productId, quantity: 1 },
            success: function () {
                console.log('Product added to cart successfully');
                console.log(userId);
                // You can handle additional actions or UI updates here
            },
            error: function (error) {
                console.error('Error adding product to cart:', error);
            }
        });
    });
    
    function attachAddToCartListeners() {
        var addToCartButtons = document.querySelectorAll('.addToCartButton');
    
        // Add a click event listener to each "Add to Cart" button
        addToCartButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                // Get the price and product ID associated with the product
                var productPrice = parseFloat(button.closest('.card').getAttribute('data-price'));
                var productId = button.closest('.card').getAttribute('data-product-id');
    
                // Call the updateCart function with product ID
                updateCart(productPrice, productId);
            });
        });
    }
    

    
    


    function performSearch() {
        var searchTerm = $("#searchInput").val().toLowerCase();

        // Use AJAX to fetch filtered products from the server
        $.ajax({
            url: 'php/search.php',
            type: 'GET',
            data: { term: searchTerm },
            dataType: 'json',
            success: function (data) {
                // Display filtered products or all products if the search term is empty
                if (searchTerm.trim() === "") {
                    $("#searchResults").empty(); // Clear search results container
                    $("#originalTable").show(); // Show the original product table
                } else {
                    $("#originalTable").hide(); // Hide the original product table
                    displayFilteredProducts(data);
                    attachAddToCartListeners(); // Reattach event listeners after rendering
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    function fetchProducts(category) {
        // Use AJAX to fetch filtered products from the server
        return $.ajax({
            url: 'php/load_categories.php',
            type: 'GET',
            data: { category: category },
            dataType: 'json',
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    function displayAllProducts() {
        $("#searchResults").empty(); // Clear search results container
        $("#originalTable").show(); // Show the original product table
        attachAddToCartListeners(); // Reattach event listeners after rendering
    }

    function displayFilteredProducts(data) {
        $("#originalTable").hide(); // Hide the original product table
        var $searchResults = $("#searchResults");
        $searchResults.empty(); // Clear search results container

        var count = 0;

        // Render filtered products
        data.forEach(function (products) {
            // Start a new row after every fourth product
            if (count % 4 === 0) {
                $searchResults.append('<tr>');
            }

            $searchResults.append(
                '<td>' +
                '<div class="card" data-price="' + products.PRIX + '">' +
                '<img src="../product_image/    ' + products.image_file + '" alt="' + products.image_file + '" style="width:100%">' +
                '<h2>' + products.title + '</h2>' +
                '<p class="Price"><b>' + products.PRIX + ' MAD</b></p>' +
                '<p>' + products.DESCREPTION + '</p>' +
                '<p><button class="addToCartButton">Add to Cart</button></p>' +
                '</div>' +
                '</td>'
            );

            count++;

            // End the row after every fourth product
            if (count % 4 === 0) {
                $searchResults.append('</tr>');
            }
        });

        // If there are incomplete cells in the last row, add empty cells to fill the row
        if (count % 4 !== 0) {
            var emptyCells = 4 - (count % 4);
            for (var i = 0; i < emptyCells; i++) {
                $searchResults.append('<td></td>');
            }
            $searchResults.append('</tr>');
        }
    }

    function handleCategoryFilter(category) {
        if (category.trim() === "") {
            displayAllProducts();
        } else {
            fetchProducts(category).then(function (data) {
                displayFilteredProducts(data);
                attachAddToCartListeners();  
            });
        }
    }

    // Event listeners
    $("#searchInput").on("input", performSearch);
    $("#searchButton").on("click", performSearch);

    $("ul").on("click", "li.hassubs ul li a", function (event) {
        event.preventDefault(); // Prevent the default behavior of the link
        var category = $(this).text().trim();
        handleCategoryFilter(category);

        // Highlight the selected category link (optional)
        $("ul li.hassubs ul li a").removeClass("selected");
        $(this).addClass("selected");
    });

    // Initialize by displaying all products
    displayAllProducts();
});
