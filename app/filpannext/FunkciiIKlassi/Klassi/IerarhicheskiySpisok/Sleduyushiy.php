	if($this->_UrovenVlogennostiElementa==(-1))
				{
				$this->_UrovenVlogennostiElementa=0;
				$this->_TekushiyNomerRoditelya[$this->_UrovenVlogennostiElementa]=0;
				}
				if(!isset($this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa]))
				{
				$this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa]=0;
				}
				
							if(!isset($this->_PodgruppaElementov[$this->_UrovenVlogennostiElementa]))
							{
							$this->_PodgruppaElementov[$this->_UrovenVlogennostiElementa]=new Spisok($this->_TablicaRoditel);
							$MassivKriteriev=array();
							$MassivKriteriev['roditel']=$this->_TekushiyNomerRoditelya[$this->_UrovenVlogennostiElementa];
							$this->_PodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitPoKriteriyu($MassivKriteriev);
							}
							
							$RezultatSmesheniya=$this->_PodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitSleduyushiy();	
							if($RezultatSmesheniya==true)
							{
							
							$this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa]=$this->_PodgruppaElementov[$this->_UrovenVlogennostiElementa]->PoluchitTekushiyNomerElementa();
							
							
							if($this->_PodgruppaElementov[$this->_UrovenVlogennostiElementa]->PoluchitTekushiyNomerElementa()==0)
							{
							$this->ObrabodkaPodgrupp();
							return true;
							}
							
							
							elseif($this->_PodgruppaElementov[$this->_UrovenVlogennostiElementa]->PoluchitTekushiyNomerElementa()<($this->_PodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitKolichestvoElementovMassivaInformacii()-1))
							{
							$this->ObrabodkaPodgrupp();
							return true;
							}
							
							
							elseif($this->_PodgruppaElementov[$this->_UrovenVlogennostiElementa]->PoluchitTekushiyNomerElementa()==($this->_PodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitKolichestvoElementovMassivaInformacii()-1))
							{
							$this->ObrabodkaPodgrupp();
							return true;
							}
							
							
							else
							{
							return false;
							}
							
							
							}
							
							
							protected function ObrabodkaPodgrupp()
{
$this->_TekushiyElement=$this->_PodgruppaElementov[$this->_UrovenVlogennostiElementa]->_TekushiyElement;
							$PromegutochnayaPodgruppa=new Spisok($this->_TablicaRoditel);
							$MassivKriteriev=array();
							$MassivKriteriev['roditel']=$this->_TekushiyElement['id'];
							$PromegutochnayaPodgruppa->poluchitPoKriteriyu($MassivKriteriev);
							if($PromegutochnayaPodgruppa->poluchitKolichestvoElementovMassivaInformacii()>0)
							{
							$this->_UrovenVlogennostiElementa=$this->_UrovenVlogennostiElementa+1;
							}
}