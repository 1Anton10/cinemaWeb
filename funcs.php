<?php require_once 'connect.php';
	function debug($data){
		echo '<pre>' . print_r($data, 1).'</pre>';
	}
	function registration() :bool{
		global $pdo;
		$login = !empty($_POST['imya']) ? trim($_POST['imya']): '';
		$pass = !empty($_POST['pswd']) ? trim($_POST['pswd']): '';
		if(empty($login) || empty($pass)){
			$_SESSION['errors'] = 'Поля логин/пароль обязательны';
			return false;
		}
		$res = $pdo->prepare("SELECT COUNT(*) FROM users WHERE login = ?");
		$res->execute([$login]);
		if ($res->fetchColumn()){
			$_SESSION['errors'] = 'Данное имя уже используется';
			return false;
		}
		$pass= password_hash($pass,PASSWORD_DEFAULT);
		$res = $pdo->prepare("INSERT INTO users (login, pass) VALUES (?, ?)");
		if ($res->execute([$login, $pass])){
			$_SESSION['success'] = 'Успешная регистрация';
			return true;
		}else{
			$_SESSION['errors'] = 'Ошибка регистрации';
			return false;
		}
	}
	function login() :bool{
		global $pdo;

		$login = !empty($_POST['imya']) ? trim($_POST['imya']): '';
		$pass = !empty($_POST['pswd']) ? trim($_POST['pswd']): '';

		if(empty($login) || empty($pass)){
			$_SESSION['errors'] = 'Поля логин/пароль обязательны';
			return false;
		}

		$res = $pdo->prepare("SELECT * FROM users WHERE login = ?");

		$res->execute([$login]);
		if (!$user = $res->fetch()){
			$_SESSION['errors'] = 'Логин/Пароль введены не верно';
			return false;
		}

		if(!password_verify($pass, $user['pass'])){
			$_SESSION['errors'] = 'Логин/Пароль введены не верно';
			return false;
		}else{
			$_SESSION['success']='Вы успешно авторизировались';
			$_SESSION['user']['name'] = $user['login'];
			$_SESSION['user']['id'] = $user['id'];
			return true;
		}
	}
	function login_a() :bool{
		global $pdo;

		$login = !empty($_POST['imya']) ? trim($_POST['imya']): '';
		$pass = !empty($_POST['pswd']) ? trim($_POST['pswd']): '';

		if(empty($login) || empty($pass)){
			$_SESSION['errors'] = 'Поля логин/пароль обязательны';
			return false;
		}

		$res = $pdo->prepare("SELECT * FROM `admin` WHERE `login_a` = ?");

		$res->execute([$login]);
		if (!$user = $res->fetch()){
			$_SESSION['errors'] = 'Логин/Пароль введены не верно';
			return false;
		}

		if(!password_verify($pass, $user['pass_a'])){
			$_SESSION['errors'] = 'Логин/Пароль введены не верно';
			return false;
		}else{
			$_SESSION['success']='Вы успешно авторизировались';
			$_SESSION['user']['name'] = $user['login_a'];
			$_SESSION['user']['id'] = $user['id_a'];
			return true;
		}
	}
	function registration_a() :bool{
		global $pdo;
		$login = !empty($_POST['imya']) ? trim($_POST['imya']): '';
		$pass = !empty($_POST['pswd']) ? trim($_POST['pswd']): '';
		if(empty($login) || empty($pass)){
			$_SESSION['errors'] = 'Поля логин/пароль обязательны';
			return false;
		}
		$res = $pdo->prepare("SELECT COUNT(*) FROM admin WHERE login_a = ?");
		$res->execute([$login]);
		if ($res->fetchColumn()){
			$_SESSION['errors'] = 'Данное имя уже используется';
			return false;
		}
		$pass= password_hash($pass,PASSWORD_DEFAULT);
		$res = $pdo->prepare("INSERT INTO admin (login_a, pass_a) VALUES (?, ?)");
		if ($res->execute([$login, $pass])){
			$_SESSION['success'] = 'Успешная регистрация';
			return true;
		}else{
			$_SESSION['errors'] = 'Ошибка регистрации';
			return false;
		}
	}
	function save_message(): bool{
		global $pdo;
		$message = !empty($_POST['message']) ? trim($_POST['message']): '';
		if (!isset($_SESSION['user']['name'])) {
			$_SESSION['errors'] = 'Необходимо авторизоваться';
			return false;
		}
		if (empty($message)){
			$_SESSION['errors'] = 'Введите сообщение';
			return false;
		}
		$res = $pdo->prepare("INSERT INTO messages (name, messages) VALUES (?,?)");
		if($res->execute([$_SESSION['user']['name'], $message])){
			$_SESSION['success'] = 'Сообщение отправлено';
			return true;
		}else{
			$_SESSION['errors'] = 'Введите текст сообщения';
			return false;
		}
	}
	function get_messages(): array{
		global $pdo;
		$res = $pdo->query("SELECT * FROM messages");
		return $res->fetchALL();
	}
	function inCart($id_button){
		global $pdo;
		
		$sql1 = "SELECT * FROM tovars WHERE id_t = $id_button";             
        $tovars = $pdo->prepare($sql1);
        $tovars -> execute();
		$a = "amount$id_button";
		foreach ($tovars as $tovar): 
		$image = $tovar['image'];
		$title = $tovar['titl'];
		$code = $_SESSION['user']['id'];
		$price = $tovar['pric'];
		$amount = $_POST["$a"];
		$g = "inCart$id_button";
		if(isset($_POST[$g])){
			$res = $pdo->prepare("INSERT INTO orders (img, title, code, price, amount) VALUES (?,?,?,?,?)");
			$res->execute([$image,$title,$code,$price,$amount]);
		}
		endforeach;
		header("Location: index.php");
		}
		function AddFilm(){
			global $pdo;
			
			$sql1 = "SELECT * FROM films";             
			$tovars = $pdo->prepare($sql1);
			$tovars -> execute();
			$ig = $_POST['img'];
			$t = $_POST['tags'];
			$t2 = $_POST['tag2'];
			$t3 = $_POST['tag3'];
			$tl = $_POST['title'];
			$nm = $_POST['name'];
			$dt = $_POST['date'];
			$url = $_POST['url'];
				$res = $pdo->prepare("INSERT INTO films (image, tag, tag2, tag3, title, name, date, url) VALUES (?,?,?,?,?,?,?,?)");
				$res->execute([$ig,$t,$t2,$t3,$tl,$nm,$dt,$url]);
			header("Location: index.php");
			}
		function film_cart($id_button){
			global $pdo;
			$sql2 = "SELECT * FROM films where id_f = $id_button";             
			$films = $pdo->query($sql2);
			return $films -> fetchALL();
			
		}
