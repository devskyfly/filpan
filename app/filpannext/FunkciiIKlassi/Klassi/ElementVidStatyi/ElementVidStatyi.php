<?
/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class ElementVidStatyi extends ElementSpiska

public ElementVidStatyi()
public this udalit()
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

Class ElementVidStatyi extends ElementSpiska
{
function ElementVidStatyi()
{
$this->_TablicaId=2;
$this->TablicaRoditel='filpan_new_vidi_statey';
ElementSpiska::ElementSpiska($this->TablicaRoditel);
}

public function udalit()
{
ElementSpiska::udalit();
}

public function udalitSsilkiNaElement()
{
global $_VIDI_STRANIC;
$Ssilki=new Ssilki();
$_MassivKriteriev=array();
$_MassivKriteriev['tablica_id']=$_VIDI_STRANIC['statya'];
$_MassivKriteriev['id_tablici']=$this->poluchitSvoystvo('id');
$Ssilki->udalitPoKriteriyu($_MassivKriteriev);
}


public function dobavitSsilku($Ssilka,$Osnovnaya)
{
global $_VIDI_STRANIC;
$ElementSsilka=new ElementSsilka();

$ElementSsilka->izmenitSvoystvo('tablica_id',$_VIDI_STRANIC['statya']);
$ElementSsilka->izmenitSvoystvo('id_tablici',$this->poluchitSvoystvo('id'));
$ElementSsilka->izmenitSvoystvo('ssilka',$Ssilka);
$ElementSsilka->izmenitSvoystvo('osnovnaya',$Osnovnaya);
$ElementSsilka->sozdat();


If($Osnovnaya==1)
{
	$this->izmenitSvoystvo('ssilka',$Ssilka);
	$this->sohranit();
}

}

}
?>