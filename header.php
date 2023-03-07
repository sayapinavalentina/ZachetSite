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
   <div class="header-1">
      <div class="flex">
         <p><a href="login.php">Войти</a> | <a href="register.php">Регистрация</a> </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="about.php" class="logo">Music House</a>

         <nav class="navbar">
            <a href="about.php">О нас</a>
            <a href="shop.php">Каталог</a>
            <a href="contact.php">Где нас найти</a>
            <a href="orders.php">Заказы</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div class="user-box">
            <p>ФИО: <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p>Email: <span><?php echo $_SESSION['user_email']; ?></span></p>
            <a href="logout.php" class="delete-btn">Выйти</a>
         </div>
      </div>
   </div>

</header>