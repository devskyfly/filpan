<?

Class KategoriiSvoystv extends Spisok
{
    function KategoriiSvoystv()
    {
        $TablicaRoditel = 'filpan_new_kategorii_svoystv';
        Spisok::Spisok($TablicaRoditel);
    }
}

?>