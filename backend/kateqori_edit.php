<?php
require_once("header.php");
$id=$_GET['id'];
$kateqori=$conn->prepare("SELECT * FROM kateqoriler WHERE kateqori_id=?");
$kateqori->execute(array($id));
$kateqori_cek=$kateqori->fetch(PDO::FETCH_ASSOC);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Kateqori Yenileme Sehifesi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Kateqori</a></li>
              <li class="breadcrumb-item active">Kateqori yenileme ayarlari</li>
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
       

       
            <form action="controller/kateqori_controller.php?id=<?php echo $id ?>" method="post">
               

                <div class="form-group">
                    <label for="">Kateqori Adi</label>
                    <input type="text" class="form-control" value='<?php echo $kateqori_cek['kateqori_title']; ?>'  name="kateqori_title">
                </div>

                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-info form-control" name="kateqori_yenile">Yenile</button>
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
