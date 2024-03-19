<?php
session_start();
include "Connessione.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
}
$sql = "SELECT * FROM Users WHERE username= '$username' OR email= '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Username or email already in use";
} else {
    $sql = "INSERT INTO Users (username, password, email, birthdate) VALUES ('$username', '$password', '$email', '$birthdate')";

    if($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else {
        $_SESSION['username'] = $username;
        echo "User registered successfully";
    }
}
echo "<br><a href='index.php'>Home</a>";