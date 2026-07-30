<?

/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class Spisok

protected $_MassivInformacii;
protected $_KolichestvoElementovMassivaInformacii;
protected $_TablicaRoditel;
protected $_PoliyaZaprosa;
protected $_Disrinct;
protected $_Order;
protected $_TekushiyNomerElementa;
public $_TekushiyElement;

public Spisok(string)
public poluchit()
public this vibratPoliya(string)
public this vibratRazniye()
public this uporyadochitPoVozrastaniyu(string)
public this uporyadochitPoUbivaniyu(string)
public this poluchitPoKriteriyu(array)
public this poluchitPoRoditeliyam(int,array)
public this udalitVse()
public this udalitPoKriteriyu(array)
public int poluchitKolichestvoElementovMassivaInformacii()
public array poluchitMassivInformacii()
public int PoluchitTekushiyNomerElementa()
public bool poluchitSleduyushiy()
public bool poluchitPredidushiy()
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

class Spisok
{
    protected $_MassivInformacii;
    protected $_KolichestvoElementovMassivaInformacii;
    protected $_TablicaRoditel;
    protected $_PoliyaZaprosa;
    protected $_Order;
    protected $_TekushiyNomerElementa;
    protected $_KolichestvoSsilokDliyaPerehodaPoSpisku;
    public $_TekushiyElement;

    function Spisok($TablicaRoditel)
    {
        $this->_TablicaRoditel = $TablicaRoditel;
        $this->_PoliyaZaprosa = '*';
        $this->_Disrinct = '';
        $this->_Order = '';
        $this->_TekushiyNomerElementa = -1;
        $this->_TekushiyElement = '';
        $this->_KolichestvoSsilokDliyaPerehodaPoSpisku = 0;
    }

    public function poluchit()
    {

        $ZaprosNaChteniye = new ZaprosNaChteniye('select ' . $this->_Disrinct . ' ' . $this->_PoliyaZaprosa . ' from ' . $this->_TablicaRoditel . ' ' . $this->_Order);
        $this->_MassivInformacii = $ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();
        $this->_KolichestvoElementovMassivaInformacii = $ZaprosNaChteniye->poluchitKolichestvoStrokOtvetaNaZapros();
        return $this;
    }

    public function vibratPoliya($Poliya)
    {
        $this->_PoliyaZaprosa = $Poliya;
        return $this;
    }

    public function vibratRazniye()
    {
        $this->_Disrinct = 'distinct';
        return $this;
    }

    public function uporyadochitPoVozrastaniyu($Poliya)
    {
        $this->_Order = 'Order by ' . $Poliya . ' asc';
        return $this;

    }

    public function uporyadochitPoUbivaniyu($Poliya)
    {
        $this->_Order = 'Order by ' . $Poliya . ' desc';
        return $this;
    }


    public function poluchitPoKriteriyu($MassivKriteriyev)
    {
        $UsloviyaZaprosa = preobrazovatMassivVUsloviyeZaprosa($MassivKriteriyev);

//        echo print_r('select '.$this->_Disrinct.' '.$this->_PoliyaZaprosa.' from '.$this->_TablicaRoditel.' where '.$UsloviyaZaprosa.' '.$this->_Order,true );
        $ZaprosNaChteniye = new ZaprosNaChteniye('select ' . $this->_Disrinct . ' ' . $this->_PoliyaZaprosa . ' from ' . $this->_TablicaRoditel . ' where ' . $UsloviyaZaprosa . ' ' . $this->_Order);
        $this->_MassivInformacii = $ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();
        $this->_KolichestvoElementovMassivaInformacii = $ZaprosNaChteniye->poluchitKolichestvoStrokOtvetaNaZapros();
        return $this;
    }


    public function poluchitKolichestvoSsilokDliyaPerehodaPoSpisku()
    {
        //print_r($this->_KolichestvoSsilokDliyaPerehodaPoSpisku);
        return $this->_KolichestvoSsilokDliyaPerehodaPoSpisku;
    }

    public function poluchitPoRoditeliyam($Roditel, $MassivKriteriyev)
    {
        array_push($MassivKriteriyev, $Roditel);
        $UsloviyaZaprosa = preobrazovatMassivVUsloviyeILIZaprosa('menu_id', $MassivKriteriyev);
        $ZaprosNaChteniye = new ZaprosNaChteniye('select ' . $this->_Disrinct . ' ' . $this->_PoliyaZaprosa . ' from ' . $this->_TablicaRoditel . ' where ' . $UsloviyaZaprosa . ' ' . $this->_Order);
        $this->_MassivInformacii = $ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();
        $this->_KolichestvoElementovMassivaInformacii = $ZaprosNaChteniye->poluchitKolichestvoStrokOtvetaNaZapros();
        return $this;
    }

    public function udalitVse()
    {
        $ZaprosNaIzmeneniye = new ZaprosNaIzmeneniye('DELETE  from ' . $this->_TablicaRoditel . ' WHERE 1');
        return $this;
    }

    public function udalitPoKriteriyu($MassivKriteriyev)
    {
        $UsloviyaZaprosa = preobrazovatMassivVUsloviyeZaprosa($MassivKriteriyev);
        $ZaprosNaIzmeneniye = new ZaprosNaIzmeneniye('DELETE  from ' . $this->_TablicaRoditel . ' where ' . $UsloviyaZaprosa);
        return $this;
    }

    public function poluchitKolichestvoElementovMassivaInformacii()
    {
        return $this->_KolichestvoElementovMassivaInformacii;
    }

    public function poluchitMassivInformacii()
    {
        return $this->_MassivInformacii;
    }

    public function PoluchitTekushiyNomerElementa()
    {
        return $this->_TekushiyNomerElementa;
    }

    public function poluchitSleduyushiy()
    {
//echo '--'.$this->_TekushiyNomerElementa.'__'.$this->_TekushiyElement['nazvanie'];

        if ($this->_TekushiyNomerElementa == -1) {

            $this->_TekushiyNomerElementa = 0;
            $this->_TekushiyElement = $this->_MassivInformacii[$this->_TekushiyNomerElementa];
            return true;
        } elseif (($this->_TekushiyNomerElementa + 1) < $this->_KolichestvoElementovMassivaInformacii) {
            $this->_TekushiyNomerElementa = $this->_TekushiyNomerElementa + 1;
            $this->_TekushiyElement = $this->_MassivInformacii[$this->_TekushiyNomerElementa];
            return true;
        } elseif (($this->_TekushiyNomerElementa + 1) >= $this->_KolichestvoElementovMassivaInformacii) {
            return false;
        }
    }

    public function poluchitPredidushiy()
    {
        if (($this->_TekushiyNomerElementa - 1) < 0) {
            return false;
        } else {
            $this->_TekushiyNomerElementa = $this->_TekushiyNomerElementa - 1;
            $this->_TekushiyElement = $this->_MassivInformacii[$this->_TekushiyNomerElementa];
            return true;
        }

    }
}

?>