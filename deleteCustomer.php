<?php require 'db.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM customers WHERE id = $id";
    if(mysqli_query($conn, $sql)){
        header('Location: index.php');
    }
?>