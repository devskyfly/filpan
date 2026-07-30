<?
/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class  ElementMenu extends ElementIerarhicheskogoSpiska

public ElementMenu()
public this udalit()
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

Class ElementMenu extends ElementIerarhicheskogoSpiska
{
function ElementMenu()
{
global $_VIDI_STRANIC;
$this->_TablicaId=$_VIDI_STRANIC['filpan_new_menu'];
$this->TablicaRoditel='filpan_new_menu';
ElementIerarhicheskogoSpiska::ElementIerarhicheskogoSpiska($this->TablicaRoditel);
}

public function udalit()
{
ElementIerarhicheskogoSpiska::udalit();
}

public function udalitSsilkiNaElement()
{
global $_VIDI_STRANIC;
$Ssilki=new Ssilki();
$_MassivKriteriev=array();
$_MassivKriteriev['tablica_id']=$_VIDI_STRANIC['filpan_new_menu'];
$_MassivKriteriev['id_tablici']=$this->poluchitSvoystvo('id');
$Ssilki->udalitPoKriteriyu($_MassivKriteriev);
}


public function dobavitSsilku($Ssilka,$Osnovnaya)
{
global $_VIDI_STRANIC;
$ElementSsilka=new ElementSsilka();

$ElementSsilka->izmenitSvoystvo('tablica_id',$_VIDI_STRANIC['filpan_new_menu']);
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