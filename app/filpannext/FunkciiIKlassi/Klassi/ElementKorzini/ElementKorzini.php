<?

/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Class ElementKorzini extends ElementSpiska

public ElementKorzini()

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

Class ElementKorzini extends ElementSpiska
{

    function ElementKorzini()
    {
        $TablicaRoditel = 'filpan_new_korzina';
        ElementSpiska::ElementSpiska($TablicaRoditel);
    }

    public function poluchit($SessionId, $TovarUslugaId)
    {
        $MassivKriteriyev['session_id'] = $SessionId;
        $MassivKriteriyev['$tovar_usluga_id'] = $TovarUslugaId;
        $this->poluchitPoKriteriyu($MassivKriteriyev);
    }


    public function uvelichitKolichestvo($kolichestvo)
    {
        if ($this->_Suhestvuet == true) {
            $this->_MassivSvoystv[0]['kolichestvo'] = $this->_MassivSvoystv[0]['kolichestvo'] + $kolichestvo;
            $this->sohranit();
        } else {
            $ElementKorzini = new  ElementKorzini();
            $ElementKorzini->izmenitSvoystvo('','');
            $ElementKorzini->izmenitSvoystvo('','');
            $ElementKorzini->izmenitSvoystvo('','');
            $ElementKorzini->izmenitSvoystvo('','');
            $ElementKorzini->izmenitSvoystvo('','');
        }
    }

    public function udalitVse()
    {
        $this->udalit();
    }

    public function udalitNeskolko($kolichestvo)
    {

    }

}

?>