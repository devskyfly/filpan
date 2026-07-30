<?

Class PanelUpravleniyaMenuPriorityGoods
{
    protected $_PriorityGoods;
    protected $_PriorityGoodData;

    function PanelUpravleniyaMenuPriorityGoodsGet($menu_id)
    {
        $ZaprosNaChteniye_priority_goods_ids = new ZaprosNaChteniye('select item_id,menu_id,ochered_vyvoda from filpan_new_priority_goods where menu_id=' . $menu_id . ' order by ochered_vyvoda asc limit 10');
        if ($ZaprosNaChteniye_priority_goods_ids->poluchitKolichestvoStrokOtvetaNaZapros() > 0) {
            $priority_goods_ids = $ZaprosNaChteniye_priority_goods_ids->poluchitOtvetNaZaprosAssociativniyMassiv();

            foreach ($priority_goods_ids as $key => $data) {

                $ZaprosNaChteniye = new ZaprosNaChteniye('select id,menu_id,nazvanie,kluchevoe_slovo from filpan_new_tovari_uslugi where id=' . $data["item_id"] . ' limit 1');
                if ($ZaprosNaChteniye->poluchitKolichestvoStrokOtvetaNaZapros() > 0) {
                    $priority_good_array = $ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();

                    $priority_good = $priority_good_array[0];
                    $priority_good["ochered_vyvoda"] = $data["ochered_vyvoda"];

                    if (strpos($priority_good["nazvanie"], "_***_") && !empty($priority_good["kluchevoe_slovo"])) {
                        $priority_good["nazvanie"] = str_replace('_***_', $priority_good["kluchevoe_slovo"], $priority_good["nazvanie"]);
                    }

                    $new_priority_goods[$priority_good["ochered_vyvoda"]] = $priority_good;
                }
            }
        }
        return $new_priority_goods;
    }

    public function GetPriorityGoodName($id, $menu_id)
    {
        $ZaprosNaChteniye_priority_goods_ids = new ZaprosNaChteniye('select item_id from filpan_new_priority_goods where item_id=' . $id . ' and menu_id=' . $menu_id . ' limit 1');
        if ($ZaprosNaChteniye_priority_goods_ids->poluchitKolichestvoStrokOtvetaNaZapros() > 0) {
            return "already_add";
        } else {
            $ZaprosNaChteniye = new ZaprosNaChteniye('select id,menu_id,nazvanie,kluchevoe_slovo from filpan_new_tovari_uslugi where id=' . $id . ' limit 1');
            if ($ZaprosNaChteniye->poluchitKolichestvoStrokOtvetaNaZapros() > 0) {
                $this->_PriorityGoodData = $ZaprosNaChteniye->poluchitOtvetNaZaprosAssociativniyMassiv();
                $priority_good = $this->_PriorityGoodData[0];
                if (strpos($priority_good["nazvanie"], "_***_") && !empty($priority_good["kluchevoe_slovo"])) {
                    $priority_good["nazvanie"] = str_replace('_***_', $priority_good["kluchevoe_slovo"], $priority_good["nazvanie"]);
                }
                return $priority_good;
            }
        }
    }

    public function SavePriorityGoods($menu_id, $PriorityGoods)
    {
        $ZaprosNaIzmeneniye = new ZaprosNaIzmeneniye('DELETE FROM filpan_new_priority_goods where menu_id=' . $menu_id);

        foreach ($PriorityGoods as $ochered => $id) {
            if ($id) {
                $ZaprosNaSozdaniye = new ZaprosNaSozdaniye('INSERT INTO `filpan_new_priority_goods` (`id`, `item_id`, `menu_id`, `ochered_vyvoda`) VALUES (NULL, ' . $id . ', ' . $menu_id . ', ' . $ochered . ')');
            }
        }
    }
}

?>