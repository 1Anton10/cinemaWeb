<?php
require_once 'phpqrcode/qrlib.php';

$text = $film['name'];
$path ='img/';
$qrcode = $path.time().".png";
QRcode::png($text, $qrcode,"H");
echo "<img src='".$qrcode."'>";
?>
