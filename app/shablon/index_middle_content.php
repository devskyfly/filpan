<style>
.content-box-auto-width-grey {

color: #89898A;
font-family: arial,helvetica,tahoma,verdana,sans-serif;
font-size: 12px;

}
</style>
			<div class="middle_content">
				<?
				$index_statyi=new index_statyi_free();
				$index_statyi->show();
				?>
				
				
				<div class="content-box-auto-width">
				<span class="content_box_title-auto-width">Услуги</span>
			    
				
				<?
				$index_statyi=new index_statyi();
				$index_statyi->show();
				?>
			</div>
			<div class="content-box-auto-width">
			<span class="content_box_title-auto-width">Товары</span>
			<?
				$index_statyi=new index_statyi_gift();
				$index_statyi->show();
				?>
				
			</div>
