<?
$KursValut=New ElementSpiska('filpan_new_kursi_valut');
				$MassivKriteriev=array();
				$MassivKriteriev['id']=1;
				$KursValut->poluchitPoKriteriyu($MassivKriteriev);
echo sprintf(
		'<script>
		PanelUpravleniya=\'/filpannext/PanelUpravleniya/\';
		YandexMarketFile=\'/filpannext/Obrabotki/YandexMarketCSV.php\';
		WEB_ROOT_IMG=\'/img/\';
		KursDollara=%s;
		</script>',
		$KursValut->poluchitSvoystvo('kurs'));?>