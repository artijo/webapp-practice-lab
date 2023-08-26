<?php
$host = 'localhost';
$user = 'root';
$pass = '1234';
$db = 'webapp';

$conn = mysqli_connect($host, $user, $pass, $db);
if(!$conn){
    die('Could not connect: '.mysqli_error());
}
?>