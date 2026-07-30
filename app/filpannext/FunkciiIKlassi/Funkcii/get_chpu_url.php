<?php
function get_chpu_url($id='',$name='',$type='',$len='100'){
	$site='https://filpan/filpannext';
    $id=(int)$id;
    $status='true';
    if($type=='2')$type='tovar';
    if($type=='1')$type='usluga';
	$name=explode('/',$name);
    $name=explode('(',$name[0]);
	//return $site.'/'.$type.'/'.$id.'/'.trim(cleanForShortURL($name[0],$len),'-').'.html';
	return $type.'/'.$id.'/'.trim(cleanForShortURL($name[0],$len),'-').'.html';
}

/////
function get_chpu_url_new($name='',$kluchevoe_slovo='',$len='100'){

    $name = str_replace("_***_", $kluchevoe_slovo, $name);

	$name=explode('/',$name);
    $name=explode('(',$name[0]);
	//return $site.'/'.$type.'/'.$id.'/'.trim(cleanForShortURL($name[0],$len),'-').'.html';


	return trim(cleanForShortURL($name[0],$len),'-').'.html';
}
/////

function the_chpu_url($id='',$name='',$type='',$len='100'){
		echo get_chpu_url($id,$name,$type,$len);
}

//транслит
function cleanForShortURL($title,$num='100'){
	$my_iso9_table = array(
		'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Ѓ' => 'G`',
		'Ґ' => 'G`', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'YO', 'Є' => 'YE',
		'Ж' => 'ZH', 'З' => 'Z', 'Ѕ' => 'Z', 'И' => 'I', 'Й' => 'Y',
		'Ј' => 'J', 'І' => 'I', 'Ї' => 'YI', 'К' => 'K', 'Ќ' => 'K',
		'Л' => 'L', 'Љ' => 'L', 'М' => 'M', 'Н' => 'N', 'Њ' => 'N',
		'О' => 'O', 'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T',
		'У' => 'U', 'Ў' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'TS',
		'Ч' => 'CH', 'Џ' => 'DH', 'Ш' => 'SH', 'Щ' => 'SHH', 'Ъ' => '``',
		'Ы' => 'YI', 'Ь' => '`', 'Э' => 'E`', 'Ю' => 'YU', 'Я' => 'YA',
		'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'ѓ' => 'g',
		'ґ' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'є' => 'ye',
		'ж' => 'zh', 'з' => 'z', 'ѕ' => 'z', 'и' => 'i', 'й' => 'y',
		'ј' => 'j', 'і' => 'i', 'ї' => 'yi', 'к' => 'k', 'ќ' => 'k',
		'л' => 'l', 'љ' => 'l', 'м' => 'm', 'н' => 'n', 'њ' => 'n',
		'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
		'у' => 'u', 'ў' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts',
		'ч' => 'ch', 'џ' => 'dh', 'ш' => 'sh', 'щ' => 'shh', 'ь' => '',
		'ы' => 'yi', 'ъ' => "'", 'э' => 'e`', 'ю' => 'yu', 'я' => 'ya'
	);

        $title = trim($title, ' ');
		$title = strtr($title, $my_iso9_table);
		$title = preg_replace("/[^A-Za-z0-9_\-\.]/", '-', $title);
		$title = str_replace('---', '-', $title);
		$title = str_replace('--', '-', $title);
		$title = strtolower($title);
		$title = substr($title, 0, $num);
	return $title;
}
?>