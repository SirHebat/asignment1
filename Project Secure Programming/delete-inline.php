<?php

$id = $_GET['id'];

include 'config.php';

$sql = "DELETE FROM user_form WHERE id = {$id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

header("Location: http://localhost/project%20Secure%20Programming/data.php");

mysqli_close($conn);

?>
