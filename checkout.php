<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = $_POST['number'];
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $address = mysqli_real_escape_string($conn, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pin_code']);
   $placed_on = date('d-M-Y');

   $cart_total = 0;
   $cart_products[] = '';

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   if(mysqli_num_rows($cart_query) > 0){
      while($cart_item = mysqli_fetch_assoc($cart_query)){
         $cart_products[] = $cart_item['name'].' ('.$cart_item['quantity'].') ';
         $sub_total = ($cart_item['price'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      }
   }

   $total_products = implode(', ',$cart_products);

   $order_query = mysqli_query($conn, "SELECT * FROM `orders` WHERE name = '$name' AND number = '$number' AND email = '$email' AND method = '$method' AND address = '$address' AND total_products = '$total_products' AND total_price = '$cart_total'") or die('query failed');

   if($cart_total == 0){
      $message[] = 'Ваша корзина пуста';
   }else{
      if(mysqli_num_rows($order_query) > 0){
         $message[] = 'Заказ уже размещен!'; 
      }else{
         mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$cart_total', '$placed_on')") or die('query failed');
         $message[] = 'Заказ успешно выполнен!';
         mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      }
   }
   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Оформление заказа</h3>
</div>

<section class="display-order">

   <?php  
      $grand_total = 0;
      $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_cart) > 0){
         while($fetch_cart = mysqli_fetch_assoc($select_cart)){
            $total_price = ($fetch_cart['price'] * $fetch_cart['quantity']);
            $grand_total += $total_price;
   ?>
   <p> <?php echo $fetch_cart['name']; ?> <span>(<?php echo '₽'.$fetch_cart['price'].'/-'.' x '. $fetch_cart['quantity']; ?>)</span> </p>
   <?php
      }
   }else{
      echo '<p class="empty">Ваша корзина пуста</p>';
   }
   ?>
   <div class="grand-total"> Итого сумма : <span>₽<?php echo $grand_total; ?>/-</span> </div>

</section>

<section class="checkout">

   <form action="" method="post">
      <h3>Данные по заказу</h3>
      <div class="flex">
         <div class="inputBox">
            <span>Ваше ФИО :</span>
            <input type="text" name="name" required placeholder="Введите ФИО получателя">
         </div>
         <div class="inputBox">
            <span>Ваш номер телефона :</span>
            <input type="number" name="number" required placeholder="Введите телефон получателя">
         </div>
         <div class="inputBox">
            <span>Ваш Email :</span>
            <input type="email" name="email" required placeholder="Введите ваш email">
         </div>
         <div class="inputBox">
            <span>Метод оплаты :</span>
            <select name="method">
               <option value="cash on delivery">Деньги курьеру</option>
               <option value="credit card">Кредитной картой</option>
               <option value="paypal">PayPal</option>
               <option value="paytm">Биткоинами</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Квартира :</span>
            <input type="number" min="0" name="flat" required placeholder="например: №23">
         </div>
         <div class="inputBox">
            <span>Улица :</span>
            <input type="text" name="street" required placeholder="например: Синявинская">
         </div>
         <div class="inputBox">
            <span>Город :</span>
            <input type="text" name="city" required placeholder="например: Астрахань">
         </div>
         <div class="inputBox">
            <span>Район :</span>
            <input type="text" name="state" required placeholder="например: Ленинский">
         </div>
         <div class="inputBox">
            <span>Страна :</span>
            <input type="text" name="country" required placeholder="например: Россия">
         </div>
         <div class="inputBox">
            <span>Почтовый индекс:</span>
            <input type="number" min="0" name="pin_code" required placeholder="например: 230922">
         </div>
      </div>
      <input type="submit" value="Заказать" class="btn" name="order_btn">
   </form>

</section>









<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>