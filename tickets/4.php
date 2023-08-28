<?session_start()?>
<?require_once 'functions.php';
error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <p>
        <!-- выводим сообщения об успехе или об ошибке покупки билета, затем удаляем -->
        <?=$_SESSION['message']?>
        <?unset($_SESSION['message'])?>
    </p>
    <?require_once 'film.php'?><!--подключаем вывод фильмов, внутри film.php подключаем вывод мест, внутри place.php подключаем вывод времени time.php--> 
    
    <!-- <br><a href="4.php">тех сброс</a> -->
</body>
</html>