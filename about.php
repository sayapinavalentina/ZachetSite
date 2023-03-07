<?php
include 'config.php';
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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
    <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/img/icon.png">
    <link href="style.css" rel="stylesheet">
</head>
<body>
   
<?php include 'header.php'; ?>

<div class="container mt-5 pt-5">
    <div class="row">
      <div class="col-12 col-md-6">
        <p class="" style="font-size: 30px;">Познавай тот ритм, что в жизни человеческой сокрыт.</p>
        <p class="text-muted" style="font-size: 20px;">Девиз компании "Music House"</p>
      </div>
      <div class="col-12 col-md-6 ">
        <img src="/images/logo.png" width="50%">
      </div>
    </div>
    <hr class="featurette-divider">

  </div>
  <div class="container marketing">
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/images/ууууу.png">
        <div class="container">
          <div class="carousel-caption text-start">
            <p style="font-size: 30px;">Новинка компании</p>
            <p style="font-size: 20px;">Гитара "Kepma F0E GA WA" которая будет пылиться у вас на шкафу.</p>
            <p><a class="btn btn-lg btn-outline-light" href="shop.php">Купить товар</a></p>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <img src="/images/ууу.png">
        <div class="container">
          <div class="carousel-caption">
            <p style="font-size: 30px;">Новинка компании</h1>
            <p style="font-size: 20px;">Великолепная акустическая гитара "aNueNue L10", подойдет к вашему интерьеру.</p>
            <p><a class="btn btn-lg btn-outline-light" href="shop.php">Купить товар</a></p>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <img src="/images/уу.png">
        <div class="container">
          <div class="carousel-caption">
            <p style="font-size: 30px;">Новинка компании</h1>
            <p style="font-size: 20px;">Гитара "Sigma DM12-1" чтоб сыграть "Медлячок" во дворе.</p>
            <p><a class="btn btn-lg btn-outline-light" href="shop.php">Купить товар</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/images/у.png">
        <div class="container">
          <div class="carousel-caption">
            <p style="font-size: 30px;">Новинка компании</h1>
            <p style="font-size: 20px;">Не знаете что подарить другу? Гитара "Enya NEXG"!</p>
            <p><a class="btn btn-outline-light" href="shop.php">Купить товар</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item mb-3">
        <img src="/images/уууу.png">
        <div class="container">
          <div class="carousel-caption text-end">
            <p style="font-size: 30px;">Новинка компании</h1>
            <p style="font-size: 20px;">Гитара "Parkwood W81-OP" с нежными струнами для ваших пальчиков.</p>
            <p><a class="btn btn-lg btn-outline-light" href="shop.php">Купить товар</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  </div>
  <section class="home-contact mt-5">
<div class="content">
   <h3>Появились вопросы?</h3>
   <p>Просто позвонитек нам, или заезжайте в центральный магазин, мы накормим своих гостей булочкой с маком и станцуем бачату.</p>
   <a href="contact.php" class="white-btn">Узнать контакты</a>
</div>
</section>
<?php include 'footer.php'; ?>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>