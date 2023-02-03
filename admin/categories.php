<?php session_start(); ?>
<?php
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
} else {
?>
  <?php include('layouts/header.php') ?>
  <?php include('layouts/sidebar.php') ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Categories</h3>

                <a class="btn btn-success float-right text-white" href="#" data-toggle="modal" data-target="#add_category_modal">Add Category</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <td>ID</td>
                      <td>CATEGORY NAME</td>
                      <td>ACTION</td>
                    </tr>
                  </thead>
                  <tbody id="category_list">

                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

      <!-- Modal -->
      <div class="modal fade" id="add_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="add-category-form" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" name="cat_title" class="form-control" placeholder="Enter Brand Name">
                    </div>
                  </div>
                  <input type="hidden" name="add_category" value="1">
                  <div class="col-12">
                    <button type="button" class="btn btn-primary add-category">Add Category</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->

      <!--Edit category Modal -->
      <div class="modal fade" id="edit_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="edit-category-form" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-12">
                    <input type="hidden" name="cat_id">
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" name="e_cat_title" class="form-control" placeholder="Enter Brand Name">
                    </div>
                  </div>
                  <input type="hidden" name="edit_category" value="1">
                  <div class="col-12">
                    <button type="button" class="btn btn-primary edit-category-btn">Update Category</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  <?php include('layouts/footer.php') ?>
  <script type="text/javascript" src="js/categories.js"></script>

<?php }
