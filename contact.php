<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('query failed');
      $message[] = 'message sent successfully!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Где нас найти</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>
<div class="heading">
   <h3>Где нас найти</h3>
</div>
<section class="about">

   <div class="flex">

   <div class="image">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d35845.470465659135!2d37.47361563032419!3d55.83938117319633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b5483be3ba42cd%3A0xb7237caddcaae46d!2z0JrQvtC70LvQtdC00LYg0L_RgNC10LTQv9GA0LjQvdC40LzQsNGC0LXQu9GM0YHRgtCy0LAg4oSWMTE!5e0!3m2!1sru!2sru!4v1671441729386!5m2!1sru!2sru" 
            width="1200" 
            height="450" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>

      <div class="content">
          <h3>Контактная информация</h3>
          <p class="text-start" style="font-size: 20px;"> <i class="fas fa-phone"><b>  Номер телефона: </b></i> +7 (985) 570-33-00 </p>
          <p class="text-start" style="font-size: 20px;"> <i class="fas fa-envelope"><b>  Email: </b></i> MusicHouse@mh.ru </p>
          <p class="text-start" style="font-size: 20px;"><i class="fas fa-map-marker-alt"><b>  Адрес: </b> </i> Москва, Россия</p>
      </div>

   </div>

</section>

<?php include 'footer.php'; ?>

<script src="js/script.js"></script>

</body>
</html>