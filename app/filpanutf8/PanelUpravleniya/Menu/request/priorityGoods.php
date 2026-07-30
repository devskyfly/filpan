<?
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$PanelUpravleniyaMenuPriorityGoods=new PanelUpravleniyaMenuPriorityGoods();
$priorityGoodData=$PanelUpravleniyaMenuPriorityGoods->GetPriorityGoodName($_REQUEST['id'],$_REQUEST['menu_id']);
if($priorityGoodData)
{
    if(gettype($priorityGoodData)=="array")
    {
        echo $priorityGoodData["nazvanie"];
    }
    elseif ($priorityGoodData=="already_add")
    {
        echo "already_add";
    }
    else
    {
        echo "0";
    }
}
else
{
    echo "0";
}

?>