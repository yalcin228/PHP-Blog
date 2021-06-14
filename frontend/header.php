<?php
require_once("config.php");
$ayar=$conn->prepare("SELECT * FROM ayarlar");
$ayar->execute();
$ayar_cek=$ayar->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="az">
<head>
<title><?php echo $ayar_cek["ayar_title"];?></title>
<meta charset="UTF-8">
<meta name="description" content="<?php echo $ayar_cek["ayar_desc"];?>">
<meta name="keywords" content="<?php echo $ayar_cek["ayar_keyw"];?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<link rel="shortcut icon" href="images/<?php echo $ayar_cek["ayar_favicon"]; ?>" />

<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>



<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>



</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
          <li class="active"><a href="index.php"><span>Ana Səyfə</span></a></li>
          <li><a href="about.php"><span>Haqqımızda</span></a></li>
          <li><a href="contact.php"><span>Əlaqə</span></a></li>
        </ul>
      </div>
      <div class="logo">
        <h1><a href="index.php" style="color:blue;">Xeberler<span style="color:#FF98C2;">Blogu</span></a></h1>
      </div>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider"> 

        <?php
          $slider=$conn->prepare("SELECT * FROM slider");
          $slider->execute();
          $slider_cek=$slider->fetchAll(PDO:: FETCH_ASSOC);
          foreach($slider_cek as $row){
        ?>

          <a href="#"><img src="images/<?php echo $row['slider_foto']; ?>" width="960" height="360" alt="" /> </a> 
          
          <?php } ?>
        </div>
        
          <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>