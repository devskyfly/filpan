<script>
function hide_korzina()
{
	main_div_element=$('#z_window_main');
	div_element=$('#z_window');
	
	button_element=$('#close_window');
	button_element.click(function(){$(div_element).slideUp();main_div_element.slideUp();});
}
</script>