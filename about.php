<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<section class="about">

   <div class="row">

      <div class="box">
         <img src="images/pk.jpg" alt="">
         <h3>why choose us?</h3>
         <p>Our commitment to excellence is evident in every aspect of our work. From the meticulous selection of materials to our fine-tuned production process, we ensure that every product and service meets the highest standards of quality.</p>
         <a href="contact.php" class="btn">contact us</a>
      </div>

      <div class="box">
         <img src="images/ok.jpg" alt="">
         <h3>what we provide?</h3>
         <p>we provide a wide selection of high-quality groceries, including fresh produce, meats, dairy, pantry essentials, international foods, and ready-to-eat meals, complemented by top-notch customer service, online shopping, and home delivery. Our focus is on freshness, variety, and convenience, ensuring a superior shopping experience for every customer.</p>
         <a href="shop.php" class="btn">our shop</a>
      </div>

   </div>

</section>

<section class="reviews">

   <h1 class="title">clients reivews</h1>

   <div class="box-container">

      <div class="box">
         
         <p>Fantastic selection and friendly staff! The fresh produce always impresses me. Highly recommend.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Tisa</h3>
      </div>

      <div class="box">
         
         <p>I was thrilled to find such a wide variety of organic products. Shopping here has made eating healthy so much easier for my family.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Nibedita</h3>
      </div>

      <div class="box">
         
         <p>The online ordering and home delivery service is a game-changer. Quick, efficient, and always accurate.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Luxmi</h3>
      </div>

      <div class="box">
         
         <p>Their ready-to-eat meals have saved me on many busy evenings. Great variety, and everything tastes homemade. Can't beat the convenience and quality.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Tasnim</h3>
      </div>

      <div class="box">
         
         <p>Their freshly baked bread and pastries are a must-try. Absolutely delicious. Love it. Great Food. Customer service here goes above and beyond.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Nipa</h3>
      </div>

      <div class="box">
         
         <p>Impressed with the international food selection. I can find ingredients here that are impossible to get anywhere else in the area. Love this place.</p>
         <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
         </div>
         <h3>Jarin</h3>
      </div>

   </div>

</section>









<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>