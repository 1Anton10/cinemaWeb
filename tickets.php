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
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <title>Синематик</title>
    
</head>

<body>
    <?require_once 'header-without-slider.php';?>
    <?if(isset($_SESSION['user']['name'])):?>
<aside style="    background: #161616;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-top: 2px solid white;
    border-bottom: 2px solid white;
    color: white;
    font-weight: 600;
    font-size: 16px;"><div class="announcement">Перед входом в зал, предоставьте QR-Код билета контролёру.</div></aside>
<main style = "background: #161616;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    padding-bottom: 20px;
    padding-top: 20px;
">
    
    <?foreach(selectTickets('tickets') as $film):
        
        ?>
    
    <div class="ticket" style="   
    background-size: cover;
    font-size: 20px;
    font-weight: 600;
}">
<img style="height: 365px;" src="img/<?= $film['image']?>" alt="">
<div class="text">
    <?
    require_once 'phpqrcode/qrlib.php';
    $text = ['Название фильма:', $film['name'], '| ID-билета:', $film['id_ticket'], '| Место:', $film['place'], '| Время сеанса:', $film['time']];
    $t2= implode(" ", $text);
    $path ='img/';
    $qrcode = $path.rand().".png";
    QRcode::png($t2, $qrcode,"H");
    echo "<img style='border-radius: 20px;' src='".$qrcode."'>";
?>
        <!-- <span class="title">Фильм: "<?= $film['name']?>"</span> 
        <span class="id">ID Билета: <?= $film['id_ticket']?></span>
        <span class="time">Время сеанса: <?= $film['time']?></span>
        <span class="status">Статус: Куплено</span> -->
        <!-- Потом раскомментить если надо будет -->
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
        <h6 style="font-weight: 600; font-size: 202px;">401</h6>
        <span>Пройдите Авторизацию</span>
    </main>
<?endif;?>

    <?require_once 'footer.php';?>

</body>
</html>