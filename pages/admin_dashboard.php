<?php
session_start();
include "Connessione.php";

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    echo 'Access denied.';
    exit;
}

$sql = "SELECT * FROM Users WHERE username= 'admin' OR username= 'root'";
$result = $conn->query($sql);

$adminExists = $result->num_rows > 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $adminExists) {
    $id = $_POST['id'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "UPDATE Products SET description='$description', price=$price WHERE id=$id";
    $conn->query($sql);

    echo 'Product updated.';
}

$sql = "SELECT id, name, description, price FROM Products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
<?php if ($adminExists): ?>
    <?php while ($product = $result->fetch_assoc()): ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" value="<?php echo $product['description']; ?>">
            <br>
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>">
            <br>
            <button type="submit">Update</button>
        </form>
    <?php endwhile; ?>
<?php else: ?>
    <p>Admin does not exist.</p>
<?php endif; ?>
</body>
</html>