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

<header class="header" style="background-color: red;">

   <div class="flex">

   <a href="home.php" class="logo" style="font-weight: bold; font-size: 24px; text-decoration: none; color: white;">
  CHAIN SHOP MANAGEMENT SYSTEM<span style="font-weight: normal; color: #FFA500;"></span>
</a>

      <nav class="navbar">
   <a href="home.php" style="color: white; font-weight: bold;">HOME</a>
   <a href="shop.php" style="color: white; font-weight: bold;">SHOP</a>
   <a href="orders.php" style="color: white; font-weight: bold;">ORDERS</a>
   <a href="about.php" style="color: white; font-weight: bold;">ABOUT</a>
   <a href="contact.php" style="color: white; font-weight: bold;">CONTACT</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars" style="color: white;"></div>
         <div id="user-btn" class="fas fa-user" style="color: white;"></div>
         <a href="search_page.php" class="fas fa-search" style="color: white;"></a>
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
         ?>
         <a href="wishlist.php" style="color: white; text-decoration: none;">
  <i class="fas fa-heart" style="color: white;"></i>
  <span style="color: white;">(<?= $count_wishlist_items->rowCount(); ?>)</span>
</a>

<a href="cart.php" style="color: white; text-decoration: none;">
  <i class="fas fa-shopping-cart" style="color: white;"></i>
  <span style="color: white;">(<?= $count_cart_items->rowCount(); ?>)</span>
</a>

      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
         <p><?= $fetch_profile['name']; ?></p>
         <a href="user_profile_update.php" class="btn">update profile</a>
         <a href="logout.php" class="delete-btn">logout</a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
      </div>

   </div>

</header>