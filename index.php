<?php require 'db.php' ;
$sql = "SELECT * FROM customers";
$result = mysqli_query($conn, $sql);
$count = 1;
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
    <form action="addCustomer.php" method="post">
        <fieldset>
            <legend>เพิ่มข้อมูลลูกค้า</legend>
            <label for="name">ชื่อ: </label>
            <input type="text" name="name" id="name"></br>
            <label for="email">อีเมล: </label>
            <input type="email" name="email"></br>
            <input type="submit" value="บันทึก">
        </fieldset>
    </form>
    <form action="Search.php" method="get">
            <label for="search">ค้นหา: </label>
            <input type="text" name="search" id="search">
            <input type="submit" value="ค้นหา">
    </form>
    <h1>ตารางรายชื่อลูกค้า</h1>
    <table>
        <tr>
            <th>หมายเลข</th>
            <th>ชื่อลูกค้า</th>
            <th>อีเมล</th>
            <th>วันที่ใช้บริการล่าสุด</th>
            <th>ลบ</th>
            <th>แก้ไข</th>
        </tr>
        <?php if(mysqli_num_rows($result)>0): ?>
        <?php while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td><?php echo $count; $count++; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo date('d M Y',strtotime($row['date_register'])); ?></td>
                <td><a href="./deleteCustomer.php?id=<?php echo $row['id'];?>" onclick="confirmDelete()">ลบ</a></td>
                <td><a href="./updateCustomer.php?id=<?php echo $row['id'];?>">แก้ไข</a></td>
            </tr>
        <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">ไม่มีข้อมูล</td>
            </tr>
        <?php endif; ?>
    </table>
    <script>
        function confirmDelete(){
            confirm('คุณต้องการลบข้อมูลนี้หรือไม่');
        }
        document.getElementById('name').required = true;
        document.getElementById('email').required = true;
    </script>
</body>
</html>