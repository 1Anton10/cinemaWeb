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
            <img src="img/<?= $user['icon']?>" alt="">
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
                    <li><a style="color:white;" href="index.php">Новинки</a></li>
                    <li><a href="#">Контакты</a></li>
                    <li><a style="color:white;" href="tickets/4.php">Сеансы</a></li>
                    <li><a style="color:white;" href="films.php">Фильмы</a></li>
                    <li><a style="color:white;" href="tickets.php">Мои Билеты</a></li>
                </ul>
                </nav>
            </div>
            <script src="js/burdeg.js"></script>
            <span class="pun" style="color:#161616;">dad</span>
            <img class="pun" style="width: 200px;" src="img/video-camera-icon-isolated-on-transparent-vector-35906504.png" alt="">
        <div class="head">
            <img src="img/video-camera-icon-isolated-on-transparent-vector-35906504.png" alt="">
            <ul class="ul-menu">
                <li class="ul-menu-li">О нас</li>
                <li class="ul-menu-li"><a style="color:white;" href="index.php">Новинки</a></li>
                <li class="ul-menu-li">Контакты</li>
                <li class="ul-menu-li"><a style="color:white;" href="tickets/4.php">Сеансы</a></li>
                <li class="ul-menu-li"><a style="color:white;" href="films.php">Фильмы</a></li>
                <li class="ul-menu-li"><a style="color:white;" href="tickets.php">Мои Билеты</a></li>
            </ul>
        </div>
    </header>