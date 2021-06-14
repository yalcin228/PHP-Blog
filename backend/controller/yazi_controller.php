<?php
require("config.php");

////// Yazilar duzenleme
extract($_POST);
$yazi_id=$_GET['yazi_id'];
if(isset($yazi_duzenle_gonder)){
    
    if(is_uploaded_file($_FILES['yazi_sekil']['tmp_name'])){
        $yazi_id=$_GET['yazi_id'];
        $max_size=1024*1024*5;
        $icaze=['image/jpg','image/png','image/gif','image/jpeg'];
        $uzanti=$_FILES['yazi_sekil']['type'];
        $fileAd="../../frontend/images";
        $sekilAd=explode(".",$_FILES['yazi_sekil']['name']);
        $yeniSekilAd=rand(10000,9999999).".".$sekilAd[1];

        if($_FILES['yazi_sekil']['error'] == 4){
            header("Location:../yazilar.php?operation=sehvFile");
        }
        else if($_FILES['yazi_sekil']['size'] > $max_size){
            header("Location:../yazilar.php?operation=olcu");
        }
        else if(!in_array($uzanti,$icaze)){
            header("Location:../yazilar.php?operation=icaze");
        }
        else{
            $sil= $conn->prepare("SELECT * FROM yazilar WHERE yazi_id");
            $sil->execute();
            $kohne_sekil=$sil->fetch(PDO::FETCH_ASSOC);
            $kohne_sekil['yazi_sekil'];
            unlink("../../frontend/images"."/".$kohne_sekil['yazi_sekil']);
            $upload=move_uploaded_file($_FILES['yazi_sekil']['tmp_name'],$fileAd."/".$yeniSekilAd);
           


            $yazilar_edit=$conn->prepare("UPDATE yazilar SET yazi_sekil=?, yazi_basliq=?, yazi_kateqori_id=?, yazi_icerik=? WHERE yazi_id=?");
            $yazilar_edit->execute(array($yeniSekilAd,$yazi_basliq,$yazi_kateqori_id,$yazi_icerik,$yazi_id));

            if($yazilar_edit){
                header("Location:../yazilar.php?operation=yes");
            }
            else{
                header("Location:../yazilar.php?operation=no");
            }

            
        }
    }
    else{
        if(!$yazi_basliq || !$yazi_kateqori_id || !$yazi_icerik){
            header("Location:../yazilar.php?operation=boss");
        }
        else{
            $yazilar_edi=$conn->prepare("UPDATE yazilar SET  yazi_basliq=?, yazi_kateqori_id=?, yazi_icerik=? WHERE yazi_id=?");
            $yazilar_edi->execute(array($yazi_basliq,$yazi_kateqori_id,$yazi_icerik,$yazi_id));

            if($yazilar_edi){
                header("Location:../yazilar.php?operation=yess");
            }
            else{
                header("Location:../yazilar.php?operation=noo");
            }

        }
    }
}


////// Yazilar Silme
if($_POST){
    $id=$_POST['delete_id'];
    $delete_project=$conn->prepare("DELETE FROM yazilar WHERE yazi_id=?");
    $delete_project->execute(array($id));
}

////// Yazi elave etmek
if(isset($yazi_add_gonder)){
    
    if(is_uploaded_file($_FILES['yazi_sekil']['tmp_name'])){
        $max_size=1024*1024*5;
        $icaze=['image/jpg','image/png','image/gif','image/jpeg'];
        $uzanti=$_FILES['yazi_sekil']['type'];
        $fileAd="../../frontend/images";
        $sekilAd=explode(".",$_FILES['yazi_sekil']['name']);
        $yeniSekilAd=rand(10000,9999999).".".$sekilAd[1];

        if($_FILES['yazi_sekil']['error'] == 4){
            header("Location:../yazilar_add.php?operation=sehvFile");
        }
        else if($_FILES['yazi_sekil']['size'] > $max_size){
            header("Location:../yazilar_add.php?operation=olcu");
        }
        else if(!in_array($uzanti,$icaze)){
            header("Location:../yazilar_add.php?operation=icaze");
        }
        else{
            $upload=move_uploaded_file($_FILES['yazi_sekil']['tmp_name'],$fileAd."/".$yeniSekilAd);
           
            $yazilar_add=$conn->prepare("INSERT INTO yazilar SET yazi_sekil=?, yazi_basliq=?, yazi_kateqori_id=?, yazi_icerik=?");
            $yazilar_add->execute(array($yeniSekilAd,$yazi_basliq,$yazi_kateqori_id,$yazi_icerik));

            if($yazilar_add){
                header("Location:../yazilar_add.php?operation=yes");
            }
            else{
                header("Location:../yazilar_add.php?operation=no");
            }

            
        }
    }
   
}


?>