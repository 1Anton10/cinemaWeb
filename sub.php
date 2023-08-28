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
    <?require_once __DIR__."/header.php"?>
    <main>
        <div class="col-4">
            <div class="buy-sub">
                <div class="sub-cart">
                    <p style="price">20р | День</p>
                    <span>Данная подписка даёт доступ к большим фильмам чем обычная учетная запись.</span>
                    <span class="example">Так будет выглядеть ваш профиль:</span>
                    <div class="profile">
                        <img src="img/<?= $user['icon']?>" alt="">
                        <div class="sub">
                            <span><?= $_SESSION['user']['name']?></span>
                            <span class="pro">ПЛЮС</span>
                            <span ><a style="color: white;" href="logout.php">Выйти</a></span>
                        </div>
                    </div>
                    <input type="submit" value="Оформить">
                </div>
                <div class="sub-cart">
                    <p style="price">500р | месяц</p>
                    <span>Данная подписка даёт доступ к большим фильмам чем обычная учетная запись.</span>
                    <span class="example">Так будет выглядеть ваш профиль:</span>
                    <div class="profile">
                        <img src="img/<?= $user['icon']?>" alt="">
                        <div class="sub">
                            <span><?= $_SESSION['user']['name']?></span>
                            <span class="pro">ПЛЮС</span>
                            <span ><a style="color: white;" href="logout.php">Выйти</a></span>
                        </div>
                    </div>
                    <input type="submit" value="Оформить">
                </div>
                <div class="sub-cart">
                    <p style="price">2500р | год</p>
                    <span>Данная подписка даёт доступ к большим фильмам чем обычная учетная запись.</span>
                    <span class="example">Так будет выглядеть ваш профиль:</span>
                    <div class="profile">
                        <img src="img/<?= $user['icon']?>" alt="">
                        <div class="sub">
                            <span><?= $_SESSION['user']['name']?></span>
                            <span class="pro">ПЛЮС</span>
                            <span ><a style="color: white;" href="logout.php">Выйти</a></span>
                        </div>
                    </div>
                    <input type="submit" value="Оформить">
                </div>
            </div>
        </div>
    </main>
    <?require_once __DIR__."/footer.php"?>
</body>
</html>