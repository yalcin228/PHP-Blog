<?php

function fileUpload($dosya,$limit,$icazeler = null){
    $mesaj=[];
    if(is_uploaded_file($dosya['tmp_name'])){
        $max_size=(1024*1024)*$limit;
        $icaze= $icazeler ? $icazeler : ['image/png','image/jpg','image/jpeg','image/gif'];
        $uzanti=$dosya['type'];
        $file='image';
        $sekil_ad=explode(".",$dosya['name']);
        $yeni_ad=uniqid().".".$sekil_ad[1];
         if($dosya['error'] == 4){
             $mesaj['error'] = "Sekil fayli secin";
         }
         else if($dosya['size'] > 1024*1024){
            $mesaj['error'] = "Favicon olcusu 1mb-dan cox ola bilmez";
         }
         else if (!in_array($uzanti,$icaze)){
            $mesaj['error'] = "File tipi xetalidir";
         }
         else{
             $upload=move_uploaded_file($dosya['tmp_name'],$file."/".$yeni_ad);
                if($upload){
                    $mesaj['dosya'] = "$file/$yeni_ad";
                }
            }
     }
     return $mesaj;
}
?>