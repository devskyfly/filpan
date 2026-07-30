<?
/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class IerarhicheskiySpisok

protected $_MassivInformacii;
protected $_KolichestvoElementovMassivaInformacii;
protected $_TablicaRoditel;
protected $_AktivniyElement;
protected $_PoliyaZaprosa;
protected $_TekushiyNomerElementa;
protected $_TekushiyNomerRoditelya;
protected $_TekushayaPodgruppaElementov;
protected $_KolichestvoElementovTekusheyPodgruppi;
public $_TekushiyElement;
protected $_UrovenVlogennostiElementa;
protected $_FlagPerehodaPoPodruppe;
protected $_PosledniyElementVpodgruppe;
protected $_PerviyElementVpodgruppe;

public IerarhicheskiySpisok()
public function poluchit()
public function poluchitPerviyUroven()
protected function poluchitPerviyUrovenRekursivno(int,int)
public function vibratPoliya(string)
protected function poluchitRekursivno(int)
public function poluchitDoAktivnogo(int)
protected function poluchitDoAktivnogoRekursivno(int,int,int)
public function udalitVse()
public function udalitPoKriteriyu(array)
public function poluchitPoKriteriyu($array)
public function poluchitMassivInformacii()
public bool poluchitSleduyushiy()
public bool poluchitPredidushiy()
public int poluchitUrovenVlogennosti()
public bool perviy()
public bool posledniy()
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

