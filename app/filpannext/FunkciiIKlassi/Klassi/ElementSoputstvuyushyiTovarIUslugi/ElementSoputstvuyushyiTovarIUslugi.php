<?

/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class ElementSoputstvuyushyiTovarIUslugi extends ElementSpiska

public ElementSoputstvuyushyiTovarIUslugi()
public this  poluchitPoSsilke()
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

Class ElementSoputstvuyushyiTovarIUslugi extends ElementSpiska
{

    function ElementSoputstvuyushyiTovarIUslugi()
    {
        $TablicaRoditel = 'filpan_new_soputstvuyushiye_tovari_uslugi';
        ElementSpiska::ElementSpiska($TablicaRoditel);
    }

    function sozdat($idTovaraUslugi, $idSoputstvuyushegoTOvara)
    {
        $MassivKriteriev = array();
        $MassivKriteriev['id_tovara_uslugi'] = $idTovaraUslugi;
        $MassivKriteriev['id_soputstvuyushego_tovara_uslugi'] = $idSoputstvuyushegoTOvara;
        $ProverkaNaSushestvovaniye = new ElementSpiska('filpan_new_soputstvuyushiye_tovari_uslugi');
        $ProverkaNaSushestvovaniye->poluchitPoKriteriyu($MassivKriteriev);

        if (!$ProverkaNaSushestvovaniye->sushestvuet()) {
            $this->izmenitSvoystvo('id_tovara_uslugi', $idTovaraUslugi);
            $this->izmenitSvoystvo('id_soputstvuyushego_tovara_uslugi', $idSoputstvuyushegoTOvara);
            $SoputstvuyushiyTovar = new ElementTovarovUslug();
            $SoputstvuyushiyTovar->poluchit($idSoputstvuyushegoTOvara);

            $this->izmenitSvoystvo('tip', $SoputstvuyushiyTovar->poluchitSvoystvo('tip'));
            $this->izmenitSvoystvo('podtip', $SoputstvuyushiyTovar->poluchitSvoystvo('podtip'));

            parent::sozdat();
        }

        $MassivKriteriev = array();
        $MassivKriteriev['id_tovara_uslugi'] = $idSoputstvuyushegoTOvara;
        $MassivKriteriev['id_soputstvuyushego_tovara_uslugi'] = $idTovaraUslugi;
        $ProverkaNaSushestvovaniye = new ElementSpiska('filpan_new_soputstvuyushiye_tovari_uslugi');
        $ProverkaNaSushestvovaniye->poluchitPoKriteriyu($MassivKriteriev);

        if (!$ProverkaNaSushestvovaniye->sushestvuet()) {
            $OtvetnayaStroka = new ElementSpiska('filpan_new_soputstvuyushiye_tovari_uslugi');
            $OtvetnayaStroka->izmenitSvoystvo('id_soputstvuyushego_tovara_uslugi', $idTovaraUslugi);
            $OtvetnayaStroka->izmenitSvoystvo('id_tovara_uslugi', $idSoputstvuyushegoTOvara);

            $SoputstvuyushiyTovar = new ElementTovarovUslug();
            $SoputstvuyushiyTovar->poluchit($idTovaraUslugi);
            $OtvetnayaStroka->izmenitSvoystvo('tip', $SoputstvuyushiyTovar->poluchitSvoystvo('tip'));
            $OtvetnayaStroka->izmenitSvoystvo('podtip', $SoputstvuyushiyTovar->poluchitSvoystvo('podtip'));

            $OtvetnayaStroka->sozdat();
        }
    }
}

?>