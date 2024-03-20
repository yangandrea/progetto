<?php
session_start();
include "pages/Connessione.php";
$sql = "SELECT name, description, price FROM Products WHERE id=1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    echo "No product found.";
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['username'])) {
        echo 'Adding to cart...';
    } else {
        echo 'You must be logged in to add items to your cart.';
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body class="bg-warning">
<button type="button"><a href="pages/registrazione.php">Register</a></button>
<h1><?php echo $product['name']; ?></h1>
<p><?php echo $product['description']; ?></p>
<p>Price: <?php echo $product['price']; ?></p>

<!--<form method="post">-->
<!--    <button type="submit" name="addToCart">Add to cart</button>-->
<!--</form>-->

<div class="container">
    <div class="row">
        <div class="col-sm">
            <img src="Images/prodotto1.jpg" class="img-fluid" alt="Responsive image">
            <button type="button" class="btn btn-primary" name="addToCart">Aggiungi al carrello</button>
        </div>
        <div class="col-sm">
            <img src="Images/prodotto2.jpg" class="img-fluid" alt="Responsive image">
            <button type="button" class="btn btn-primary" name="addToCart">Aggiungi al carrello</button>
        </div>
        <div class="col-sm">
            <img src="Images/prodotto3.jpg" class="img-fluid" alt="Responsive image">
            <button type="button" class="btn btn-primary" name="addToCart">Aggiungi al carrello</button>
        </div>
    </div>
</div>

</body>
</html>