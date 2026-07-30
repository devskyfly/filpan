<?

/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class ElementSpiska

protected $_MassivSvoystv;
protected $_PoliyaZaprosa;
protected $_TablicaRoditel;
protected $_Suhestvuet;
protected $_TablicaId;

public ElementSpiska(string)
public this poluchit(int)
public this poluchitPoKriteriyu(array)
public this vibratPoliya(string)
public this sozdat()
public this sohranit()
public this udalit()
public this opustit()-пустой
public this podniyat()-пустой
public this  izmenitSvoystvo(string,mixed)
public mixed  poluchitSvoystvo(string)
public array  poluchitMassivSvoystv()
public string poluchitTablicaRoditel()
public boolen sushestvuet()
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

class ElementSpiska
{
    protected $_MassivSvoystv;
    protected $_PoliyaZaprosa;
    protected $_TablicaRoditel;
    protected $_Suhestvuet;
    protected $_TablicaId;
    protected $_TablicaKartForPrint;


    function ElementSpiska($TablicaRoditel)
    {
//echo "Tablica:".$TablicaRoditel;

        $this->_TablicaRoditel = $TablicaRoditel;
        $this->_Suhestvuet = false;
        $this->_PoliyaZaprosa = '*';
    }

    public function poluchit($id)
    {
//echo 'select '.$this->_PoliyaZaprosa.' from '.$this->_TablicaRoditel.' where id='.$id;
        $ZaprosNaChteniye = new ZaprosNaChteniye('select ' . $this->_PoliyaZaprosa . ' from ' . $this->_TablicaRoditel . ' where id=' . $id);
        if ($ZaprosNaChteniye->poluchitKolichestvoStrokOtvetaNaZapros() == 1) {
            $this->_Suhestvuet = true;
            $this->_MassivSvoystv = $ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();
        } elseif ($ZaprosNaChteniye->poluchitKolichestvoStrokOtvetaNaZapros() > 1) {
            new MyExc('Элемент не выбран');
        } else {
            $this->_MassivSvoystv = array();
        }
        return $this;
    }


    public function poluchitPoKriteriyu($MassivKriteriyev)
    {
//print_r($MassivKriteriyev);
        $UsloviyaZaprosa = preobrazovatMassivVUsloviyeZaprosa($MassivKriteriyev);

        //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/debug.txt', print_r('select ' . $this->_PoliyaZaprosa . ' from ' . $this->_TablicaRoditel . ' where ' . $UsloviyaZaprosa, true));
//        $dt = array($MassivKriteriyev, $this->_TablicaRoditel, $this->_PoliyaZaprosa);
//        echo print_r( $dt,
//            true);
        $queryString = 'select ' . $this->_PoliyaZaprosa . ' from ' . $this->_TablicaRoditel . ' where ' . $UsloviyaZaprosa;

//        echo $queryString;
        $ZaprosNaChteniye = new ZaprosNaChteniye($queryString);
//        echo "###Magiya logoki";
        if ($ZaprosNaChteniye->poluchitKolichestvoStrokOtvetaNaZapros() == 1) {
            //echo "#Zapros vipolnen";
            $this->_Suhestvuet = true;
            $this->_MassivSvoystv = $ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();
        } elseif ($ZaprosNaChteniye->poluchitKolichestvoStrokOtvetaNaZapros() > 1) {
            //echo "#Oshibka vipolneniya";
            new MyExc('Элемент не выбран');
        } else {
            //echo "#Element ne nayden";
            $this->_MassivSvoystv = array();
        }

        return $this;
    }


    public function vibratPoliya($Poliya)
    {
        $this->_PoliyaZaprosa = $Poliya;
        return $this;
    }

    public function sozdat()
    {
        $Parametri = preobrazovatMassivVParametriInsertZaprosa($this->_MassivSvoystv[0]);
//print_r($Parametri);
//print_r($this->_MassivSvoystv);
        $ZaprosNaSozdaniye = new ZaprosNaSozdaniye('INSERT INTO ' . $this->_TablicaRoditel . ' ' . $Parametri);
//print_r('INSERT INTO '.$this->_TablicaRoditel.' '.$Parametri);
        $this->izmenitSvoystvo('id', $ZaprosNaSozdaniye->poluchitIdentifikacionniyNomerSozdannogoElementa());
        $this->_Suhestvuet = true;
        return $this;
    }

    public function sohranit()
    {
        if ($this->_Suhestvuet == true) {
            $Parametri = preobrazovatMassivVParametriUpdateZaprosa($this->_MassivSvoystv[0]);
//echo 'UPDATE '.$this->_TablicaRoditel.' '.$Parametri.' where id='.$this->poluchitSvoystvo('id');
            $ZaprosNaIzmeneniye = new ZaprosNaIzmeneniye('UPDATE ' . $this->_TablicaRoditel . ' ' . $Parametri . ' where id=' . $this->poluchitSvoystvo('id'));
            return $this;
        } else {
            new MyExc('Элемент не выбран');
        }
    }

    public function udalit()
    {
        if ($this->_Suhestvuet == true) {
            $ZaprosNaIzmeneniye = new ZaprosNaIzmeneniye('DELETE  FROM ' . $this->_TablicaRoditel . ' where id=' . $this->poluchitSvoystvo('id'));
            $this->_Suhestvuet = false;
            return $this;
        } else {
            new MyExc('Невозможно удалить элемент, так как, ни один элемент не выбран!');
        }
    }


    public function opustit()
    {
        if ($this->_Suhestvuet == true) {

            return $this;
        } else {
            new MyExc('Невозможно опустить элемент, так как, ни один элемент не выбран!');
        }
    }

    public function podniyat()
    {
        if ($this->_Suhestvuet == true) {

            return $this;
        } else {
            new MyExc('Невозможно поднять элемент, так как, ни один элемент не выбран!');
        }
    }

    public function izmenitSvoystvo($Svoystvo, $Znacheniye)
    {
        $this->_MassivSvoystv[0][$Svoystvo] = $Znacheniye;
    }

    public function poluchitSvoystvo($Svoystvo)
    {
        return $this->_MassivSvoystv[0][$Svoystvo];
    }

    public function poluchitMassivSvoystv()
    {
        return $this->_MassivSvoystv[0];
    }


    public function sushestvuet()
    {
        return $this->_Suhestvuet;
    }


    public function poluchitSsilki()
    {
        $Ssilki = new Ssilki();
        $MassivKriteriev = array();
        if ($this->_TablicaId === '') {
            new MyExc('Не задана таблица связки');
        }

///
        if ($this->poluchitSvoystvo('tip') == 3) {
            $MassivKriteriev['tablica_id']= $this->_TablicaKartForPrint;
        } else {
            $MassivKriteriev['tablica_id'] = $this->_TablicaId;
        }
///

        $MassivKriteriev['id_tablici'] = $this->poluchitSvoystvo('id');
        $Ssilki->poluchitPoKriteriyu($MassivKriteriev);
        return $Ssilki;
    }

    public function poluchitTablicaRoditel()
    {
        if ($this->_Suhestvuet == 1) {
            return $this->_TablicaRoditel;
        } else {
            new MyExc('Невозможно получить таблицу родитель, так как, элемент не выбран');
        }
    }

    function poluchitOsnovnuyuSsilku($_STRANICI_SAYTA)
    {
        if ($this->sushestvuet()) {
            $Ssilka = new ElementSsilka();
            $Ssilka->poluchitOsnovnuyuSsilkuElementa($this->poluchitSvoystvo('id'), $_STRANICI_SAYTA);
            return $Ssilka->poluchitSvoystvo('ssilka');
        }

    }

}

?>