<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=web;charset=utf8", $username, $password);

$address = '';
$expiryDate = '';
$number =' ';
$email = '';
$cardNumber ='';
$name ='';
// Check if the form has been submitted
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture the form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $cardNumber = isset($_POST['card']) ? $_POST['card'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $number = isset($_POST['number']) ? $_POST['number'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $expiryDate = isset($_POST['date']) ? $_POST['date'] : '';
    $stmt = $database->prepare("INSERT INTO customer (name, number_card,email,number,address, date) VALUES (:name,  :number_card, :email, :number, :address, :date)");

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':number_card', $cardNumber);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':number', $number);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':date', $expiryDate);

    if ($stmt->execute()) {
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
   
    <title>LARH - Checkout</title> 
    <link rel="stylesheet" href="styles.css"> 
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header>
    <h1>LARH - Flowers Shop</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="add.php">Products</a></li>
      
                
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="cart.php"><i class="fas fa-shopping-cart nav-cart-icon"></i></a></li>
            </ul>
        </nav>
    </header>
    <div class="content">
        <h2>Payment information</h2>
       <main>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="card">Numder of Card:</label>
            <input type="text" id="card" name="card" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
           

            <label for="number">Number:</label>
            <input type="text" id="number" name="number" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>


            

            <label for="date">Expiry Date:</label>
            <input type="date" id="date" name="date" required>

            <button type="submit" class="next-button">Confirm payment</button>

        </form>
      <?php 
   
    
    echo "Name: " . $name . "<br>";
    echo "Card Number: " . $cardNumber . "<br>";
    echo "Email: " . $email. "<br>";
    echo "number: " . $number. "<br>";
    echo "Address: " . $address. "<br>";
    echo "Expiry Date: " . $expiryDate . "<br>";
    
    
 ?>
 <li><a href="add.php">Products</a></li>
        </main>
        <footer>
            <p>&copy; 2024 LARH - Flowers Shop. All rights reserved.</p>
        </footer>
</body>
</html>
