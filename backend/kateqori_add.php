<?php
require_once("header.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kateqori Elave Etme Sehifesi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="kateqori.php">Kateqoriler</a></li>
              <li class="breadcrumb-item active">Kateqori Elave et</li>
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
            if(@$operation == 'bos'){
                echo "<div class='alert alert-warning'>Xanaya bos yazi daxil etmek olmaz.</div>";
            }
            else if(@$operation == 'no'){
              echo "<div class='alert alert-error'>Kateqori elave olunmadi.Tekrar yoxlayin.</div>";
            }
            else if(@$operation == 'yes'){
                echo "<div class='alert alert-success'>Kateqori adi elave olundu.</div>";
            }
          
          ?>
        <form action="controller/kateqori_controller.php"  method="post">
                
               
                <div class="form-group">
                    <label for="">Kateqori Adi</label>
                    <input type="text" class="form-control"  name="kateqori_title" placeholder="Kateqori adi yazin...">
                </div>

               
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary form-control" name="kateqori_add">Elave Et</button>
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
 
