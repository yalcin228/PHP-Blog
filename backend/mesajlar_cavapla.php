<?php
require_once("header.php");
$mesaj_id=$_GET['mesaj_id'];
$mesaj=$conn->prepare("SELECT * FROM mesajlar WHERE mesaj_id=?");
$mesaj->execute(array($mesaj_id));
$mesaj_cek=$mesaj->fetch(PDO::FETCH_ASSOC);
$say=$mesaj->rowCount();
if($say){
  $x=$conn->prepare("UPDATE mesajlar SET mesaj_oxuma=? WHERE mesaj_id=?");
  $x->execute(array(1,$mesaj_id));
}


?>
<head>
    <link rel="stylesheet" href="../frontend/css/sweetalert2.min.css">
    <script src="../frontend/js/sweetalert2.all.min.js"></script>
</head>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Mesaji Cavapla Sehifesi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="mesajlar.php">Mesajlar</a></li>
              <li class="breadcrumb-item active">Mesaj cavapla</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"></h3>
         

        
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
           
          </div>
        </div>
        <div class="card-body">
            
              
        </div>
        <!-- /.card-body -->
        <div class="card-footer">        
                <div class="form-group">
                    <label for="">Gonderenin Adi</label>
                    <input type="text" class="form-control" disabled value="<?php echo $mesaj_cek['mesaj_gonderen']; ?>" name="ayar_facebook">
                </div>
                <div class="form-group">
                    <label for="">Gonderenin Mail adresi</label>
                    <input type="mail" class="form-control" disabled value="<?php echo $mesaj_cek['mesaj_gonderen_email']; ?>" name="ayar_linkedin">
                </div>
                <div class="form-group">
                    <label for="">Mesaj Basliq</label>
                    <input type="text" class="form-control" disabled value="<?php echo $mesaj_cek['mesaj_basliq']; ?>" name="ayar_instagram">
                </div>
                <div class="form-group">
                    <label for="">Mesaj Icerik</label>
                    <textarea name="" class="form-control" disabled id="" cols="30" rows="8"><?php echo $mesaj_cek['mesaj_icerik']; ?></textarea>
                </div>
                <form  method="post" id="mesajFRM" onsubmit="return false;" >
                <input type="hidden" name="gonderen" value="BumBlog.cf">
                <input type="hidden" name="gonderilenmail" value="<?php echo $mesaj_cek['mesaj_gonderen_email']; ?>">
                    <div class="form-group">
                        <label for="">Maile (<?php echo $mesaj_cek['mesaj_gonderen_email']; ?>) Cavabini yaz</label>
                        <textarea name="mesaj" class="form-control" cols="30" rows="8"></textarea>
                    </div>
                    <button class="btn btn-primary form-control" onclick="mesajCavapla();" type="submit">Cavap Ver</button>
                </form>


<

                <script>
                    function mesajCavapla(){
                        var myData=$("#mesajFRM").serialize();

                        $.ajax({
                          url: "controller/mesaj_controller.php",
                          type: "POST",
                          data: myData,
                          success: function(data){
                            if(data == "bos"){
                              Swal.fire("Xeberdarliq","Bos mesaj yollamaq olmaz","warning");
                            }
                            else  if(data == "no"){
                              Swal.fire("Xeta","Cavab gonderilerken xeta yasandi.Tekrar yoxlayin.","danger");
                            }
                            else  if(data == "yes"){
                              Swal.fire("Tebrikler","Cavab gonderilerken xeta yasandi.Tekrar yoxlayin.","success");

                            }
                          }
                        });
                    }

                </script> 

           
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php require_once("footer.php");?>