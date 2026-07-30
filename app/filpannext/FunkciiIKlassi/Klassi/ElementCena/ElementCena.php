<?
/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class ElementCena extends ElementSpiska

public ElementCena()
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

Class ElementCena extends ElementSpiska
{

function ElementCena()
{
$TablicaRoditel='filpan_new_ceni';
parent::ElementSpiska($TablicaRoditel);
}


public function poluchit($TovarUslugaId,$Lokacia,$Kolichestvo)
{
$MassivKriteriev=array();
$MassivKriteriev['tovar_usluga_id']=$TovarUslugaId;
$MassivKriteriev['locaciya']=$Lokacia;
$MassivKriteriev['kolichestvo']=$Kolichestvo;
parent::poluchitPoKriteriyu($MassivKriteriev);
return $this;
}

public function sohranit($TovarUslugaId,$Lokacia,$Kolichestvo)
{

}

public function sozdat($TovarUslugaId,$Lokacia,$Kolichestvo,$Valuta,$Cena)
{
if($TovarUslugaId==''||$Lokacia==''||$Kolichestvo==''||$Valuta==''||$Cena=='')
{
new MyExc("Не задан параметр");	
}

$this->izmenitSvoystvo('tovar_usluga_id',$TovarUslugaId);
$this->izmenitSvoystvo('locaciya',$Lokacia);
$this->izmenitSvoystvo('kolichestvo',$Kolichestvo);
$this->izmenitSvoystvo('valuta',$Valuta);
$this->izmenitSvoystvo('cena',$Cena);
//print_r($this->_MassivSvoystv);
//echo "<br>id:".$this->poluchitSvoystvo('tovar_usluga_id');
parent::sozdat();
}



}
?>