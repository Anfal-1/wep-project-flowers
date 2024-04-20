function displayWelcomeMessage() {
  alert("Welcome! to LARH ..");
}

function displayThankYouMessage() {
  alert("Thank you for ordering from our store!");
}

document.addEventListener("DOMContentLoaded", function() {
  // Assuming 'buyButton' is the id of your buying button
  var buyButton = document.getElementById('buyButton');

  buyButton.addEventListener("click", function(event) {
    event.preventDefault();
    
    // Display thank you message
    displayThankYouMessage();
  });
});
