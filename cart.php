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
        	<div class="reg">


	<div class="intro">
    <h3 class="mb-5 text-center" style="color: #dfdfdf">Корзина</h3>
</div>

	<?php if ( isset($_SESSION['cart_list']) && count($_SESSION['cart_list']) !=0 ) : ?>
	
		<ul>
			<?php foreach( $_SESSION['cart_list'] as $course ) : ?>

				<li>
					<?php echo $course['title']; ?> | 
					<?php echo $course['price']; ?> грн. | 
					<a href="cart.php?delete_id=<?php echo $course['id'];?>">Х</a>
				</li>

			<?php endforeach; ?>
		</ul>
	
	<?php else : ?>

		<p class="mb-5 text-center" style="color: #dfdfdf">
			Корзина временно недоступна
		</p>

	<?php endif; ?>


	<a href="index.php" style="color: #dfdfdf">Продолжить покупки</a>
	<br>
	<a href="order.php" style="color: #dfdfdf">Оформить заказ</a>


	

</div>
</div>


<footer class="footer"
  <span class="ru-language">
  <img src="img\Russia.png">
<span class="en-language">
  <img src="img\United-Kingdom.png">
  </footer>
  
</body>
</html>

<?php
session_start();


require_once "functions.php";


if ( isset($_GET['delete_id']) && isset($_SESSION['cart_list']) ) {
	foreach ($_SESSION['cart_list'] as $key => $value) {
		if ( $value['id'] == $_GET['delete_id'] ) {
			unset($_SESSION['cart_list'][$key]);
		}		
	}
}


if ( isset($_GET['course_id']) && !empty($_GET['course_id']) ) {

	$current_added_course = get_course_by_id($_GET['course_id']);

	// ...
	if ( !empty($current_added_course) ) {

		if ( !isset($_SESSION['cart_list'])) {
			$_SESSION['cart_list'][] = $current_added_course;
		}


		$course_check = false;

		if ( isset($_SESSION['cart_list']) ) {
			foreach ($_SESSION['cart_list'] as $value) {
				if ( $value['id'] == $current_added_course['id'] ) {
					$course_check = true;
				}
			}
		}


		if ( !$course_check ) {
			$_SESSION['cart_list'][] = $current_added_course;
		}

	} else {
		header("Location: 404.php");
	}
	
}

// var_dump($_SESSION);




?>
