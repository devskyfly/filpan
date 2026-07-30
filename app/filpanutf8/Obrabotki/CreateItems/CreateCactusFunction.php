<?
//D:\OSPanel\domains\filpan\public_html\filpannext\PanelUpravleniya\Svoystvo\index.php
//D:\OSPanel\domains\filpan\public_html\filpannext\PanelUpravleniya\Svoystvo\SrednayaKolonkaSredniyDivElement.php   38-53
//При удалении элемента удалять значения свойств

require_once($_SERVER['DOCUMENT_ROOT'] . "/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('memory_limit', '3500M');

# Функция для загрузки и ресайза изображений
function LoadAndResize($url)
{
    # Получаем изображение. Если функция не отработала
    if ($image = file_get_contents($url)) {
        # Генерируем имя tmp-изображения
        $tmp_name = md5(time() . rand());

        # Сохраняем изображение
        file_put_contents($tmp_name, $image);

        # Очищаем память
        unset($image);

        # Если getimagesize вернула массив
        if ($info = getimagesize($tmp_name)) {
            # Вычисляем тип изображения

            $imagename = substr(md5(time() . rand()),0,15) . '.' . "jpeg";

            # Получаем данные об изображении
            list($width, $height) = $info;

            # Создаём ресурс изображения

            if(!imagecreatefromjpeg($tmp_name))
            {
                unlink($tmp_name);
                return "empty";
            }
            else
            {
                $src_im = imagecreatefromjpeg($tmp_name);

                # Вычисляем ширину
                $new_width = 450;

                # Вычисляем высоту
                $new_height = 450;

                # Создаём новое изображение
                $dst_im = imagecreatetruecolor($new_width, $new_height);

                # Ресайзим
                imagecopyresampled($dst_im, $src_im, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

                # Чистим память
                unset($src_im);

                imagejpeg( $dst_im, $_SERVER['DOCUMENT_ROOT']."/img/" .$imagename );

                # Очищаем память
                unset($dst_im);
                unlink($tmp_name);

                # Возвращаем
                return $imagename;
            }


        } else
            die('Фатальная ошибка: файл по адресу <b>' . $url . '</b> не является изображением!');
    }
}

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

    $vendor="Cactus";

    $allitems = json_decode($_POST["allitems"], true);

    //file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/debug.txt', print_r($allitems, true));

    foreach ($allitems as $key => $data) {

        //if ($key >= 1) continue;

        $picture_name=LoadAndResize($data["picture"]);

        $ElementTovarovUslug = new ElementTovarovUslug();

        $keyword_data = explode(" ", $data["name"]);
        $keyword = $keyword_data[1];

        $new_element = Array(
            "opisanie" => "",
            "dopolnitelnoe_opisanie" => "",
            "textoviy_modul" => "",
            "harakteristiki" => "",
            "picture" => $picture_name,
            "kluchevoe_slovo" => $keyword,
            "pokazyvat" => 0,
            "vendor" => $vendor,
            "art_postavshika" => $data["id"],
            "cena" => $data["price"],
            "menu_id" => 343,
            "hit_prodazh" => 0,
            "super" => 0,
            "vnalichii" => 0,
            "market" => 0,
            "nazakaz" => 1,
            "samovivoz" => 1,
            "dostavka" => 0,
            "kolichestvo_pokupok" => rand(350, 1500),
            "bid" => 0,
            "cbid" => 0,
            "local_del" => 0,
            "local_del_days" => "",
            "min_summ" => 0,
            "min_kol" => 0,
            "ref_1c" => "",
            "tip" => 2,
            "podtip" => 5,
            "vid_nomenkalturi" => 4,
            "valuta" => 1,
            "vid_kartinka_1" => "img1_1.png",
            "vid_kartinka_2" => "img2_1.png",
            "nazvanie" => $data["name"],
            "title" => $data["name"], "keywords" => $data["name"],
            "description" => $data["name"],
            "dannyedlyapoiska" => $data["name"],);

        foreach ($new_element as $key => $value) {
            $ElementTovarovUslug->izmenitSvoystvo($key, $value);
        }

        $ElementTovarovUslug->sozdat();
        $new_id = $ElementTovarovUslug->poluchitSvoystvo('id');

        $ElementTovarovUslug = new ElementTovarovUslug();
        $ElementTovarovUslug->poluchit($new_id);

        //Link
        $new_link = get_chpu_url_new($data["name"], "");

        $ElementTovarovUslug->dobavitSsilku($new_link, 1);

        //Props

        foreach($data["props"] as $key=>$value)
        {
            $key=trim($key);
            $value=trim(strip_tags($value));
            $props_key=0;
            $props_value="";

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

            if($props_key)
            {
                $ElementSootvetstviyeTovarSvoystvoZnacheniye = new ElementSootvetstviyeTovarSvoystvoZnacheniye();
                $ElementSootvetstviyeTovarSvoystvoZnacheniye->izmenitSvoystvo('id_tovar', $new_id);
                $ElementSootvetstviyeTovarSvoystvoZnacheniye->izmenitSvoystvo('id_svoystvo', $props_key);
                $ElementSootvetstviyeTovarSvoystvoZnacheniye->izmenitSvoystvo('id_znacheniye', $props_value);
                $ElementSootvetstviyeTovarSvoystvoZnacheniye->sozdat();
            }
        }
    }
}

?>