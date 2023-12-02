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
    
        var totalPriceText = cartPriceElement.innerText;
        var currentTotalPrice = parseFloat(totalPriceText.replace('MAD', ''));
    
        if (isNaN(currentTotalPrice)) {
            currentTotalPrice = 0;
        }
    
        // If the product is not in the cart, set the price to the initial product price
        if (!localStorage.getItem(productId)) {
            currentTotalPrice += productPrice;
            localStorage.setItem(productId, productPrice.toString());
        } else {
            // If the product is already in the cart, add the price to the existing total
            currentTotalPrice += parseFloat(localStorage.getItem(productId));
        }
    
        // Update the cart price element
        cartPriceElement.innerText = currentTotalPrice.toFixed(2) + ' MAD';
    }
    
    
    
    $('.addToCartButton').on('click', function () {
        var productId = $(this).data('product-id');
        console.log(productId);
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
// Function to decrement quantity
function decrementQuantity(productId) {
    updateQuantity(productId, -1);
}

// Function to increment quantity
function incrementQuantity(productId) {
    updateQuantity(productId, 1);

}

// Function to update the quantity on the server and in the UI
function updateQuantity(productId, change) {
    var userId = document.querySelector('.form-control[data-product-id="' + productId + '"]').getAttribute('data-user-id');
    console.log(userId);
    console.log(productId);
    var quantityInput = document.querySelector('.form-control[data-product-id="' + productId + '"]');
    var currentQuantity = parseInt(quantityInput.value);

    // Check if the new quantity is valid (greater than 0 for decrement)
    if (currentQuantity + change >= 0) {
        // Update the quantity in the UI
        quantityInput.value = currentQuantity + change;

        // Send an AJAX request to update the quantity in the database
        $.post("php/update_quantity.php", {
            userId: userId,
            productId: productId,
            decrement: (change === -1).toString()
        }, function (response) {
            console.log(response);
            // You can handle the response here if needed
        });
    }
}

// Assuming you have a similar structure for your quantity buttons as in your cart.php
var quantityMinusButtons = document.querySelectorAll('.fa-minus');
var quantityPlusButtons = document.querySelectorAll('.fa-plus');

// Add click event listeners to decrement quantity
quantityMinusButtons.forEach(function (minusButton) {
    minusButton.addEventListener('click', function () {
        var productId = minusButton.closest('.d-flex').querySelector('.form-control').getAttribute('data-product-id');
        decrementQuantity(productId);
        updateSubtotal()
    });
});

// Add click event listeners to increment quantity
quantityPlusButtons.forEach(function (plusButton) {
    plusButton.addEventListener('click', function () {
        var productId = plusButton.closest('.d-flex').querySelector('.form-control').getAttribute('data-product-id');
        incrementQuantity(productId);
        updateSubtotal()
    });
});





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


function updateSubtotal() {
    // Send an AJAX request to get the updated subtotal from the server
    $.ajax({
        url: 'php/get_subtotal.php',
        method: 'POST', // or 'POST', depending on your server-side script
        success: function (response) {
            // Assuming the response is the updated subtotal value
            var subtotal = parseFloat(response);
            $('#totalValue').text(response );
            $('#totalTax').text(response);
            $('#subtotalValue').text(subtotal.toFixed(2) + ' MAD');
        },
        error: function (error) {
            console.error('Error updating subtotal:', error);
        }
    });
}


function checkout(userId) {
    // Example: Sending a POST request to checkout.php
    $.ajax({
        url: 'php/checkout.php',
        method: 'POST',
        data: { user_id: userId },
        success: function (response) {
            console.log('Checkout successful:', response);
            
            // Handle success, e.g., show a success message
            var cartCountElement = document.getElementById('cartCount');
            cartCountElement.innerText = '0';

            // Set a flag in localStorage to indicate successful checkout
            localStorage.setItem('checkoutSuccess', 'true');

            // Redirect to index.php after successful checkout
            window.location.href = 'index.php';
        },
        error: function (error) {
            console.error('Error during checkout:', error);
            // Handle error, e.g., show an error message to the user
        }
    });
}

// Check for the checkout success flag on page load
document.addEventListener('DOMContentLoaded', function () {
    var checkoutSuccess = localStorage.getItem('checkoutSuccess');

    if (checkoutSuccess === 'true') {
        // Show the success message
        showSuccessMessage();

        // Clear the flag to avoid showing the message on subsequent page loads
        localStorage.removeItem('checkoutSuccess');
    }
});

$('#checkoutButton').on('click', function () {
    // Replace with your logic to get the user ID
    var userId = $(this).data('user-id');
    checkout(userId);
});

$("#saveProfileBtn").click(function(event) {
    // Prevent default form submission
    event.preventDefault();

    // Get values from input fields
    var newFirstName = $("input[name='newFirstName']").val();
    var newLastName = $("input[name='newLastName']").val();
    var newUsername = $("input[name='newUsername']").val();
    var newEmail = $("input[name='newEmail']").val();
    var newPassword = $("input[name='newPassword']").val();

    // Client-side validation (you can add more validation as needed)
    if (!newFirstName || !newLastName || !newUsername || !newEmail || !newPassword) {
        alert("Please fill out all required fields.");
        return;
    }

    // Send the data to the server using AJAX
    $.ajax({
        url: 'php/edit_profile.php',
        method: 'POST',
        data: {
            newFirstName: newFirstName,
            newLastName: newLastName,
            newUsername: newUsername,
            newEmail: newEmail,
            newPassword: newPassword
        },
        success: function(response) {
            // Handle the response from the server
            console.log(response);
            
            // Example: Redirect to a new page if the update was successful
            if (response === "Profile updated successfully!") {
                window.location.href = 'index.php';
            } else {
                // Handle other responses or update the UI accordingly
                alert("Profile update failed. Please try again.");
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', xhr.responseText);
            console.error('Status:', status);
            console.error('Error:', error);
        }
    });
});

// Toggle the visibility of the success message
function showSuccessMessage() {
    var successMessage = document.getElementById('successMessage');
    successMessage.style.display = 'block';

    setTimeout(function () {
        // Hide the success message after 3 seconds
        successMessage.style.display = 'none';
    }, 3000);
}