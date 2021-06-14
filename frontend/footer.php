<?php
require_once("config.php");
$ayar=$conn->prepare("SELECT * FROM ayarlar");
$ayar->execute();
$ayar_cek=$ayar->fetch(PDO::FETCH_ASSOC);
?>
<div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Image</span> Gallery</h2>
        <a href="#"><img src="images/gal1.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> </div>
      <div class="col c2">
        <h2><span>Bizim</span>Xidmetimiz</h2>
        <p>Xidmetlerimiz haqqinda en son melumatlari sosyal medya unvanlarimizdan bizi izleyerek xeberdar ola bilerisiniz.</p>
        <ul class="fbg_ul">
          <li><a target="_blank" href="https://www.instagram.com/yalcin.228/"><img src="images/inss.png" alt=""></a></li>
          <li><a target="_blank" href="https://www.facebook.com/"><img src="images/fbb.png" alt=""></a></li>
          
        </ul>
      </div>
      <div class="col c3">
        <h2><span>Bizimlə</span> Əlaqə</h2>
        <p>Bzimlə aşağıda göstərdiyimiz yollarla əlaqə saxləya bilərsiz.</p>
        <p class="contact_info"> <span>Ünvan:</span> <?php echo $ayar_cek["ayar_unvan"];?><br />
          <span>Telefon:</span><?php echo $ayar_cek["ayar_nom"];?><br />
          <span>E-mail:</span> <a href="#"><?php echo $ayar_cek["ayar_mail"];?></a> </p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">Copyright &copy; 2021 Bütün hüquqlar qorunur.</p>
      <p class="rf">Yaradıcı: <a target="_blank" href="http://www.instagram.com/yalcin.228"><?php echo $ayar_cek["ayar_author"];?></a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</html>
