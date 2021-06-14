<?php
require_once("header.php");
$yazi_id=$_GET['id'];
$yazilar=$conn->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
$yazilar->execute(array($yazi_id));
$yazi_cek=$yazilar->fetch(PDO::FETCH_ASSOC);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Yazilar Yenileme Sehifesi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Yazilar</a></li>
              <li class="breadcrumb-item active">Yazi yenileme ayarlari</li>
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
       

       
            <form action="controller/yazi_controller.php?yazi_id=<?php echo $yazi_id ?>" enctype="multipart/form-data" method="post">
                <label for="">Foto</label>
                </br>
                <img src="../frontend/images/<?php echo $yazi_cek['yazi_sekil']; ?>" style="height:100px; min-width:150px;" alt="<?php echo $yazi_cek['yazi_basliq']; ?>">
                <div class="custom-file mt-3">       
                    <input type="file" class="custom-file-input" id="customFile" name="yazi_sekil">
                    <label class="custom-file-label" for="customFile">Yeni Sekil secin</label>
                </div>

                <div class="form-group">
                    <label for="">Basliq</label>
                    <input type="text" class="form-control" value='<?php echo $yazi_cek['yazi_basliq']; ?>'   name="yazi_basliq">
                </div>

                <div class="form-group">
                    <label for="">Kateqori</label>
                    <select class="form-control" name="yazi_kateqori_id" id="">
                        <?php
                            $kat=$conn->prepare("SELECT * FROM kateqoriler");
                            $kat->execute();
                            $kat_say=$kat->fetchAll(PDO::FETCH_ASSOC);
                            foreach($kat_say as $row){
                        ?>
                        <option value="<?php echo $row['kateqori_id']; ?>" <?php echo $yazi_cek['yazi_kateqori_id'] == $row['kateqori_id'] ? "selected" : null; ?>>
                            <?php echo $row['kateqori_title']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Oxunma sayi </label>
                    <input type="number" disabled class="form-control" value="<?php echo $yazi_cek['yazi_oxunma_sayi']; ?>"   name="yazi_oxunma_sayi">
                </div>
                <div class="form-group">
                    <label for="">Yazi Tarixi </label>
                    <input disabled class="form-control" value="<?php echo $yazi_cek['yazi_tarix']; ?>"   name="yazi_tarix">
                </div>
                <div class="form-group">
                    <label for="">Yazi Icerik </label>
                    <textarea name="yazi_icerik" class="form-control" id="ckeditor" cols="30" rows="10"><?php echo $yazi_cek['yazi_icerik']; ?></textarea>
                </div>
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-info form-control" name="yazi_duzenle_gonder">Yenile</button>
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