<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Edit Record</h2>
    <form class="post-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="id" />
        </div>
        <input class="submit" type="submit" name="showbtn" value="Show" />
    </form>

    <?php
      if(isset($_POST['showbtn'])){
        include 'config.php';

        $id = $_POST['id'];

        $sql = "SELECT * FROM user_form WHERE id = {$id}";
        $result = mysqli_query($conn, $sql) or die("Query Unsuccessful.");

        if(mysqli_num_rows($result) > 0)  {
          while($row = mysqli_fetch_assoc($result)){
    ?>

    
    <form class="post-form" action="updatedata.php" method="post">
        <div class="form-group">
            <label for="">Name</label>
            <input type="hidden" name="id"  value="<?php echo $row['id']; ?>" />
            <input type="text" name="name" value="<?php echo $row['name']; ?>" />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $row['email']; ?>" />
        </div>
        <div class="form-group">
            <label>User Type</label>
            <select name="user_type">
                <option value="user" <?php if ($row['user_type'] == 'user') echo 'selected'; ?>>user</option>
                <option value="admin" <?php if ($row['user_type'] == 'admin') echo 'selected'; ?>>admin</option>
            </select>
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="text" name="password" value="<?php echo $row['password']; ?>"/>
        </div>
        <input class="submit" type="submit" value="Update"  />
    </form>
    <?php
          }
        }
      }
    ?>
</div>
</div>
</body>
</html>

