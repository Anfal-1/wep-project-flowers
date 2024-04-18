<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=web;charset=utf8", $username, $password);

if (isset($_POST['product'], $_POST['price'])) {
    $product = $_POST['product'];
    $price = $_POST['price'];
    // Use placeholders for values to prevent SQL injection
    $addData = $database->prepare("INSERT INTO cart (product ,price) VALUES (:product ,:price)");
    
    // Bind the parameters to the actual values
    $addData->bindParam(':product', $product);
    $addData->bindParam(':price', $price);
    if ($addData->execute()) {
        echo 'تم بنجاح اضافة بيانات';
    } else {
        echo 'فشل اضافة بيانات';
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>LARH - Products</title>
        
            <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>LARH - Cart</title>
</head>
<body>
    <script src="script.js"></script>
    <header>
    <h1>LARH - Flowers Shop</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="add.php">Products</a></li>
                <li><a href="chdisplay.php">Checkout</a></li>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="cart.php"><i class="fas fa-shopping-cart nav-cart-icon"></i></a></li>
            </ul>
        </nav>
    </header>
  
    <main>
        <h2>Our Products</h2>
        <div class="product">
            <img src="Flower 1.jpg" alt="Flower 1" height="150" width="200">
            <h3>Red Roses</h3>
            <p>Price: SAR 150</p>
            <form method="post">
            <input type="hidden" name="product" value="Red Roses">
            <input type="hidden" name="price" value="150">
            <button class="add-to-cart-button" data-product-name="Red Roses" data-product-price="150">Add to Cart</button>

            </form>
            
        </div>
        <div class="product">
            <img src="Flower 2.jpg" alt="Flower 2" height="150" width="200">
            <h3>White Tulips</h3>
            <p>Price: SAR 190</p>
            <form method="post">
            <input type="hidden" name="product" value="White Tulips">
            <input type="hidden" name="price" value="190">
            <button class="add-to-cart-button" data-product-name="White Tulips" data-product-price="190">Add to Cart</button>

            </form>
        </div>
        <div class="product">
            <img src="Flower 3.jpg" alt="Flower 3" height="150" width="200">
            <h3>Rosy Love</h3>
            <p>Price: SAR 200</p>
            <form method="post">
            <input type="hidden" name="product" value="Rosy Love">
            <input type="hidden" name="price" value="200">
            <button class="add-to-cart-button" data-product-name="Rosy Love" data-product-price="200">Add to Cart</button>

            </form>
        </div>
        <div class="product">
            <img src="Flower 4.jpg" alt="Flower 4" height="150" width="200">
            <h3>Red Baby Roses</h3>
            <p>Price: SAR 250</p>
            <form method="post">
            <input type="hidden" name="product" value="Red Baby Roses">
            <input type="hidden" name="price" value="250">
            <button class="add-to-cart-button" data-product-name="Red Baby Roses" data-product-price="250">Add to Cart</button>
            </form>
        </div>

    </main>
    
    <footer>
        <p>&copy; 2024 LARH - Flowers Shop. All rights reserved.</p>
    </footer>
</body>
</html>
