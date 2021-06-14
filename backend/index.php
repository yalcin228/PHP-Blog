 <?php
require_once("header.php");

?> 

  
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ana Sehife</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">AnaSehife</a></li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php
                  $yazilar=$conn->prepare("SELECT * FROM yazilar");
                  $yazilar->execute();
                  $yazi_say=$yazilar->rowCount();
                ?>
                <h3><?php echo $yazi_say; ?></h3>

                <p>Yazilar</p>
              </div>
              <div class="icon">
                <i class="fab fa-blogger"></i>
              </div>
              <a href="yazilar.php" class="small-box-footer">Hamsini gor <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
                  $kateqoriler=$conn->prepare("SELECT * FROM kateqoriler");
                  $kateqoriler->execute();
                  $kateqori_say=$kateqoriler->rowCount();
                ?>
                <h3><?php echo $kateqori_say; ?></h3>

                <p>Kateqoriler</p>
              </div>
              <div class="icon">
                <i class="fas fa-th"></i>
              </div>
              <a href="#" class="small-box-footer">Hamsini gor <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>IStifadeciler</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Hamsini gor <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php
                  $mesajlar=$conn->prepare("SELECT * FROM mesajlar");
                  $mesajlar->execute();
                  $mesaj_say=$mesajlar->rowCount();
                ?>
                <h3><?php echo $mesaj_say; ?></h3>

                <p>Gelen Mailler</p>
              </div>
              <div class="icon">
                <i class="fa fa-envelope"></i>
              </div>
              <a href="mesajlar.php" class="small-box-footer">Hamsini gor <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  

 <?php require_once("footer.php");?>