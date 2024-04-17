document.addEventListener("DOMContentLoaded", function() {
    const addToCartButtons = document.querySelectorAll(".add-to-cart-button");
    addToCartButtons.forEach(button => {
        button.addEventListener("click", function(event) {
            event.preventDefault();
            const product = this.parentNode.querySelector('input[name="product"]').value;
            alert(Added ${product} to cart!); // Replace this with your actual add to cart logic
        });
    });
});
