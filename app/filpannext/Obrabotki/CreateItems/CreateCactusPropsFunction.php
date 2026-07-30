<?
//D:\OSPanel\domains\filpan\public_html\filpannext\PanelUpravleniya\Svoystvo\index.php
//D:\OSPanel\domains\filpan\public_html\filpannext\PanelUpravleniya\Svoystvo\SrednayaKolonkaSredniyDivElement.php   38-53
//При удалении элемента удалять значения свойств

require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '3500M');

function removeBOM($str = "")
{
    if (substr($str, 0, 3) == pack('CCC', 0xef, 0xbb, 0xbf)) {
        $str = substr($str, 3);
    }
    return $str;
}


if (!empty($_REQUEST["main_url"]) && !empty($_REQUEST["args"])) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $_REQUEST["main_url"]); // set url to post to
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);// allow redirects
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.139 Safari/537.36");
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // times out after 4s
    curl_setopt($ch, CURLOPT_POST, 1); // set POST method
    curl_setopt($ch, CURLOPT_POSTFIELDS, $_REQUEST["args"]); // add POST fields
    $src = curl_exec($ch); // run the whole process
    curl_close($ch);

    $src = removeBOM($src);

    echo $src;
}

if (!empty($_POST["allitems"])) { 

    $allitems = json_decode($_POST["allitems"], true);
	
	$current_menu_id=343;
	
    foreach ($allitems as $key => $data) {

        //if ($key >= 1) continue;

        $keyword_data = explode(" ", $data["name"]);
        $keyword = $keyword_data[1];
		
		$ElementTovarovUslug = new ElementTovarovUslug();		
		$MassivKriteriev = array();
        $MassivKriteriev['menu_id'] = $current_menu_id;
        $MassivKriteriev['kluchevoe_slovo'] = $keyword;
		
		//echo"<pre>";print_r($keyword);echo"</pre>";
        $ElementTovarovUslug->poluchitPoKriteriyu($MassivKriteriev);
		
		$new_id = $ElementTovarovUslug->poluchitSvoystvo('id');
		//echo"<pre>";print_r($new_id);echo"</pre>";
		
        //Props

        foreach($data["props"] as $key=>$value)
        {
            $key=trim($key);
            $value=trim(strip_tags($value));
            $props_key=0;
            $props_value="";

			/*
            if (preg_match("/цвет/ui", $key))
            {
                $props_key=1;

                if($value=='черный')
                {
                    $props_value=18;
                }
                elseif($value=='голубой')
                {
                    $props_value=19;
                }
                elseif($value=='пурпурный')
                {
                    $props_value=20;
                }
                elseif($value=='желтый')
                {
                    $props_value=21;
                }
            }
            elseif(preg_match("/ресурс/ui", $key))
            {
                $props_key=2;
                $props_value=$value;
            }
			elseif(preg_match("/вес/ui", $key))
            {
                $props_key=6;
                $props_value=$value;
            }
			*/
			
			if(preg_match("/вес/ui", $key))
            {
                $props_key=6;
                $props_value=$value;
            }

            if($props_key)
            {
				//Проверяем наличие свойства
				$ElementSootvetstviyeTovarSvoystvoZnacheniye = new ElementSootvetstviyeTovarSvoystvoZnacheniye();		
				$MassivKriteriev = array();
				$MassivKriteriev['id_tovar'] = $new_id;
				$MassivKriteriev['id_svoystvo'] = $props_key;
				$ElementSootvetstviyeTovarSvoystvoZnacheniye->poluchitPoKriteriyu($MassivKriteriev);
				$SootvetstviyeTovarSvoystvoZnacheniye = $ElementSootvetstviyeTovarSvoystvoZnacheniye->poluchitSvoystvo('id_znacheniye');
				if (empty($SootvetstviyeTovarSvoystvoZnacheniye)) {
					//Записываем
					$ElementSootvetstviyeTovarSvoystvoZnacheniye = new ElementSootvetstviyeTovarSvoystvoZnacheniye();
					$ElementSootvetstviyeTovarSvoystvoZnacheniye->izmenitSvoystvo('id_tovar', $new_id);
					$ElementSootvetstviyeTovarSvoystvoZnacheniye->izmenitSvoystvo('id_svoystvo', $props_key);
					$ElementSootvetstviyeTovarSvoystvoZnacheniye->izmenitSvoystvo('id_znacheniye', $props_value);
					$ElementSootvetstviyeTovarSvoystvoZnacheniye->sozdat();
				}
            }
        }
    }
	
	$TablicaRoditel = 'filpan_new_tovari_uslugi';
	$spisok_tovarov=new Spisok($TablicaRoditel);
	$MassivKriteriev = array();
	$MassivKriteriev['menu_id'] = $current_menu_id;
	$spisok_tovarov->poluchitPoKriteriyu($MassivKriteriev);
	foreach($spisok_tovarov->poluchitMassivInformacii() as $key=>$value)
	{
		//Добавляем свойство тип печати всем
		//Проверяем наличие свойства
		$ElementSootvetstviyeTovarSvoystvoZnacheniye = new ElementSootvetstviyeTovarSvoystvoZnacheniye();		
		$MassivKriteriev = array();
		$MassivKriteriev['id_tovar'] = $value["id"];
		$MassivKriteriev['id_svoystvo'] = 5;
		$ElementSootvetstviyeTovarSvoystvoZnacheniye->poluchitPoKriteriyu($MassivKriteriev);
		$SootvetstviyeTovarSvoystvoZnacheniye = $ElementSootvetstviyeTovarSvoystvoZnacheniye->poluchitSvoystvo('id_znacheniye');
		
		if (empty($SootvetstviyeTovarSvoystvoZnacheniye)) {
			//Записываем
			$ElementSootvetstviyeTovarSvoystvoZnacheniye = new ElementSootvetstviyeTovarSvoystvoZnacheniye();
			$ElementSootvetstviyeTovarSvoystvoZnacheniye->izmenitSvoystvo('id_tovar', $value["id"]);
			$ElementSootvetstviyeTovarSvoystvoZnacheniye->izmenitSvoystvo('id_svoystvo', 5);
			$ElementSootvetstviyeTovarSvoystvoZnacheniye->izmenitSvoystvo('id_znacheniye', 39);
			$ElementSootvetstviyeTovarSvoystvoZnacheniye->sozdat();
		}
	}
}

?>