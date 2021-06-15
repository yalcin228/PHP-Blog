<?php require_once("header.php");?>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
       <?php 
       
        @$sehive=intval($_GET['sehive']); 
        if(!$sehive || $sehive<1){
          $sehive=1;
        }
 
        $yazi_say=$conn->query("SELECT * FROM yazilar");
        $toplamYazi=$yazi_say->rowCount();
        $limit=2;
        $sehiveSayi=ceil($toplamYazi/$limit); if($sehive > $sehiveSayi){$sehive=$sehiveSayi;}
        $goster=$sehive*$limit-$limit;
        $gorunenSehive=3;




       $yazi=$conn->prepare("SELECT * FROM yazilar INNER JOIN kateqoriler ON kateqoriler.kateqori_id=yazilar.yazi_kateqori_id
       ORDER BY yazi_tarix DESC
       LIMIT $goster,$limit 
       ");
       $yazi->execute();
       $yazi_cek=$yazi->fetchALL(PDO::FETCH_ASSOC);
       
       foreach($yazi_cek as $row){
       ?>
        <div class="article">
          <h2 style="font-size:18px;"><?php echo $row["yazi_basliq"]; ?></h2>
          <p class="infopost">Tarix: <span class="date"><?php echo $row['yazi_tarix']; ?> | &nbsp </span> by ADMIN  &nbsp;&nbsp;|&nbsp;&nbsp; Oxunma sayı: <span><?php echo $row['yazi_oxunma_sayi']; ?></span>&nbsp;&nbsp;|&nbsp;&nbsp; Kateqoriya <a href="#"><?php echo $row['kateqori_title']; ?></a></p>
          <div class="clr"></div>
          <div class="img"><img src="images/<?php echo $row['yazi_sekil']; ?>" width="620" height="154" alt="<?php echo $row['yazi_basliq']; ?>" class="fl" /></div>
          <div class="post_content">
            <p><?php echo substr($row["yazi_icerik"],0,800); ?>...</p>
            
            <p class="spec"><a href="blog.php?yazi_id=<?php echo $row["yazi_id"]; ?>" class="rm">Ardini oxuyun &raquo;</a></p>
          </div>
          <div class="clr"></div>
        </div>
       
<?php } ?>



        <p class="pages">
           <?php 
            for($i=$sehive-$gorunenSehive; $i<$sehive+$gorunenSehive+1;$i++){
              if($i>0 && $i<=$sehiveSayi){
                if($i== $sehive){
                 echo '<a href="index?sehive='.$i.'" style="background-color:#42ade7; color:white;" >'.$i.'</a> '; 
                }
                else{
                  echo ' <a href="index?sehive='.$i.'">'.$i.'</a>';
                }
              }
            }
           ?>
           
          



           <a href="#">&raquo;</a>
        </p>
      </div>
     
     
     
     <?php require_once("sag.php")?>
     

      <div class="clr"></div>
    </div>
  </div>
<?php require_once("footer.php");?>
 