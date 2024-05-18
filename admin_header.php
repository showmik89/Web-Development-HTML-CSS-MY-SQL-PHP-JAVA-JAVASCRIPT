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

<header class="header">

   <div class="flex">

   <a href="admin_page.php" class="logo" style="color: #9b59b6; text-decoration: none; font-family: Arial, sans-serif;">
  <span style="color: red; font-weight: bold;">ADMIN</span><span style="color: violet; font-weight: bold;">PANEL</span>
</a>


      <nav class="navbar">
         <a href="admin_page.php" style="color: red; font-weight: bold;">HOME</a>
         <a href="admin_products.php" style="color: red; font-weight: bold;">PRODUCTS</a>
         <a href="admin_orders.php" style="color: red; font-weight: bold;">ORDERS</a>
         <a href="admin_users.php" style="color: red; font-weight: bold;">USERS</a>
         <a href="admin_contacts.php" style="color: red; font-weight: bold;">MESSAGES</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars" style="color: violet;"></div>
         <div id="user-btn" class="fas fa-user" style="color: violet;"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
         <p><?= $fetch_profile['name']; ?></p>
         <a href="admin_update_profile.php" class="btn">update profile</a>
         <a href="logout.php" class="delete-btn">logout</a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
      </div>

   </div>

</header>