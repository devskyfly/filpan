<div class="ModulSredneyKolonki">

    <div class="blockElementovRabochegoOkna">
        <input type="button" value="Создать новый элемент" id="sozdatNoviyElement" class="knopka">
    </div>

    <?
    //echo sprintf("<input type=\"hidden\" id=\"input_vid_svoystva\">%s</input>",$id);

    echo '<ul class="SpisokSsilokMenu">';
    while ($Svoystva->poluchitSleduyushiy()) {
        echo sprintf('<li><a class="Neaktivnaya" href="%sSvoystvo/?id=%s">%s</a></li>', $_WEB_ROOT_ADMIN_HREF, $Svoystva->_TekushiyElement['id'], $Svoystva->_TekushiyElement['nazvaniye']." (Сортировка - ".$Svoystva->_TekushiyElement['sortirovka'].")");
    }
    echo '</ul>';
    ?>

</div>