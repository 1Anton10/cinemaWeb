<div class="wrapper <?

    if($_GET['place'] != $place['place'])//$place['place'] аналогично как и в прошлый раз берется из файла place, , проверяем если место, на которое тыкнули и записали в GET совпадает с текущим местом в foreach то отображаем время для этого места
        echo "hidden";
    else echo "visible"?>" >

    <hr style="color: white">
    <h5>время</h5>
    <div class="vrem">
        <!-- отображаем время -->
        <?foreach(select('times') as $time):?>

            <!-- в классе проверяем если тыкнули на ссылку то блокируем ее через css disabled -->
            <a 
            class="time <?if($_GET['time'] == $time['time']) echo "disabled"?>"
            href="4.php?film=<?=$_GET['film']?>&place=<?=$_GET['place']?>&time=<?=$time['time']?>"><!--в GET через адресную строку к фильму и месту добавляем на какое время нажали-->
                <?=$time['time']?><!-- время -->
            </a>
            
        <?endforeach?>
</div>
    <hr style="color: white">

    <?($_GET['time']) && require 'ticket.php'?> <!-- если нажали на время, то достаем форму для оформления билета -->
</div>