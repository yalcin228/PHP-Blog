<?php
require("config.php");

//// Sayt SEO ayarlar duzenleme
if(isset($_POST['seo_ayar_gonder'])){
    $ayar_title=$_POST['ayar_title'];
    $ayar_link=$_POST['ayar_link'];
    $ayar_desc=$_POST['ayar_desc'];
    $ayar_keyw=$_POST['ayar_keyw'];

    if(!$ayar_title || !$ayar_link || !$ayar_desc || !$ayar_keyw){
        header("Location:../seo_ayarlar.php?operation=bos");
    }
    else{
        $seo_ayar_edit=$conn->prepare("UPDATE ayarlar SET ayar_title=?, ayar_keyw=?, ayar_desc=?, ayar_link=? WHERE ayar_id=?");
        $seo_ayar_edit->execute(array($ayar_title,$ayar_keyw,$ayar_desc,$ayar_link,1));

        if($seo_ayar_edit){
            header("Location:../seo_ayarlar.php?operation=ok");
        }
        else{
            header("Location:../seo_ayarlar.php?operation=no");
        }
    }
}

///// Media Ayarlari yenileme
if(isset($_POST['media_ayar_gonder'])){
    $ayar_twitter=$_POST['ayar_twitter'];
    $ayar_facebook=$_POST['ayar_facebook'];
    $ayar_linkedin=$_POST['ayar_linkedin'];
    $ayar_instagram=$_POST['ayar_instagram'];
    $ayar_youtube=$_POST['ayar_youtube'];

    if(!$ayar_twitter || !$ayar_facebook || !$ayar_linkedin || !$ayar_instagram || !$ayar_youtube){
        header("Location:../media_ayarlar.php?operation=bos");
    }
    else{
        $media_ayar_edit=$conn->prepare("UPDATE ayarlar SET ayar_twitter=?, ayar_facebook=?, ayar_linkedin=?, ayar_instagram=?, ayar_youtube=? WHERE ayar_id=?");
        $media_ayar_edit->execute(array($ayar_twitter,$ayar_facebook,$ayar_linkedin,$ayar_instagram,$ayar_youtube,1));

        if($media_ayar_edit){
            header("Location:../media_ayarlar.php?operation=ok");
        }
        else{
            header("Location:../media_ayarlar.php?operation=no");
        }

    }
}


////// Logo ayarlari sekil file yuklemek

if(isset($_POST['logo_ayar_gonder'])){
    
    if(is_uploaded_file($_FILES['ayar_favicon']['tmp_name'])){
        $max_size=1024*1024*5;
        $icaze=['image/jpg','image/png','image/gif','image/jpeg'];
        $uzanti=$_FILES['ayar_favicon']['type'];
        $fileAd="../../frontend/images";
        $sekilAd=explode(".",$_FILES['ayar_favicon']['name']);
        $yeniSekilAd=rand(10000,9999999).".".$sekilAd[1];

        if($_FILES['ayar_favicon']['error'] == 4){
            header("Location:../logo_ayarlar.php?operation=sehvFile");
        }
        elseif($_FILES['ayar_favicon']['size'] > $max_size){
            header("Location:../logo_ayarlar.php?operation=olcu");
        }
        elseif(!in_array($uzanti,$icaze)){
            header("Location:../logo_ayarlar.php?operation=icaze");
        }
        else{
            $upload=move_uploaded_file($_FILES['ayar_favicon']['tmp_name'],$fileAd."/".$yeniSekilAd);
            $ayar_logo=$_POST['ayar_logo'];

            $logo_ayar_edit=$conn->prepare("UPDATE ayarlar SET ayar_logo=?, ayar_favicon=? WHERE ayar_id=?");
            $logo_ayar_edit->execute(array($ayar_logo,$yeniSekilAd,1));

            if($logo_ayar_edit){
                header("Location:../logo_ayarlar.php?operation=yes");
            }
            else{
                header("Location:../logo_ayarlar.php?operation=no");
            }

            
        }
    }
}



?>