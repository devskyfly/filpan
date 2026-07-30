<?

/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class ZaprosNaSozdaniye

protected $_IdentifikacionniyNomerSozdannogoElementa;
protected $_TextZaprosa;
protected $_ImyaBaziDannix;
protected $_ImyaServera;
protected $_ImyaPolzovatelya;
protected $_Parol;
protected $_OtvetNaZapros;
protected $_SsilkaSoedineniyaSBazoyDannix;

public ZaprosNaSozdaniye(string)
protected  $this soedinitsyaSServerom()
protected $this vibratBazuDannix()
protected $this vipolnitZapros()
protected $this zakritSoedineniyeSBazoyDannix()
public int poluchitIdentifikacionniyNomerSozdannogoElementa()
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

class ZaprosNaSozdaniye
{
    protected $_IdentifikacionniyNomerSozdannogoElementa;
    protected $_TextZaprosa;
    protected $_ImyaBaziDannix;
    protected $_ImyaServera;
    protected $_ImyaPolzovatelya;
    protected $_Parol;
    protected $_OtvetNaZapros;
    protected $_SsilkaSoedineniyaSBazoyDannix;

    function ZaprosNaSozdaniye($TextZaprosa)
    {
//print_r($TextZaprosa);
        $this->_TextZaprosa = $TextZaprosa;
        $this->_ImyaBaziDannix = 'u3558310_filpan_utf8';
        $this->_ImyaServera = 'db';
        $this->_ImyaPolzovatelya = 'u3558310_filpan_utf8';
        $this->_Parol = 'FilpanChislopi314';
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
//echo $this->_TextZaprosa.'!!!';
        //$this->_TextZaprosa = iconv("utf-8", "cp1251", $this->_TextZaprosa);
        $this->_OtvetNaZapros = mysql_query($this->_TextZaprosa, $this->_SsilkaSoedineniyaSBazoyDannix);
        if ($this->_OtvetNaZapros === true) {
            $this->_IdentifikacionniyNomerSozdannogoElementa = mysql_insert_id();
        } elseif ($this->_OtvetNaZapros === false) {
            die('Ошибка запроса 76 s' . $this->_TextZaprosa . ':' . $this->_ImyaBaziDannix . mysql_error());
        } else {
            die('Ошибка запроса 78 s' . $this->_TextZaprosa . ':' . $this->_ImyaBaziDannix . mysql_error());
        }
        return $this;
    }

    protected function zakritSoedineniyeSBazoyDannix()
    {
        mysql_close($this->_SsilkaSoedineniyaSBazoyDannix);
        return $this;
    }

    public function poluchitIdentifikacionniyNomerSozdannogoElementa()
    {
        return $this->_IdentifikacionniyNomerSozdannogoElementa;
    }
}

?>