class IerarhicheskiySpisok
{
protected $_MassivInformacii;
protected $_KolichestvoElementovMassivaInformacii;
protected $_TablicaRoditel;
protected $_AktivniyElement;
protected $_PoliyaZaprosa;
protected $_TekushiyNomerElementa;
protected $_TekushiyNomerRoditelya;
protected $_TekushayaPodgruppaElementov;
protected $_KolichestvoElementovTekusheyPodgruppi;
public $_TekushiyElement;
protected $_UrovenVlogennostiElementa;
public $_FlagPerehodaPoPodruppe;
protected $_PosledniyElementVpodgruppe;
protected $_PerviyElementVpodgruppe;

function IerarhicheskiySpisok($TablicaRoditel)
{
$this->_TablicaRoditel=$TablicaRoditel;
$this->_PoliyaZaprosa='';
$this->_TekushiyNomerElementa=array();
$this->_TekushiyNomerRoditelya=array();
$this-> _PodgruppaElementov=array();
$this->_TekushiyElement='';
$this->_UrovenVlogennostiElementa=-1;
$this->_FlagPerehodaPoPodruppe=false;
$this->_PosledniyElementVpodgruppe=false;
$this->_PerviyElementVpodgruppe=false;
}

public function poluchit()
{
$this->_MassivInformacii=$this->poluchitRekursivno(0);
return this;
}

public function poluchitPerviyUroven()
{
$Uroven=0;
$this->_MassivInformacii=$this->poluchitPerviyUrovenRekursivno($Uroven,0);
return this;
}

protected function poluchitPerviyUrovenRekursivno($Uroven,$Roditel)
{
$Uroven++;
$MassivKriteriyev['roditel']=$Roditel;

if($this->_PoliyaZaprosa!='')
{
$Poliya=', '.$this->_PoliyaZaprosa;
}
else
{
$Poliya=$this->_PoliyaZaprosa;
}


$ZaprosNaChteniye=new ZaprosNaChteniye('select id, roditel, nazvanie'.$Poliya.' from '.$this->_TablicaRoditel.' WHERE '.preobrazovatMassivVUsloviyeZaprosa($MassivKriteriyev));
$MassivOtvetNaZapros=$ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();
if(is_array($MassivOtvetNaZapros))
{
	foreach ($MassivOtvetNaZapros  as $key => $StorkaMassivaOtveta)
	{
	if($Uroven<2)
	{
	$MassivOtvetNaZapros[$key]['array']=$this->poluchitPerviyUrovenRekursivno($Uroven,$StorkaMassivaOtveta['id']);
	}
	}
}


return $MassivOtvetNaZapros;
}

public function vibratPoliya($Poliya)
{
$this->_PoliyaZaprosa=$Poliya;
return $this;
}

protected function poluchitRekursivno($Roditel)
{
$MassivKriteriyev['roditel']=$Roditel;

if($this->_PoliyaZaprosa!='')
{
$Poliya=', '.$this->_PoliyaZaprosa;
}
else
{
$Poliya=$this->_PoliyaZaprosa;
}


$ZaprosNaChteniye=new ZaprosNaChteniye('select id, roditel, nazvanie'.$Poliya.' from '.$this->_TablicaRoditel.' WHERE '.preobrazovatMassivVUsloviyeZaprosa($MassivKriteriyev));
$MassivOtvetNaZapros=$ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();
if(is_array($MassivOtvetNaZapros))
{
	foreach ($MassivOtvetNaZapros  as $key => $StorkaMassivaOtveta)
	{
	
	$MassivOtvetNaZapros[$key]['array']=$this->poluchitRekursivno($StorkaMassivaOtveta['id']);
	}
}
return $MassivOtvetNaZapros;
}

public function poluchitDoAktivnogo($id)
{
$ElementIerarhicheskogoSpiska=new ElementIerarhicheskogoSpiska($this->_TablicaRoditel);
$ElementIerarhicheskogoSpiska->poluchit($id);
$this->_AktivniyElement=$ElementIerarhicheskogoSpiska;
$uroven=0;
$this->_MassivInformacii=$this-> poluchitDoAktivnogoRekursivno(0,$id,$uroven);
return this;
}
protected function poluchitDoAktivnogoRekursivno($Roditel,$id,$uroven)
{
$uroven++;
$MassivKriteriyev['roditel']=$Roditel;
if($this->_PoliyaZaprosa!='')
{
$Poliya=', '.$this->_PoliyaZaprosa;
}
else
{
$Poliya=$this->_PoliyaZaprosa;
}
$ZaprosNaChteniye=new ZaprosNaChteniye('select id, roditel, nazvanie'.$Poliya.' from '.$this->_TablicaRoditel.' WHERE '.preobrazovatMassivVUsloviyeZaprosa($MassivKriteriyev));
$MassivOtvetNaZapros=$ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();
if(is_array($MassivOtvetNaZapros))
{
	foreach ($MassivOtvetNaZapros  as $key => $StorkaMassivaOtveta)
	{
	if(array_search($StorkaMassivaOtveta['id'],$this->_AktivniyElement->poluchitRoditelskiyeElementi()) or $uroven==0 or  $uroven==1 or $StorkaMassivaOtveta['id']==$id)
	{
	$MassivOtvetNaZapros[$key]['array']=$this->poluchitDoAktivnogoRekursivno($StorkaMassivaOtveta['id'],$id,$uroven);
	}
	}
}

return $MassivOtvetNaZapros;
}

public function udalitVse()
{
$UsloviyaZaprosa=preobrazovatMassivVUsloviyeZaprosa($MassivKriteriyev);
$ZaprosNaIzmeneniye=new ZaprosNaIzmeneniye('DELETE  * from '.$this->_TablicaRoditel);
return this;
}
public function udalitPoKriteriyu($MassivKriteriyev)
{
$UsloviyaZaprosa=preobrazovatMassivVUsloviyeZaprosa($MassivKriteriyev);
$ZaprosNaIzmeneniye=new ZaprosNaIzmeneniye('DELETE  * from '.$this->_TablicaRoditel.' where '.$UsloviyaZaprosa);
return this;
}



public function poluchitPoKriteriyu($MassivKriteriyev)
{
$UsloviyaZaprosa=preobrazovatMassivVUsloviyeZaprosa($MassivKriteriyev);

if($this->_PoliyaZaprosa=='')
{
$Poliya='*';
}
$ZaprosNaChteniye=new ZaprosNaChteniye('select  '.$Poliya.' from '.$this->_TablicaRoditel.' where '.$UsloviyaZaprosa);
$this->_MassivInformacii=$ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();
$this->_KolichestvoElementovMassivaInformacii=$ZaprosNaChteniye->poluchitKolichestvoStrokOtvetaNaZapros();
return this;
}


public function poluchitMassivInformacii()
{
return $this->_MassivInformacii;
}

public function poluchitSleduyushiy()
{
$this->_PosledniyElementVpodgruppe=false;
$this->_PerviyElementVpodgruppe=false;
$perehod=false;
		if($this->_UrovenVlogennostiElementa==(-1))
		{
		$this->_UrovenVlogennostiElementa=0;

		 $this->_TekushiyNomerRoditelya[$this->_UrovenVlogennostiElementa]=0;
		 $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]=new Spisok($this->_TablicaRoditel);
					 if($this->_PoliyaZaprosa!='')
					 {
					 $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->vibratPoliya('id, roditel, nazvanie, '.$this->_PoliyaZaprosa);
					 }
		 $MassivKriteriev=array();
		 $MassivKriteriev['roditel']= $this->_TekushiyNomerRoditelya[$this->_UrovenVlogennostiElementa];
		 $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitPoKriteriyu($MassivKriteriev);
		 $this->_KolichestvoElementovTekusheyPodgruppi[$this->_UrovenVlogennostiElementa]=$this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitKolichestvoElementovMassivaInformacii();
		}

