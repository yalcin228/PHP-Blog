<?php require_once("header.php");


?>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
       

      <?php 
      $yazi_id=$_GET["yazi_id"];
     
       $yazi=$conn->prepare("SELECT * FROM yazilar INNER JOIN kateqoriler ON kateqoriler.kateqori_id=yazilar.yazi_kateqori_id
       WHERE yazi_id=?
       ");
       $yazi->execute(array($yazi_id));
       $yazi_cek=$yazi->fetch(PDO::FETCH_ASSOC);

       $oxuma = @$_COOKIE[$yazi_cek['yazi_id']];

       if(!$oxuma){
         $oxuma = $conn->prepare("UPDATE yazilar SET yazi_oxunma_sayi=".$yazi_cek['yazi_oxunma_sayi']."+1 WHERE yazi_id=?");
         $oxuma->execute(array($yazi_id));
         setcookie("".$yazi_cek['yazi_id'],"_",time()+60);
       }
       
       ?>
        <div class="article">
          <h2 style="font-size:18px;"><?php echo $yazi_cek["yazi_basliq"]; ?></h2>
          <p class="infopost">Tarix: <span class="date"><?php echo $yazi_cek['yazi_tarix']; ?></span> by  ADMIN &nbsp;&nbsp;|&nbsp;&nbsp; Oxunma sayı:<span><?php echo $yazi_cek['yazi_oxunma_sayi']; ?></span>&nbsp;&nbsp;|&nbsp;&nbsp; Kateqoriya <a href="#"><?php echo $yazi_cek['kateqori_title']; ?></a></p>
          <div class="clr"></div>
          <div class="img"><img src="images/<?php echo $yazi_cek['yazi_sekil']; ?>" width="620" height="154" alt="<?php echo $row['yazi_basliq']; ?>" class="fl" /></div>
          
          <div class="post_content">
            <p><?php echo $yazi_cek["yazi_icerik"]; ?></p>
          </div>


          <div class="clr"></div>
        </div>

<div class="article">
<h2>Yapilan Yorumlar</h2>
      <div class="clr"></div>
      <div class="sidebar-post" style="height;auto;">
          <div class="sidebar-post-info">
              <b style="text-transform:capitalize;">Yalcin Gulmemmedov</b>
              <span style="float:right;">10 iyul 2021</span>

          </div>

           <div class="sidebar-post-meta">
              <b><p><i>Lorem imspsum dolor</i></p></b>
           </div>
    </div>
      <div class="sidebar-post" style="height:auto; background-color:#ddd; margin-top:10px;">
              <div class="sidear-post-info">
                  <b style="text-transform:capitalize;">Admin</b>
                  <span style="float:right;">10 iyun 2021</span>
               </div>

           <div class="sidebar-post-meta">
                <b><p><b>Cevap</b>:<i>Cox Tesekkurler.</i></p></b>
           </div>
      </div>
  </div>
      


        <div class="article">
          <h2>Fikirlerinizi bildirin...</h2>
          <div class="clr"></div>
          <form action="yorum-yaz" method="post" id="leavereply" onsubmit="return false;" >
            <ol>
              <li>
              <input type="hidden" name="yorum_yazi_id" value="<?php echo $yazi_id; ?>">
                <label for="name">Ad</label>
                <input type="text" id="name" required name="yorum_yazan" class="text" />
              </li>
              <li>
                <label for="email">Email Unvan</label>
                <input type="email" id="email" name="yorum_email" class="text" />
              </li>
              <li>
                <label for="website">WebSayt</label>
                <input type="text"  id="website" name="yorum_yazan_sayt" class="text" />
              </li>
              <li>
                <label for="message">Mesajiniz</label>
                <textarea id="message" name="yorum_icerik" rows="8" cols="50"></textarea>
              </li>
              <li>
              <button type="submit" class="btn">Send</button>         
                     <div class="clr"></div>
              </li>
            </ol>
          </form>
        </div>
<script>
  
$(document).ready(function(){
  $('#leavereply').on('submit',function() {  //Don't foget to change the id form
  $.ajax({
      url:'yorum-yaz.php', //===PHP file name====
      data:$(this).serialize(),
      type:'POST',
      success:function(data){
        console.log(data);
        //Success Message == 'Title', 'Message body', Last one leave as it is
	    swal("¡Success!", "Message sent!", "success");
      },
      error:function(data){
        //Error Message == 'Title', 'Message body', Last one leave as it is
	    swal("Oops...", "Something went wrong :(", "error");
      }
    });
   //This is to Avoid Page Refresh and Fire the Event "Click"
  });
});
</script>



      </div>
      <?php require_once("sag.php");?>
      <div class="clr"></div>
    </div>
  </div>
  <?php require_once("footer.php");?>