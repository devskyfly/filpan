<?
/*ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);*/

require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
require_once('array2xml.php');

$InitInfo=array(
		//Для всего магазина
		'delivary_cost'=>390,
		'delivary_days'=>'1-3',
		//Для элемента
		'empty_delivary_cost'=>390,
		'empty_delivary_days'=>'1-3'
);


$SpisokTovarov=new TovariUslugi();
$SpisokTovarov->vibratPoliya('id,cena');
$MassivKriteriev=array();
$MassivKriteriev['market']=1;
$SpisokTovarov->poluchitPoKriteriyu($MassivKriteriev);

$OutPutArray=array();
$OutPutArray['shop']=array(
		'name'=>'Filpan',
		'company'=>'11-1037776',
		//'company'=>'Филпан',
		'url'=>'https://www.filpan.ru',
		'currencies'=>array(),
		'categories'=>array(),
		'delivery-options' => 
		array (
				'option' => array (
						'@attributes' => array (
								'cost' => $InitInfo ['delivary_cost'],
								'days' => $InitInfo ['delivary_days'] 
						) 
				) 
		),
		'offers' => array () 
);


$OutPutArray['shop']['currencies']['currency']=
array(
'@attributes'=>
	array(
		'id'=>"RUR", 
		'rate'=>"1"
	)
);


