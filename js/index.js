document.addEventListener('DOMContentLoaded', function () {
    function updateCart(productPrice, productId) {
        var cartPriceElement = document.querySelector('.cart_price');
        var cartCountElement = document.getElementById('cartCount');
        
        var currentCount = parseFloat(cartCountElement.innerText);
        if(!isNaN(currentCount)){
        var newCount = currentCount + 1;
    
        cartCountElement.innerText = newCount;
        }else{
            currentCount = 0 ;
            var newCount = currentCount + 1;
    
            cartCountElement.innerText = newCount;
        }
        var totalPriceText = cartPriceElement.innerText;
        var currentTotalPrice = parseFloat(totalPriceText.replace('MAD', ''));
    
        if (isNaN(currentTotalPrice)) {
            currentTotalPrice = 0;
        }
    
        if (!localStorage.getItem(productId)) {
            currentTotalPrice += productPrice;
            localStorage.setItem(productId, productPrice.toString());
        } else {
            currentTotalPrice += parseFloat(localStorage.getItem(productId));
        }
    
        cartPriceElement.innerText = currentTotalPrice.toFixed(2) + ' MAD';
    }

    
    
    $('.addToCartButton').on('click', function () {
        var productId = $(this).data('product-id');
        console.log(productId);
        var userId = $(this).data('user-id'); 
        console.log(userId);
        if(!isNaN(userId)){
        $.ajax({
            url: 'php/update_cart.php',
            method: 'POST',
            data: { user_id: userId, product_id: productId, quantity: 1 },
            success: function () {
                console.log('Product added to cart successfully');
                console.log(userId);
            },
            error: function (error) {
                console.error('Error adding product to cart:', error);
            }
        });}
    });        
    
    function attachAddToCartListeners() {
        var addToCartButtons = document.querySelectorAll('.addToCartButton');
        var buyNowButtons = document.querySelectorAll('.buyNowButton');
    
        addToCartButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var productPrice = parseFloat(button.closest('.card').getAttribute('data-price'));
                var productId = button.closest('.card').getAttribute('data-product-id');
                updateCart(productPrice, productId);
            });
        });


        var buyNowButtons = document.querySelectorAll('.buyNowButton');
        buyNowButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var productId = parseFloat(button.getAttribute('data-product-id'));
                var productPrice = parseFloat(button.getAttribute('data-price'));
                updateCart(productPrice, productId);
           });
        
        });
    }
    $('.buyNowButton').on('click', function () {
        var productId = $(this).data('product-id');
        console.log(productId);
        var userId = $(this).data('user-id'); 
        console.log(userId);
        if(!isNaN(userId)){
        $.ajax({
            url: 'php/update_cart.php',
            method: 'POST',
            data: { user_id: userId, product_id: productId, quantity: 1 },
            success: function () {
                console.log('Product added to cart successfully');
            },
            error: function (error) {
                console.error('Error adding product to cart:', error);
            }
        });}
    });
function decrementQuantity(productId) {
    updateQuantity(productId, -1);
}

function incrementQuantity(productId) {
    updateQuantity(productId, 1);

}

function updateQuantity(productId, change) {
    var userId = document.querySelector('.form-control[data-product-id="' + productId + '"]').getAttribute('data-user-id');
    console.log(userId);
    console.log(productId);
    var quantityInput = document.querySelector('.form-control[data-product-id="' + productId + '"]');
    var currentQuantity = parseInt(quantityInput.value);

    if (currentQuantity + change >= 0) {
        quantityInput.value = currentQuantity + change;

        $.post("php/update_quantity.php", {
            userId: userId,
            productId: productId,
            decrement: (change === -1).toString()
        }, function (response) {
            console.log(response);
            
        });
    }
}

var quantityMinusButtons = document.querySelectorAll('.fa-minus');
var quantityPlusButtons = document.querySelectorAll('.fa-plus');

quantityMinusButtons.forEach(function (minusButton) {
    minusButton.addEventListener('click', function () {
        var productId = minusButton.closest('.d-flex').querySelector('.form-control').getAttribute('data-product-id');
        decrementQuantity(productId);
        updateSubtotal();
        decrementCart(productId);
    });
});

quantityPlusButtons.forEach(function (plusButton) {
    plusButton.addEventListener('click', function () {
        var productId = plusButton.closest('.d-flex').querySelector('.form-control').getAttribute('data-product-id');
        incrementQuantity(productId);
        updateSubtotal();
        updateCart();
    });
});

