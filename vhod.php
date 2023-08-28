<?php 
session_start();
require_once __DIR__.'/funcs.php';
require_once __DIR__.'/connect.php';
if (isset($_POST['authoriz'])) {
	login();
	die;
}
if (isset($_POST['registr'])) {
	registration();
	die;
}
?>
<form action="vhod.php" method="post">
<input name="imya" type="text" placeholder="Логин">
<input name="pswd" type="text" placeholder="Пароль">
<input name="authoriz" type="submit" value="Вход">
<input name="registr" type="submit" value="Регистрация">
</form>
