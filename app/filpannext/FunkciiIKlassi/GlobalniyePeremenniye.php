<?
$NoIndex=1;
/* $_ROOT=$_SERVER['DOCUMENT_ROOT'].'/filpannext/';
$_WEB_ROOT='/filpannext/';
$_WEB_ROOT_HREF='/';
$_WEB_ROOT_ADMIN_HREF='/filpannext/PanelUpravleniya/';
$_WEB_ROOT_IMG='/img/';
$_WEB_ROOT_DESIGN_IMG='/filpannext/FilpanDesign/new_images/'; */
$_DOCKER = false;
$_ROOT=$_SERVER['DOCUMENT_ROOT'].'/filpannext/';
$_WEB_ROOT='/filpannext/';
$_WEB_ROOT_HREF='/';
$_WEB_ROOT_ADMIN_HREF='/filpannext/PanelUpravleniya/';
$_WEB_ROOT_IMG='/img/';
$_WEB_ROOT_DESIGN_IMG='/filpannext/FilpanDesign/new_images/';

$_ROOT=$_SERVER['DOCUMENT_ROOT'].'/filpannext/';
$_SHOW_IMAGES=$_ROOT.'PanelUpravleniya/Variables/ShowImages.txt';
$_SHOW_IMAGES=file_get_contents($_SHOW_IMAGES);

$_TIP_VYGRUZKI=$_ROOT.'PanelUpravleniya/Variables/tip_vygruzki.txt';
$_TIP_VYGRUZKI=file_get_contents($_TIP_VYGRUZKI);

$_POKAZ_OPISANIYA=$_ROOT.'PanelUpravleniya/Variables/pokaz_opisaniya.txt';
$_POKAZ_OPISANIYA=file_get_contents($_POKAZ_OPISANIYA);

$_POKAZ_OPISANIYA_KARTOCHKA=$_ROOT.'PanelUpravleniya/Variables/pokaz_opisaniya_kartochka.txt';
$_POKAZ_OPISANIYA_KARTOCHKA=file_get_contents($_POKAZ_OPISANIYA_KARTOCHKA);

$_VIDI_TOVAROV_USLUG=array();
$_VIDI_TOVAROV_USLUG['usluga']=1;
$_VIDI_TOVAROV_USLUG_TEXT['usluga']='Услуга';
$_VIDI_TOVAROV_USLUG['tovar']=2;
$_VIDI_TOVAROV_USLUG_TEXT['tovar']='Товар';
$_VIDI_TOVAROV_USLUG['kartforprint']=3;
$_VIDI_TOVAROV_USLUG_TEXT['kartforprint']='Картриджи для принтера';
$_VIDI_TOVAROV_USLUG['kartforprintkartochki']=4;
$_VIDI_TOVAROV_USLUG_TEXT['kartforprintkartochki']='Карточки картриджей для принтера';


$_PODVIDI_TOVAROV_USLUG=array();
//1 - usluga
//2 - tovar
$_PODVIDI_TOVAROV_USLUG[1][1]=1;
$_PODVIDI_TOVAROV_USLUG_TEXT[1]='Заправка';
$_PODVIDI_TOVAROV_USLUG[1][2]=2;
$_PODVIDI_TOVAROV_USLUG_TEXT[2]='Восстановка';
$_PODVIDI_TOVAROV_USLUG[1][3]=3;
$_PODVIDI_TOVAROV_USLUG_TEXT[3]='Заправка принтера';
$_PODVIDI_TOVAROV_USLUG[2][1]=4;
$_PODVIDI_TOVAROV_USLUG_TEXT[4]='Оригинальный картридж';
$_PODVIDI_TOVAROV_USLUG[2][2]=5;
$_PODVIDI_TOVAROV_USLUG_TEXT[5]='Совместимый картридж';
$_PODVIDI_TOVAROV_USLUG[2][3]=6;
$_PODVIDI_TOVAROV_USLUG_TEXT[6]='Принтеры';
$_PODVIDI_TOVAROV_USLUG[3][1]=7;
$_PODVIDI_TOVAROV_USLUG_TEXT[7]='Картриджи для принтеров';
$_PODVIDI_TOVAROV_USLUG[4][1]=8;
$_PODVIDI_TOVAROV_USLUG_TEXT[8]='Карточки картриджей для принтеров';

