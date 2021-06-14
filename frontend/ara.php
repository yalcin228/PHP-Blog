<?php require_once("header.php");?>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
       
<?php 
$ara=strip_tags($_GET['ara']);



$yazilar=$conn->prepare("SELECT * FROM yazilar INNER JOIN kateqoriler ON kateqoriler.kateqori_id=yazilar.yazi_kateqori_id
                         WHERE yazi_basliq OR yazi_icerik LIKE ? ORDER BY yazi_id DESC
                        ");
$yazilar->execute(array("%".$ara."%"));
$yazi_cek=$yazilar->fetchAll(PDO::FETCH_ASSOC);
$yazi_say=$yazilar->rowCount();
if($yazi_say){
    foreach($yazi_cek as $row){

        ?>
                <div class="article">
                  <h2 style="font-size:18px;"><?php echo $row["yazi_basliq"]; ?></h2>
                  <p class="infopost">Tarix: <span class="date"><?php echo $row['yazi_tarix']; ?></span> by  &nbsp;&nbsp;|&nbsp;&nbsp; Oxunma sayı:<span><?php echo $row['yazi_oxunma_sayi']; ?></span>&nbsp;&nbsp;|&nbsp;&nbsp; Kateqoriya <a href="#"><?php echo $row['kateqori_title']; ?></a></p>
                  <div class="clr"></div>
                  <div class="img"><img src="images/<?php echo $row['yazi_sekil']; ?>" width="620" height="154" alt="<?php echo $row['yazi_basliq']; ?>" class="fl" /></div>
                  
                  <div class="post_content">
                    <p><?php echo $row["yazi_icerik"]; ?></p>
                  </div>
        
        
                  <div class="clr"></div>
                </div>
}

       <?php } } else{
           echo "<h2>Axtardiginizla bagli netice yoxdur...</h2>";
       } ?>


      </div>
      <?php require_once("sag.php");?>
      <div class="clr"></div>
    </div>
  </div>
  <?php require_once("footer.php");?>