function decrementCart(productId) {
    var cartCountElement = document.getElementById('cartCount');
    var currentCount = parseInt(cartCountElement.innerText);
    var newCount = Math.max(0, currentCount - 1);
    
    cartCountElement.innerText = newCount;
}



    function performSearch() {
        var searchTerm = $("#searchInput").val().toLowerCase();

        $.ajax({
            url: 'php/search.php',
            type: 'GET',
            data: { term: searchTerm },
            dataType: 'json',
            success: function (data) {
                if (searchTerm.trim() === "") {
                    $("#searchResults").empty(); 
                    $("#originalTable").show(); 
                } else {
                    $("#originalTable").hide(); 
                    displayFilteredProducts(data);
                    attachAddToCartListeners(); 
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    function fetchProducts(category) {
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
        $("#searchResults").empty();
        $("#originalTable").show(); 
        attachAddToCartListeners(); 
    }

    function displayFilteredProducts(data) {
        $("#originalTable").hide(); 
        var $searchResults = $("#searchResults");
        $searchResults.empty(); 

        var count = 0;

        data.forEach(function (products) {
            if (count % 4 === 0) {
                $searchResults.append('<tr>');
            }

            $searchResults.append(
                '<td>' +
                '<a href="product_page.php?id='+ products.id +'">'+
                '<div class="card" data-price="' + products.PRIX + '">' +
                '<img src="./product_images/'+products.image_file +'" alt="' + products.image_file + '" style="width:100%">' +
                '<h2>' + products.title + '</h2>' +
                '<p class="Price"><b>' + products.PRIX + ' MAD</b></p>' +
                '</a>'+
                '<p><button class="addToCartButton">Add to Cart</button></p>' +
                '</div>' +
                '</td>'
            );

            count++;

            if (count % 4 === 0) {
                $searchResults.append('</tr>');
            }
        });

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


    $("#searchInput").on("input", performSearch);
    $("#searchButton").on("click", performSearch);

    $("ul").on("click", "li.hassubs ul li a", function (event) {
        event.preventDefault(); 
        var category = $(this).text().trim();
        handleCategoryFilter(category);

        $("ul li.hassubs ul li a").removeClass("selected");
        $(this).addClass("selected");
    });

    displayAllProducts();

});


function updateSubtotal() {
    $.ajax({
        url: 'php/get_subtotal.php',
        method: 'POST', 
        success: function (response) {
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
    $.ajax({
        url: 'php/checkout.php',
        method: 'POST',
        data: { user_id: userId },
        success: function (response) {
            console.log('Checkout successful:', response);
            
            var cartCountElement = document.getElementById('cartCount');
            cartCountElement.innerText = '0';

            localStorage.setItem('checkoutSuccess', 'true');

            window.location.href = 'index.php';
        },
        error: function (error) {
            console.error('Error during checkout:', error);
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    var checkoutSuccess = localStorage.getItem('checkoutSuccess');

    if (checkoutSuccess === 'true') {
        showSuccessMessage();

        localStorage.removeItem('checkoutSuccess');
    }
});

$('#checkoutButton').on('click', function () {
    var userId = $(this).data('user-id');
    checkout(userId);
});

$("#saveProfileBtn").click(function(event) {
    event.preventDefault();

    var newFirstName = $("input[name='newFirstName']").val();
    var newLastName = $("input[name='newLastName']").val();
    var newUsername = $("input[name='newUsername']").val();
    var newEmail = $("input[name='newEmail']").val();
    var newPassword = $("input[name='newPassword']").val();

    if (!newFirstName || !newLastName || !newUsername || !newEmail || !newPassword) {
        alert("Please fill out all required fields.");
        return;
    }


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
            console.log(response);
            
            if (response === "Profile updated successfully!") {
                window.location.href = 'index.php';
            } else {
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

function showSuccessMessage() {
    var successMessage = document.getElementById('successMessage');
    successMessage.style.display = 'block';

    setTimeout(function () {
        successMessage.style.display = 'none';
    }, 3000);

}
function showSignUpMessage() {
    var signupAlert = document.getElementById('signupAlert');
    signupAlert.style.display = 'block';

    setTimeout(function () {
        hideSignUpMessage();
    }, 2000);
}

function hideSignUpMessage() {
    var signupAlert = document.getElementById('signupAlert');
    signupAlert.style.display = 'none';
}



function toggleUserOrders() {
    var userOrdersContainer = document.getElementById('userOrdersContainer');
    userOrdersContainer.style.display = (userOrdersContainer.style.display === 'none' || userOrdersContainer.style.display === '') ? 'block' : 'none';
}

document.addEventListener('click', function (event) {
    var userOrdersContainer = document.getElementById('userOrdersContainer');
    var showUserCommandButton = document.getElementById('showUserCommand');
    var feedbackContainer = document.getElementById("feedback-form-modal")

    if (event.target !== feedbackContainer && event.target !== userOrdersContainer && event.target !== showUserCommandButton && !userOrdersContainer.contains(event.target) && !isClickableElement(event.target) && !feedbackContainer.contains(event.target)) 
    {
        userOrdersContainer.style.display = 'none';
    }
});

document.addEventListener('scroll', function () {
    var userOrdersContainer = document.getElementById('userOrdersContainer');
    userOrdersContainer.style.display = 'none';
});

function isClickableElement(element) {
    var clickableElements = ['A', 'BUTTON']; 
    return clickableElements.includes(element.tagName);
}




function decrementCart(productId, productQuantity) {
    var cartCountElement = document.getElementById('cartCount');
    var currentCount = parseInt(cartCountElement.innerText);
    var newCount = Math.max(0, currentCount - productQuantity);

    cartCountElement.innerText = newCount;
}



async function removeProduct(productId, userId, containerId, quantity) {
    try {
        const response = await fetch('php/remove_product.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `product_id=${encodeURIComponent(productId)}&user_id=${encodeURIComponent(userId)}`,
        });

        const data = await response.json();
        if (data.success) {
           
            decrementCart(productId,quantity);

            var container = document.getElementById(containerId);
            if (container) {
                container.remove();
            } else {
                console.warn('Container not found:', containerId);
            }
            updateSubtotal();
        } 
    } catch (error) {
        console.error('Error:', error);
    }
}

function cancelOrder(orderID) {
    console.log('Cancel Order ID:', orderID); 
    $.ajax({
        type: 'POST',
        url: 'php/remove_order.php',
        data: { orderID: orderID },
        success: function(response) {
            console.log('Order canceled successfully');
            window.location.href = 'index.php';
        },
        error: function(xhr, status, error) {
            console.error('Error canceling order:', error);
        }
    });
}


function closeConfirmationDialog() {
    var confirmationDialog = document.getElementById('customConfirmationDialog');
    confirmationDialog.style.display = 'none';
}

function cancelOrderConfirmed(orderID) {
    if (orderID) {
        console.log('Cancel Order Confirmed ID:', orderID); 
        
        cancelOrder(orderID);
    }
    closeConfirmationDialog();
}

function showConfirmationDialog(message, orderID) {
    var confirmationDialog = document.getElementById('customConfirmationDialog');
    var confirmationMessage = document.getElementById('confirmationMessage');

    confirmationMessage.textContent = message;
    confirmationDialog.style.display = 'block';

    document.getElementById('yesButton').onclick = function() {
        cancelOrderConfirmed(orderID);
    };
}

function showFeedbackModal() {
    $('#feedback-form-modal').modal('show');
}

function closeFeedbackModal() {
    $('#feedback-form-modal').modal('hide');
}

function submitFeedback() {
    var feedbackText = document.getElementById('feedbackId').value;

    $.ajax({
        type: 'POST',
        url: 'php/submit_feedback.php',
        data: { feedback: feedbackText },
        dataType: 'json', 
        success: function(response) {
            console.log(response); 
            if (response.success) {
                console.log('Feedback submitted successfully');

                window.location.href = 'index.php';
            } else {
                console.error('Error submitting feedback:', response.error);
                
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX error:', error);
        
        }
    });
}

function changeRatingColor(radio) {
    resetRatingColor(); 
    setRatingColor(radio); 
}

function hoverRatingColor(radio) {
    resetRatingColor(); 
    setRatingColor(radio);
}

function resetRatingColor() {
    var spans = document.querySelectorAll('.rating-input-wrapper span');
    spans.forEach(function(span) {
        span.style.backgroundColor = '';
    });
}

function setRatingColor(radio) {
    var selectedSpan = radio.nextElementSibling; 
    selectedSpan.style.backgroundColor = 'yellow';
}