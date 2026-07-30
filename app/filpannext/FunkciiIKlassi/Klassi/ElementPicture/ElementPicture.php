<?
/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class ElementPicture extends ElementSpiska

public ElementPicture()
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

Class ElementPicture extends ElementSpiska
{

function ElementPicture()
{
$TablicaRoditel='filpan_new_pictures';
parent::ElementSpiska($TablicaRoditel);
}


public function poluchitOsnovnuyuKartinkuElementa($id)
{		
$MassivKriteriev=array();
$MassivKriteriev['id_tovari_uslugi']=$id;
$MassivKriteriev['osnovnaya']=1;
$this->poluchitPoKriteriyu($MassivKriteriev);
return $this;
}

public function sohranit()
{

}

public function sozdat($TovarUslugaId,$Imiya_fayla,$Bool)
{
if($TovarUslugaId==''||$Imiya_fayla==''||$Bool=='')
{
new MyExc("Не задан параметр");	
}

$this->izmenitSvoystvo('id_tovari_uslugi',$TovarUslugaId);
$this->izmenitSvoystvo('imiya_fayla',$Imiya_fayla);
$this->izmenitSvoystvo('osnovnaya',$Bool);

//print_r($this->_MassivSvoystv);
//echo "<br>id:".$this->poluchitSvoystvo('tovar_usluga_id');
parent::sozdat();
}



}
?>