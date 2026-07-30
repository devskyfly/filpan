<div class="ModulSredneyKolonki">
			<?

			if($ElementStatya->poluchitSvoystvo('variant_otobrageniya')==$_VARIANT_OTOBRAGENIYA_STATYI['statya_metro'])
			{
			//echo sprintf("%s",$ElementStatya->poluchitSvoystvo('text_statyi'));
			$Ulici=str_replace(';', '<br>', $ElementStatya->poluchitSvoystvo('text_statyi'));
			$Ulici='<div class="streetDiv"'.$Ulici.'</div>';
			$TextNaStranice=str_replace('_streets_', $Ulici, $ElementStatya->poluchitSvoystvo('dop_text_statyi'));
			echo sprintf("%s",$TextNaStranice);
			}
			else
			{
				echo sprintf("%s",$ElementStatya->poluchitSvoystvo('text_statyi'));
			}
			?>		
</div>