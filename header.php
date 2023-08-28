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
        <div class="slider">
            <div class="slider__wrapper">
            <div class="slider__items">
                <div class="slider__item">
                <div><img src="img/rm0hbjjlvnyzdbtx.jpg" alt=""></div>
                </div>
                <div class="slider__item">
                <div><img src="img/62nnqh5nqy8slmwd.jpg" alt=""></div>
                </div>
                <div class="slider__item">
                <div><img src="img/u6q8uat01wsifjyr.jpg" alt=""></div>
                </div>
                <div class="slider__item">
                <div><img src="img/vnjkninosnwyzprm.jpg" alt=""></div>
                </div>
            </div>
            </div>
            <a class="slider__control slider__control_prev" href="#" role="button" data-slide="prev"></a>
            <a class="slider__control slider__control_next" href="#" role="button" data-slide="next"></a>
        </div>
        <div class="head">
            <img src="img/video-camera-icon-isolated-on-transparent-vector-35906504.png" alt="">
            <ul class="ul-menu">
                <li class="ul-menu-li">О нас</li>
                <li class="ul-menu-li"><a style="color:white;" href="index.php">Новинки</a></li>
                <li class="ul-menu-li">Контакты</li>
                <li class="ul-menu-li"><a style="color:white;" href="tickets/4.php">Сеансы</a></li>
                <li class="ul-menu-li"><a style="color:white;" href="films.php">Фильмы</a></li>
                <li class="ul-menu-li"><a style="color:white;" href="tickets.php">Мои Билеты</a></li>
                <?             
                
                if((isset($_SESSION['user']['name'])) and ($user['subs'] == 0)):?>
                <li style="
                background: linear-gradient(101.67deg,#d0d0d0 7.24%,#7f87f1 34.12%,#be40c0 62.93%,#fba82b 92.22%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;" class="ul-menu-li"><a style="color:white;" href="sub.php">ПОДПИСКА</a></li>
                <?endif;?>
            </ul>
        </div>
        <div class="menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="menu">
                <nav>
                <ul>
                    <img style="width: 100%;" src="img/video-camera-icon-isolated-on-transparent-vector-35906504.png" alt="">
                    <li><a href="#">Home Page</a></li>
                    <li><a href="#">My Message</a></li>
                    <li><a href="#">Recommend</a></li>
                    <li><a href="#">My Likes</a></li>
                    <li><a href="#">My Profile</a></li>
                </ul>
                </nav>
            </div>
            <script src="js/burdeg.js"></script>
    </header>