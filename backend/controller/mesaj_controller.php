<?php
 require("config.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';


if($_POST){
    $gonderen = strip_tags($_POST['gonderen']); 
    $gonderilenmail = strip_tags($_POST['gonderilenmail']); 
    $mesaj = strip_tags($_POST['mesaj']); 
   
    if(!$gonderen || !$gonderilenmail || !$mesaj){
      echo "bos";
    }
    else{
        
        $mail=new PHPMailer();
        
        $mail->IsSMTP();
                    $mail->SMTPKeepAlive= true;
                    $mail->SMTPAuth = true;
                    $mail->SMTPSecure = "tls";

                    $mail->Port = 587;
                    $mail->Host = "smtp.gmail.com";
                    

                    $mail->Username = "gulmemmedovyalcin@gmail.com";
                    $mail->Password = "yalcin0703107166";

                    $mail->setFrom("gulmemmedovyalcin@gmail.com", $gonderen);
                    $mail->addAddress($gonderilenmail);

                    $mail->IsHTML(true);
                    
                    
                    $mail->Subject= $gonderen."'dan Mesaj";
                    $mail->Body = "<div>
                    <p><b>Gonderen : </b>".$gonderen."<?p>
                    <p><b>Mesaj : </b><br>".$mesaj."<?p>
                    <hr>
                    <small>Bildiris: Bu maile geri donus etmeyin cavab verilmeyecekdir..</small>
                    </div>";
                    
                    if(!$mail->Send()){
                       echo "no";
                    }
                    else{
                        echo "yes";
                    }
                    

    }
}


////// Mesaj silmek
if($_POST){
    $id=$_POST['delete_id'];
    $delete_project=$conn->prepare("DELETE FROM mesajlar WHERE mesaj_id=?");
    $delete_project->execute(array($id));
   
}



?>