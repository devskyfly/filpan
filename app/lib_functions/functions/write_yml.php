<?function write_yml($gifts,$usl)
{

$ref=fopen($_SERVER['DOCUMENT_ROOT'].'/site_information/yml.csv','w+');
 fprintf($ref,"id;type;bid;url;price;currencyId;category;picture;vendor;model;store;delivery;description;local_delivery_cost;available;pickup\r\n");
$iterator=1;

	$i=0;

		while ($usl->f_array[$i])
		{
		$nal='false';
		if($usl->f_array[$i]['nazakaz']==1)
		{
		$nal='true';
		}
		$order   = array("\r\n", "\n", "\r");
		$usl_link=get_chpu_url($usl->f_array[$i]['id'],$usl->f_array[$i]['model'],$type='2');
		fprintf($ref,"\"%s\";\"vendor.model\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\"\r\n",
		$iterator,
		$usl->f_array[$i]['bid'],
		$usl_link,
		$usl->f_array[$i]['price'],
		'RUR',
		$usl->f_array[$i]['category'],
		'http://www.filpan.ru/img/'.$usl->f_array[$i]['pict'],
		strip_tags(str_replace($order,"",str_replace('"','""',$usl->f_array[$i]['vendor']))),
		strip_tags(str_replace($order,"",str_replace("_***_",$usl->f_array[$i]['word_key'],str_replace('"','""',$usl->f_array[$i]['model'])))),
		'true',
		'true',
		strip_tags(str_replace($order,"",str_replace('"','""',str_replace("_***_",$usl->f_array[$i]['word_key'],$usl->f_array[$i]['descr'])))),
		$usl->f_array[$i]['local_del'],
		 $nal,
		 'true'
		);


		$i++;
		$iterator++;
		}



		$i=0;
		while ($gifts->f_array[$i])
		{
		$new_price=ceil(($gifts->f_array[$i]['price']*$gifts->kurs)/10)*10;
	    $nal='false';
		if($gifts->f_array[$i]['nazakaz']==1)
		{
		$nal='true';
		}
        $tov_link=get_chpu_url($gifts->f_array[$i]['id'],$gifts->f_array[$i]['model'],$type='1');
		$order   = array("\r\n", "\n", "\r");
		fprintf($ref,"\"%s\";\"vendor.model\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\";\"%s\"\r\n",
		$iterator,
		$gifts->f_array[$i]['bid'],
		$tov_link,
		$new_price,
		'RUR',
		$gifts->f_array[$i]['category'],
		'http://www.filpan.ru/img/'.$gifts->f_array[$i]['pict'],
		strip_tags(str_replace($order,"",str_replace('"','""',$gifts->f_array[$i]['vendor']))),
		strip_tags(str_replace($order,"",str_replace("_***_",$gifts->f_array[$i]['word_key'],str_replace('"','""',$gifts->f_array[$i]['model'])))),
		'true',
		'true',
		strip_tags(str_replace($order,"",str_replace('"','""',str_replace("_***_",$gifts->f_array[$i]['word_key'],$gifts->f_array[$i]['descr'])))),
		$gifts->f_array[$i]['local_del'],
		$nal,
		'true'
		);


		$i++;
		$iterator++;
		}
	fclose($ref);
	}

?>