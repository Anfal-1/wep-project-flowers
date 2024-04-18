<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=web;charset=utf8", $username, $password);

// Fetch cart items
$sql = $database->prepare("SELECT * FROM cart");
$sql->execute();
$cartItems = $sql->fetchAll(PDO::FETCH_ASSOC);

// Remove product from cart
if (isset($_POST['product'])) {
    $product = $_POST['product'];

    $remov = $database->prepare('DELETE FROM cart WHERE product = :product');
    $remov->bindParam(':product', $product);
    if ($remov->execute()) {
        echo 'Product removed successfully.';
    } else {
        echo 'Failed to remove product.';
    }
}
$totalPrice = 0;
foreach ($cartItems as $item) {
    // Check if the 'price' key exists in the $item array
    if (isset($item['price'])) {
        // Calculate the total price for each item
        $totalPrice += $item['price'];
    } else {
        echo 'Price not set for item: ' . $item['product'];
    }
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LARH - Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
    <h1>LARH - Flowers Shop</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="add.php">Products</a></li>
                <li><a href="cart.php">cart</a></li>
                <li><a href="chdisplay.php">Checkout</a></li>
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Your Cart</h2>
        <ul>
            <?php foreach ($cartItems as $item) : ?>
                <li>
                    <?php echo $item['product']; ?>
                    <form method="post">
                        <input type="hidden" name="product" value="<?php echo $item['product']; ?>">
                        <button type="submit">Remove from cart</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
        <p>السعر الإجمالي: SAR <?php echo $totalPrice; ?></p>
    </main>

    <footer>
        <!-- Footer content here -->
    </footer>
</body>
</html>
