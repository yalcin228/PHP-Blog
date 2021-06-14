<?php
require_once("header.php");
$logo_ayarlar=$conn->prepare("SELECT * FROM ayarlar");
$logo_ayarlar->execute();
$logo_ayarlar_cek=$logo_ayarlar->fetch(PDO::FETCH_ASSOC);



?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Logo Ayarlari Sehifesi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Ayarlar</a></li>
              <li class="breadcrumb-item active">Logo ayarlari</li>
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
        <?php
            extract($_GET);
            if(@$operation == 'sehvFile'){
                echo "<div class='alert alert-warning'>File tip duzgun deyil.</div>";
            }
            else if(@$operation == 'icaze'){
              echo "<div class='alert alert-warning'>File tipi (jpg,jpeg,png,gif) ola biler.</div>";
            }
            else if(@$operation == 'olcu'){
                echo "<div class='alert alert-error'>File olcusu 5mb-dan cox ola bilmez.</div>";
            }
            else if(@$operation == 'no'){
              echo "<div class='alert alert-error'>Yenilenme zamani xeta yasandi tekrar yoxlayin.</div>";
            }
            else if(@$operation == 'yes'){
                echo "<div class='alert alert-success'>LOGO ayarlari yenilendi.</div>";
            }
          ?>

            <form action="controller/ayar_controller.php" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="">Sayt Logo</label>
                    <input type="text" class="form-control" value="<?php echo $logo_ayarlar_cek['ayar_logo']; ?>" name="ayar_logo" placeholder="Sayt Logosu">
                </div>
                <label for="">Sayt Favicon</label>
                </br>
                <img src="../frontend/images/<?php echo $logo_ayarlar_cek['ayar_favicon']; ?>" style="height:100px; width:150px;" alt="">
                <div class="custom-file mt-3">         
                    <input type="file" class="custom-file-input" id="customFile" name="ayar_favicon">
                    <label class="custom-file-label" for="customFile">Yeni Favicon secin</label>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-info form-control" name="logo_ayar_gonder">Yenile</button>
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