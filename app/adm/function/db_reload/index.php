<?session_start ( )?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? include('db_func.php') ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Преобразование баз данных</title>
</head>
<body>
				
				<?if(isset($_POST["table"])&isset($_SESSION["table"])&($_POST["table"]!=$_SESSION["table"]))
				{
				unset($_POST["row_number"]);
				unset($_SESSION["row_number"]);
				}
				else
				{}?>
				
				
				<?if($_POST["table"]!='')
				{
				$_SESSION["table"]=$_POST["table"];
				$table_name=$_SESSION["table"];
				}
				else
				{
				$table_name=$_SESSION["table"];
				}?>
							
<form id="form1" name="form1" action="index.php" method="post">
<fieldset>  
   <legend>Таблицы имеющиеся в базе:</legend>  
		<?$db=new date_base;
		$row=array();
		$row=& $db->show_tables();
		?>
		<ol>
		<?
		$i=0;
		while ($row[$i][0]) {
		?>
				<li>
				<?if($table_name==$row[$i][0])
				{?>
				  <input type="radio" name="table" checked value="<?echo $row[$i][0];?>" id="tables_<?echo $i;?>" /><?echo $row[$i][0]?></label>
				<?}
				else
				{?>
				  <input type="radio" name="table" value="<?echo $row[$i][0];?>" id="tables_<?echo $i;?>" /><?echo $row[$i][0]?></label>
				<?}?>
				</li>
		<?
		$i++;
							}
		?>
		</ol>
  <input name="section" type="hidden" value="1" />
  <input name="" type="submit" value="Ok"  /><INPUT type="reset">
  </fieldset> 
</form>

				<?$row=& $db->table_describe($table_name);?>
                <?if($_POST["section"]==1){?>
				<?if(!isset($_POST["row_number"])){unset($_POST["row_number"]);}else{}?>
				<?if(isset($_POST["row_number"]))
				{
				unset($_SESSION["row_number"]);
				$_SESSION["row_number"]=$_POST["row_number"];
				$row_number=$_SESSION["row_number"];
				}
				else
				{
				$row_number=$_SESSION["row_number"];
				}?>
				
			
			
				<form id="form2" name="form2" action="index.php" method="post">
                <fieldset>  
				<legend>Названия столбцов таблицы<?echo "".$table_name." ";?> и их типы</legend>  
				<table width="400" border="3" cellspacing="0" cellpadding="0">
  


				<?$i=0;
				
				while($row[$i])
				{?>
				<tr>
				<td><?echo $row[$i][1];?></td>
    			<td><?echo $row[$i][2];?></td>
				<td><?echo $row[$i][3];?></td>
    			<td>
                <label>
				 
				<?
				//print_r($row_number);
				if(isset($row_number)){
				$key=array_search($i,$row_number);
				}
				else{$key=FALSE;}
				if($key===FALSE)
				{?>
    			<input type="checkbox" name="row_number[]" value='<?echo $i?>' id="row_number_<?echo $i;?>" /> 
				<?}
				else
				{?>
				<input type="checkbox" name="row_number[]" checked  value='<?echo $i?>' id="row_number_<?echo $i;?>" />
				<?}?>
				  </label></td>
  				</tr>
				<?$i++;}?>
				
				</table>
				<input name="" type="submit" value="Ok"/><INPUT type="reset">
                <input name="section" type="hidden" value="1" />
				<input name="section2" type="hidden" value="1" />
                </fieldset> 
                </form>
				<?//print_r($row_number);?>
				
				
				
				<?if(isset($_POST['section2'])){
				
				$last_key=sizeof($row_number)-1;
				//echo 'Last key'.$last_key.'<BR>';
				$stroka_zaprosa='(';
				if($last_key!=0){
				for($i=0;$i!=$last_key;$i++)
				{
				
				//echo '$i='.$i.' $row_number='.$row_number[$i][0].'<BR>';
				$stroka_zaprosa=$stroka_zaprosa.$row[$row_number[$i]][1].' '.$row[$row_number[$i]][2].'('.$row[$row_number[$i]][3].'), ';
				
				}
				$stroka_zaprosa='CREATE TABLE NAME '.$stroka_zaprosa.$row[$row_number[$last_key]][1].' '.$row[$row_number[$last_key]][2].'('.$row[$row_number[$last_key]][3].')) ';
				}
				else
				{
				$stroka_zaprosa='CREATE TABLE NAME '.$stroka_zaprosa.$row[$row_number[0]][1].' '.$row[$row_number[0]][2].'('.$row[$row_number[0]][3].')) ';
				};
				?>
				<form id="form3" name="form3" action="index.php" method="post">
				<fieldset>
				<legend>SQL запрос</legend>
				<label>
				<textarea name="SQL_querty" id="SQL_querty" cols="45" rows="5"><?echo $stroka_zaprosa?></textarea>
				</label>
				<input name="" type="submit" value="Ok"/><INPUT type="reset">
                <input name="section" type="hidden" value="1" />
				<input name="section2" type="hidden" value="1" />
				<input name="section3" type="hidden" value="1" />
				</fieldset>
				</form>
				<?}else{}?>
				
				
				
				
				<?if(isset($_POST['section3'])){
				echo $_POST['SQL_querty'];
				$db->db_query($_POST['SQL_querty']);
				}
				else
				{
				
				}?>
				<?}
				else
				{?>
				
				<?
				}
				?>
				


</body>
</html>
