<div class="wrapper <?

    if($_GET['film'] != $film['id_f']) //$film['film_id'] берется из foreach файла film, проверяем если фильм, на который тыкнули и записали в GET совпадает с текущим фильмом в foreach то отображаем места для этого фильма
        echo "hidden";
    else echo "visible"?>" > 

    <hr style="color: white">
    <h3>места</h3> 
    <div class="chairs">
        <!-- отображаем места -->
        <?foreach(select('places') as $place):?>
            <!-- в классе проверяем если тыкнули на ссылку то блокируем ее через css disabled -->
            <a 
            class="place <?if($_GET['place'] == $place['place']) echo "disabled"?>"
            href="4.php?film=<?=$_GET['film']?>&place=<?=$place['place']?>"><!--в GET через адресную строку к фильму добавляем на какое место нажали-->
                <?=$place['place']?><!--название места-->
            </a>
            <?require 'time.php'?><!--подключаем точно такой же код с временем для каждого места-->
            
        <?endforeach?>
</div>
    <hr style="color: white">

</div>