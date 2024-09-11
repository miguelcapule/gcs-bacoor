<?php
require '../../includes/session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard | GCS Bacoor</title>
  <link rel="icon" href="../../docs/assets/img/logo.png">

  <?php include '../../includes/links.php'; ?>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <?php include '../../includes/navbar.php' ?>

    <?php include '../../includes/sidebar.php' ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
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
              <div class="col-md">
                <div class="row">
                  <div class="col-lg-3 col-6">
                    
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <p>Scheduled Appointments</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-check"></i>
                      </div>
                      <!-- Roles -->
                      <a href="<?php echo $_SESSION['role']== "Administrator"  ? "../schedules/list.schedule.php" : "#"?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">

                        <p>Pending Schedules</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-exclamation-triangle"></i>
                      </div>
                      <!-- Roles -->
                      <a href="<?php echo $_SESSION['role']== "Administrator" ? "../dashboard/list.pending.students.php" : "#"?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                      <div class="inner">

                        <p>Students</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-users"></i>
                      </div>
                      <!-- Roles -->
                      <a href="<?php echo $_SESSION['role']== "Administrator" ? "../student/list.students.php" : "#"?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">

                        <p>Disapproved Schedules</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user-times"></i>
                      </div>
                      <!-- Roles -->
                      <a href="<?php echo $_SESSION['role']== "Administrator" ? "../dashboard/list.disapproved.students.php" : "#"?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
              </div>
          </div>
          <!-- /.row -->
          <!-- Main row -->
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include '../../includes/footer.php'; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <?php include '../../includes/script.php'; ?>

</body>

</html>