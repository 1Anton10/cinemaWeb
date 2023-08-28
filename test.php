<?
session_start();
require_once 'funcs.php';
var_dump($_SESSION);
foreach(sql() as $bb):?>
    <b><?=$bb['image']?></b><br>
    
<?break;endforeach;?>
