<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=web;charset=utf8", $username, $password);

// Fetch cart items
$sql = $database->prepare("SELECT * FROM cart");
$sql->execute();
$cartItems = $sql->fetchAll(PDO::FETCH_ASSOC);

$sql = $database->prepare("SELECT DISTINCT customer_id FROM cart");
$sql->execute();
$customers = $sql->fetchAll(PDO::FETCH_ASSOC);

// Remove product from cart
if (isset($_POST['product'])) {
    // Sanitize user input
    $product = htmlspecialchars($_POST['product']);

    $remov = $database->prepare('DELETE FROM cart WHERE product = :product');
    $remov->bindParam(':product', $product);
    if ($remov->execute()) {
        echo 'Product removed successfully.';
    } else {
        echo 'Failed to remove product.';
    }

    
    
}
foreach ($customers as $customer) {
    $sql = $database->prepare("SELECT * FROM cart WHERE customer_id = :customer_id");
    $sql->bindParam(':customer_id', $customer['customer_id']);
    $sql->execute();
    $cartItems = $sql->fetchAll(PDO::FETCH_ASSOC);


$totalPrice = 0;

foreach ($cartItems as $item) {
    // Check if the 'price' key exists in the $item array
    if (isset($item['price'])&& isset($item['quantity'])) {
        // Calculate the total price for each item
        $totalPrice += $item['price'] * $item['quantity'];
    } else {
        echo 'Price not set for item: ' . $item['product'];
    }
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
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            <script src="script.js"></script> 
        </head>
<body>
    <header>
    <h1>LARH - Flowers Shop</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="add.php">Products</a></li>
                <li><a href="cart.php"><i class="fas fa-shopping-cart nav-cart-icon"></i></a></li>
                
                <li><a href="contact.html">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Your Cart</h2>
        <ul>
        <?php foreach ($cartItems as $item) : ?>
    <li>
        <?php echo htmlspecialchars($item['product']); ?>
        <form method="post">
            <input type="hidden" name="product" value="<?php echo htmlspecialchars($item['product']); ?>">
            <?php
            if ($item['product'] == 'Red Roses') {
                echo '<img src="Flower 1.jpg" alt="Flower 1" height="150" width="200">';
            } elseif ($item['product'] == 'White Tulips') {
                echo '<img src="Flower 2.jpg" alt="Flower 2" height="150" width="200">';
            } elseif ($item['product'] == 'Rosy Love') {
                echo '<img src="Flower 3.jpg" alt="Flower 3" height="150" width="200">';
            } elseif ($item['product'] == 'Red Baby Roses') {
                echo '<img src="Flower 4.jpg" alt="Flower 4" height="150" width="200">';
            }
            ?>
            <input type="hidden" name="price" id="price" value="<?php echo htmlspecialchars($item['price']); ?>">
            <input type="number" id="quantity" name="quantity" min="1" max="100" value="<?php echo htmlspecialchars($item['quantity']); ?>">
            <button type="submit">Remove from cart</button>
            <button id="buyButton">buying</button>
        </form>
    </li>
    </ul>
<?php endforeach; 


        
       
        echo "Total price ="  . ": " . $totalPrice;

       ?>
    </main>

    <footer>
        <!-- Footer content here -->
    </footer>
</body>
</html>

