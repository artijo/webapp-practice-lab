<?php require 'db.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM customers WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>
้<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <fieldset>
            <legend>แก้ข้อมูลลูกค้า</legend>
            <label for="name">ชื่อ: </label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>"></br>
            <label for="email">อีเมล: </label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>"></br>
            <input type="submit" value="บันทึก">
        </fieldset>
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sql = "UPDATE customers SET name = '$name', email = '$email' WHERE id = $id";
    if(mysqli_query($conn, $sql)){
        header('Location: index.php');
    }
}
?>