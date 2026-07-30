
<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/filpannext/FunkciiIKlassi/FailKonfiguracii.php");
$_IMG_UPLOAD_ROOT=$_SERVER['DOCUMENT_ROOT'].'/img/';
if(isset($_POST['upload'])){
    
    //Список разрешенных файлов
    //$whitelist = array(".gif", ".jpeg", ".jpg",".png");         
    $whitelist = array(".jpg");         
    $data = array();
    $error = true;
    
    //Проверяем разрешение файла
    foreach  ($whitelist as  $item) {
        if(preg_match("/$item\$/i",$_FILES['userfile']['name'])) $error = false;
    }

    //если нет ошибок, грузим файл
    if(!$error) { 
                 
        //$folder =  $_ROOT.'upload/';//директория в которую будет загружен файл
        $folder =  $_IMG_UPLOAD_ROOT;//директория в которую будет загружен файл
         $tekushiyNomerKartinki=poluchitGlobalnoeSvoystvo('kartinka');
         //$noviyNomerKartinki=$tekushiyNomerKartinki+1;

         $noviyNomerKartinki="picture".time();

        $uploadedFile =  $folder.$noviyNomerKartinki.'.jpg';
        //$uploadedFile =  $folder.basename($_FILES['userfile']['name']);

             
            if(is_uploaded_file($_FILES['userfile']['tmp_name'])){
            //$data['errors']= move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadedFile));
                if(move_uploaded_file($_FILES['userfile']['tmp_name'],$uploadedFile)){
            
                    //$data = $_FILES['userfile'];
                    $data['name'] = $noviyNomerKartinki.'.jpg';
                }
                else {    

                    $data['errors'] = "Во время загрузки файла произошла ошибка ".$uploadedFile;//$data['errors']=$uploadedFile;
                    //$data['errors']=basename($_FILES['userfile']['name']);
                }
            }
            else {    
                $data['errors'] = "Файл не  загружен";
            }
        
    }
    else{
        
        $data['errors'] = 'Вы загружаете запрещенный тип файла';
    }
    
    
   
    izmenitGlobalnoeSvoystvo('kartinka',$noviyNomerKartinki);
    //Формируем js-файл    
    $res = '<script type="text/javascript">';
    $res .= "var data = new Object;";
    foreach($data as $key => $value){
        $res .= 'data.'.$key.' = "'.$value.'";';
    }
    


    $res .= 'window.parent.handleResponse(data);';
    $res .= "</script>";
    
    echo $res;

}
else{
    die("ERROR");
}

?>