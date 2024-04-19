function displayWelcomeMessage() {
    alert("Wlcome! to LARH ..");
}
document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector("form");
    form.addEventListener("submit", function(event) {
      event.preventDefault();
      
      // قم بإضافة رمز JavaScript هنا لعرض رسالة الشكر
      displayThankYouMessage();
    });
  });
  
  function displayThankYouMessage() {
    alert("شكرًا لطلبك من متجرنا!");
  }