 if($this->_KolichestvoElementovTekusheyPodgruppi[$this->_UrovenVlogennostiElementa]>0)
 {
			if($this->_FlagPerehodaPoPodruppe==true)
			{
			$perehod=true;
			$this->_FlagPerehodaPoPodruppe=false;
			$this->_UrovenVlogennostiElementa=$this->_UrovenVlogennostiElementa+1;
			 $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]=new Spisok($this->_TablicaRoditel);
			 if($this->_PoliyaZaprosa!='')
			 {
			 $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->vibratPoliya('id, roditel, nazvanie, '.$this->_PoliyaZaprosa);
			 }
			$MassivKriteriev=array();
			$MassivKriteriev['roditel']=$this->_TekushiyElement['id'];
			$this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitPoKriteriyu($MassivKriteriev);
			$this->_TekushiyNomerRoditelya[$this->_UrovenVlogennostiElementa]=$this->_TekushiyElement['id'];
			$this->_KolichestvoElementovTekusheyPodgruppi[$this->_UrovenVlogennostiElementa]=$this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitKolichestvoElementovMassivaInformacii();
			}
			
			$RezultatPopitkiPerehoda=$this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitSleduyushiy();
											 if($RezultatPopitkiPerehoda==false&&$this->_FlagPerehodaPoPodruppe==false)
												 {
														if($this->_UrovenVlogennostiElementa==0)
														{
														$this->_UrovenVlogennostiElementa=$this->_UrovenVlogennostiElementa-2;
														}
														else
														{
														while($this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa]==($this->_KolichestvoElementovTekusheyPodgruppi[$this->_UrovenVlogennostiElementa]-1))
																					{
																						if($this->_UrovenVlogennostiElementa==0)
																						{
																						$this->_UrovenVlogennostiElementa=$this->_UrovenVlogennostiElementa-2;
																						break;
																						}
																						$this->_UrovenVlogennostiElementa=$this->_UrovenVlogennostiElementa-1;
																						$RezultatPopitkiPerehoda=$this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitSleduyushiy();
																					}
															}
														 if($this->_UrovenVlogennostiElementa==(-2))
														 {
														 return false;
														 }
														
												 }
			
	
		 if($RezultatPopitkiPerehoda==true)
		 {
		 $this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa]=$this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->PoluchitTekushiyNomerElementa();
		 $this->_TekushiyElement=$this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->_TekushiyElement;
			
			if($perehod==true)
			{
			$this->_TekushiyElement['perehod']=true;
			}
			else
			{
			$this->_TekushiyElement['perehod']=false;
			}
			
		 $VremennayaPodgruppa=new Spisok($this->_TablicaRoditel);
		 $MassivKriteriev=array();
		 $MassivKriteriev['roditel']=$this->_TekushiyElement['id'];
		 $VremennayaPodgruppa->poluchitPoKriteriyu($MassivKriteriev);
		 
							 if($VremennayaPodgruppa->poluchitKolichestvoElementovMassivaInformacii()>0)
							 {
							 $this->_FlagPerehodaPoPodruppe=true;
							 $VremennayaPodgruppa->poluchitKolichestvoElementovMassivaInformacii();
							 //$this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->_TekushiyElement['perehod']=true;
							 } 	
							 else
							 {
							// $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->_TekushiyElement['perehod']=false;
							 }
							 
				 
							if(($this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa]==0)&&($this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa]==($this->_KolichestvoElementovTekusheyPodgruppi[$this->_UrovenVlogennostiElementa]-1)))
							 {
							  $this->_PosledniyElementVpodgruppe=true;
							  $this->_PerviyElementVpodgruppe=true;
							//  echo "1-y";
							 }
							 elseif($this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa]==0)
							 {
							 $this->_PerviyElementVpodgruppe=true;
							//echo "1-y";
							 }
							 elseif($this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa]==($this->_KolichestvoElementovTekusheyPodgruppi[$this->_UrovenVlogennostiElementa]-1))
							 {
							 //echo "2-y";
							 $this->_PosledniyElementVpodgruppe=true;
							 }
							
							 else
							 {
							 $this->_PosledniyElementVpodgruppe=false;
							 $this->_PerviyElementVpodgruppe=false;
							//  echo $this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa];
							 }
				 return true;
				 }
 }

}

public function poluchitUrovenVlogennosti()
{
Return $this->_UrovenVlogennostiElementa;
}

public function poluchitPredidushiy()
{

}

public function perviy()
{
return $this->_PerviyElementVpodgruppe;
}
public function posledniy()
{
return $this->_PosledniyElementVpodgruppe;
}

public function perehodPoPodruppe()
{
return $this->_FlagPerehodaPoPodruppe;
}

}
?>