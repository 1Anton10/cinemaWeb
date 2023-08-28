<?
require_once '../connect.php';

function deb($arr){
    echo "<pre>" . print_r($arr, 1) . "</pre>";
}

function addTicket($filmId, $place, $time){
    global $pdo;
    $code = $_SESSION['user']['id'];
    $sql2 = "INSERT INTO `tickets` SET `film_id` = ?, `place` = ?, `time` = ?, `us_id` = ?";
    $res = $pdo->prepare($sql2);
    $res->execute([$filmId, $place, $time, $code]);
    header("location: 4.php");
}

function select($table){
    global $pdo;
    $data  = $pdo -> query("SELECT * FROM $table");
    return $items = $data-> fetchAll();
}?>

