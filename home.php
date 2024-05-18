<?php

@include 'config.php';

session_start();

// Check if 'user_id' key is set in $_SESSION array
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

// Check if a product is clicked and user is not logged in
if(isset($_POST['pid']) && !$user_id) {
   header('location:login.php');
   exit; // Stop executing further code
}

if(isset($_POST['add_to_wishlist'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);

   $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
   $check_wishlist_numbers->execute([$p_name, $user_id]);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_wishlist_numbers->rowCount() > 0){
      $message[] = 'already added to wishlist!';
   }elseif($check_cart_numbers->rowCount() > 0){
      $message[] = 'already added to cart!';
   }else{
      $insert_wishlist = $conn->prepare("INSERT INTO `wishlist`(user_id, pid, name, price, image) VALUES(?,?,?,?,?)");
      $insert_wishlist->execute([$user_id, $pid, $p_name, $p_price, $p_image]);
      $message[] = 'added to wishlist!';
   }

}

if(isset($_POST['add_to_cart'])){

   $pid = $_POST['pid'];
   $pid = filter_var($pid, FILTER_SANITIZE_STRING);
   $p_name = $_POST['p_name'];
   $p_name = filter_var($p_name, FILTER_SANITIZE_STRING);
   $p_price = $_POST['p_price'];
   $p_price = filter_var($p_price, FILTER_SANITIZE_STRING);
   $p_image = $_POST['p_image'];
   $p_image = filter_var($p_image, FILTER_SANITIZE_STRING);
   $p_qty = $_POST['p_qty'];
   $p_qty = filter_var($p_qty, FILTER_SANITIZE_STRING);

   $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $check_cart_numbers->execute([$p_name, $user_id]);

   if($check_cart_numbers->rowCount() > 0){
      $message[] = 'already added to cart!';
   }else{

      $check_wishlist_numbers = $conn->prepare("SELECT * FROM `wishlist` WHERE name = ? AND user_id = ?");
      $check_wishlist_numbers->execute([$p_name, $user_id]);

      if($check_wishlist_numbers->rowCount() > 0){
         $delete_wishlist = $conn->prepare("DELETE FROM `wishlist` WHERE name = ? AND user_id = ?");
         $delete_wishlist->execute([$p_name, $user_id]);
      }

      $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
      $insert_cart->execute([$user_id, $pid, $p_name, $p_price, $p_qty, $p_image]);
      $message[] = 'added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style>
   .home{
        background-image: url('images/ll.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed; /* Keeps the background image fixed while scrolling */
    }
    .box {
           width: 250px; /* Adjust the width as per your design */
           height: 500px; /* Adjust the height as per your design */
           padding: 20px; /* Optional: Adjust padding for inner content */
           margin: 10px; /* Optional: Adjust margin for spacing between boxes */
           text-align: center; /* Optional: Center align content */
           display: inline-block; /* Ensure boxes are displayed side by side */
       }
       .box img {
           width: 100%; /* Ensure image fills the container */
           height: auto; /* Maintain aspect ratio */
       }
       .box h3, .box p {
           margin: 10px 0; /* Adjust spacing for heading and paragraph */
       }
       .box a.btn {
           display: block; /* Ensure button takes full width */
           width: 80%; /* Adjust button width */
           margin: 0 auto; /* Center align button */
           background-color: red; /* Button background color */
           color: white; /* Button text color */
           padding: 10px; /* Adjust button padding */
           text-decoration: none; /* Remove default link underline */
       }
</style>




</head>
<body>
   
<?php include 'header.php'; ?>

<div class="home-bg"

   <section class="home">

   <section class="home">

   <div class="content">
   <span style="color: red;">Choose organic for a healthier you!</span>
   <h3 style="color: purple;">Opting for organic foods is your path to a nourished and vibrant lifestyle</h3>
   <p style="color: red;">Say hello to wholesome goodness by embracing organic choices. With organic foods, you're not just eating - you're investing in your well-being.</p>
   <a href="about.php" class="btn" style="background-color: red; font-weight: bold;">about us</a>

</div>


   </section>

</div>

<section class="home-category">

   <h1 class="title">categories</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/imag.jpeg" alt="">
         <h3>Fruits</h3>
         <p>Tropical fruits with a sweet flavor. Widely popular tropical fruits known for their convenient packaging, natural sweetness, and high potassium content.</p>
         <a href="category.php?category=fruits" class="btn">fruits</a>
      </div>

      <div class="box">
         <img src="images/images.jpeg" alt="">
         <h3>chocolates</h3>
         <p>Discover delicious chocolates from smooth milk chocolates to rich dark varieties.</p>
         <a href="category.php?category=chocolates" class="btn">chocolates</a>
      </div>

      <div class="box">
         <img src="images/capsicum.png" alt="">
         <h3>vegetables</h3>
         <p> Leafy greens available in varieties. Some popular varieties Carrot, spinach, Swiss chard, arugula, and romaine lettuce.</p>
         <a href="category.php?category=vegitables" class="btn">vegetables</a>
      </div>

      <div class="box">
         <img src="images/cu.png" alt="">
         <h3>cosmetics</h3>
         <p>Explore our curated collection from renowned brands around the world. Embark on a journey with our meticulously curated collection from world-renowned brands.</p>
         <a href="category.php?category=cosmetics" class="btn">cosmetics</a>
      </div>

   </div>

</section>

<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <form action="" class="box" method="POST">
      <div class="price">TK<span><?= $fetch_products['price']; ?></span>/-</div>
      <a href="view_page.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
      <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="p_name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="p_price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="p_image" value="<?= $fetch_products['image']; ?>">
      <input type="number" min="1" value="1" name="p_qty" class="qty">
      <input type="submit" value="add to wishlist" class="option-btn" name="add_to_wishlist" style="color: white; background-color: red;">
      <input type="submit" value="add to cart" class="btn" name="add_to_cart" style="color: white; background-color: red;">


   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products added yet!</p>';
   }
   ?>

   </div>

</section>







<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>