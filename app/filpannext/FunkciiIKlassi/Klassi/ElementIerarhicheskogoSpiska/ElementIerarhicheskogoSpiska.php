<?

/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class ElementIerarhicheskogoSpiska extends ElementSpiska

protected $_MassivRoditelskihElementov;
protected $_MassivPodchinennihElementov;

public ElementIerarhicheskogoSpiska(string)
public this poluchit(int)
public array poluchitRoditelskiyeElementi()
public array poluchitPodchinennieElementi()
protected this zapolnitMassivPodchinennihElementov(int)
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

class ElementIerarhicheskogoSpiska extends ElementSpiska
{
    protected $_MassivRoditelskihElementov;
    protected $_MassivPodchinennihElementov;

    function ElementIerarhicheskogoSpiska($TablicaRoditel)
    {
//echo "Tablica1:".$TablicaRoditel;

        ElementSpiska::ElementSpiska($this->_TablicaRoditel);
        $this->_MassivRoditelskihElementov = array();
        $this->_MassivPodchinennihElementov = array();
        $this->_TablicaRoditel = $TablicaRoditel;
        $this->_Suhestvuet = false;
    }

    public function poluchit($id)
    {
        ElementSpiska::poluchit($id);
    }

    public function poluchitRoditelskiyeElementi()
    {
        $ElementRoditelIerarhicheskogoSpiska = '';
        $Roditel = $this->_MassivSvoystv[0]['roditel'];
        //array_push($this->_MassivRoditelskihElementov, $id);
        while ($Roditel != 0) {
            array_push($this->_MassivRoditelskihElementov, $Roditel);
            $ElementRoditelIerarhicheskogoSpiska = new ElementIerarhicheskogoSpiska($this->_TablicaRoditel);
            $ElementRoditelIerarhicheskogoSpiska->poluchit($Roditel);

            $Roditel = $ElementRoditelIerarhicheskogoSpiska->_MassivSvoystv[0]['roditel'];
        }
        return $this->_MassivRoditelskihElementov;
    }

    public function poluchitPodchinennieElementi()
    {
        $this->zapolnitMassivPodchinennihElementov($this->_MassivSvoystv[0]['id']);
        return $this->_MassivPodchinennihElementov;
    }

    protected function zapolnitMassivPodchinennihElementov($id)
    {

        $IerarhicheskiySpisok = new IerarhicheskiySpisok($this->_TablicaRoditel);
        $MassivKriteriyev['roditel'] = $id;
        $IerarhicheskiySpisok->poluchitPoKriteriyu($MassivKriteriyev);
        $MassivOtvetNaZapros = $IerarhicheskiySpisok->poluchitMassivInformacii();

        if (is_array($MassivOtvetNaZapros)) {
            foreach ($MassivOtvetNaZapros as $key => $element) {
                array_push($this->_MassivPodchinennihElementov, $element['id']);
                $this->zapolnitMassivPodchinennihElementov($element['id']);
            }

        }
        return $this;
    }


}

?>