<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="css/simple-adaptive-slider.min.css">
    <script src="js/simple-adaptive-slider.min.js"></script>
    <script src="js/slider.js"></script>
    <link rel="stylesheet" href="../css/reset_style.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <title>Синематик</title>
</head>
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
                        <div class="menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="menu">
                <nav>
                <ul>
                    <img style="width: 100%;" src="img/video-camera-icon-isolated-on-transparent-vector-35906504.png" alt="">
                    <li><a style="color:white;" href="../index.php">Новинки</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a style="color:white;" href="../tickets/4.php">Сеансы</a></li>
                    <li><a style="color:white;" href="../films.php">Фильмы</a></li>
                    <li><a style="color:white;" href="../tickets.php">Мои Билеты</a></li>
                </ul>
                </nav>
            </div>
            <script src="../js/burdeg.js"></script>
        <div class="head">
            <img src="../img/video-camera-icon-isolated-on-transparent-vector-35906504.png" alt="">
            <ul class="ul-menu">
                <li class="ul-menu-li">О нас</li>
                <li class="ul-menu-li"><a style="color:white;" href="../index.php">Новинки</a></li>
                <li class="ul-menu-li">Контакты</li>
                <li class="ul-menu-li">Сеансы</li>
                <li class="ul-menu-li"><a style="color:white;" href="../films.php">Фильмы</a></li>
                <li class="ul-menu-li"><a style="color:white;" href="../tickets.php">Мои Билеты</a></li>
            </ul>
        </div>
    </header>
    <div style="display: flex;
    justify-content: center;
    align-items: center;
    padding: 5px;
    margin-bottom: 20px;
    border-bottom: 1px dashed;
    border-top: 1px dashed;"><h6>Фильмы</h6> </div>

<div style="display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    gap: 20px; padding: 5px;" class="wrapper">


    <!-- вывод всех фильмов -->
    <?foreach(select('films') as $film):?>

            <!-- в классе проверяем если тыкнули на ссылку то блокируем ее через css disabled -->
            <a 
            class="film <?if($_GET['film'] == $film['id_f']) echo "disabled"?>" 
            href="4.php?film=<?=$film['id_f']?>"><!--в GET через адресную строку пишем на какой фильм нажали-->
            <img style="width:200px; height: 300px; border-radius:20px;" src="../img/<?=$film['image']?>" alt=""> 
            </a>
            <?require "place.php"?><!--подключаем точно такой же код с местами для каждого фильма-->
            
    <?endforeach?>

    <hr style="color: white">

</div>