<?

/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class ZaprosNaChteniye

protected $_OtvetNaZaprosAssociativniyMassiv;
protected $_KolichestvoStrokOtvetaNaZapros;
protected $_TextZaprosa;
protected $_ImyaBaziDannix;
protected $_ImyaServera;
protected $_ImyaPolzovatelya;
protected $_Parol;
protected $_OtvetNaZapros;
protected $_SsilkaSoedineniyaSBazoyDannix;

public ZaprosNaChteniye(string)
protected  this soedinitsyaSServerom()
protected this vibratBazuDannix()
protected this vipolnitZapros()
protected this zakritSoedineniyeSBazoyDannix()
public int poluchitKolichestvoStrokOtvetaNaZapros()
public array poluchitOtvetNaZaprosAssociativniyMassiv()
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

class ZaprosNaChteniye
{
    protected $_OtvetNaZaprosAssociativniyMassiv;
    protected $_KolichestvoStrokOtvetaNaZapros;
    protected $_TextZaprosa;
    protected $_ImyaBaziDannix;
    protected $_ImyaServera;
    protected $_ImyaPolzovatelya;
    protected $_Parol;
    protected $_OtvetNaZapros;
    protected $_SsilkaSoedineniyaSBazoyDannix;

    function ZaprosNaChteniye($TextZaprosa)
    {
//        print_r('db');
//print_r($TextZaprosa);
        //$this->_TextZaprosa = iconv("utf-8", "cp1251", $TextZaprosa);
        $this->_TextZaprosa=$TextZaprosa;
        $this->_ImyaBaziDannix = 'u3558310_filpan_utf8';
        $this->_ImyaServera = '127.0.0.1';
        $this->_ImyaPolzovatelya = 'u3558310_filpan_utf8';
        $this->_Parol = 'FilpanChislopi314';
//$this->_ImyaBaziDannix='u3558310_filpan';
//$this->_ImyaServera='127.0.0.1';
//$this->_ImyaPolzovatelya='root';
//$this->_Parol='';

        $this->soedinitsyaSServerom();
        $this->vibratBazuDannix();
        $this->vipolnitZapros();
        $this->zakritSoedineniyeSBazoyDannix();
    }

    protected function soedinitsyaSServerom()
    {
        $this->_SsilkaSoedineniyaSBazoyDannix = mysql_connect($this->_ImyaServera, $this->_ImyaPolzovatelya, $this->_Parol) or die("Невозможно подключение к серверу: " . mysql_error());
        mysql_query("SET NAMES 'utf8'", $this->_SsilkaSoedineniyaSBazoyDannix);
        //mysql_query("SET CHARACTER SET 'cp1251'", $this->_SsilkaSoedineniyaSBazoyDannix);
        mysql_query("SET character_set_server='utf8'", $this->_SsilkaSoedineniyaSBazoyDannix);
        mysql_query("SET collation_connection='utf8_general_ci'", $this->_SsilkaSoedineniyaSBazoyDannix);
        return $this;
    }

    protected function vibratBazuDannix()
    {
        mysql_select_db($this->_ImyaBaziDannix, $this->_SsilkaSoedineniyaSBazoyDannix) or die ('Невозможно подключение к базе данных ' . $this->_ImyaBaziDannix . ' : ' . mysql_error());
        return $this;
    }

    protected function vipolnitZapros()
    {

        try {
            $this->_OtvetNaZapros = mysql_query($this->_TextZaprosa, $this->_SsilkaSoedineniyaSBazoyDannix);
//            echo print_r($this->_TextZaprosa, true);
        } catch (Exception $e) {
            //print_r($e);
            die('Ошибка запроса 83 r' . $this->_TextZaprosa . ':' . $this->_ImyaBaziDannix . mysql_error());
        }

        if ($this->_OtvetNaZapros === true) {
            $this->_KolichestvoStrokOtvetaNaZapros = 0;
        } elseif ($this->_OtvetNaZapros === false) {
            die('Ошибка запроса 89 r' . $this->_TextZaprosa . ':' . $this->_ImyaBaziDannix . mysql_error());
        } else {
            $this->_KolichestvoStrokOtvetaNaZapros = mysql_num_rows($this->_OtvetNaZapros);

            $iterator = 0;
            while ($row = mysql_fetch_assoc($this->_OtvetNaZapros)) {
                $this->_OtvetNaZaprosAssociativniyMassiv[$iterator] = $row;

                $size = count($this->_OtvetNaZaprosAssociativniyMassiv[$iterator]);
                $keys = array_keys($this->_OtvetNaZaprosAssociativniyMassiv[$iterator]);

                for ($assoc_array_iterator = 0; $assoc_array_iterator < $size; $assoc_array_iterator++) {
//                    $this->_OtvetNaZaprosAssociativniyMassiv[$iterator][$keys[$assoc_array_iterator]] = iconv("cp1251", "utf-8", $this->_OtvetNaZaprosAssociativniyMassiv[$iterator][$keys[$assoc_array_iterator]]);
                    $this->_OtvetNaZaprosAssociativniyMassiv[$iterator][$keys[$assoc_array_iterator]] = $this->_OtvetNaZaprosAssociativniyMassiv[$iterator][$keys[$assoc_array_iterator]];
                }
                $iterator = $iterator + 1;
            }
        }
        return $this;
    }

    protected function zakritSoedineniyeSBazoyDannix()
    {
        mysql_close($this->_SsilkaSoedineniyaSBazoyDannix);
        return $this;
    }

    public function poluchitKolichestvoStrokOtvetaNaZapros()
    {
        return $this->_KolichestvoStrokOtvetaNaZapros;
    }

    public function poluchitOtvetNaZaprosAssociativniyMassiv()
    {
        return $this->_OtvetNaZaprosAssociativniyMassiv;
    }
}

?>
