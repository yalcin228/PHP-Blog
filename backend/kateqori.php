<?php
require_once("header.php");
?>
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kateqoriler Sehifesi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="yazilar.php">Kateqori</a></li>
              <li class="breadcrumb-item active">Kateqorileri goruntule</li>
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
              echo "<div class='alert alert-error'>Yenilenme zamani xeta yasandi tekrar yoxlayin.</div>";
            }
            else if(@$operation == 'yes'){
                echo "<div class='alert alert-success'>Kateqori adi yenilendi.</div>";
            }
          
          ?>
              
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          
        <table id="example1" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kateqori Ad</th>
                  <th>Yazi Sayi</th>
                  <th>Yenile</th>
                  <th>Sil</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $kateqori=$conn->prepare("SELECT * FROM kateqoriler ORDER BY kateqori_id DESC");
                        $kateqori->execute();
                        $kateqori_cek=$kateqori->fetchAll(PDO::FETCH_ASSOC);
                        $kateqori_say=$kateqori->rowCount();
                        foreach($kateqori_cek as $row){
                             $yazi=$conn->prepare("SELECT * FROM yazilar WHERE yazi_kateqori_id=? ORDER BY yazi_id DESC");
                             $yazi->execute(array($row['kateqori_id']));
                             $yazi_cek=$yazi->fetchAll(PDO::FETCH_ASSOC);
                             $yazi_say=$yazi->rowCount();
                    ?>
               
                     <tr id="delete<?php echo $row['kateqori_id']; ?>">
                        <td><?php echo $row['kateqori_id']; ?></td>
                        
                        <td><?php echo $row['kateqori_title']; ?></td>
                        <td><?php echo $yazi_say; ?></td>
                        <td><a href="kateqori_edit.php?id=<?php echo $row['kateqori_id']; ?>"><button class="btn btn-primary mr-1"><i class="fa fa-edit"></i>Yenile</button></a></td>
                        <td>
                            <button  onclick="deleteProject(<?php echo $row['kateqori_id']; ?>);"  class="btn btn-danger ml-2"><i class="fa fa-trash"></i>Sil</button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
                 
              </table>


        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php require_once("footer.php");?>
 <script src="plugins/jquery/jquery.min.js"></script>
 <script src="plugins/datatables/jquery.dataTables.js"></script>
 <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
 <script>
  $(function () {    
    $('#example1').DataTable();
  });
</script>
<script>
function deleteProject(id){
    if(confirm("Silmek istediyinize eminsiniz?")){
        $.ajax({
            type: "POST",
            url: "controller/kateqori_controller.php",
            data: {delete_id:id},
            success:function(data){
                    $("#delete"+id).hide(1000);
            }
        })
    }
}
</script>