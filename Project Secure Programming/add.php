<?php

@include 'config.php';

// Initialize the $new_data array
$new_data = [];

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'User already exists!';

   }else{

      if($pass != $cpass){
         $error[] = 'Password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);

         // Add the newly inserted data to the $new_data array
         $new_data[] = array(
            'name' => $name,
            'email' => $email,
            'user_type' => $user_type
         );

         $success[] = 'New data added successfully!';
      }
   }
};

include 'header.php';
?>

<div class="form-container">


   <form action="" method="post">
      <h3>Adding New User</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };

      if(isset($success)){
         foreach($success as $success){
            echo '<span class="success-msg">'.$success.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Enter your name">
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="password" name="cpassword" required placeholder="Confirm your password">
      <select name="user_type">
         <option value="user">User</option>
         <option value="admin">Admin</option>
      </select>
      <input type="submit" name="submit" value="Submit" class="form-btn">
   </form>

   <?php
   // Show the newly inserted records if there are no errors
   if (!isset($error) && isset($success)) {
      if(!empty($new_data)){
         ?>
         <div class="table-responsive">
            <div class="newtabledata">
               <table>
                  <caption>New User Data</caption>
                  <thead>
                     <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Type</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     foreach($new_data as $data){
                        ?>
                        <tr>
                           <td><?php echo $data['name']; ?></td>
                           <td><?php echo $data['email']; ?></td>
                           <td><?php echo $data['user_type']; ?></td>
                        </tr>
                        <?php
                     }
                     ?>
                  </tbody>
               </table>
            </div>
         </div>
         <?php
      }
   }
   ?>

</div>