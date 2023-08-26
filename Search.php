<?php require 'db.php';
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $sql = "SELECT * FROM customers WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);
    $count = 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body>
    <?php if(mysqli_num_rows($result)>0): ?>
        <h1>ตารางรายชื่อลูกค้า</h1>
    <table>
        <tr>
            <th>หมายเลข</th>
            <th>ชื่อลูกค้า</th>
            <th>อีเมล</th>
            <th>วันที่ใช้บริการล่าสุด</th>
        </tr>
        <?php while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td><?php echo $count; $count++; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo date('d M Y',strtotime($row['date_register'])); ?></td>
            </tr>    
        <?php endwhile; ?>    
    <?php else: ?>
        <h1>ไม่พบข้อมูล</h1>
        <form action="Search.php" method="get">
            <label for="search">ค้นหา: </label>
            <input type="text" name="search" id="search">
            <input type="submit" value="ค้นหา">
    </form>
    <?php endif; ?>    
</body>
</html>