$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM=array();


//Заправка
$SOOTVETSTBVIE_ID_KATEGORIY_ID_SOPUTSTVUYUSHIH[1]=array(3);
//Восстановка
$SOOTVETSTBVIE_ID_KATEGORIY_ID_SOPUTSTVUYUSHIH[2]=array(21);
//Заправка принтера
$SOOTVETSTBVIE_ID_KATEGORIY_ID_SOPUTSTVUYUSHIH[3]=array(25);
//Оригинальный картридж
$SOOTVETSTBVIE_ID_KATEGORIY_ID_SOPUTSTVUYUSHIH[4]=array(8,9);
//Совместимый картридж
$SOOTVETSTBVIE_ID_KATEGORIY_ID_SOPUTSTVUYUSHIH[5]=array(82,222);
//Принтеры
$SOOTVETSTBVIE_ID_KATEGORIY_ID_SOPUTSTVUYUSHIH[6]=array(13);
//Картриджи для принтеров
$SOOTVETSTBVIE_ID_KATEGORIY_ID_SOPUTSTVUYUSHIH[7]=array(266);
//Карточки картриджей для принтеров
$SOOTVETSTBVIE_ID_KATEGORIY_ID_SOPUTSTVUYUSHIH[8]=array(291);


//Заправка
//$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[1]=array(4,5,6);//Оригинальный картридж, Совместимый картридж, Принтеры
//Восстановка
//$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[2]=array(4,5,6);//Оригинальный картридж, Совместимый картридж, Принтеры
//Заправка принтера
//$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[3]=array(8);//Принтеры
//Оригинальный картридж
//$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[4]=array(1,5,6);//Совместимый картридж, Заправка, Принтеры
//Совместимый картридж
//$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[5]=array(1,4,6);//Оригинальный картридж, Заправка, Принтеры
//Принтеры
//$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[6]=array(3,4,6);//Заправка принтера, Заправка, Восстановка, Оригинальный картридж, Совместимый картридж
//Картриджи для принтеров
//$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[7]=array(8);//Карточки картриджей для принтеров
//Карточки картриджей для принтеров
//$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[8]=array(5,4,1);//Заправка, Оригинальный картридж, Совместимый картридж, Картриджи для принтеров

//Заправка
$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[1]=array(1,2,3,4,5,6,7,8);//Оригинальный картридж, Совместимый картридж, Принтеры
//Восстановка
$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[2]=array(1,2,3,4,5,6,7,8);//Оригинальный картридж, Совместимый картридж, Принтеры
//Заправка принтера
$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[3]=array(1,2,3,4,5,6,7,8);//Принтеры
//Оригинальный картридж
$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[4]=array(1,5,6);//Совместимый картридж, Заправка, Принтеры
//Совместимый картридж
$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[5]=array(1,4,6);//Оригинальный картридж, Заправка, Принтеры
//Принтеры
$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[6]=array(1,2,3,4,5,6,7,8);//Заправка принтера, Заправка, Восстановка, Оригинальный картридж, Совместимый картридж
//Картриджи для принтеров
$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[7]=array(1,2,3,4,5,6,7,8);//Карточки картриджей для принтеров
//Карточки картриджей для принтеров
$VIDI_SOPUTSTVUYUSHIH_PO_KATEGORIYAM[8]=array(1,2,3,4,5,6,7,8);//Заправка, Оригинальный картридж, Совместимый картридж, Картриджи для принтеров





$_VIDI_LOCACIYA=array();
$_VIDI_LOCACIYA['ofise']=1;
$_VIDI_LOCACIYA['viezd']=2;

$_VALUTA=array();
$_VALUTA['rub']=1;
$_VALUTA_TEXT['rub']='Рубли';
$_VALUTA['dol']=2;
$_VALUTA_TEXT['dol']='Доллары';


$_NASTROYKI_STRANIC['kolichestvo_poziciy_nastranice_tovarov']=20;

