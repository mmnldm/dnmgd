<?php session_start(); ?>
<?php include('layouts/header.php') ?>
<?php
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
} else {
?>
  <?php include('layouts/sidebar.php') ?>
  <?php include('classes/Database.php');
  $db = new Database();
  $con = $db->connect();
  ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
                <h3>
                  <?php

                  $query = $con->query("SELECT * FROM products");
                  if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                      $pCount = count($row);
                    }
                  }
                  echo $query->num_rows == 0 ? 0 : $pCount;

                  ?>

                </h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
                  <?php
                  $query = $con->query("SELECT * FROM orders");
                  if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                      $pCount = count($row);
                    }
                  }
                  echo $query->num_rows == 0 ? 0 : $pCount;
                  ?>

                </h3>

                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
                  <?php
                  $query = $con->query("SELECT * FROM user_info");
                  if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                      $pCount = count($row);
                    }
                  }
                  echo $query->num_rows == 0 ? 0 : $pCount;

                  ?>

                </h3>

                <p>Customers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- right col -->
  </div>

  <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>

  <?php include('layouts/footer.php') ?>
<?php }
