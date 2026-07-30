	<?
		require_once($_SERVER['DOCUMENT_ROOT']."/lib_functions/require.php");
		$spisok_proiz=new proiz_usl(0,$_POST['id_podrazdel']);
		$spisok_proiz->show_like_table();
		?>	