<?php require_once("header.php");?>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
      <?php  
  $haqq=$conn->prepare("SELECT * FROM haqqimizda");
  $haqq->execute();
  $haqq_cek=$haqq->fetch(PDO::FETCH_ASSOC);

      ?>
        <div class="article">
          <h2><?php echo $haqq_cek['haqq_basliq']; ?></h2>
          <div class="clr"></div>
          <p><?php echo $haqq_cek['haqq_icerik'];?></p>
        </div>
     
      </div>
      <?php require_once("sag.php"); ?>
      <div class="clr"></div>
    </div>
  </div>
<?php require_once("footer.php");?>
  