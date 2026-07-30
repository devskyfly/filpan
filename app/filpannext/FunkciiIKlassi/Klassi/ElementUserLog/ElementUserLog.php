<?

/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class ElementUserLog extends ElementSpiska
$_Session_id;

public ElementUserLog()
public this zaregisrirovatUspeshniyVhod(string)
public this zaregisrirovatNeuspeshniyVhod(string)

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

Class ElementUserLog extends ElementSpiska
{
    protected $_Session_id;
    protected $_Korzina;

    function ElementUserLog()
    {
        //
        ini_set('session.save_path', '/tmp');
        //
        $res = session_start();
        global $_VIDI_LOCACIYA;

        $TablicaRoditel = 'filpan_new_user_log';
        $_Locaciya = $_VIDI_LOCACIYA['ofise'];
        ElementSpiska::ElementSpiska($TablicaRoditel);

        /*ini_set('display_errors',1);
        error_reporting(E_ALL & ~E_NOTICE  );*/

        $this->_Session_id = session_id();
        //echo "</br>";
        //print_r($this->_Session_id);
        /*echo "</br>";
        print_r(debug_print_backtrace() );*/

        //print_r(session_status());
        //print_r($this->_Session_id);


        if (!isset($_SESSION['Locaciya'])) {
            $_SESSION['Locaciya'] = $_VIDI_LOCACIYA['ofise'];
        }


    }

    public function zaregisrirovatUspeshniyVhod($ssilka)
    {
        $this->izmenitSvoystvo('session_id', session_id());
        $this->izmenitSvoystvo('data', date("Y-m-d h:i:s"));
        $this->izmenitSvoystvo('ssilka', $ssilka);
        $this->izmenitSvoystvo('uspeshno', 1);
        $this->izmenitSvoystvo('browser', $_SERVER['HTTP_USER_AGENT']);
        $this->izmenitSvoystvo('ip', $_SERVER['REMOTE_ADDR']);
        $this->sozdat();
        return $this;
    }

    public function zaregisrirovatNeuspeshniyVhod($ssilka)
    {
        $this->izmenitSvoystvo('session_id', session_id());
        $this->izmenitSvoystvo('data', date("Y-m-d h:i:s"));
        $this->izmenitSvoystvo('ssilka', $ssilka);
        $this->izmenitSvoystvo('uspeshno', 0);
        $this->izmenitSvoystvo('browser', $_SERVER['HTTP_USER_AGENT']);
        $this->izmenitSvoystvo('ip', $_SERVER['REMOTE_ADDR']);
        $this->sozdat();
        return $this;
    }

    function poluchitLocaciyu()
    {
        return $_SESSION['Locaciya'];
    }

    function LocaciyaOfise()
    {
        $_SESSION['Locaciya'] = $_VIDI_LOCACIYA['ofise'];
    }

    function LocaciyaViezd()
    {
        $_SESSION['Locaciya'] = $_VIDI_LOCACIYA['viezd'];
    }

    function DobavitNeskolkoTovarovVKorzinu($id, $kolichestvo)
    {

        $ElementKorzini = new ElementSpiska('filpan_new_korzina');
        $MassivKriteriyev = array();

        $MassivKriteriyev['session_id'] = $this->_Session_id;
        $MassivKriteriyev['tovar_usluga_id'] = $id;
        $ElementKorzini->poluchitPoKriteriyu($MassivKriteriyev);

        if ($ElementKorzini->sushestvuet()) {
            $kolichestvo = $ElementKorzini->poluchitSvoystvo('kolichestvo') + $kolichestvo;
            $ElementKorzini->izmenitSvoystvo('kolichestvo', $kolichestvo);
            //$MassivKriteriyev['date']=date("Y-m-d h:i:s");
            $ElementKorzini->sohranit();
        } else {
            $ElementKorzini->izmenitSvoystvo('kolichestvo', $kolichestvo);
            $ElementKorzini->izmenitSvoystvo('tovar_usluga_id', $id);
            $ElementKorzini->izmenitSvoystvo('session_id', $this->_Session_id);
            //$MassivKriteriyev['date']=date("Y-m-d h:i:s");
            $ElementKorzini->sozdat();
        }
    }

    function VxodVAdminku()
    {
// if(isset($_REQUEST['Admin'])&&isset($_REQUEST['Password']))
// {

        if (isset($_REQUEST['Admin'])
            && $_REQUEST['Admin'] == 'jarosss'
            && isset($_REQUEST['Password']) && $_REQUEST['Password'] == poluchitGlobalnoeSvoystvo('paroladminka')
            || $_SESSION['Admin'] == 'YaAdmin') {
            return true;
        } else {
            return false;
        }
// }
    }

    function ZaregistririvatAdmina()
    {
        $_SESSION['Admin'] = 'YaAdmin';

    }


    function IzmenitKolichestvoPokupok($id, $kolichestvo)
    {

        $ElementKorzini = new ElementSpiska('filpan_new_korzina');
        $MassivKriteriyev = array();
        $MassivKriteriyev['session_id'] = $this->_Session_id;
        $MassivKriteriyev['tovar_usluga_id'] = $id;
        $ElementKorzini->poluchitPoKriteriyu($MassivKriteriyev);

        if ($ElementKorzini->sushestvuet()) {
            $ElementKorzini->izmenitSvoystvo('kolichestvo', $kolichestvo);
            $ElementKorzini->sohranit();
        } else {

        }
    }


    function UdalitTovarIzKorzini($id)
    {

        $ElementKorzini = new ElementSpiska('filpan_new_korzina');
        $MassivKriteriyev = array();
        $MassivKriteriyev['session_id'] = $this->_Session_id;
        $MassivKriteriyev['tovar_usluga_id'] = $id;
        $ElementKorzini->poluchitPoKriteriyu($MassivKriteriyev);

        if ($ElementKorzini->sushestvuet()) {
            $ElementKorzini->udalit();
        } else {

        }

    }

    function OchistitKorzinu()
    {

        $Korzina = new Spisok('filpan_new_korzina');
        $MassivKriteriyev = array();
        $MassivKriteriyev['session_id'] = $this->_Session_id;

        $Korzina->udalitPoKriteriyu($MassivKriteriyev);
    }


    function PoluchitKorzinu()
    {

        $_Korzina = new Korzina();
//echo "PoluchitKorzinu".$this->_Session_id;
        $_Korzina->poluchitPokupkiPolzovateliya($this->_Session_id);

        return $_Korzina;
    }


    function PoluchitObshuyuSummu()
    {

        $_Korzina = new Korzina();
        $_Korzina->poluchitPokupkiPolzovateliya($this->_Session_id);


        $VsegokOplate = 0;
//echo "!!!".$_Korzina->poluchitKolichestvoElementovMassivaInformacii()."!!!";
        if ($_Korzina->poluchitKolichestvoElementovMassivaInformacii()) {
            while ($_Korzina->poluchitSleduyushiy()) {
                $Tovar = new ElementTovarovUslug();

                $Tovar->poluchit($_Korzina->_TekushiyElement['tovar_usluga_id']);

                $Cena = ElementTovarovUslug::poluchitCenuVRubliach($Tovar->poluchitSvoystvo('cena'), $Tovar->poluchitSvoystvo('valuta'));

                // $Cena=$Tovar->poluchitCenuVRubliachSZaprosomKObshemuSpisku();

                // echo $Cena;
                $Kolichestvo = $_Korzina->_TekushiyElement['kolichestvo'];
                // echo $Kolichestvo;

                $VsegokOplate += $Cena * $Kolichestvo;
                //echo "Cena".$Cena."Kolichestvo".$Kolichestvo	;
            }
            echo $VsegokOplate;
        } else {
            echo $VsegokOplate;
        }

    }

    function PoluchitObshuyuSummuIKolichestvo()
    {
        $_Korzina = new Korzina();
        $_Korzina->poluchitPokupkiPolzovateliya($this->_Session_id);

        $VsegokOplate = 0;
        $ObsheeKolichestvo = 0;

//echo "!!!".$_Korzina->poluchitKolichestvoElementovMassivaInformacii()."!!!";
        if ($_Korzina->poluchitKolichestvoElementovMassivaInformacii()) {
            while ($_Korzina->poluchitSleduyushiy()) {
                $Tovar = new ElementTovarovUslug();
                $Tovar->poluchit($_Korzina->_TekushiyElement['tovar_usluga_id']);
                $Cena = ElementTovarovUslug::poluchitCenuVRubliach($Tovar->poluchitSvoystvo('cena'), $Tovar->poluchitSvoystvo('valuta'));
                $Kolichestvo = $_Korzina->_TekushiyElement['kolichestvo'];
                $VsegokOplate += $Cena * $Kolichestvo;
                $ObsheeKolichestvo += $Kolichestvo;
            }
            return $ObsheeKolichestvo."==".$VsegokOplate;
        } else {
            return $ObsheeKolichestvo."==".$VsegokOplate;
        }

    }
}

?>