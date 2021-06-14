<?php
require_once("header.php");
$admin_id=1;
$admin=$conn->prepare("SELECT * FROM admin WHERE admin_id=? ");
$admin->execute(array($admin_id));
$admin_cek=$admin->fetch(PDO::FETCH_ASSOC);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Istifadeci Profil Sehifesi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="profil.php">Profil</a></li>
              <li class="breadcrumb-item active">Istifadeci profil ayarlari</li>
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
          <h3 class="card-title">Istifadeci adi deyistirme</h3>
         

        
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
              echo "<div class='alert alert-error'>Yenilenme zamani xeta yasandi tekrar yoxlayin.</div>";
            }
            else if(@$operation == 'yes'){
                echo "<div class='alert alert-success'>Admin adi yenilendi.</div>";
            }
            else if(@$operation == 'bos_sifre'){
                echo "<div class='alert alert-warning'>Yeni sifre en az 6 xarekterli olmalidir.</div>";
            }
            else if(@$operation == 'kohneparolxeta'){
                echo "<div class='alert alert-danger'>Kohne parolunuz xetalidir.</div>";
            }
            else if(@$operation == 'paroldeyisdi'){
                echo "<div class='alert alert-success'>Admin sifresi yenilendi.</div>";
            }
            else if(@$operation == 'xeta'){
                echo "<div class='alert alert-danger'>Admin sifre yenilenmedi.Tekrar yoxlayin</div>";
            }
          
          ?>

       
            <form action="controller/admin_controller.php?id=<?php echo $admin_id ?>" method="post">
               

                <div class="form-group">
                    <label for="">Istifadeci Adi</label>
                    <input type="text" class="form-control" value='<?php echo $admin_cek['admin_username']; ?>'  name="admin_username">
                </div>

                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-info form-control" name="istifadeci_yenile">Yenile</button>
                </div>
            </form>
              
        </div>
        
        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sifre Deyistirme</h3>
         

        
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
           
          </div>
        </div>
        <div class="card-body">
       

       
            <form action="controller/admin_controller.php?id=<?php echo $admin_id ?>" method="post">
               

                <div class="form-group">
                    <label for="">Istifadeci Kohne Sifre</label>
                    <input type="password" class="form-control"   name="admin_parol">
                </div>
                <div class="form-group">
                    <label for="">Istifadeci Yeni Sifre</label>
                    <input type="password" class="form-control"   name="admin_newparol">
                </div>

                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-info form-control" name="istifadeci_parol_yenile">Yenile</button>
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
