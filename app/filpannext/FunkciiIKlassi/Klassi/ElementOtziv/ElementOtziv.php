<?
/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class ElementSsilka extends ElementSpiska

public ElementSsilka()
public this  poluchitPoSsilke()
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

Class ElementOtziv extends ElementSpiska
{

function ElementSsilka()
{
$TablicaRoditel='filpan_new_otzivi';
ElementSpiska::ElementSpiska($TablicaRoditel);
}

public function poluchitPoSsilke()
{
if($this->_MassivSvoystv[0]['ssilka']!='')
{

$MassivKriteriev['ssilka']=$this->_MassivSvoystv[0]['ssilka'];
$this->poluchitPoKriteriyu($MassivKriteriev);
}
return this;
}

public function poluchitOsnovnuyuSsilkuElementa($id,$idTablici)
{		
$MassivKriteriev=array();
$MassivKriteriev['id_tablici']=$id;
$MassivKriteriev['tablica_id']=$idTablici;
$MassivKriteriev['osnovnaya']=1;
$this->vibratPoliya('ssilka');
$this->poluchitPoKriteriyu($MassivKriteriev);
return $this;
}

}
?>