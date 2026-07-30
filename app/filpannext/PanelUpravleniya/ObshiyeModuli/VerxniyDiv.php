<div id='LevayaKolonkaVerxniyDiv'>
<?echo sprintf('<img id="Logotip" src="%sFilpanDesign/PageImages/Logotip.gif">'."\r\n",$_WEB_ROOT);?>
</div>

<div id='PravayaKolonkaVerxniyDiv'>
	<div id='KorzinaPravayaKolonkaVerxniyDiv'>
		<a class='OrangevayKnopka' id="YandexMarket" href=''>YandexMarket</a>
		<?
		$KursValut=New ElementSpiska('filpan_new_kursi_valut');
		$MassivKriteriev=array();
		$MassivKriteriev['id']=1;
		$KursValut->poluchitPoKriteriyu($MassivKriteriev);
		echo sprintf('<input type="text" id="kurs" class="kursValuti" value="%s">',$KursValut->poluchitSvoystvo('kurs'));?>
	</div>
	<?if(false):?>
	<div style="padding-top: 5px;">
		<select id="tip_vygruzki" class="poleVvodaDannixElementa" style="width:auto;">
			<option value="uproshennaya"<?=($_TIP_VYGRUZKI=="uproshennaya")?" selected":"";?>>Упрощенная</option>
			<option value="proizvolnaya"<?=($_TIP_VYGRUZKI=="proizvolnaya")?" selected":"";?>>Произвольная</option>
		</select>
	</div>
	<?endif;?>
	<?
	if(true){
	$variant_vigruzki=file_get_contents($_SERVER['DOCUMENT_ROOT'].'/filpannext/Obrabotki/data/variant_vigruzki.txt');
	$variant_vigruzki=json_decode($variant_vigruzki,true);
	if(($variant_vigruzki===false)||(is_null($variant_vigruzki))){
	    $variant_vigruzki=array();
	    $variant_vigruzki['tovar']="proizvolnaya";
	    $variant_vigruzki['usluga']="proizvolnaya";
	}
	}
	?>
	<?if(true):?>
	<div style="padding-top: 5px;">
		<span>Товар</span>
		<select id="tovar_tip_vygruzki" class="poleVvodaDannixElementa" style="width:auto;">
			<option value="uproshennaya"<?=$variant_vigruzki['tovar']=="uproshennaya"?" selected":"";?>>Упрощенная</option>
			<option value="proizvolnaya"<?=$variant_vigruzki['tovar']=="proizvolnaya"?" selected":"";?>>Произвольная</option>
		</select>
		</br>
		<span>Услуга</span>
		<select id="usluga_tip_vygruzki" class="poleVvodaDannixElementa" style="width:auto;">
			<option value="uproshennaya"<?=$variant_vigruzki['usluga']=="uproshennaya"?" selected":"";?>>Упрощенная</option>
			<option value="proizvolnaya"<?=$variant_vigruzki['usluga']=="proizvolnaya"?" selected":"";?>>Произвольная</option>
		</select>
	</div>
	<?endif;?>
	<div id='PoiskPravayaKolonkaVerxniyDiv'>	
			<div class='PoiskPoSaytu'>	
			Поиск по сайту			
			</div>
			<div>
			<?echo sprintf('<form id="FormaPiska" action="%sPoiskPoSaytu">'."\r\n",$_WEB_ROOT_ADMIN_HREF);?>
				<?
                if(isset($_REQUEST['StrokaPoiska']))
                {
                    echo sprintf('<input name="StrokaPoiska" type="text" id="StrokaPoiska" value="%s">'."\r\n",$_REQUEST['StrokaPoiska']);
                }
                else
                {
                    echo'<input name="StrokaPoiska" type="text" id="StrokaPoiska" value="">';
                }?>

				<input type="submit" class="OrangevayaKnopkaRezinovaya" value="Найти">
			</form>
			</div>
			
	</div>
	<div id='KakNasNaytiPravayaKolonkaVerxniyDiv' class="KakNasNayti">
	КАК НАС НАЙТИ <?echo sprintf('<img id="ZnachekKarti" src="%sFilpanDesign/PageImages/ZnachekKarti.gif">'."\r\n",$_WEB_ROOT);?> НА КАРТЕ
	</div>
</div>
<div id='SrednayaKolonkaVerxniyDiv'>
	<div id="CentrirovanniyDivStranicSayta">
		<span>Отображение картинок:</span><input type="checkbox" id="show_images" <?=$_SHOW_IMAGES==1?'checked':''?>>
	</div>	
</div>