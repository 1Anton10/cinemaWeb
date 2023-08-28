<?
session_start();
require_once '../funcs.php';
require_once '../connect.php';
if(isset($_POST['enter'])){
    header("location: vhod.php");
}
if (isset($_POST['authoriz'])) {
	login();
	header("location: index.php");
	die;
	
}
if (isset($_POST['add'])) {
	AddFilm();
	die;
}
if (isset($_POST['registr'])) {
	registration();
	die;
}
if(isset($_POST['cart']) && !empty($_SESSION['user']['name'])){
    header("location: cart.php");
    
}
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <link rel="../stylesheet" href="../css/simple-adaptive-slider.min.css">
    <script src="../js/simple-adaptive-slider.min.js"></script>
    <script src="../js/slider.js"></script>
    <link rel="stylesheet" href="../css/reset_style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <title>Синематик</title>
</head>
<body>
<header>
        <?
        if(!isset($_SESSION['user']['name'])){?><div class="reg">
            <form action="" method="post">
            <div class="sub">
            <span class="login"><input name="imya" type="text" placeholder="Логин"></span>
            <span class="pass"><input name="pswd" type="text" placeholder="Пароль"></span>
                <div class="buttons">
                <span class="enter"><input name="authoriz" type="submit" value="Войти"></span>
                <span class="enter"><input name="registr" type="submit" value="Регистрация"></span>
                </div>
            </div>
            </form>
        </div>
        <?}
        else{?>
        <div class="profile">
            <? global $pdo;
            $id = $_SESSION['user']['id'];
            $sql1 = "SELECT * FROM users where id = $id";             
            $users = $pdo->prepare($sql1);
            $users -> execute();
            $sql2 = "SELECT * FROM `admin` where id_a = $id";             
            $admins = $pdo->prepare($sql2);
            $admins -> execute();?>
            <?foreach($users as $user):?>
            <img src="../img/<?= $user['icon']?>" alt="">
            <div class="sub">
            <span><?= $_SESSION['user']['name']?></span>
            <?
            if($user['subs'] == 1){?>
            <span class="pro">ПЛЮС</span>
            <?}
            endforeach;?>
            <?foreach($admins as $admin):
            if($_SESSION['user']['name'] == 'admin'){?>
            <span class="adm">Админ</span>
            <?}
            else{}
            endforeach;?>
            <span ><a style="color: white;" href="logout.php">Выйти</a></span>
            </div>
        </div>
        <?}
        ?>
        <div class="head">
            <img src="img/video-camera-icon-isolated-on-transparent-vector-35906504.png" alt="">
            <ul class="ul-menu">
                <li class="ul-menu-li">О нас</li>
                <li class="ul-menu-li"><a style="color:white;" href="../index.php">Новинки</a></li>
                <li class="ul-menu-li">Контакты</li>
                <li class="ul-menu-li"><a style="color:white;" href="../tickets/4.php">Сеансы</a></li>
                <li class="ul-menu-li"><a style="color:white;" href="../films.php">Фильмы</a></li>
                <li class="ul-menu-li"><a style="color:white;" href="../tickets.php">Мои Билеты</a></li>
            </ul>
        </div>
    </header>
    <?if($_SESSION['user']['name'] == "admin"):?>
<aside style="    background: #161616;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-top: 2px solid white;
    border-bottom: 2px solid white;
    color: white;
    font-weight: 600;
    font-size: 16px;"><div class="announcement">Панель администратора. Проверьте ID билета у гостя перед его входом в зал!</div></aside>
<main style = "background: #161616;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding-bottom: 20px;
    padding-top: 20px;
">
    <div class="ticket" style="   
    background-size: cover;
    font-size: 20px;
    font-weight: 600;
    height: 410px;
}">
<form action="" method="post">
        <input name="img" type="file">
<div class="text">
        <input style="height: 25px; border-radius:5px; padding: 5px;" name="tags" type="text" placeholder="Возрастное ограничение">
        <input style="height: 25px; border-radius:5px; padding: 5px;" name="tag2" type="text" placeholder="Жанр">
        <input style="height: 25px; border-radius:5px; padding: 5px;" name="tag3" type="text" placeholder="Доп Жанр">
        <input style="height: 25px; border-radius:5px; padding: 5px;" name="title" type="text" placeholder="Описание">
        <input style="height: 25px; border-radius:5px; padding: 5px;" name="name" type="text" placeholder="Название">
        <input style="height: 25px; border-radius:5px; padding: 5px;" name="date" type="text" placeholder="ДД/ММ/ГГ">
        <input style="height: 25px; border-radius:5px; padding: 5px;" name="url" type="text" placeholder="Ссылка на трейлер">
        <input style="height: 25px; border-radius:5px; padding: 5px;" name="add" type="submit" value="Добавить">
    </div>
</form>
    </div>
  <?foreach(selectTicketsAdm('tickets') as $film):?>
    
    <div class="ticket" style="   
    background-size: cover;
    font-size: 20px;
    font-weight: 600;
}">
<img src="../img/<?= $film['image']?>" alt="">
<div class="text">
        <span class="title">Фильм: "<?= $film['name']?>"</span>
        <span class="id">ID Билета: <?= $film['id_ticket']?></span>
        <span class="time">Время сеанса: <?= $film['time']?></span>
    </div>
    </div>
    <?endforeach;?>
</main>
<?else:?>
    <main  style = "background: #161616;
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    gap: 20px;
    justify-content: center;
    padding-bottom: 20px;
    padding-top: 20px;
    align-items: center;
    font-size: 30px;
    color: white;
    font-weight: 600;
    padding: 150px;
">
        <h6 style="font-weight: 600; font-size: 202px;">404</h6>
        <span>Страница не найдена...</span>
    </main>
<?endif;?>
<?require_once '../footer.php';?>
</body>
</html>