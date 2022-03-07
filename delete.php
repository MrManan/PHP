<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $id = $_GET['deleteid'];
    $sql = "DELETE From `tabledata` WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location:index.php");
    }
    if (!$result) {
        die(mysqli_error($conn));
    }
}
