<?

Class ElementSvoystva extends ElementSpiska
{
	function ElementSvoystva()
	{
        $TablicaRoditel='filpan_new_svoystva';
        ElementSpiska::ElementSpiska($TablicaRoditel);
	}

    public function poluchitZnacheniyaSvoystva()
    {
        $ZnacheniyaSvoystva = new ZnacheniyaSvoystv();
        $MassivKriteriev = array();

        $MassivKriteriev['roditel'] = $this->poluchitSvoystvo('id');
        $ZnacheniyaSvoystva->poluchitPoKriteriyu($MassivKriteriev);
        return $ZnacheniyaSvoystva;
    }

    public function poluchitKategoriiSvoystva()
    {
        $KategoriiSvoystv = new KategoriiSvoystv();
        $MassivKriteriev = array();
        $MassivKriteriev['id_svoystva'] = $this->poluchitSvoystvo('id');
        $KategoriiSvoystv->poluchitPoKriteriyu($MassivKriteriev);
        return $KategoriiSvoystv;
    }

    public function udalitZnacheniyaSvoystva()
    {
        $ZnacheniyaSvoystv = new ZnacheniyaSvoystv();
        $_MassivKriteriev = array();
        $_MassivKriteriev['roditel'] = $this->poluchitSvoystvo('id');
        $ZnacheniyaSvoystv->udalitPoKriteriyu($_MassivKriteriev);
    }

    public function dobavitZnacheniyaSvoystva($ZnacheniyeSvoystva)
    {
        $ElementZnacheniyeSvoystva = new ElementSvoystvo();
        $ElementZnacheniyeSvoystva->izmenitSvoystvo('roditel', $this->poluchitSvoystvo('id'));
        $ElementZnacheniyeSvoystva->izmenitSvoystvo('znacheniye', $ZnacheniyeSvoystva);

        $ElementZnacheniyeSvoystva->sozdat();
    }

    public function udalitKategoriiSvoystva()
    {
        $KategoriiSvoystva = new KategoriiSvoystv();
        $_MassivKriteriev = array();
        $_MassivKriteriev['id_svoystva'] = $this->poluchitSvoystvo('id');
        $KategoriiSvoystva->udalitPoKriteriyu($_MassivKriteriev);
    }

    public function dobavitKategoriyuSvoystva($KategoriyaSvoystva)
    {
        $ElementKategoriyaSvoystva = new ElementKategoriyaSvoystva();
        $ElementKategoriyaSvoystva->izmenitSvoystvo('id_svoystva', $this->poluchitSvoystvo('id'));
        $ElementKategoriyaSvoystva->izmenitSvoystvo('kategoriya_svoystva', $KategoriyaSvoystva);

        $ElementKategoriyaSvoystva->sozdat();
    }
}
?>