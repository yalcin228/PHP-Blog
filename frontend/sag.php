<?php
require_once("config.php");
$kateqori=$conn->prepare("SELECT*FROM kateqoriler ");
$kateqori->execute();
$kateqori_cek=$kateqori->fetchAll(PDO::FETCH_ASSOC);
?>
      <div class="sidebar">
       
       
       <div class="searchform">
          <form id="formsearch" name="formsearch" method="GET" action="ara.php">
            <span>
            <input name="ara" class="editbox_search" id="editbox_search" maxlength="80" placeholder="Axtar..." type="text" />
            </span>
            <input name="button_search" src="images/search.gif" class="button_search" type="image" />
          </form>
        </div>


        <div class="gadget">
          <h2 class="star">Kateqoriya</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <?php foreach($kateqori_cek as $row){
                $yazilar=$conn->prepare("SELECT * FROM yazilar WHERE yazi_kateqori_id=?");
                $yazilar->execute(array($row["kateqori_id"]));
                $yazilar_cek=$yazilar->fetchAll(PDO::FETCH_ASSOC);
                $yazilar_say=$yazilar->rowCount();
              ?>

            <li><a href="kateqori-listele.php?kat_id=<?php echo $row["kateqori_id"]; ?>"><?php echo $row["kateqori_title"];  ?></a><span style="float:right;"><?php echo $yazilar_say; ?></span></li>
            <?php } ?>
            
          </ul>
        </div>
        <div class="gadget">
          <h2 class="star"><span>Ən çox oxunan</span></h2>
          <div class="clr"></div>
          <ul class="ex_menu">
                <?php
                  $yazi=$conn->prepare("SELECT * FROM yazilar ORDER BY yazi_oxunma_sayi DESC LIMIT 5");
                  $yazi->execute();
                  $yazi_cek=$yazi->fetchAll(PDO::FETCH_ASSOC);
                  foreach($yazi_cek as $row){
                ?>
            <li>
            <a href="blog.php?yazi_id=<?php echo $row["yazi_id"]; ?>"><?php echo $row["yazi_basliq"]; ?></a><br />
              <?php echo substr($row["yazi_icerik"],0,120); ?>...</li>
        <?php } ?>
          </ul>
        </div>
      </div>

