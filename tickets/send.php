<?
session_start();//сессия нужна чтобы записать в нее сообщения об ошибке или успехе
require_once 'functions.php';

if(isset($_POST['addTicket'])){//кнопочка с формы ticket.php

    foreach(select('tickets') as $ticket)://проходимся по всем билетам с базы и ищем совпадения с данными из формы
        
        if($ticket['film_id'] == $_POST['film'] && 
            $ticket['place'] == $_POST['place'] && 
            $ticket['time'] == $_POST['time']):
                $_SESSION['message'] = "Место уже забронированно";//если совпало, то не даем купить билет
        endif;

    endforeach;

    if(empty($_SESSION['message'])){//если сообщения пусты, значит совпадений нет и можно покупать

        $_SESSION['message'] = "Место забронированно"; //записываем, что все норм. Просто так для наглядности
        addTicket($_POST['film'], $_POST['place'], $_POST['time']); //инсертим данные с формы в базу и редиректим обратно на главную

    }
    else{//если сообщения об ошибке все же есть то перекидываем с этой страницы обратно на главную
        header("location: 4.php");
    }
}