$Offers=array();
$Categories=array();
$CategoriesIds=array();
 $iterator=0;
    while($SpisokTovarov->poluchitSleduyushiy())
    {
    	$iterator++;

    	$ElementTovar=new ElementTovarovUslug();
    	$ElementTovar->poluchit($SpisokTovarov->_TekushiyElement['id']);
    	 
    	$ElementMenu=new ElementMenu();
    	$ElementMenu->poluchit($ElementTovar->poluchitSvoystvo('menu_id'));
    	 
    	$MassivRoditelskihElementov=array_reverse($ElementMenu->poluchitRoditelskiyeElementi());
    	 
    	$PerviyElementMenu=new ElementMenu();
    	//$PerviyElementMenu->vibratPoliya(array('id','name'));
    	$PerviyElementMenu->poluchit($MassivRoditelskihElementov[1]);
    	
    	
    	if(($ElementTovar->poluchitSvoystvo('local_del'))==0){
    		$loacal_del_cost=$InitInfo['empty_delivary_cost'];
    	}else{
    		$loacal_del_cost=$ElementTovar->poluchitSvoystvo('local_del');
    	}
    	
    	if(($ElementTovar->poluchitSvoystvo('local_del_days'))==''){
    		$loacal_del_days=$InitInfo['empty_delivary_days'];
    	}else{
    		$loacal_del_days=$ElementTovar->poluchitSvoystvo('local_del_days');
    	}




		$available=$ElementTovar->poluchitSvoystvo('vnalichii')==1?'true':'false';
		//$available=$ElementTovar->poluchitSvoystvo('nazakaz')==1?'false':'true';
		
    	
    	$Offer=array(
    		'@attributes'=>array('id'=>$iterator,
    							 'bid'=>$ElementTovar->poluchitSvoystvo('bid'),//Размер ставки на остальных местах размещения (кроме карточки модели).
    				             'cbid'=>$ElementTovar->poluchitSvoystvo('cbid'),//Размер ставки для карточки модели.
    							 'available'=>$available,
    		),
    			
    		'delivery-options'=>
    			array('option'=>
    				array(
    						array('@attributes'=>
    								array(
    										'cost'=>$loacal_del_cost, 
    										'days'=>$loacal_del_days			
    								)	
    						)
    				)
    				
    		),
    		
    			
    		
    	    'url'=>'https://'.$_SERVER['SERVER_NAME'].YandexString($_WEB_ROOT_HREF.$ElementTovar->poluchitSvoystvo('ssilka')),
    		'price'=>ElementTovarovUslug::poluchitCenuVRubliach($ElementTovar->poluchitSvoystvo('cena'),$ElementTovar->poluchitSvoystvo('valuta')),
    		'currencyId'=>'RUR',
    		//'categoryId'=>$PerviyElementMenu->poluchitSvoystvo('id'),
    	    'categoryId'=>$ElementTovar->poluchitSvoystvo('kategoriya'),
    		'picture'=>'https://'.$_SERVER['SERVER_NAME'].$_WEB_ROOT_IMG.$ElementTovar->poluchitSvoystvo('picture'),	
    		
    		'vendor'=>$ElementTovar->poluchitSvoystvo('vendor'),
    		'store'=>"true",//Возможность купить товар в розничном магазине
    		'pickup'=>$ElementTovar->poluchitSvoystvo('samovivoz')==1 ? 'true' : 'false',
    		'delivery'=>$ElementTovar->poluchitSvoystvo('dostavka')==1 ? 'true' : 'false',//Возможность курьерской доставки соответствующего товара
    		/*'sales_notes'=>Элемент используется для отражения информации о
    		 * минимальной сумме заказа, минимальной партии товара, необходимости предоплаты (указание элемента обязательно);
    		 * вариантах оплаты, описания акций и распродаж (указание элемента необязательно).
    		 * */
    		'description'=>YandexString( 
    				mb_substr(str_replace ( '_***_', $ElementTovar->poluchitSvoystvo ( 'kluchevoe_slovo' ), strip_tags ( $ElementTovar->poluchitSvoystvo ( 'opisanie' ) ) ), 0,100,'UTF-8')
    				),
    	);
    	$type_prefix=$ElementTovar->poluchitSvoystvo('type_prefix');
    	$model=$ElementTovar->poluchitSvoystvo('model');
    	if(!empty($type_prefix)){
    	    $Offer['typePrefix']=YandexString($type_prefix);
    	    $Offer['model']=YandexString($model);
    	    $Offer['@attributes']['type']='vendor.model';
        }else{
            $Offer['name']=YandexString($ElementTovar->poluchitSvoystvo('nazvanie'));
        }
		if($ElementTovar->poluchitSvoystvo('dostavka')!=1){
			unset($Offer['delivery-options']);
		}
    	/** Элемент используется для отражения информации о
    	* минимальной сумме заказа, минимальной партии товара, необходимости предоплаты (указание элемента обязательно);
    	* вариантах оплаты, описания акций и распродаж (указание элемента необязательно).
    	* */
    	
    	$Sales_Notes=array();


    	if(($ElementTovar->poluchitSvoystvo ('min_summ'))>0){
    		$Sales_Notes[]=array('@value'=>'Доставка при заказе от '.$ElementTovar->poluchitSvoystvo('min_summ').' рублей.');
    	}
    	if(($ElementTovar->poluchitSvoystvo ('min_kol'))>0){
    		$Sales_Notes[]=array('@value'=>'Минимальная партия при доставке '.$ElementTovar->poluchitSvoystvo('min_kol').' шт.');
    	}
    	
    	if(count($Sales_Notes)>0){
    		$Offer['sales_notes']=$Sales_Notes;
    	}
    	
    	
    	array_push($Offers, $Offer);
    	
    	
    	if(!in_array($PerviyElementMenu->poluchitSvoystvo('id'), $CategoriesIds)){
    		array_push($CategoriesIds,$PerviyElementMenu->poluchitSvoystvo('id'));
    		array_push($Categories,array('@attributes'=>array('id'=>$PerviyElementMenu->poluchitSvoystvo('id')),'@value'=>YandexString($PerviyElementMenu->poluchitSvoystvo('nazvanie'))));
    	}
    	
		
	}
	$Categories=array(
	    array('@value'=>'Все товары','@attributes'=>array('id'=>1)),
	    array('@value'=>'Услуги','@attributes'=>array('id'=>2,'parentId'=>1)),
	    array('@value'=>'Техническое обслуживание','@attributes'=>array('id'=>3,'parentId'=>2)),
	    array('@value'=>'Заправка картриджей','@attributes'=>array('id'=>400,'parentId'=>3)),
	    
	    array('@value'=>'Компьютерная техника','@attributes'=>array('id'=>5,'parentId'=>1)),
	    array('@value'=>'Расходные материалы','@attributes'=>array('id'=>6,'parentId'=>5)),
	    array('@value'=>'Картриджи','@attributes'=>array('id'=>100,'parentId'=>6)),
	    array('@value'=>'Чернила, тонеры, фотобарабаны','@attributes'=>array('id'=>101,'parentId'=>6))
	);
	
	$OutPutArray['shop']['categories']['category']=$Categories;
	$OutPutArray['shop']['offers']['offer']=$Offers;
	
	
	
	
	$xml = Array2XML::createXML('yml_catalog', $OutPutArray);
	
	$xmlResult=str_replace('<yml_catalog>', '<yml_catalog date="'.date('Y-m-d H:i').'">', $xml->saveXML());
	
	//echo $xmlResult;


	
	file_put_contents($_SERVER['DOCUMENT_ROOT'].'/site_information/YMLNEW.xml',  $xmlResult);
    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/YMLNEW.xml',  $xmlResult);
	echo "All good!";
?>