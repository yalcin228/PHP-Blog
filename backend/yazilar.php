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
            <h1>Yazilar Sehifesi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="yazilar.php">Yazilar</a></li>
              <li class="breadcrumb-item active">Yazilari goruntule</li>
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
            else if(@$operation == 'noo'){
                echo "<div class='alert alert-error'>Yenilenme zamani xeta yasandi tekrar yoxlayin.</div>";
              }
            else if(@$operation == 'yes'){
                echo "<div class='alert alert-success'>Yazi ayarlari yenilendi.</div>";
            }
            else if(@$operation == 'yess'){
                echo "<div class='alert alert-success'>Yazi ayarlari yenilendi.</div>";
            }
            else if(@$operation == 'boss'){
                echo "<div class='alert alert-warning'>Bos data gondermek olmaz.</div>";
              }
          ?>
              
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          
        <table id="example1" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Foto</th>
                  <th>Basliq</th>
                  <th>Kateqori</th>
                  <th>Oxunma</th>
                  <th>Tarix</th>
                  <th>Islemler</th>
                </tr>
                </thead>
                <tbody>
               
                <?php
                        $yazilar=$conn->prepare("SELECT * FROM yazilar INNER JOIN kateqoriler ON kateqoriler.kateqori_id=yazilar.yazi_kateqori_id ORDER BY yazi_id DESC");
                        $yazilar->execute();
                        $yazilar_cek=$yazilar->fetchAll(PDO::FETCH_ASSOC);
                        foreach($yazilar_cek as $row){

                    ?>
                     <tr id="delete<?php echo $row['yazi_id']; ?>">
                        <td><?php echo $row['yazi_id']; ?></td>
                        <td><img src="../frontend/images/<?php echo $row['yazi_sekil']; ?>" style="height:70px; width:80px;" alt="<?php echo $row['yazi_basliq']; ?>"></td>
                        <td><?php echo $row['yazi_basliq']; ?></td>
                        <td><?php echo $row['kateqori_title']; ?></td>
                        <td><?php echo $row['yazi_oxunma_sayi']; ?></td>
                        <td><?php echo $row['yazi_tarix']; ?></td>
                        <td class="d-flex justify-content-center">
                            <a href="yazilar_edit.php?id=<?php echo $row['yazi_id']; ?>"><button class="btn btn-primary mr-1"><i class="fa fa-edit"></i>Yenile</button></a>
                            <button  onclick="deleteProject(<?php echo $row['yazi_id']; ?>);"  class="btn btn-danger ml-2"><i class="fa fa-trash"></i>Sil</button>
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
            url: "controller/yazi_controller.php",
            data: {delete_id:id},
            success:function(data){
                    $("#delete"+id).hide(2000);
            }
        })
    }
}
</script>