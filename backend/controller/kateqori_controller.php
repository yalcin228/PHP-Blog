<?php 
require("config.php");

////// Kateqori Adi Yenileme

if(isset($_POST['kateqori_yenile'])){
    $id=$_GET['id'];
    
    $kat_title=$_POST['kateqori_title'];
    
    if(!$kat_title){
        header("Location:../kateqori.php?operation=bos");
    }
    else{
        $kateqori_edit=$conn->prepare("UPDATE kateqoriler SET kateqori_title=? WHERE kateqori_id=?");
        $kateqori_edit->execute(array($kat_title,$id));
        if($kateqori_edit){
            header("Location:../kateqori.php?operation=yes");
        }
        else{
            header("Location:../kateqori.php?operation=no");
        }
    }
}

////// Kateqori sil
if($_POST){
    $id=$_POST['delete_id'];
    $delete_kateqori=$conn->prepare("DELETE FROM kateqoriler WHERE kateqori_id=?");
    $delete_kateqori->execute(array($id));
}

/////// Kateqori Elave Etmek
if(isset($_POST['kateqori_add'])){
    $kateqori_title=$_POST['kateqori_title'];
    if(!$kateqori_title){
        header("Location:../kateqori_add.php?operation=bos");

    }
    else{
        $kateqori_add=$conn->prepare("INSERT INTO kateqoriler SET kateqori_title=?");
        $kateqori_add->execute(array($kateqori_title));
        if($kateqori_add){
            header("Location:../kateqori_add.php?operation=yes");
        }
        else{
            header("Location:../kateqori_add.php?operation=no");
        }
    }
}
?>