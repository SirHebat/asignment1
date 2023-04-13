<?php 

$conn = mysqli_connect('localhost','root','','user_db');

// Check for errors
if (!$conn) {
    echo 'Failed to get items from database: ' . $db->error;
    exit();
  }
?>