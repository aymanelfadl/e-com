function uploadProduct(){


 var myform = document.getElementById("myform");
 var message = document.getElementById("message");
    
    const formData = new FormData(myform);


    console.log("im in the function");
   
  console.log("heho");

  let isFormValid = true;

  if (  isNaN(formData.get('money') )||  isNaN(formData.get('Quantity') )){
    
    message.innerHTML="Please ensure that the 'Price' and 'Quantity' fields contain <br><br><br>numeric values. "
    console.log(formData.get('money') );
    console.log(formData.get('Quantity') );
    message.setAttribute("class","error");
return;
  }





  formData.forEach((value, key) => {
    if (!value) {
        isFormValid = false;
        // You can also log or handle individual missing fields here if needed
        console.log(`Field ${key} is empty.`);
    }
});


  if(isFormValid){
    fetch(myform.getAttribute('action'), {
            method: 'POST',
            body: formData
        })
        .then(response => {
            // Handle the response as needed
            console.log(`Product  added successfully`);
            message.innerHTML="Product "+formData.get('title')+" Added successfully .  "
            message.setAttribute("class","pass");
        

        })
        .catch(error => {
            // Handle any errors that occurred during the fetch
            console.error(`Error modifying product:`, error);
        });

    }
    else{
        message.innerHTML="Please provide all details for this product.";
        message.setAttribute("class","error");

    }
    }





   