$_VIDI_STRANIC=array();
$_VIDI_STRANIC['filpan_new_menu']=0;
$_VIDI_STRANIC['filpan_tovari_uslugi']=1;
$_VIDI_STRANIC['spisok_statey']=2;
$_VIDI_STRANIC['statya']=3;
$_VIDI_STRANIC['kartrigi_dlya_printera']=4;

$_VARIANT_OTOBRAGENIYA_STATYI['statya']=0;
$_VARIANT_OTOBRAGENIYA_STATYI['statya_metro']=1;

$_VARIANT_OTOBRAGENIYA_STATEY['statyi']=0;
$_VARIANT_OTOBRAGENIYA_STATEY['statyi_metro']=1;



//VidKartinki1
$_VID_KARTINKI_1['0']['val']='-';
$_VID_KARTINKI_1['0']['text']='---';

$_VID_KARTINKI_1['1']['val']='img1_1.png';
$_VID_KARTINKI_1['1']['text']='Акция';

$_VID_KARTINKI_1['2']['val']='img1_2.png';
$_VID_KARTINKI_1['2']['text']='Картинка 2';

$_VID_KARTINKI_1['3']['val']='img1_3.png';
$_VID_KARTINKI_1['3']['text']='Картинка 3';

$_VID_KARTINKI_2['0']['val']='-';
$_VID_KARTINKI_2['0']['text']='---';

$_VID_KARTINKI_2['1']['val']='img2_1.png';
$_VID_KARTINKI_2['1']['text']='Рекомендуем';

$_VID_KARTINKI_2['2']['val']='img2_2.png';
$_VID_KARTINKI_2['2']['text']='Картинка 2';

$_VID_KARTINKI_2['3']['val']='img2_3.png';
$_VID_KARTINKI_2['3']['text']='Картинка 3';

//Zapravka
$_VID_NOMENKLATURI['0']['val']=0;
$_VID_NOMENKLATURI['0']['cena_viezd']=390;
$_VID_NOMENKLATURI['0']['text']='Заправка';
//Vosstanovka
$_VID_NOMENKLATURI['1']['val']=1;
$_VID_NOMENKLATURI['1']['cena_viezd']=100;
$_VID_NOMENKLATURI['1']['text']='Восстановка';
//Proshivka_chipa
$_VID_NOMENKLATURI['2']['val']=2;
$_VID_NOMENKLATURI['2']['cena_viezd']=100;
$_VID_NOMENKLATURI['2']['text']='Прошивка чипа';
//Proshivka_printera
$_VID_NOMENKLATURI['3']['val']=3;
$_VID_NOMENKLATURI['3']['cena_viezd']=500;
$_VID_NOMENKLATURI['3']['text']='Прошивка принтера';
//Malenkiy_tovar
$_VID_NOMENKLATURI['4']['val']=4;
$_VID_NOMENKLATURI['4']['cena_viezd']=390;
$_VID_NOMENKLATURI['4']['text']='Маленкий товар';
//Bolshoy_tovar
$_VID_NOMENKLATURI['5']['val']=5;
$_VID_NOMENKLATURI['5']['cena_viezd']=600;
$_VID_NOMENKLATURI['5']['text']='Большой товар';
//Bolshoy_tovar
$_VID_NOMENKLATURI['6']['val']=6;
$_VID_NOMENKLATURI['6']['cena_viezd']=0;
$_VID_NOMENKLATURI['6']['text']='Виртуальный товар';

$_PROCENT_BEZNALA=1.04;

$_POCHTA_FIRMI='filpan@yandex.ru';


$_NASTROYKI_PANELI_UPRAVLENIYA['pokazat_pozicii_market']=false;

/*$_STRANICI_SAYTA['filpan_new_menu']=0;
$_STRANICI_SAYTA['filpan_new_tovari_uslugi']=1;
$_STRANICI_SAYTA['index']=1;
$_STRANICI_SAYTA['filpan_new_tovari_uslugi']=1;
$_STRANICI_SAYTA['filpan_new_tovari_uslugi']=1;
$_STRANICI_SAYTA['filpan_new_tovari_uslugi']=1;
$_STRANICI_SAYTA['filpan_new_tovari_uslugi']=1;
$_STRANICI_SAYTA['filpan_new_tovari_uslugi']=1;*/
?>