<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = md5($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $sql = "SELECT * FROM `users` WHERE email = ? AND password = ?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$email, $pass]);
   $rowCount = $stmt->rowCount();  

   $row = $stmt->fetch(PDO::FETCH_ASSOC);

   if($rowCount > 0){

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_id'] = $row['id'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_id'] = $row['id'];
         header('location:home.php');

      }else{
         $message[] = 'no user found!';
      }

   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/components.css">
   <style>
      /* Add this style to change form background color */
      .form-container form {
         background-color: white; /* Change to your desired color */
      }
      /* Change login title color */
      h3 {
         color: white; /* Change to your desired color */
      }

      /* Change button background color */
      .btn {
         background-color: red; /* Change to your desired color */
         color: white; /* Optional: Change text color to white for better visibility */
      }
      
      
   </style>


</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>
   
<section class="form-container">

   <form action="" method="POST">
      <h3 style="color: black;">login now</h3>
      <input type="email" name="email" class="box" placeholder="Enter your email" required style="color: black;">
      <input type="password" name="pass" class="box" placeholder="Enter your password" required style="color: black;">
      <input type="submit" value="login now" class="btn" name="submit">
      <p style="color: white;"> 
        <strong style="color: black;">Don't have an account?</strong> 
        <a href="register.php" style="color: white; display: inline-block; background-color: red; padding: 5px 10px; border-radius: 5px;">Register now</a>
    </p>
   </form>


</section>


</body>
</html>