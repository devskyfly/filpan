<?
if((isset($razdel))&&(isset($podrazdel))&&(isset($podpunkt))&&(isset($proizvoditel))&&(!isset($id_tov))){
//echo '_1_';

$title=new date_base;

if($razdel!=''){
$title->title_razdel($razdel,&$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}

if($podrazdel!=''){
$title->title_podrazdel($razdel,$podrazdel, &$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}

if($podpunkt!=''){
$title->title_podpunkt($podrazdel,$podpunkt, &$input_array);
echo '  '. $input_array[0]['text_podpunkt'];
unset($input_array);
}

if($proizvoditel!=''){
$title->title_proizvoditel($podrazdel,$proizvoditel, &$input_array);
echo '  '. $input_array[0]['text_podpunkt'];
unset($input_array);
}
}
elseif(isset($razdel)&&isset($podrazdel)&&isset($podpunkt)&&(isset($proizvoditel))&&(isset($id_tov))){
//echo '_2_';
$title=new date_base;
if($razdel!=''){
$title->title_razdel($razdel,&$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
if(($podrazdel!='')&&($razdel!='')){
$title->title_podrazdel($razdel,$podrazdel, &$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
if($podpunkt!=''){
$title->title_podpunkt($podrazdel,$podpunkt, &$input_array);
echo '  '. $input_array[0]['text_podpunkt'];
unset($input_array);
}
if($proizvoditel!=''){
$title->title_proizvoditel($podrazdel,$proizvoditel, &$input_array);
echo '  '. $input_array[0]['text_podpunkt'];
unset($input_array);
}
if($id_tov!=''){
$title->title_tovar($podrazdel,$id_tov, &$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
}
elseif(isset($razdel)&&isset($podrazdel)&&isset($podpunkt)&&(!isset($proizvoditel))&&(isset($id_tov))){
//echo '_3_';
$title=new date_base;
if($razdel!=''){
$title->title_razdel($razdel,&$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
if($podrazdel!=''){
$title->title_podrazdel($razdel,$podrazdel, &$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
if($podpunkt!=''){
$title->title_podpunkt($podrazdel,$podpunkt, &$input_array);
echo '  '. $input_array[0]['text_podpunkt'];
unset($input_array);
}
if($id_tov!=''){
$title->title_tovar($podrazdel,$id_tov, &$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
}
elseif(isset($razdel)&&isset($podrazdel)&&isset($podpunkt)&&(!isset($proizvoditel))&&(!isset($id_tov))){
//echo '_4_';
$title=new date_base;
if($razdel!=''){
$title->title_razdel($razdel,&$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
if($podrazdel!=''){
$title->title_podrazdel($razdel,$podrazdel, &$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
if($podpunkt!=''){
$title->title_podpunkt($podrazdel,$podpunkt, &$input_array);
echo '  '. $input_array[0]['text_podpunkt'];
unset($input_array);
}
}
elseif(isset($razdel)&&isset($podrazdel)&&(!isset($podpunkt))&&(isset($proizvoditel))&&(isset($id_tov))){
//echo '_5_';
$title=new date_base;
if($razdel!=''){
$title->title_razdel($razdel,&$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
if($podrazdel!=''){
$title->title_podrazdel($razdel,$podrazdel, &$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
if($proizvoditel!=''){
$title->title_proizvoditel($podrazdel,$proizvoditel, &$input_array);
echo '  '. $input_array[0]['text_podpunkt'];
unset($input_array);
}
if($id_tov!=''){
$title->title_tovar($podrazdel,$id_tov, &$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
}
elseif(isset($razdel)&&isset($podrazdel)&&(!isset($podpunkt))&&(isset($proizvoditel))&&(!isset($id_tov))){
//echo '_6_';
$title=new date_base;
if($razdel!=''){
$title->title_razdel($razdel,&$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
if($podrazdel!=''){
$title->title_podrazdel($razdel,$podrazdel, &$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
if($proizvoditel!=''){
$title->title_proizvoditel($podrazdel,$proizvoditel, &$input_array);
echo '  '. $input_array[0]['text_podpunkt'];
unset($input_array);
}
}
elseif(isset($razdel)&&isset($podrazdel)&&(!isset($podpunkt))&&(!isset($proizvoditel))&&(isset($id_tov))){
//echo '_7_';
$title=new date_base;
if($razdel!=''){
$title->title_razdel($razdel,&$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
if($podrazdel!=''){
$title->title_podrazdel($razdel,$podrazdel, &$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
if($id_tov!=''){
$title->title_tovar($podrazdel,$id_tov, &$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
}
elseif(isset($razdel)&&isset($podrazdel)&&(!isset($podpunkt))&&(!isset($proizvoditel))&&(!isset($id_tov))){
//echo '_8_';
$title=new date_base;
if($razdel!=''){
$title->title_razdel($razdel,&$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
if($podrazdel!=''){
$title->title_podrazdel($razdel,$podrazdel, &$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);
}
}
elseif(!isset($razdel)&&(isset($podrazdel))&&(!isset($podpunkt))&&(!isset($proizvoditel))&&(isset($id_tov))){
$title=new date_base;

if($id_tov!=''){
$title->title_tovar($podrazdel,$id_tov, &$input_array);
echo 'Суперпредложение '. $input_array[0]['name'];
unset($input_array);
}
}
elseif(isset($razdel)&&(!isset($podrazdel))&&(isset($podpunkt))&&(isset($proizvoditel))&&(isset($id_tov))){?>
<?}
elseif(isset($razdel)&&(!isset($podrazdel))&&(isset($podpunkt))&&(isset($proizvoditel))&&(!isset($id_tov))){?>
<?}
elseif(isset($razdel)&&(!isset($podrazdel))&&(isset($podpunkt))&&(!isset($proizvoditel))&&(isset($id_tov))){?>
<?}
elseif(isset($razdel)&&(!isset($podrazdel))&&(isset($podpunkt))&&(!isset($proizvoditel))&&(!isset($id_tov))){?>
<?}
elseif(isset($razdel)&&(!isset($podrazdel))&&(!isset($podpunkt))&&(isset($proizvoditel))&&(isset($id_tov))){?>
<?}
elseif(isset($razdel)&&(!isset($podrazdel))&&(!isset($podpunkt))&&(!isset($proizvoditel))&&(!isset($id_tov))){?>
<?}
else{}
unset($title);?>
<?/*
$title=new date_base;
$title->title_razdel($razdel,&$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);

$title->title_podrazdel($razdel,$podrazdel, &$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);

$title->title_podpunkt($podrazdel,$podpunkt, &$input_array);
echo '  '. $input_array[0]['text_podpunkt'];
unset($input_array);

$title->title_proizvoditel($podrazdel,$proizvoditel, &$input_array);
echo '  '. $input_array[0]['text_podpunkt'];
unset($input_array);

$title->title_tovar($podrazdel,$id_tov, &$input_array);
echo '  '. $input_array[0]['name'];
unset($input_array);*/?>