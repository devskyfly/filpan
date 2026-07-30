<?

/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class Menu extends IerarhicheskiySpisok

public Menu()
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

Class Menu extends IerarhicheskiySpisok
{
    function Menu()
    {
        $TablicaRoditel = 'filpan_new_menu';
        IerarhicheskiySpisok::IerarhicheskiySpisok($TablicaRoditel);
    }


    public function poluchitSleduyushiy()
    {
        $this->_PosledniyElementVpodgruppe = false;
        $this->_PerviyElementVpodgruppe = false;
        $perehod = false;
        if ($this->_UrovenVlogennostiElementa == (-1)) {
            $this->_UrovenVlogennostiElementa = 0;

            $this->_TekushiyNomerRoditelya[$this->_UrovenVlogennostiElementa] = 0;
            $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa] = new Spisok($this->_TablicaRoditel);
            if ($this->_PoliyaZaprosa != '') {
                $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->vibratPoliya('id, roditel, nazvanie, ssilka ' . $this->_PoliyaZaprosa);
            }
            $MassivKriteriev = array();
            $MassivKriteriev['roditel'] = $this->_TekushiyNomerRoditelya[$this->_UrovenVlogennostiElementa];
            $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitPoKriteriyu($MassivKriteriev);
            $this->_KolichestvoElementovTekusheyPodgruppi[$this->_UrovenVlogennostiElementa] = $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitKolichestvoElementovMassivaInformacii();
        }

        if ($this->_KolichestvoElementovTekusheyPodgruppi[$this->_UrovenVlogennostiElementa] > 0) {
            if ($this->_FlagPerehodaPoPodruppe == true) {
                $perehod = true;
                $this->_FlagPerehodaPoPodruppe = false;
                $this->_UrovenVlogennostiElementa = $this->_UrovenVlogennostiElementa + 1;
                $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa] = new Spisok($this->_TablicaRoditel);
                if ($this->_PoliyaZaprosa != '') {
                    $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->vibratPoliya('id, roditel, nazvanie, ssilka ' . $this->_PoliyaZaprosa);
                }
                $MassivKriteriev = array();
                $MassivKriteriev['roditel'] = $this->_TekushiyElement['id'];
                $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitPoKriteriyu($MassivKriteriev);
                $this->_TekushiyNomerRoditelya[$this->_UrovenVlogennostiElementa] = $this->_TekushiyElement['id'];
                $this->_KolichestvoElementovTekusheyPodgruppi[$this->_UrovenVlogennostiElementa] = $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitKolichestvoElementovMassivaInformacii();
            }

            $RezultatPopitkiPerehoda = $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitSleduyushiy();
            if ($RezultatPopitkiPerehoda == false && $this->_FlagPerehodaPoPodruppe == false) {
                if ($this->_UrovenVlogennostiElementa == 0) {
                    $this->_UrovenVlogennostiElementa = $this->_UrovenVlogennostiElementa - 2;
                } else {
                    while ($this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa] == ($this->_KolichestvoElementovTekusheyPodgruppi[$this->_UrovenVlogennostiElementa] - 1)) {
                        if ($this->_UrovenVlogennostiElementa == 0) {
                            $this->_UrovenVlogennostiElementa = $this->_UrovenVlogennostiElementa - 2;
                            break;
                        }
                        $this->_UrovenVlogennostiElementa = $this->_UrovenVlogennostiElementa - 1;
                        $RezultatPopitkiPerehoda = $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->poluchitSleduyushiy();
                    }
                }
                if ($this->_UrovenVlogennostiElementa == (-2)) {
                    return false;
                }

            }


            if ($RezultatPopitkiPerehoda == true) {
                $this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa] = $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->PoluchitTekushiyNomerElementa();
                $this->_TekushiyElement = $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->_TekushiyElement;

                if ($perehod == true) {
                    $this->_PerehodOsushestvlen = true;
                } else {
                    $this->_PerehodOsushestvlen = false;
                }

                $VremennayaPodgruppa = new Spisok($this->_TablicaRoditel);
                $MassivKriteriev = array();
                $MassivKriteriev['roditel'] = $this->_TekushiyElement['id'];
                $VremennayaPodgruppa->vibratPoliya('id, roditel, nazvanie, ssilka ' . $this->_PoliyaZaprosa);
                $VremennayaPodgruppa->poluchitPoKriteriyu($MassivKriteriev);

                if ($VremennayaPodgruppa->poluchitKolichestvoElementovMassivaInformacii() > 0) {
                    $this->_FlagPerehodaPoPodruppe = true;
                    $VremennayaPodgruppa->poluchitKolichestvoElementovMassivaInformacii();
                    //$this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->_TekushiyElement['perehod']=true;
                } else {
                    // $this->_TekushayaPodgruppaElementov[$this->_UrovenVlogennostiElementa]->_TekushiyElement['perehod']=false;
                }


                if (($this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa] == 0) && ($this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa] == ($this->_KolichestvoElementovTekusheyPodgruppi[$this->_UrovenVlogennostiElementa] - 1))) {
                    $this->_PosledniyElementVpodgruppe = true;
                    $this->_PerviyElementVpodgruppe = true;
                    //  echo "1-y";
                } elseif ($this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa] == 0) {
                    $this->_PerviyElementVpodgruppe = true;
                    //echo "1-y";
                } elseif ($this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa] == ($this->_KolichestvoElementovTekusheyPodgruppi[$this->_UrovenVlogennostiElementa] - 1)) {
                    //echo "2-y";
                    $this->_PosledniyElementVpodgruppe = true;
                } else {
                    $this->_PosledniyElementVpodgruppe = false;
                    $this->_PerviyElementVpodgruppe = false;
                    //  echo $this->_TekushiyNomerElementa[$this->_UrovenVlogennostiElementa];
                }
                return true;
            }
        }

    }


    public function vivestiDerevom($IdTekushegoElementa)
    {
        global $_STRANICI_SAYTA;

        $StekOkonchaniya = array();
        $iterator = 0;

        while ($this->poluchitSleduyushiy()) {
            //$ElementSpiska=new ElementSpiska($this->_TablicaRoditel);
            //print_r($this->_TablicaRoditel);
            //$ElementSpiska->vibratPoliya('id');
            //$ElementSpiska->poluchit($this->_TekushiyElement['id']);
            //print_r($this->_TekushiyElement['id']);

            //$OsnovnayaSsilka=$ElementSpiska->poluchitOsnovnuyuSsilku($_STRANICI_SAYTA['filpan_new_menu']);
            //print_r($OsnovnayaSsilka);
            //echo $iterator."<br>";
            $UrovenVlogennosti = $this->poluchitUrovenVlogennosti();
            $UVL = $UrovenVlogennosti;


            if ($UrovenVlogennosti > $this->_KolichestvoOpisannixUrovneyVlogennosti) {
                $UrovenVlogennosti = $this->_KolichestvoOpisannixUrovneyVlogennosti;
            }
            //echo $UrovenVlogennosti."<br>";
            $iterator++;


            if ($this->perehodOsushestvlen()) {
                //echo "perehodOsushestvlen";
                array_push($StekOkonchaniya, $this->_UL[$UrovenVlogennosti]['k']);
            }
            if ($this->perviy() && $this->posledniy()) {

                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['nazvanie']);
                } else {
                    echo $this->_UL[$UrovenVlogennosti]['n'];
                    echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['ssilka'], $this->_TekushiyElement['nazvanie']);
                }
                if ($this->perehodPoPodruppe() == false) {
                    //echo $this->_TekushiyNomerElementa[$UVL]-$this->_KolichestvoElementovTekusheyPodgruppi[$UVL];
                    while ($this->_TekushiyNomerElementa[$UVL] == ($this->_KolichestvoElementovTekusheyPodgruppi[$UVL] - 1)) {
                        echo array_pop($StekOkonchaniya);
                        $UVL = $UVL - 1;
                        if ($UVL == 0) {
                            echo $this->_DIV[0]['k'];
                        }
                    }
                }

            } elseif ($this->perviy()) {
                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['nazvanie']);
                } else {


                    if ($IdTekushegoElementa == $this->_TekushiyElement['id']) {
                        echo $this->_UL[$UrovenVlogennosti]['n'];
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n_aktivnay'], $this->_TekushiyElement['id'], $this->_TekushiyElement['ssilka'], $this->_TekushiyElement['nazvanie']);
                    } else {
                        echo $this->_UL[$UrovenVlogennosti]['n'];
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['ssilka'], $this->_TekushiyElement['nazvanie']);
                    }
                }
            } elseif ($this->posledniy()) {

                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['nazvanie']);
                } else {
                    if ($IdTekushegoElementa == $this->_TekushiyElement['id']) {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n_aktivnay'], $this->_TekushiyElement['id'], $this->_TekushiyElement['ssilka'], $this->_TekushiyElement['nazvanie']);
                    } else {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['ssilka'], $this->_TekushiyElement['nazvanie']);
                    }
                }
                if ($this->perehodPoPodruppe() == false) {
                    //echo $this->_TekushiyNomerElementa[$UVL]-$this->_KolichestvoElementovTekusheyPodgruppi[$UVL];
                    while ($this->_TekushiyNomerElementa[$UVL] == ($this->_KolichestvoElementovTekusheyPodgruppi[$UVL] - 1)) {
                        echo array_pop($StekOkonchaniya);
                        $UVL = $UVL - 1;
                        if ($UVL == 0) {
                            echo $this->_DIV[0]['k'];
                        }
                    }
                }


            } else {

                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['nazvanie']);
                } else {
                    if ($IdTekushegoElementa == $this->_TekushiyElement['id']) {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n_aktivnay'], $this->_TekushiyElement['id'], $this->_TekushiyElement['ssilka'], $this->_TekushiyElement['nazvanie']);
                    } else {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['ssilka'], $this->_TekushiyElement['nazvanie']);
                    }

                }
            }


        }
    }


    public function vivestiDerevomDliyaRedaktirovaniya($IdTekushegoElementa)
    {
        global $_STRANICI_SAYTA;

        $StekOkonchaniya = array();
        $iterator = 0;

        while ($this->poluchitSleduyushiy()) {
            //$ElementSpiska=new ElementSpiska($this->_TablicaRoditel);
            //print_r($this->_TablicaRoditel);
            //$ElementSpiska->vibratPoliya('id');
            //$ElementSpiska->poluchit($this->_TekushiyElement['id']);
            //print_r($this->_TekushiyElement['id']);

            //$OsnovnayaSsilka=$ElementSpiska->poluchitOsnovnuyuSsilku($_STRANICI_SAYTA['filpan_new_menu']);
            //print_r($OsnovnayaSsilka);
            //echo $iterator."<br>";
            $UrovenVlogennosti = $this->poluchitUrovenVlogennosti();
            $UVL = $UrovenVlogennosti;


            if ($UrovenVlogennosti > $this->_KolichestvoOpisannixUrovneyVlogennosti) {
                $UrovenVlogennosti = $this->_KolichestvoOpisannixUrovneyVlogennosti;
            }
            //echo $UrovenVlogennosti."<br>";
            $iterator++;


            if ($this->perehodOsushestvlen()) {
                //echo "perehodOsushestvlen";
                array_push($StekOkonchaniya, $this->_UL[$UrovenVlogennosti]['k']);
            }
            if ($this->perviy() && $this->posledniy()) {

                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie']);
                } else {
                    echo $this->_UL[$UrovenVlogennosti]['n'];
                    echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], "?id=" . $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie'], "?id=" . $this->_TekushiyElement['id']);
                }
                if ($this->perehodPoPodruppe() == false) {
                    //echo $this->_TekushiyNomerElementa[$UVL]-$this->_KolichestvoElementovTekusheyPodgruppi[$UVL];
                    while ($this->_TekushiyNomerElementa[$UVL] == ($this->_KolichestvoElementovTekusheyPodgruppi[$UVL] - 1)) {
                        echo array_pop($StekOkonchaniya);
                        $UVL = $UVL - 1;
                        if ($UVL == 0) {
                            echo $this->_DIV[0]['k'];
                        }
                    }
                }

            } elseif ($this->perviy()) {
                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie']);
                } else {


                    if ($IdTekushegoElementa == $this->_TekushiyElement['id']) {
                        echo $this->_UL[$UrovenVlogennosti]['n'];
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n_aktivnay'], $this->_TekushiyElement['id'], "?id=" . $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie'], "?id=" . $this->_TekushiyElement['id']);
                    } else {
                        echo $this->_UL[$UrovenVlogennosti]['n'];
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], "?id=" . $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie'], "?id=" . $this->_TekushiyElement['id']);
                    }
                }
            } elseif ($this->posledniy()) {

                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie']);
                } else {
                    if ($IdTekushegoElementa == $this->_TekushiyElement['id']) {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n_aktivnay'], $this->_TekushiyElement['id'], "?id=" . $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie'], "?id=" . $this->_TekushiyElement['id']);
                    } else {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], "?id=" . $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie'], "?id=" . $this->_TekushiyElement['id']);
                    }
                }
                if ($this->perehodPoPodruppe() == false) {
                    //echo $this->_TekushiyNomerElementa[$UVL]-$this->_KolichestvoElementovTekusheyPodgruppi[$UVL];
                    while ($this->_TekushiyNomerElementa[$UVL] == ($this->_KolichestvoElementovTekusheyPodgruppi[$UVL] - 1)) {
                        echo array_pop($StekOkonchaniya);
                        $UVL = $UVL - 1;
                        if ($UVL == 0) {
                            echo $this->_DIV[0]['k'];
                        }
                    }
                }


            } else {

                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie']);
                } else {
                    if ($IdTekushegoElementa == $this->_TekushiyElement['id']) {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n_aktivnay'], $this->_TekushiyElement['id'], "?id=" . $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie'], "?id=" . $this->_TekushiyElement['id']);
                    } else {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], "?id=" . $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie'], "?id=" . $this->_TekushiyElement['id']);
                    }

                }
            }


        }
    }


    public function vivestiDerevomDliyaRedaktirovaniyaSoputstvuyushixTovarov($IdTekushegoElementa)
    {
        global $_STRANICI_SAYTA;

        $StekOkonchaniya = array();
        $iterator = 0;

        while ($this->poluchitSleduyushiy()) {
            //$ElementSpiska=new ElementSpiska($this->_TablicaRoditel);
            //print_r($this->_TablicaRoditel);
            //$ElementSpiska->vibratPoliya('id');
            //$ElementSpiska->poluchit($this->_TekushiyElement['id']);
            //print_r($this->_TekushiyElement['id']);

            //$OsnovnayaSsilka=$ElementSpiska->poluchitOsnovnuyuSsilku($_STRANICI_SAYTA['filpan_new_menu']);
            //print_r($OsnovnayaSsilka);
            //echo $iterator."<br>";
            $UrovenVlogennosti = $this->poluchitUrovenVlogennosti();
            $UVL = $UrovenVlogennosti;


            if ($UrovenVlogennosti > $this->_KolichestvoOpisannixUrovneyVlogennosti) {
                $UrovenVlogennosti = $this->_KolichestvoOpisannixUrovneyVlogennosti;
            }
            //echo $UrovenVlogennosti."<br>";
            $iterator++;


            if ($this->perehodOsushestvlen()) {
                //echo "perehodOsushestvlen";
                array_push($StekOkonchaniya, $this->_UL[$UrovenVlogennosti]['k']);
            }
            if ($this->perviy() && $this->posledniy()) {

                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie']);
                } else {
                    echo $this->_UL[$UrovenVlogennosti]['n'];
                    echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'],

                        $this->_TekushiyElement['nazvanie']);
                }
                if ($this->perehodPoPodruppe() == false) {
                    //echo $this->_TekushiyNomerElementa[$UVL]-$this->_KolichestvoElementovTekusheyPodgruppi[$UVL];
                    while ($this->_TekushiyNomerElementa[$UVL] == ($this->_KolichestvoElementovTekusheyPodgruppi[$UVL] - 1)) {
                        echo array_pop($StekOkonchaniya);
                        $UVL = $UVL - 1;
                        if ($UVL == 0) {
                            echo $this->_DIV[0]['k'];
                        }
                    }
                }

            } elseif ($this->perviy()) {
                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie']);
                } else {


                    if ($IdTekushegoElementa == $this->_TekushiyElement['id']) {
                        echo $this->_UL[$UrovenVlogennosti]['n'];
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n_aktivnay'], $this->_TekushiyElement['id'],

                            $this->_TekushiyElement['nazvanie']);
                    } else {
                        echo $this->_UL[$UrovenVlogennosti]['n'];
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'],

                            $this->_TekushiyElement['nazvanie']);
                    }
                }
            } elseif ($this->posledniy()) {

                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie']);
                } else {
                    if ($IdTekushegoElementa == $this->_TekushiyElement['id']) {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n_aktivnay'], $this->_TekushiyElement['id'],

                            $this->_TekushiyElement['nazvanie']);
                    } else {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'],

                            $this->_TekushiyElement['nazvanie']);
                    }
                }
                if ($this->perehodPoPodruppe() == false) {
                    //echo $this->_TekushiyNomerElementa[$UVL]-$this->_KolichestvoElementovTekusheyPodgruppi[$UVL];
                    while ($this->_TekushiyNomerElementa[$UVL] == ($this->_KolichestvoElementovTekusheyPodgruppi[$UVL] - 1)) {
                        echo array_pop($StekOkonchaniya);
                        $UVL = $UVL - 1;
                        if ($UVL == 0) {
                            echo $this->_DIV[0]['k'];
                        }
                    }
                }


            } else {

                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie']);
                } else {
                    if ($IdTekushegoElementa == $this->_TekushiyElement['id']) {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n_aktivnay'], $this->_TekushiyElement['id'],

                            $this->_TekushiyElement['nazvanie']);
                    } else {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'],

                            $this->_TekushiyElement['nazvanie']);
                    }

                }
            }


        }
    }


    public function vivestiDerevomDliyaRedaktirovaniyaMenuIRazdelow($IdTekushegoElementa)
    {
        global $_STRANICI_SAYTA;

        $StekOkonchaniya = array();
        $iterator = 0;

        while ($this->poluchitSleduyushiy()) {
            //$ElementSpiska=new ElementSpiska($this->_TablicaRoditel);
            //print_r($this->_TablicaRoditel);
            //$ElementSpiska->vibratPoliya('id');
            //$ElementSpiska->poluchit($this->_TekushiyElement['id']);
            //print_r($this->_TekushiyElement['id']);

            //$OsnovnayaSsilka=$ElementSpiska->poluchitOsnovnuyuSsilku($_STRANICI_SAYTA['filpan_new_menu']);
            //print_r($OsnovnayaSsilka);
            //echo $iterator."<br>";
            $UrovenVlogennosti = $this->poluchitUrovenVlogennosti();
            $UVL = $UrovenVlogennosti;


            if ($UrovenVlogennosti > $this->_KolichestvoOpisannixUrovneyVlogennosti) {
                $UrovenVlogennosti = $this->_KolichestvoOpisannixUrovneyVlogennosti;
            }
            //echo $UrovenVlogennosti."<br>";
            $iterator++;


            if ($this->perehodOsushestvlen()) {
                //echo "perehodOsushestvlen";
                array_push($StekOkonchaniya, $this->_UL[$UrovenVlogennosti]['k']);
            }
            if ($this->perviy() && $this->posledniy()) {

                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['nazvanie']);
                } else {
                    echo $this->_UL[$UrovenVlogennosti]['n'];
                    echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], "?id=" . $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie']);
                }
                if ($this->perehodPoPodruppe() == false) {
                    //echo $this->_TekushiyNomerElementa[$UVL]-$this->_KolichestvoElementovTekusheyPodgruppi[$UVL];
                    while ($this->_TekushiyNomerElementa[$UVL] == ($this->_KolichestvoElementovTekusheyPodgruppi[$UVL] - 1)) {
                        echo array_pop($StekOkonchaniya);
                        $UVL = $UVL - 1;
                        if ($UVL == 0) {
                            echo $this->_DIV[0]['k'];
                        }
                    }
                }

            } elseif ($this->perviy()) {
                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['nazvanie']);
                } else {


                    if ($IdTekushegoElementa == $this->_TekushiyElement['id']) {
                        echo $this->_UL[$UrovenVlogennosti]['n'];
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n_aktivnay'], $this->_TekushiyElement['id'], "?id=" . $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie']);
                    } else {
                        echo $this->_UL[$UrovenVlogennosti]['n'];
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], "?id=" . $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie']);
                    }
                }
            } elseif ($this->posledniy()) {

                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['nazvanie']);
                } else {
                    if ($IdTekushegoElementa == $this->_TekushiyElement['id']) {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n_aktivnay'], $this->_TekushiyElement['id'], "?id=" . $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie']);
                    } else {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], "?id=" . $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie']);
                    }
                }
                if ($this->perehodPoPodruppe() == false) {
                    //echo $this->_TekushiyNomerElementa[$UVL]-$this->_KolichestvoElementovTekusheyPodgruppi[$UVL];
                    while ($this->_TekushiyNomerElementa[$UVL] == ($this->_KolichestvoElementovTekusheyPodgruppi[$UVL] - 1)) {
                        echo array_pop($StekOkonchaniya);
                        $UVL = $UVL - 1;
                        if ($UVL == 0) {
                            echo $this->_DIV[0]['k'];
                        }
                    }
                }


            } else {

                if ($UrovenVlogennosti == 0) {
                    echo sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['nazvanie']);
                } else {
                    if ($IdTekushegoElementa == $this->_TekushiyElement['id']) {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n_aktivnay'], $this->_TekushiyElement['id'], "?id=" . $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie']);
                    } else {
                        echo sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], "?id=" . $this->_TekushiyElement['id'], $this->_TekushiyElement['nazvanie']);
                    }

                }
            }


        }
    }


    public function vivestiDerevomVFail($IdTekushegoElementa)
    {
        global $_STRANICI_SAYTA;
        $StekOkonchaniya = array();
        $iterator = 0;
        $MenuString="";

        while ($this->poluchitSleduyushiy()) {

            //$ElementSpiska=new ElementSpiska($this->_TablicaRoditel);
            //print_r($this->_TablicaRoditel);
            //$ElementSpiska->vibratPoliya('id');
            //$ElementSpiska->poluchit($this->_TekushiyElement['id']);
            //print_r($this->_TekushiyElement['id']);

            //$OsnovnayaSsilka=$ElementSpiska->poluchitOsnovnuyuSsilku($_STRANICI_SAYTA['filpan_new_menu']);
            //print_r($OsnovnayaSsilka);
            //echo $iterator."<br>";
            $UrovenVlogennosti = $this->poluchitUrovenVlogennosti();
            $UVL = $UrovenVlogennosti;

            if ($UrovenVlogennosti > $this->_KolichestvoOpisannixUrovneyVlogennosti) {
                $UrovenVlogennosti = $this->_KolichestvoOpisannixUrovneyVlogennosti;
            }
            //echo $UrovenVlogennosti."<br>";
            $iterator++;


            //Служебные не выводим
            if($this->_TekushiyElement['sluzhebnoe']==1)
            {
                    if ($this->perehodPoPodruppe() == false) {
                        while ($this->_TekushiyNomerElementa[$UVL] == ($this->_KolichestvoElementovTekusheyPodgruppi[$UVL] - 1)) {
                            $UVL = $UVL - 1;
                            if ($UVL == 0) {
                                $MenuString .= $this->_DIV[0]['k'];
                            }
                        }
                    }

                continue;
            }
            //

            if ($this->perehodOsushestvlen()) {
                //echo "perehodOsushestvlen";
                array_push($StekOkonchaniya, $this->_UL[$UrovenVlogennosti]['k']);
            }
            if ($this->perviy() && $this->posledniy()) {

                if ($UrovenVlogennosti == 0) {
                    $MenuString .= sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['nazvanie']);
                } else {
                    $MenuString .= $this->_UL[$UrovenVlogennosti]['n'];
                    $MenuString .= sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['ssilka'], $this->_TekushiyElement['nazvanie']);
                }
                if ($this->perehodPoPodruppe() == false) {
                    //echo $this->_TekushiyNomerElementa[$UVL]-$this->_KolichestvoElementovTekusheyPodgruppi[$UVL];
                    while ($this->_TekushiyNomerElementa[$UVL] == ($this->_KolichestvoElementovTekusheyPodgruppi[$UVL] - 1)) {
                        $MenuString .= array_pop($StekOkonchaniya);
                        $UVL = $UVL - 1;
                        if ($UVL == 0) {
                            $MenuString .= $this->_DIV[0]['k'];
                        }
                    }
                }
            } elseif ($this->perviy()) {
                if ($UrovenVlogennosti == 0) {
                    $MenuString .= sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['nazvanie']);
                } else {
                    if ($IdTekushegoElementa == $this->_TekushiyElement['id']) {
                        $MenuString .= $this->_UL[$UrovenVlogennosti]['n'];
                        $MenuString .= sprintf($this->_LI[$UrovenVlogennosti]['n_aktivnay'], $this->_TekushiyElement['id'], $this->_TekushiyElement['ssilka'], $this->_TekushiyElement['nazvanie']);
                    } else {
                        $MenuString .= $this->_UL[$UrovenVlogennosti]['n'];
                        $MenuString .= sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['ssilka'], $this->_TekushiyElement['nazvanie']);
                    }
                }
            } elseif ($this->posledniy()) {

                if ($UrovenVlogennosti == 0) {
                    $MenuString .= sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['nazvanie']);
                } else {
                    if ($IdTekushegoElementa == $this->_TekushiyElement['id']) {
                        $MenuString .= sprintf($this->_LI[$UrovenVlogennosti]['n_aktivnay'], $this->_TekushiyElement['id'], $this->_TekushiyElement['ssilka'], $this->_TekushiyElement['nazvanie']);
                    } else {
                        $MenuString .= sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['ssilka'], $this->_TekushiyElement['nazvanie']);
                    }
                }
                if ($this->perehodPoPodruppe() == false) {
                    //echo $this->_TekushiyNomerElementa[$UVL]-$this->_KolichestvoElementovTekusheyPodgruppi[$UVL];
                    while ($this->_TekushiyNomerElementa[$UVL] == ($this->_KolichestvoElementovTekusheyPodgruppi[$UVL] - 1)) {
                        $MenuString .= array_pop($StekOkonchaniya);
                        $UVL = $UVL - 1;
                        if ($UVL == 0) {
                            $MenuString .= $this->_DIV[0]['k'];
                        }
                    }
                }
            } else {

                if ($UrovenVlogennosti == 0) {
                    $MenuString .= sprintf($this->_DIV[0]['n'], $this->_TekushiyElement['nazvanie']);
                } else {
                    if ($IdTekushegoElementa == $this->_TekushiyElement['id']) {
                        $MenuString .= sprintf($this->_LI[$UrovenVlogennosti]['n_aktivnay'], $this->_TekushiyElement['id'], $this->_TekushiyElement['ssilka'], $this->_TekushiyElement['nazvanie']);
                    } else {
                        $MenuString .= sprintf($this->_LI[$UrovenVlogennosti]['n'], $this->_TekushiyElement['id'], $this->_TekushiyElement['ssilka'], $this->_TekushiyElement['nazvanie']);
                    }
                }
            }
        }

        //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/debug.txt', print_r($MenuString, true));

        return $MenuString;
    }
}

?>