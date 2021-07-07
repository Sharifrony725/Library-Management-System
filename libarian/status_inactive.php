<?php
require_once '../db_conn.php';
$id = base64_decode($_GET['id']);
$sql = "UPDATE studests SET status = 0 WHERE id='$id'";
mysqli_query($db_connect, $sql);
header('location:students.php');
