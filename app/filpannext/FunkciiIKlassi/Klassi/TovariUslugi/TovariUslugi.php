<?

/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class TovariUslugi extends Spisok

public TovariUslugi()
public poluchitSuperPredlogeniya()
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/


Class TovariUslugi extends Spisok
{

    function TovariUslugi()
    {
        $TablicaRoditel = 'filpan_new_tovari_uslugi';
        Spisok::Spisok($TablicaRoditel);
    }

    public function poluchitSuperPredlogeniya()
    {
        $MassivKriteriyev = array();
        $MassivKriteriyev['super'] = 1;
        $this->poluchitPoKriteriyu($MassivKriteriyev);
    }


    public function poluchitPoMassivuPoiska($MassivKriteriyev, $PoziciyVSpiske, $TekushayaPoziciya = 1)
    {
        //$UsloviyaZaprosa = preobrazovatMassivSlovVUsloviyePoiskovogoZaprosa($MassivKriteriyev);
        $UsloviyaZaprosa = preobrazovatMassivSlovVUsloviyePoiskovogoZaprosaNew($MassivKriteriyev);

        //
        $UsloviyaZaprosa.=" AND pokazyvat=1 ";
        //

        file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/debug.txt', print_r($UsloviyaZaprosa, true));
        $Zapros = new ZaprosNaChteniye(" SELECT COUNT( * ) as kolichestvo FROM " . $this->_TablicaRoditel . " where " . $UsloviyaZaprosa);
        $MassivOtveta = $Zapros->poluchitOtvetNaZaprosAssociativniyMassiv();
        $ObsheeKolichesvoElementovPoZaprosu = $MassivOtveta[0]['kolichestvo'];
        $this->_KolichestvoSsilokDliyaPerehodaPoSpisku = ceil($ObsheeKolichesvoElementovPoZaprosu / $PoziciyVSpiske);
        $TextZaprosa = 'select ' . $this->_Disrinct . ' ' . $this->_PoliyaZaprosa . ' from ' . $this->_TablicaRoditel . ' where ' . $UsloviyaZaprosa . ' ' . $this->_Order . ' LIMIT 0, 100';
        $ZaprosNaChteniye = new ZaprosNaChteniye($TextZaprosa);
        $this->_MassivInformacii = $ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();
        $this->_KolichestvoElementovMassivaInformacii = $ZaprosNaChteniye->poluchitKolichestvoStrokOtvetaNaZapros();
        return $this;
    }

    public function poluchitSoputstvueshiePoMassivuPoiska($MassivKriteriyev, $PoziciyVSpiske, $TekushayaPoziciya = 1)
    {
        $UsloviyaZaprosa = preobrazovatMassivSlovVUsloviyePoiskovogoZaprosaNew($MassivKriteriyev);

        if($MassivKriteriyev['IdElementa'])
        {
            $UsloviyaZaprosa.=" and id not in(".$MassivKriteriyev['IdElementa'].")";
        }

        if($MassivKriteriyev['IskatSredi'] && $MassivKriteriyev['IskatSredi']!=0)
        {
            $UsloviyaZaprosa.=" and podtip=".$MassivKriteriyev['IskatSredi'];
        }

        //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/debug.txt', print_r($UsloviyaZaprosa, true));

        $Zapros = new ZaprosNaChteniye(" SELECT COUNT( * ) as kolichestvo FROM " . $this->_TablicaRoditel . " where " . $UsloviyaZaprosa);
        $MassivOtveta = $Zapros->poluchitOtvetNaZaprosAssociativniyMassiv();
        $ObsheeKolichesvoElementovPoZaprosu = $MassivOtveta[0]['kolichestvo'];
        $this->_KolichestvoSsilokDliyaPerehodaPoSpisku = ceil($ObsheeKolichesvoElementovPoZaprosu / $PoziciyVSpiske);
        $TextZaprosa = 'select ' . $this->_Disrinct . ' ' . $this->_PoliyaZaprosa . ' from ' . $this->_TablicaRoditel . ' where ' . $UsloviyaZaprosa . ' ' . $this->_Order . ' LIMIT 0, 100';
        $ZaprosNaChteniye = new ZaprosNaChteniye($TextZaprosa);
        $this->_MassivInformacii = $ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();
        $this->_KolichestvoElementovMassivaInformacii = $ZaprosNaChteniye->poluchitKolichestvoStrokOtvetaNaZapros();
        return $this;
    }


    public function poluchitPoKriteriyuPoStranicam($MassivKriteriyev, $PoziciyVSpiske, $TekushayaPoziciya = 1, $pokazyvat = 1)
    {
        $UsloviyaZaprosa = preobrazovatMassivVINUsloviyeZaprosa($MassivKriteriyev, 'menu_id');

        if($pokazyvat==1)
        {
            $UsloviyaZaprosa.=" AND pokazyvat=1 ";
        }

        //print_r("  SELECT COUNT( * ) as kolichestvo FROM ".$this->_TablicaRoditel." where ".$UsloviyaZaprosa);
        $Zapros = new ZaprosNaChteniye(" SELECT COUNT( * ) as kolichestvo FROM " . $this->_TablicaRoditel . " where " . $UsloviyaZaprosa);

        $MassivOtveta = $Zapros->poluchitOtvetNaZaprosAssociativniyMassiv();
        $ObsheeKolichesvoElementovPoZaprosu = $MassivOtveta[0]['kolichestvo'];
        //print_r($ObsheeKolichesvoElementovPoZaprosu);
        $this->_KolichestvoSsilokDliyaPerehodaPoSpisku = ceil($ObsheeKolichesvoElementovPoZaprosu / $PoziciyVSpiske);
        //print_r($this->_KolichestvoSsilokDliyaPerehodaPoSpisku);
        //////////////

        $real_menu_id = end($MassivKriteriyev);

        //select the priority goods
        //print_r('SELECT item_id,ochered_vyvoda FROM filpan_new_priority_goods where menu_id=' . $real_menu_id . ' Order by ochered_vyvoda asc');
        $ZaprosPrioritetnyeTovary = new ZaprosNaChteniye('SELECT item_id,ochered_vyvoda FROM filpan_new_priority_goods where menu_id=' . $real_menu_id . ' Order by ochered_vyvoda asc limit 10');
        $PrioritetnyeTovaryKolichestvo = $ZaprosPrioritetnyeTovary->poluchitKolichestvoStrokOtvetaNaZapros();

        if ($PrioritetnyeTovaryKolichestvo > 0) {

            $MassivOtvetaPrioritetnyeTovaryIds = $ZaprosPrioritetnyeTovary->poluchitOtvetNaZaprosAssociativniyMassiv();

            foreach ($MassivOtvetaPrioritetnyeTovaryIds as $key => $data) {
                $idnotinarr[] = $data["item_id"];
            }

            $idnotin = implode(",", $idnotinarr);

            $ZaprosNaChteniye = new ZaprosNaChteniye('select ' . $this->_Disrinct . ' ' . $this->_PoliyaZaprosa . ' from ' . $this->_TablicaRoditel . ' where id in (' . $idnotin . ')');

            $MassivOtvetaPrioritetnyeTovary = $ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();


            $idnotinarrflip=array_flip($idnotinarr);

            foreach($MassivOtvetaPrioritetnyeTovary as $key=>$PrioritetnyTovar)
            {
                $NewMassivOtvetaPrioritetnyeTovary[$idnotinarrflip[$PrioritetnyTovar["id"]]]=$PrioritetnyTovar;
            }

            ksort($NewMassivOtvetaPrioritetnyeTovary);

            $MassivOtvetaPrioritetnyeTovary=$NewMassivOtvetaPrioritetnyeTovary;

            unset($idnotinarrflip);
            unset($NewMassivOtvetaPrioritetnyeTovary);

            $UsloviyaZaprosa .= " AND id NOT IN (" . $idnotin . ")";

            //If page №1
            if ($TekushayaPoziciya == 1) {
                $PoziciyVSpiske = $PoziciyVSpiske - $PrioritetnyeTovaryKolichestvo;
            }
        }

        //////////////
        //print_r($this->_KolichestvoSsilokDliyaPerehodaPoSpisku);
        $Limit1 = ($TekushayaPoziciya - 1) * $PoziciyVSpiske;
        $Limit2 = ($TekushayaPoziciya) * $PoziciyVSpiske - $Limit1;

        //////////////
        if ($PrioritetnyeTovaryKolichestvo > 0 && $TekushayaPoziciya > 1) {
            $Limit1 = $Limit1 - $PrioritetnyeTovaryKolichestvo;
            $Limit2 = $PoziciyVSpiske;
        }
        //////////////

        //echo sprintf('<pre>%s<br>%s<br>%s<br>%s<br>%s<br></pre>',$UsloviyaZaprosa,$TekushayaPoziciya,$PoziciyVSpiske,$Limit1,$Limit2);
        //print_r('select ' . $this->_Disrinct . ' ' . $this->_PoliyaZaprosa . ' from ' . $this->_TablicaRoditel . ' where ' . $UsloviyaZaprosa . ' ' . $this->_Order . ' LIMIT ' . $Limit1 . ', ' . $Limit2);
        $ZaprosNaChteniye = new ZaprosNaChteniye('select ' . $this->_Disrinct . ' ' . $this->_PoliyaZaprosa . ' from ' . $this->_TablicaRoditel . ' where ' . $UsloviyaZaprosa . ' ' . $this->_Order . ' LIMIT ' . $Limit1 . ', ' . $Limit2);
        $this->_MassivInformacii = $ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();

        $this->_KolichestvoElementovMassivaInformacii = $ZaprosNaChteniye->poluchitKolichestvoStrokOtvetaNaZapros();

        //////////////If page №1 AND ARRAY WITH PRIORITY GOODS NOT EMPTY!!!
        if ($TekushayaPoziciya == 1 && $MassivOtvetaPrioritetnyeTovary) {
            $this->_MassivInformacii = array_merge($MassivOtvetaPrioritetnyeTovary, $this->_MassivInformacii);
            $this->_KolichestvoElementovMassivaInformacii = $this->_KolichestvoElementovMassivaInformacii + $PrioritetnyeTovaryKolichestvo;
        }
        //////////////
        return $this;
    }
}

?>