<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>CRUD</title>


  <!-- custom css file link  -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
   
</head>
  <body>
    
      <div id="header">
          <h1>Crud Operation system</h1>
      </div>
      <div id="menu">
        <ul>
            <li>
                <a href="data.php">Data Table</a>
            </li>
            <li>
                <a href="add.php">Add</a>
            </li>
            <li>
                <a href="update.php">Update</a>
            </li>
            <li>
                <a href="delete.php">Delete</a>
            </li>
        </ul>
      </div>

  
        <div id="main-content">
            <h2>All Records</h2>
            <?php
              include 'config.php';

              $sql = "SELECT * FROM user_form";
              $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");



              if(mysqli_num_rows($result) > 0)  {
            ?>
            
              <table class="table table-bordered" style="width:80%;" cellpadding="7px">
                <thead >
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>User Type</th>
                <th style="width:15%;">Action</th>
                </thead>
                <tbody>
                  <?php
                    while($row = mysqli_fetch_assoc($result)){
                    
                    $id1 = $row['id'];
                    $name1 = $row['name'];
                    $email1 = $row['email'];
                    $pass1 = $row['password'];
                    $usertype1 = $row['user_type'] ;
                  ?>
                    <tr>
                        <td><?php echo "<div class='left'>$id1</div>"; ?></td>
                        <td><?php echo "<div class='left'>$name1</div>"; ?></td>
                        <td><?php echo "<div class='left'>$email1</div>"; ?></td>
                        <td><?php echo "<div class='center'>$pass1</div>"; ?></td>
                        <td><?php echo "<div class='center'>$usertype1</div>"; ?></td>
                        <td>
                            <a href='edit.php?id=<?php echo $row['id']; ?>'>Edit</a>
                            <a href='delete-inline.php?id=<?php echo $row['id']; ?>'>Delete</a>
                        </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
          <?php }else{
            echo "<h2>No Record Found</h2>";
          }
          mysqli_close($conn);
          ?>
        </div>

  </body>
</html>
