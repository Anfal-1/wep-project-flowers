<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=web;charset=utf8", $username, $password);


// Check if the form has been submitted
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture the form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $cardNumber = isset($_POST['card']) ? $_POST['card'] : '';
    $expiryDate = isset($_POST['date']) ? $_POST['date'] : '';
    $stmt = $database->prepare("INSERT INTO customer (name, email, card_number, date) VALUES (:name, :email, :card_number, :date)");

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':card_number', $cardNumber);
    $stmt->bindParam(':date', $expiryDate);

    if ($stmt->execute()) {
        echo 'تم بنجاح اضافة بيانات';
    } else {
        echo 'فشل اضافة بيانات';
    }
    // TODO: Process the payment information
    // For example, you might want to validate the card details and then process the payment.
    // After processing the payment, you might want to redirect the user to a success page or handle errors.

    // For now, let's just print the captured data
    // Remove this part in production code
    echo "Name: " . htmlspecialchars($name) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Card Number: " . htmlspecialchars($cardNumber) . "<br>";
    echo "Expiry Date: " . htmlspecialchars($expiryDate) . "<br>";
    
    // Redirect to a confirmation page (replace 'confirmation_page.php' with your actual page)
    // header('Location: confirmation_page.php');
    // exit;
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>LARH - Checkout</title> 
</head>
<body>
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
    <div class="content">
        <h2>Payment information</h2>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="card">Numder of Card:</label>
            <input type="text" id="card" name="card" required>

            <label for="date">Expiry Date:</label>
            <input type="date" id="date" name="date" required>

            <button type="submit" class="next-button">Confirm payment</button>
        </form>


        <footer>
            <p>&copy; 2024 LARH - Flowers Shop. All rights reserved.</p>
        </footer>
</body>
</html>







