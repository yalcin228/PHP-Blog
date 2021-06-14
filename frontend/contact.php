<?php require_once("header.php");?>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
       
        <div class="article">
          <h2><span>Bizimle</span> Əlaqə</h2>
          <div class="clr"></div>
          <?php
          extract($_GET);
          if(@$operation == "yes"){
            echo "<div class='alert alert-success'>Mailiniz yollandi.En qisa muddetde sizinle elaq qurulucaq.TEsekkur ederik.</div>";
          }

          ?> 
          
          <form action="mesajgonder.php" method="post" id="sendemail" >
            <ol>
              <li>
                <label for="name">Adiniz</label>
                <input type="text" id="name"  name="mesaj_gonderen" required class="text" />
              </li>
              <li>
                <label for="email">Email Address</label>
                <input type="email" id="email" name="mesaj_gonderen_email" required class="text" />
              </li>
              <li>
                <label for="website">Basliq</label>
                <input type="text" id="website" name="mesaj_basliq" required class="text" />
              </li>
              <li>
                <label for="message">Mesajiniz</label>
                <textarea id="message" name="mesaj_icerik" required rows="8" cols="50"></textarea>
              </li>
              <li>
                <button type="submit" onclick="mesajGonder();" class="btn btn-primary">Mesaj gonder</button>
                <div class="clr"></div>
              </li>
            </ol>
          </form>

<script>

function mesajGonder(){
  var deyer=$("#sendemail").serialize();

  $.ajax({
    method: "POST",
    url: "mesajgonder.php",
    data: deyer,

    success:function(data){
        console.log(data);
        //Success Message == 'Title', 'Message body', Last one leave as it is
	    swal("Tebrikler!", "Messajibiz Yollandi.En qisa muddetde geri donus edilecek!", "success");
      },
      error:function(data){
        swal("Xeta","Bir Xeta yasandai tekrar yoxlayin","error");
      }
  })
}

</script>

        </div>
      </div>
      <?php require_once("sag.php");?>
      <div class="clr"></div>
    </div>
  </div>
  <?php require_once("footer.php");?>