<?php

require("config.php");
@$id=$_GET['id'];
//////// Admin adi deyistirme
if(isset($_POST['istifadeci_yenile'])){
    $admin_username=$_POST['admin_username'];
    if(!$admin_username){
        header("Location:../profil.php?operation=bos");
    }
    else{
        $edit=$conn->prepare("UPDATE admin SET admin_username=? WHERE admin_id=?");
        $edit->execute(array($admin_username,$id));
        if($edit){
            header("Location:../profil.php?operation=yes");
        }
        else{
            header("Location:../profil.php?operation=no");
        }
    }
}


/////// Admin parol deyistirme

if(isset($_POST['istifadeci_parol_yenile'])){
    $admin_parol=$_POST['admin_parol'];
    $admin_newparol=$_POST['admin_newparol'];
    $admin_paroll=md5($admin_parol);
    $admin_newparoll=md5($admin_newparol);

    $sifre=$conn->prepare("SELECT * FROM admin");
    $sifre->execute();
    $sifre_cek=$sifre->fetch(PDO::FETCH_ASSOC);
    
    if($admin_newparol == ""){
        header("Location:../profil.php?operation=bos_sifre");
    }
    else if($admin_paroll != $sifre_cek['admin_parol']){
        header("Location:../profil.php?operation=kohneparolxeta");
    }
    else if ($admin_paroll == $sifre_cek['admin_parol']){
        $paroldeyis=$conn->prepare("UPDATE admin SET admin_parol=? WHERE admin_id=?");
        $paroldeyis->execute(array($admin_newparoll,$id));

        if($paroldeyis){
            header("Location:../profil.php?operation=paroldeyisdi");
        }
        else{
            header("Location:../profil.php?operation=xeta");

        }

    }

}
////////// Login prosesi
if(isset($_POST['login'])){
    $admin_username=htmlspecialchars(trim($_POST['admin_username']));
    $admin_parol=htmlspecialchars(trim(md5($_POST['admin_parol'])));
    if(!$admin_username || !$admin_parol){
        header("Location:../login.php?operation=xeta");
    }
    else{
        $login=$conn->prepare("SELECT * FROM admin WHERE admin_username=? AND admin_parol=?");
        $login->execute(array($admin_username,$admin_parol));
        $loginn=$login->fetch(PDO::FETCH_ASSOC);
        if($loginn){
            $_SESSION['login']=true;
            $_SESSION['admin_username']=$loginn['admin_username'];
            $_SESSION['admin_id']=$loginn['admin_id'];
            header("Location:../login.php?operation=yes");
        }
        else{
            header("Location:../login.php?operation=no");
        }

    }

}
?>