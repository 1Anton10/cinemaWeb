<?
session_start();
require_once __DIR__.'/funcs.php';
require_once __DIR__.'/connect.php';
if(isset($_POST['enter'])){
    header("location: vhod.php");
}
if (isset($_POST['authoriz'])) {
	login();
    login_a();
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
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <title>Синематик</title>
</head>
<body>
    <?require_once __DIR__."/header.php"?>
    <main><?
                $datetime = date("d/m/y"); 
                $datetime1 = mktime(0, 0, 0,date("m"), date("d") + 1, date("y"));
                $tomorrow = date("d/m/y", $datetime1);
                ?>
            <div class="col-4">
            <h6>СЕГОДНЯ:</h6>
            <div class="up-recs">
                <?php foreach (sql() as $film):?>
                <?if($datetime == $film['date']):?>
                    <?=render($film);?>
            <?endif;
            endforeach;
            ?> 
            </div>
            <h6>ЗАВТРА:</h6>
            <div class="up-recs">
            <?php foreach (sql() as $film):?>
                <?if($tomorrow == $film['date']):?>
                    <?=render($film);?>
            <?endif;
            endforeach;?> 
            </div>
            <h6>CКОРО:</h6>
            <div class="up-recs">
            <?php foreach (sql() as $film):?>
                <?if($tomorrow < $film['date']):?>
                <?=render($film);?>
            <?
            endif;
            endforeach;
            ?>
            </div>
        </div>
    </main>
    <?require_once __DIR__."/footer.php"?>
</body>
</html>