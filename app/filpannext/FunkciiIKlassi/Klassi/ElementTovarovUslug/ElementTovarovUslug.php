<?

/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class ElementTovarovUslug extends ElementSpiska

public ElementTovarovUslug()
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

Class ElementTovarovUslug extends ElementSpiska
{

    function ElementTovarovUslug()
    {
        global $_VIDI_STRANIC;
        $this->_TablicaId = $_VIDI_STRANIC['filpan_tovari_uslugi'];
        $this->_TablicaKartForPrint = $_VIDI_STRANIC['kartrigi_dlya_printera'];
        $TablicaRoditel = 'filpan_new_tovari_uslugi';
        ElementSpiska::ElementSpiska($TablicaRoditel);
    }


    function poluchitNazvaniyeOsnovnoyKartinki()
    {
        if ($this->sushestvuet()) {
            $Picture = new ElementPicture();
            $Picture->poluchitOsnovnuyuKartinkuElementa($this->poluchitSvoystvo('id'));
            return $Picture->poluchitSvoystvo('imiya_fayla');
        }
    }


    public function udalitSsilkiNaElement()
    {
        global $_VIDI_STRANIC;
        $Ssilki = new Ssilki();
        $_MassivKriteriev = array();

///
        if ($this->poluchitSvoystvo('tip') == 3) {
            $_MassivKriteriev['tablica_id'] = $_VIDI_STRANIC['kartrigi_dlya_printera'];
        } else {
            $_MassivKriteriev['tablica_id'] = $_VIDI_STRANIC['filpan_tovari_uslugi'];
        }
///


        $_MassivKriteriev['id_tablici'] = $this->poluchitSvoystvo('id');
        $Ssilki->udalitPoKriteriyu($_MassivKriteriev);
    }


    public function dobavitSsilku($Ssilka, $Osnovnaya)
    {
        global $_VIDI_STRANIC;
        $ElementSsilka = new ElementSsilka();
///
        if ($this->poluchitSvoystvo('tip') == 3) {
            $ElementSsilka->izmenitSvoystvo('tablica_id', $_VIDI_STRANIC['kartrigi_dlya_printera']);
        } else {
            $ElementSsilka->izmenitSvoystvo('tablica_id', $_VIDI_STRANIC['filpan_tovari_uslugi']);
        }
///
        $ElementSsilka->izmenitSvoystvo('id_tablici', $this->poluchitSvoystvo('id'));
        $ElementSsilka->izmenitSvoystvo('ssilka', $Ssilka);
        $ElementSsilka->izmenitSvoystvo('osnovnaya', $Osnovnaya);

        $ElementSsilka->sozdat();

        If ($Osnovnaya == 1) {
            $this->izmenitSvoystvo('ssilka', $Ssilka);
            $this->sohranit();
        }
    }


    function poluchitCenuVRubliachSZaprosomKObshemuSpisku()
    {
        global $_VALUTA;
        if ($this->sushestvuet()) {
            $Cena = new ElementCena();
            $Cena->poluchit($this->poluchitSvoystvo('id'), $_SESSION['Locaciya'], 1);
            if ($Cena->poluchitSvoystvo('valuta') == $_VALUTA['dol']) {
                $KursValut = New ElementSpiska('filpan_new_kursi_valut');
                $MassivKriteriev = array();
                $MassivKriteriev['id'] = 1;
                $KursValut->poluchitPoKriteriyu($MassivKriteriev);

                $CenaVRubliah = $Cena->poluchitSvoystvo('cena') * $KursValut->poluchitSvoystvo('kurs');
                $CenaVRubliah = ceil($CenaVRubliah / 10) * 10;
            } else {
                $CenaVRubliah = $Cena->poluchitSvoystvo('cena');
            }


            return $CenaVRubliah;
        }

    }


    function poluchitCenuVRubliach($Cena, $Valuta)
    {
        global $_VALUTA;
//echo $_VALUTA['dol'].'---'.$Valuta;
        if ($Valuta == $_VALUTA['dol']) {
            $KursValut = New ElementSpiska('filpan_new_kursi_valut');
            $MassivKriteriev = array();
            $MassivKriteriev['id'] = 1;
            $KursValut->poluchitPoKriteriyu($MassivKriteriev);
            $CenaVRubliah = $Cena * $KursValut->poluchitSvoystvo('kurs');
            $CenaVRubliah = ceil($CenaVRubliah / 10) * 10;
        } else {
            $CenaVRubliah = $Cena;
        }


        return $CenaVRubliah;


    }


    function poluchitCenuVDollarah($Cena, $Valuta)
    {
        global $_VALUTA;
//echo $_VALUTA['dol'].'---'.$Valuta;
        if ($Valuta == $_VALUTA['rub']) {
            $KursValut = New ElementSpiska('filpan_new_kursi_valut');
            $MassivKriteriev = array();
            $MassivKriteriev['id'] = 1;
            $KursValut->poluchitPoKriteriyu($MassivKriteriev);
            $CenaVRubliah = ceil($Cena / $KursValut->poluchitSvoystvo('kurs') * 100) / 100;
        } else {
            $CenaVRubliah = $Cena;
        }


        return $CenaVRubliah;


    }
}

?>