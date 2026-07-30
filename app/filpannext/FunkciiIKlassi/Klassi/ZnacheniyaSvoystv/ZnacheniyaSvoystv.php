<?

Class ZnacheniyaSvoystv extends Spisok
{
    function ZnacheniyaSvoystv()
    {
        $TablicaRoditel = 'filpan_new_znacheniya_svoystv';
        Spisok::Spisok($TablicaRoditel);
    }
}

?>