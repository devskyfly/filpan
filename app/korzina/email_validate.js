<!--Scripts for EMAIL validate -->  

<script type="text/javascript">

$(document).ready(function() {  
 $("#Email").keyup(function(){
    
    var email = $("#Email").val();
  
    if(email != 0)
    {
    if(isValidEmailAddress(email))
    {
    $("#validEmail").css({
  "background-image": "url('http://www.filpan.ru/filpan_test/korzina/validyes.png')"
    });
$("#email_val").val("Yes");
    } else {
    $("#validEmail").css({
  "background-image": "url('http://www.filpan.ru/filpan_test/korzina/validno.png')"
    });
$("#email_val").val("No");
    }
    } else {
    $("#validEmail").css({
  "background-image": "none"
    }); 
    }
  
    });
  
    });
  
    function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
    }
</script>  
<!--Scripts for EMAIL validate -->  
