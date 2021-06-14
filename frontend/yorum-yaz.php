<?php 
require_once("config.php");


extract($_POST);
if($_POST){
    if(!$yorum_yazan || !$yorum_email || !$yorum_icerik || !$yorum_yazan_sayt ){
            echo "bos";
        
    }
    else{
            $yorumlar=$conn->prepare("INSERT INTO yorumlar SET yorum_yazan=?, yorum_email=?, yorum_icerik=?, yorum_yazan_sayt=?,yorum_yazi_id=?,yorum_ust=?");
            $insert=$yorumlar->execute(array($yorum_yazan,$yorum_email,$yorum_icerik,$yorum_yazan_sayt,$yorum_yazi_id,0));

                if($insert){
                    echo "duz";
                }
                else{
                    echo "xeta";
                }
        }
    }


?>