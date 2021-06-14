<?php
require_once("header.php");
?>
<link rel="stylesheet" href="file_input/css/fileinput.min.css">
<link rel="stylesheet" href="file_input/themes/explorer-fas/theme.min.css">
<script src="file_input/js/fileinput.js"></script>
<script src="file_input/themes/fas/theme.min.js"></script>
<script src="file_input/themes/explorer-fas/theme.min.js"></script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Yazi Elave Etme Sehifesi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Yazilar</a></li>
              <li class="breadcrumb-item active">Yazilar Elave et</li>
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
                echo "<div class='alert alert-success'>Yazi ayarlari yenilendi.</div>";
            }
            
          ?>
        <form action="controller/yazi_controller.php" enctype="multipart/form-data" method="post">
                
                <div class="form-group">
                     <input type="file" name="yazi_sekil" id="proje_dosya" >
                </div>

                <div class="form-group">
                    <label for="">Basliq</label>
                    <input type="text" class="form-control"  name="yazi_basliq" placeholder="Yazi Basligi yazin...">
                </div>

                <div class="form-group">
               
                    <label for="">Kateqori</label>
                    <select class="form-control" name="yazi_kateqori_id" >
                    <?php
                     
                     $kat=$conn->prepare("SELECT * FROM kateqoriler");
                     $kat->execute();
                     $kat_say=$kat->fetchAll(PDO::FETCH_ASSOC);
                     foreach($kat_say as $row){
                 
                    ?>
                        <option value="<?php echo $row['kateqori_id']; ?>"><?php echo $row['kateqori_title']; ?></option>
                    <?php } ?>
                    </select>

                </div>
                
                <div class="form-group">
                    <label for="">Yazi Icerik </label>
                    <textarea name="yazi_icerik" class="form-control"  id="ckeditor" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-success form-control" name="yazi_add_gonder">Elave Et</button>
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
 
 <script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
 <script>
     CKEDITOR.replace( 'ckeditor' );
 </script>
 <script>
    $(document).ready(function(){
        $("#proje_dosya").fileinput({
            'theme': 'explorer-fas',
            'showUpload': false,
            'showCaption': true,
            showDownloadL: true,
            allowedFileExtensions: ["jpg","png","jpeg","gif"],
        });
    });
</script>