<?php require_once("header.php");?>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
       
<?php 
$kat_id=$_GET['kat_id'];
$yazi=$conn->prepare("SELECT * FROM kateqoriler INNER JOIN yazilar ON yazilar.yazi_kateqori_id=kateqoriler.kateqori_id  WHERE kateqori_id=? ORDER BY yazi_id DESC");
$yazi->execute(array($kat_id));
$yazi_listele=$yazi->fetchAll(PDO::FETCH_ASSOC);
foreach($yazi_listele as $row){

?>
        <div class="article">
          <h2 style="font-size:18px;"><a href="blog.php?yazi_id=<?php echo $row['yazi_id']; ?>"><?php echo $row["yazi_basliq"]; ?></a></h2>
          <p class="infopost">Tarix: <span class="date"><?php echo $row['yazi_tarix']; ?></span> by  &nbsp;&nbsp;|&nbsp;&nbsp; Oxunma sayı:<span><?php echo $row['yazi_oxunma_sayi']; ?></span>&nbsp;&nbsp;|&nbsp;&nbsp; Kateqoriya <a href="#"><?php echo $row['kateqori_title']; ?></a></p>
          <div class="clr"></div>
          <div class="img"><img src="images/<?php echo $row['yazi_sekil']; ?>" width="620" height="154" alt="<?php echo $row['yazi_basliq']; ?>" class="fl" /></div>
          
          <div class="post_content">
            <p><?php echo $row["yazi_icerik"]; ?></p>
          </div>


          <div class="clr"></div>
        </div>
       <?php }?>


      </div>
      <?php require_once("sag.php");?>
      <div class="clr"></div>
    </div>
  </div>
  <?php require_once("footer.php");?>