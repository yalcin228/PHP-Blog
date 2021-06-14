<?php
require_once("header.php");

$media_ayar=$conn->prepare("SELECT * FROM ayarlar");
$media_ayar->execute();
$media_ayar_cek=$media_ayar->fetch(PDO::FETCH_ASSOC);


?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sosyal Media Ayarlar Sehifesi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ayarlar</a></li>
              <li class="breadcrumb-item active">Media ayarlar</li>
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
        <?php
            extract($_GET);
            if(@$operation == 'bos'){
                echo "<div class='alert alert-warning'>Xanalari bos buraxmaq olmaz</div>";
            }
            else if(@$operation == 'no'){
                echo "<div class='alert alert-error'>Yenilenme zamani xeta yasandi tekrar yoxlayin.</div>";
            }
            else if(@$operation == 'ok'){
                echo "<div class='alert alert-success'>SEO ayarlari yenilendi.</div>";
            }
          ?>
            <form action="controller/ayar_controller.php" method="post">
                <div class="form-group">
                    <label for="">Twitter Link</label>
                    <input type="text" class="form-control" value="<?php echo $media_ayar_cek['ayar_twitter']; ?>" name="ayar_twitter">
                </div>
                <div class="form-group">
                    <label for="">Facebook Link</label>
                    <input type="text" class="form-control" value="<?php echo $media_ayar_cek['ayar_facebook']; ?>" name="ayar_facebook">
                </div>
                <div class="form-group">
                    <label for="">Linkedin Link</label>
                    <input type="text" class="form-control" value="<?php echo $media_ayar_cek['ayar_linkedin']; ?>" name="ayar_linkedin">
                </div>
                <div class="form-group">
                    <label for="">Instagram Link</label>
                    <input type="text" class="form-control" value="<?php echo $media_ayar_cek['ayar_instagram']; ?>" name="ayar_instagram">
                </div>
                <div class="form-group">
                    <label for="">Youtube Link</label>
                    <input type="text" class="form-control" value="<?php echo $media_ayar_cek['ayar_youtube']; ?>" name="ayar_youtube">
                </div>
                <div class="form-group">
                    <button type="submit" name="media_ayar_gonder" class="btn btn-info form-control">Yenile</button>
                </div>
            </form>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php require_once("footer.php");?>