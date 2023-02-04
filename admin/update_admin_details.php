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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Admin Details</h3>
              </div>

              <?php
              if (isset($_SESSION['error'])) {
                echo "
					<div class='alert alert-danger alert-dismissible fade show' role='alert' style='margin-top: 10px'>
          <ul>
            <li>" . $_SESSION['error'] . "</li>
          </ul>
          <button type='button' class='close' data-dismiss='alert' aria-label='close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>	";
                unset($_SESSION['error']);
              }
              if (isset($_SESSION['success'])) {
                echo
                "<div class='alert alert-success alert-dismissible fade show' role='alert' style='margin-top: 10px'>
          <ul>
            <li>" . $_SESSION['success'] . "</li>
          </ul>
          <button type='button' class='close' data-dismiss='alert' aria-label='close'>
            <span aria-hidden='true'>&times;</span>
          </button>
        </div>	";
                unset($_SESSION['success']);
              }
              ?>

              <?php

              if (isset($_SESSION['admin_id'])) {
                $adminId = $_SESSION['admin_id'];
                $query = $con->query("SELECT * FROM admin WHERE id=$adminId");
                if ($query->num_rows > 0) {
                  $n = 0;
                  if ($row = $query->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row["name"];
                    $email = $row["email"];


              ?>
                    <form role="form" enctype="multipart/form-data" action="classes/AdminDetails.php?id=<?php echo $id; ?>" method="POST">
                      <div class="card-body">

                        <div class="form-group">
                          <label for="exampleInputEmail1">Admin Email</label>
                          <input class="form-control" type="email" id="email" name="email" value="<?php echo $email ?>" required>
                        </div>


                        <div class="form-group">
                          <label for="current_pwd">Admin Name</label>
                          <input class="form-control form-control-user" type="hidden" id="id" name="id" value="<?php echo $id ?>">
                          <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>" placeholder="Enter Admin Name" required>
                          <span id="chkCurrentPass"></span>
                        </div>

                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button name="editprofile" type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
              <?php
                  }
                }
              }
              ?>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->

            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?php include('layouts/footer.php') ?>
<?php }
