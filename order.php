<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Copmatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
  <title>Sport Island</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

  <script>
    $(document).ready(function(){
      $('.slider').bxSlider();
    });
  </script>
</head>
<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3
  px-md-4 border-bottom shadow-sm" style="background-image: linear-gradient(to top, #372f3a 10%, #526199, #372f3a);">
  <a class="mr-md-auto font-weight-normal" href="index.php">
  <img class="#" src="img\SportIsland.png" height="75" width="100">
  </a>
    <nav class="my-2 my-md-0 mr-md-5 h6">
      <a class="p-2 d-none d-md-inline-block" style="color:#dfdfdf" href="sport.php">Спорт</a>
      <a class="p-2 d-none d-md-inline-block" style="color:#dfdfdf" href="fitness.php">Фитнес</a>
      <a class="p-2 d-none d-md-inline-block" style="color:#dfdfdf" href="trip.php">Туризм</a>
    </nav>
          <a class="btn btn-outline-primary h6" style="color:#dfdfdf" href="login.php">Войти</a>
        </div>
        <div center>
          <div style="background-image: url(img/bg.jpg); background-repeat: no-repeat; background-attachment: fixed;">

	<h1 class="mb-5 text-center">Заказ</h1>

	<form>
		
		<?php if ( isset($_GET['title']) ) : ?>
			<p>Вы заказываете курс: <?php echo $_GET['title']; ?></p>
		<?php elseif ( isset($_SESSION['cart_list']) ) : ?>
			<ul>
				<?php foreach( $_SESSION['cart_list'] as $course ) : ?>

					<li><?php echo $course['title']; ?> | <?php echo $course['price']; ?> грн.</li>

				<?php endforeach; ?>
			</ul>

			<p>
				<a href="cart.php">Изменить заказ</a>
			</p>
		<?php endif; ?>

		
		<input type="text" placeholder="Name">
		<input type="text" placeholder="Mobile">
		<input type="submit">
	</form>
	
</div>
</body>
</html>