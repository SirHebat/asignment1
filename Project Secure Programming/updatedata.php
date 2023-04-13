<?php
include 'config.php';
    $id = $_POST['id'];
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $user_type = $_POST['user_type'];



$sql = "UPDATE user_form SET name = '{$name}', email = '{$email}', password = '{$pass}', user_type = '{$user_type}' WHERE id = {$id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: http://localhost/project%20Secure%20Programming/data.php");

mysqli_close($conn);

?>
