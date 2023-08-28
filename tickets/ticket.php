<form action="send.php" method="POST"><!--постом заливаем данные на обработчик-->
    <input type="text" name="film" value=<?=$_GET['film']?>><br><!--здесь в поля записываем данные, которые собрали в GET через адресную строку, можно их спрятать через АТРИБУТ hidden и оставить только кнопку-->
    <input type="text" name="place" value=<?=$_GET['place']?>><br>
    <input type="text" name="time" value=<?=$_GET['time']?>><br>
    <button type="submit" name="addTicket">Купить</button>
</form>

