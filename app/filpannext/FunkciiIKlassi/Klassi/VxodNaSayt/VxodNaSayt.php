<?
/*
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Класс осуществляет контроль запросов приходящих на серер.
Если запрашиваемая ссылка есть, то осуществляется проверка, является ли эта ссылка основной?
Если нет, то осуществляется поиск основной ссылки с последущим редиректом на нее.

Если указанной ссылки не вообще, то происходит редирект 404.php

Class VxodNaSayt
protected $_MassivVhodyashihParametrov;
protected $_VhodyashieParametri;
protected $_Ssilka;
protected $_User;

public VxodNaSayt(array,user)
protected this preobrazovatMassivParametrovURL()
public ssilka poluchitSsilku()

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/

Class VxodNaSayt
{
protected $_MassivVhodyashihParametrov;
protected $_VhodyashieParametri;
protected $_Ssilka;
protected $_User;


function VxodNaSayt($input_uri,$user,$AdditionalParams="")
{
global $_WEB_ROOT;
global $_WEB_ROOT_HREF;

$this->_MassivVhodyashihParametrov=$input_uri;
$this->preobrazovatMassivParametrovURL();
$this->_User=$user;
$Element = new ElementSsilka();
//echo "VxodNa";
$Element ->izmenitSvoystvo('ssilka',$this->VhodyashieParametri);
//echo "VxodNa_1";
//echo print_r($this->VhodyashieParametri, true);
$Element ->poluchitPoSsilke();
//echo "VxodNa_2";
$sushestvuet=$Element ->sushestvuet();
If($sushestvuet==true)
{


			if($Element ->poluchitSvoystvo('osnovnaya')==1)
			{
			$user->zaregisrirovatUspeshniyVhod($this->VhodyashieParametri);
			$this->_Ssilka=$Element ;
			}
			else
			{
			$OsnovnoyElement=new ElementSsilka();

			$MassivKriteriev=array();
			$MassivKriteriev['osnovnaya']=1;
			$MassivKriteriev['tablica_id']=$Element ->poluchitSvoystvo('tablica_id');
			$MassivKriteriev['id_tablici']=$Element ->poluchitSvoystvo('id_tablici');

			$OsnovnoyElement->poluchitPoKriteriyu($MassivKriteriev);


								if($OsnovnoyElement->sushestvuet()==true)
									{
									$user->zaregisrirovatUspeshniyVhod($this->VhodyashieParametri);
									header('HTTP/1.1 301 Moved Permanently');
									if(empty($ParserUrl['query'])){
										if(!empty($AdditionalParams)){
											header('Location: '.$_WEB_ROOT_HREF.$OsnovnoyElement->poluchitSvoystvo('ssilka').'?'.$AdditionalParams);
										}else{
											header('Location: '.$_WEB_ROOT_HREF.$OsnovnoyElement->poluchitSvoystvo('ssilka'));
										}
										
									}else{
										
											header('Location: '.$_WEB_ROOT_HREF.$OsnovnoyElement->poluchitSvoystvo('ssilka'));
									
									}

									}
									else
									{
									$this->_Ssilka=$Element ;
									$user->zaregisrirovatNeuspeshniyVhod($this->VhodyashieParametri);

									header('HTTP/1.1 404 Not found ');
									header('Location: '.$_WEB_ROOT_HREF.'404.php');
									}
			}

}
else
{
$this->_Ssilka=$Element ;
$user->zaregisrirovatNeuspeshniyVhod($this->VhodyashieParametri);
header('HTTP/1.1 404 Not found ');
header('Location: '.$_WEB_ROOT_HREF.'404.php');
}

}


protected function  preobrazovatMassivParametrovURL()
{
global $_WEB_ROOT;
$parametri='';
$iterator=0;
foreach($this->_MassivVhodyashihParametrov  as $key => $element)
{
if($key=='input_uri')
{

}
else
{
		if($iterator==0)
		{
	
		$parametri.=$key.'='.$element;
		$iterator++;
		}
		else
		{
		$parametri.='&'.$key.'='.$element;
		}
}
}

if($parametri=='')
{
$input_uri= $this->_MassivVhodyashihParametrov['input_uri'];
}
else
{
$input_uri= $this->_MassivVhodyashihParametrov['input_uri'].'?'.$parametri;
}
$this->VhodyashieParametri=$input_uri;
return $this;
}


public function poluchitSsilku()
{
return $this->_Ssilka;
}

}
?>