function delCart($id_button)
{
		global $pdo;
		$code = $_SESSION['user']['id'];
		$sql1 = "SELECT * FROM orders WHERE code = $code";             
                        $orders = $pdo->prepare($sql1);
                        $orders -> execute();
			$sql4 = "DELETE FROM `orders` WHERE `code` = ? and id_o = ?";
			$res2 = $pdo->prepare($sql4);
				$res2->execute([$code, $id_button]);
		header("Refresh: 0");
	
}
function delTovar($id_button)
{
		global $pdo;
		$sql1 = "SELECT * FROM tovars";             
                        $orders = $pdo->prepare($sql1);
                        $orders -> execute();
			$sql4 = "DELETE FROM `tovars` WHERE `id_t` = ?";
			$res2 = $pdo->prepare($sql4);
				$res2->execute([$id_button]);
}
function countCart(){
	if(!empty($_SESSION['user']['name'])){
		global $pdo;
		$code = $_SESSION['user']['id'];
		$sql6 = $pdo->query("SELECT COUNT(code) FROM orders WHERE code = $code");             
		$res = $sql6->fetch();
		return array_shift($res);
}
}
function countPrice(){
	if(!empty($_SESSION['user']['name'])){
		global $pdo;
		$code = $_SESSION['user']['id'];
		$sql6 = $pdo->query("SELECT sum(price * amount) FROM orders WHERE code = $code");             
		$res = $sql6->fetch();
		return array_shift($res);
}
}
function Order($id_button){
	global $pdo;
	
	$sql1 = "SELECT * FROM orders WHERE id_o = $id_button";             
	$orders = $pdo->prepare($sql1);
	$orders -> execute();
	$a = "amount$id_button";
	foreach ($orders as $tovar): 
	$title = $tovar['title'];
	$code = $_SESSION['user']['id'];
	$price = $tovar['price'];
	$amount = $_POST["$a"];
	$g = "inCart$id_button";
	if(isset($_POST[$g])){
		$res = $pdo->prepare("INSERT INTO finalorder (tit, u_code, pri, amo) VALUES (?,?,?,?)");
		$res->execute([$title,$code,$price * $amount,$amount]);
		delCart($tovar['id_o']);
	}
	
	endforeach;
	}
	function add(): bool{
		global $pdo;
		$image = $_POST['im'];
		$title = $_POST['tit'];
		$сod = $_POST['cod'];
		$price = $_POST['pr'];
		$amount = $_POST["am"];
		$res = $pdo->prepare("INSERT INTO tovars (image, titl, cod, pric, amoun) VALUES (?,?,?,?,?)");
		$res->execute([$image,$title,$сod,$price,$amount]);
		return true;
		}
		function sql() :array{
			global $pdo;
			$sql2 = "SELECT * FROM films";             
			$films = $pdo->query($sql2);
			return $films -> fetchALL();
		}
		function selectFilms($table, $column="id_f"){
			global $pdo;
			$data = $pdo->query("SELECT * FROM $table ORDER BY $column DESC");
			return $data->fetchAll();
		}
		function selectTickets($table, $column="id_f"){
			global $pdo;
			$code = $_SESSION['user']['id'];
			$data = $pdo->query("SELECT * from $table inner join films on film_id = id_f where us_id = $code");
			return $data->fetchAll();
		}
		function selectTicketsAdm($table, $column="id_f"){
			global $pdo;
			$code = $_SESSION['user']['id'];
			$data = $pdo->query("SELECT * from $table inner join films on film_id = id_f");
			return $data->fetchAll();
		}
		function sortFilms($table, $column="id_f", $value=""){
			global $pdo;
			$data2 = $pdo->query("SELECT * FROM $table where $column = '$value'");	
			return $data2->fetchAll();
		}
		function render($film){
			return $cart = "<form action='film-cart.php' method='post'>
            <div class='cart'>
                <img src='img/{$film['image']}' alt=''>
                <div class='cart-cont'>
                <ul class='tags'>
                    <li>{$film['tags']}</li>
                    <li>{$film['tag2']}</li>
                    <li>{$film['tag3']}</li>
                    <li>{$film['date']}</li>
                </ul>
                <span class='title'>{$film['title']}</span>
                <input name='button{$film["id_f"]}' type='submit' value='Смотреть'>
				<input name='hide' type='text' value='{$film["id_f"]}' hidden>
                </div>
            </div> 
        </form>";
		}
?>