<?function poluchitGlobalnoeSvoystvo($svoystvo)
{
$KursValut=New ElementSpiska('filpan_new_kursi_valut');
		$MassivKriteriev=array();
		$MassivKriteriev['svoystvo']=$svoystvo;
		$KursValut->poluchitPoKriteriyu($MassivKriteriev);
		return $KursValut->poluchitSvoystvo('kurs');
}
?>