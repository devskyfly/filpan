<script>
function mark_change(){

market_inf=$('#market_inf');
nazakaz_inf= $('#nazakaz_inf');
local_del_inf= $('#local_del_inf');
market_inf.live('click',function()
 {
	 if(local_del_inf[0].value==0)
	 {
	 market_inf[0].checked=false;
	 local_del_inf[0].value='?????';
	 return;
	 }
	 if(market_inf[0].checked==true)
	 {
	 nazakaz_inf[0].checked=true;
	 /**/
	 }
	 else
	 {
	 }
 }
 );
 }
</script>

