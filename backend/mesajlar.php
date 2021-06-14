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
            <h1>Mesajlar Sehifesi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="mesajlar.php">Mesajlar</a></li>
              <li class="breadcrumb-item active">Mesajlar goruntule</li>
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
          
        <table id="example1" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Mesaj Gonderen</th>
                  <th>Mesaj Gonderen Mail</th>   
                  <th>Mesaj Icerik</th>
                  <th>Oxunma</th>
                  <th>Tarix</th>
                  <th>Yenile</th>
                  <th>Sil</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                        $mesajlar=$conn->prepare("SELECT * FROM mesajlar ORDER BY mesaj_id DESC");
                        $mesajlar->execute();
                        $mesajlar_cek=$mesajlar->fetchAll(PDO::FETCH_ASSOC);
                        $mesajlar_say=$mesajlar->rowCount();
                        if($mesajlar_say){
                        foreach($mesajlar_cek as $row){
                           
                    ?>
               
                     <tr id="delete<?php echo $row['mesaj_id']; ?>">
                        <td><?php echo $row['mesaj_id']; ?></td>
                        <td><?php echo $row['mesaj_gonderen']; ?></td>
                        <td><?php echo $row['mesaj_gonderen_email']; ?></td>                        
                        <td><?php echo $row['mesaj_icerik']; ?></td>
                        <td class="text-center"><?php
                            if($row['mesaj_oxuma'] == 1){
                                echo "<span class='fa fa-eye-slash'></span>";
                            }
                            else{
                                echo "<span class='fa fa-eye'></span>";

                            }
                        ?></td>
                        <td><?php echo $row['mesaj_tarix']; ?></td>
                        <td><a href="mesajlar_cavapla.php?mesaj_id=<?php echo $row['mesaj_id']; ?>"><button class="btn btn-primary mr-1"><i class="fa fa-edit"></i>Cavapla</button></a></td>
                        <td>
                            <button  onclick="deleteProject(<?php echo $row['mesaj_id']; ?>);"  class="btn btn-danger ml-2"><i class="fa fa-trash"></i>Sil</button>
                        </td>
                    </tr>
                    <?php } 
                        }else{
                            echo "<td colspan='7'>Size gelen bir mesaj yoxdur... </td>";
                        }
                        ?>
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
    if(confirm("Yalniz oxunmus gonderiler siline biler.Silmek istediyinize eminsiniz?")){
        $.ajax({
            type: "POST",
            url: "controller/mesaj_controller.php",
            data: {delete_id:id},
            success:function(data){
              
                    $("#delete"+id).hide(1000);
              
              
            }
        });
    }
}
</script>   