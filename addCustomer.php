<?php require 'db.php' ;
    if(isset($_POST['name']) && isset($_POST['email'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $now = date('Y-m-d',time());
        $sql = "INSERT INTO customers (name ,email, date_register) VALUES ('$name', '$email', '$now')";

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><?php if (mysqli_query($conn, $sql)): ?>
            <script>
                alert('บันทึกข้อมูลเรียบร้อยแล้ว')
                window.location = 'index.php';
            </script>
        <?php endif; ?>
    <script></script>
</body>
</html>