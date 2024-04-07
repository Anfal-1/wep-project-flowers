<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost;dbname=;charset=utf8", $username, $password);

if (isset($_POST['product'])) {
    $product = $_POST['product'];

    // Use placeholders for values to prevent SQL injection
    $addData = $database->prepare("INSERT INTO cart (product) VALUES (:product)");
    
    // Bind the parameters to the actual values
    $addData->bindParam(':product', $product);

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
    <title>LARH - Products</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- ... rest of your HTML ... -->
    <div class="product">
        <img src="Flower 1.jpg" alt="Flower 1" height="150" width="200">
        <h3>Red Roses</h3>
        <p>Price: SAR 150</p>
        <form method="post">
            <input type="hidden" name="product" value="Red Roses">
            <button class="add-to-cart-button" type="submit">Add to Cart</button>
        </form>
    </div>
    <!-- ... rest of your products ... -->
</body>
</html>
