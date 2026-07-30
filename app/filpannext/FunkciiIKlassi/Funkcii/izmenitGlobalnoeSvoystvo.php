<?function izmenitGlobalnoeSvoystvo($svoystvo,$znacheniye)
{
$KursValut=New ElementSpiska('filpan_new_kursi_valut');
		$MassivKriteriev=array();
		$MassivKriteriev['svoystvo']=$svoystvo;
		$KursValut->poluchitPoKriteriyu($MassivKriteriev);
		$KursValut->izmenitSvoystvo('kurs',$znacheniye);
		$KursValut->sohranit();
}
?>