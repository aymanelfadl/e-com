
$(document).ready(function(){
    $('#search').on("keyup", function(){
      var getName = $(this).val();
     
      $.ajax({
        method: 'POST',
        url: 'searchajax.php',
        data: { name: getName },
        success: function(response) {
             $("#showdata").html(response);
        } 
      });
    });
 });
 


let sourceDiv = document.querySelector('.display');
let targetDiv = document.querySelector('.menu-wrap');

// Get the computed height of the source div
let sourceHeight = window.getComputedStyle(sourceDiv).getPropertyValue('height');

// Set the height of the target div to match the height of the source div
let numericHeight = parseFloat(sourceHeight);

// Add 20 pixels to the numeric height
let adjustedHeight = numericHeight + 85;

// Set the height of the target div with the adjusted height
