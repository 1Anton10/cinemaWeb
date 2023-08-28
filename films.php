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
    <hr>
    <div class="col-4">
    <form action="" method="post">
    <div class="filter">
        <input class="poisk" type="text" name="" id="" placeholder="Поиск . . .">
        <input class="start" type="submit" value="Поиск">
        <a class="start" href="./films.php?sort=tags">Возраст</a>
        <a class="start" href="./films.php?sort=tag2&value=Драма">Драма</a>
        <a class="start" href="./films.php?sort=tag2&value=Фантастика">Фантастика</a>
        <a class="start" href="./films.php">Сброс</a>
    </div>
    </form>
        <div class="up-recs">
            <?php 
            if(!isset($_GET['sort']) and !isset($_GET['value'])){
            foreach (selectFilms('films') as $film):?>
            <?=render($film);?>
        <?endforeach;}
        else{?>
            <?php 
            if(isset($_GET['value']) and isset($_GET['sort'])){
            foreach (sortFilms('films', $_GET['sort'], $_GET['value']) as $film):?>
            <?=render($film);?>
        <?endforeach;}?>
        <?php 
            if(isset($_GET['sort']) and !isset($_GET['value'])){
            foreach (selectFilms('films', $_GET['sort']) as $film):?>
            <?=render($film);?>
        <?endforeach;}}?>
        </div>
    </div>
</main>
<?require_once __DIR__."/footer.php"?>
</body>
</html>