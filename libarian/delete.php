<?php
require_once '../db_conn.php';
if (isset($_GET['bookDelete'])) {
    $id = base64_decode($_GET['bookDelete']);
    $sql = "DELETE FROM books  WHERE id = '$id'";
    $result = mysqli_query($db_connect, $sql);
    if ($result) {
        header('location:manage_book.php');
    }
}
