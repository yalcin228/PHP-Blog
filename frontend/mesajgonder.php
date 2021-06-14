<?php 
require_once("config.php");
extract($_POST);
if($_POST){
   

    $sql = "INSERT INTO mesajlar (mesaj_gonderen, mesaj_gonderen_email, mesaj_basliq, mesaj_icerik) VALUES (?,?,?,?)";
    $mesaj= $conn->prepare($sql);
    $insert=$mesaj->execute([$mesaj_gonderen, $mesaj_gonderen_email, $mesaj_basliq, $mesaj_icerik]);

    if($insert){
        header("Location:contact.php?operation=yes");
    }
}

?>