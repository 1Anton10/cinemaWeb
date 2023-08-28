<?
session_start();
require_once __DIR__.'/funcs.php';
require_once __DIR__.'/connect.php';
if(isset($_POST['enter'])){
    header("location: vhod.php");
}
if (isset($_POST['authoriz'])) {
	login();
	header("location: index.php");
	die;
	
}
if (isset($_POST['registr'])) {
	registration();
	die;
}
if(isset($_POST['cart']) && !empty($_SESSION['user']['name'])){
    header("location: cart.php");
    
}
$b = $_POST['hide'];
if (isset($_POST["button$b"])) {
    film_cart($_POST['hide']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="css/simple-adaptive-slider.min.css">
    <script src="js/simple-adaptive-slider.min.js"></script>
    <script src="js/slider.js"></script>
    <link rel="stylesheet" href="css/reset_style.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Синематик</title>
</head>
<body>
<?require_once __DIR__."/header-without-slider.php"?>
<main>
<div class="col-4">
    <?foreach(film_cart($_POST['hide']) as $film):?>
    <div class="title-film">
        <img src="img/<?=$film['image']?>" alt="">
    
    <div class="tag">
    <ul class="tags">
    <li><?=$film['tags']?></li>
    <li><?=$film['tag2']?></li>
    <li><?=$film['tag3']?></li>
    <li><?=$film['date']?></li>
    </ul>
    <span><?=$film['title']?></span>
    </div>
</div>

<div class="media">
    <h6>Трейлер:</h6>
<iframe style="border-radius:10px;" src="<?=$film['url']?>" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div><?endforeach;?>
</div>
</main>
<?require_once __DIR__."/footer.php"?>
</body>
</html>