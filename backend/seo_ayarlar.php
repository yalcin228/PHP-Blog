<?php
require_once("header.php");

$seo_ayar=$conn->prepare("SELECT * FROM ayarlar");
$seo_ayar->execute();
$seo_ayar_cek=$seo_ayar->fetch(PDO::FETCH_ASSOC);



?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>SEO Ayarlar Sehifesi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ayarlar</a></li>
              <li class="breadcrumb-item active">SEO ayarlar</li>
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
          <h3 class="card-title">
          
          </h3>
         

        
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
           
          </div>
        </div>
        <div class="card-body">
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
                    <label for="">Sayt Title</label>
                    <input type="text" class="form-control" value="<?php echo $seo_ayar_cek['ayar_title']; ?>" name="ayar_title">
                </div>
                <div class="form-group">
                    <label for="">Sayt Keywords</label>
                    <input type="text" class="form-control" value="<?php echo $seo_ayar_cek['ayar_keyw']; ?>" name="ayar_keyw">
                </div>
                <div class="form-group">
                    <label for="">Sayt Descripton</label>
                    <input type="text" class="form-control" value="<?php echo $seo_ayar_cek['ayar_desc']; ?>" name="ayar_desc">
                </div>
                <div class="form-group">
                    <label for="">Sayt Link</label>
                    <input type="text" class="form-control" value="<?php echo $seo_ayar_cek['ayar_link']; ?>" name="ayar_link">
                </div>
                <div class="form-group">
                    <button type="submit" name="seo_ayar_gonder" class="btn btn-info form-control">Yenile</button>
                </div>
            </form>
              
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php require_once("footer.php");?>