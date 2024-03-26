<?php
session_start();
include "Connessione.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['emptyCart'])) {
        $_SESSION['cart'] = array();
    } else {
        $product_id = $_POST['product_id'];
        $sql = "SELECT id, name, description, price FROM Products WHERE id = $product_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $_SESSION['cart'][$product_id] = $product;
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Carrello</title>
</head>
<body>
<h2>Carrello</h2>
<?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
    <div class="container">
        <div class="row">
            <?php foreach ($_SESSION['cart'] as $product_id => $product_details): ?>
                <div class="col-sm">
                    <h2><?php echo $product_details['name']; ?></h2>
                    <p><?php echo $product_details['description']; ?></p>
                    <p>Price: <?php echo $product_details['price']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <form method="post" action="carello.php">
        <button type="submit" class="btn btn-primary" name="emptyCart">Svuota carrello</button>
    </form>
<?php else: ?>
    <p>Nessun prodotto nel carrello.</p>
<?php endif; ?>
</body>
</html>