<div class="ModulSredneyKolonki">

<div id="rabocheeOkno">
			<div class="blockElementovRabochegoOkna">
			<? echo sprintf('<a class="SsilkaPerehodNaSayt" href="%s%s">Перейти на сайт</a>'."\r\n",$_WEB_ROOT_HREF,$DannieZapolneniya['ssilka']);?>

			<input type="button" value="Создать новый элемент" id="sozdatNoviyElement"  class="knopka">
			
			</div>
			<div class="blockElementovRabochegoOkna">
		<?if(!isset($_REQUEST['id'])||$_REQUEST['copy']==1):?>
		<?$DannieZapolneniya['id']='';$DannieZapolneniya['ssilka']=''?>
		<input type="button" value="Создать" id="sozdat" class="knopka">	
		<?else:?>
		<input type="button" value="Сохранить" id="sohranit"  class="knopka">
		<input type="button" value="Копировать" id="kopirovat"  class="knopka">
		<input type="button" value="Удалить" id="udalit"  class="knopka">
		<?endif;?>
			</div>
			<div class="blockElementovRabochegoOkna">
			<div>
			<span>ID</span>
			<input type="text" id="input_id" class="poleVvodaDannixElementa" value='<? echo $DannieZapolneniya['id']?>'>
			</div>
			<div>
			<span>Ssilka</span>
			<input type="text"  readonly  class="poleVvodaDannixElementa" value='<? echo $DannieZapolneniya['ssilka']?>'>
			</div>
			<div>
			<span>Название</span>
			<textarea id="input_nazvaniye_statyi" class='TextovoyePole BezCKEDITOR ObyazatelnoyePole'><? echo $DannieZapolneniya['nazvaniye_statyi']?></textarea>
			</div>
			<div>
			<span>Title</span>
			<textarea id="input_title" class='TextovoyePole BezCKEDITOR ObyazatelnoyePole'><? echo $DannieZapolneniya['title']?></textarea>
			</div>
			<div>
			<span>Keywords</span>
			<textarea id="input_keywords" class='TextovoyePole BezCKEDITOR ObyazatelnoyePole'><? echo $DannieZapolneniya['keywords']?></textarea>
			</div>
			<div>
			<span>Description</span>
			<textarea id="input_description" class='TextovoyePole BezCKEDITOR ObyazatelnoyePole'><? echo $DannieZapolneniya['description']?></textarea>
			</div>
			</div>
			<div class="blockElementovRabochegoOkna" class="poleVvodaDannixElementa">
			<div>
			<span>Тема</span>
			<textarea id="input_vid_statyi_id" class='TextovoyePole BezCKEDITOR ObyazatelnoyePole'><? echo $DannieZapolneniya['vid_statyi_id']?></textarea>
			</div>
			
			<div>
			<span>Текст</span>
			</div>
			<div>
			<textarea id="input_text_statyi"><?echo $DannieZapolneniya['text_statyi']?></textarea>
			</div>
			</div>
			
			<div class="blockElementovRabochegoOkna" >
			<input type="button" value="Добавить" id="dobavitStroku"  class="knopka">
			<input type="button" value="Удалить" id="udalitStroku"  class="knopka">
	
			<table class="tablicaSsilok">
			<?
			if(!isset($_REQUEST['id'])||$_REQUEST['copy']==1){?>
			<tr class="strokaTabliciSsilok">
			<td>
			<input type="hidden" value="1" class="poriadkoviyNomerStrokiTabliciSsilki"><input type="text" class="redaktiruemayaSsilkaVTablice" value=''>
			</td>
			<td>
			<input type="checkbox">
			</td>
			</tr>
			<?}
			else{
			$Ssilki=$ElementStatya->poluchitSsilki();
			while($Ssilki->poluchitSleduyushiy()){
			$ElementiStroki=$Ssilki->_TekushiyElement;
			if($Ssilki->_TekushiyElement['osnovnaya']==1)
			{
			$checked=' checked';
			}
			else
			{
			$checked='';
			}?>
			<tr class="strokaTabliciSsilok">
			<td>
			<input type="hidden" value="1" class="poriadkoviyNomerStrokiTabliciSsilki"><input type="text" class="redaktiruemayaSsilkaVTablice" value='<?echo $ElementiStroki['ssilka']?>'>
			</td>
			<td>
			<input type="checkbox" <?echo $checked?>>
			</td>
			</tr>
			<?}
			}?>
			</table>
			</div>
		</div>					

</div>