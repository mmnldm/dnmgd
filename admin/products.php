<?php session_start();

$servername = "localhost";
$username = "root";
$password = "";
$db = "dnmgd";

// Create connection
$con = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<?php
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
} else {
?>
  <?php include('layouts/header.php') ?>
  <?php include('layouts/sidebar.php') ?>

  <?php
  if (isset($_POST['add-product'])) {
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $product_desc = $_POST['product_desc'];
    $product_qty = $_POST['product_qty'];
    $product_price = $_POST['product_price'];
    $file = $_FILES['product_image'];
    $file2 = $_FILES['second_image'];
    $color = $_POST['color'];

    $fileName = $file['name'];
    $fileNameAr = explode(".", $fileName);
    $extension = end($fileNameAr);
    $ext = strtolower($extension);

    
      if ($file['size'] > (1024 * 2) && $file2['size'] > (1024 * 2) ) {

        $uniqueImageName = time() . "_" . $file['name'];
        $uniqueImageName2 = time() . "_" . $file2['name'];

        if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/dnmgd/admin/product_images/" . $uniqueImageName) && move_uploaded_file($file2['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/dnmgd/admin/product_images/" . $uniqueImageName2)) {

           $query = "INSERT INTO products (product_cat, product_title, product_qty, product_price, product_desc, product_image, second_image, color) VALUES ('$category_id', '$product_name', '$product_qty', '$product_price', '$product_desc', '$uniqueImageName', '$uniqueImageName2', '$color')";
          if (mysqli_query($con, $query)) {
            echo '<script>alert("Product Added Successfully..!")</script>';
          } else {

            echo '<script>alert("Failed to run query")</script>';
          }
        } else {
          return ['status' => 303, 'message' => 'Failed to upload image'];
        }
      } else {
        return ['status' => 303, 'message' => 'Large Image ,Max Size allowed 2MB'];
      }
  }




  ?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
                <h3 class="card-title">Products</h3>

                <a class="btn btn-success float-right text-white" href="#" data-toggle="modal" data-target="#add_product_modal">Add Product</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="products" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>NAME</th>
                      <th>MAIN IMAGE</th>
                      <th>SECOND IMAGE</th>
                      <th>PRICE</th>
                      <th>QUANTITY</th>
                      <th>CATEGORY</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>

                  <tbody id="product_list">

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
      <!-- Add Product Modal start -->
      <div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Product Name</label>
                      <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label>Category Name</label>
                      <select class="form-control category_list" name="category_id">
                        <option value="">Select Category</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label>Product Description</label>
                      <textarea class="form-control" name="product_desc" placeholder="Enter product desc"></textarea>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label>Product Qty</label>
                      <input type="number" name="product_qty" class="form-control" placeholder="Enter Product Quantity">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label>Product Price</label>
                      <input type="number" name="product_price" class="form-control" placeholder="Enter Product Price">
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label>Main Image <small>(format: jpg, jpeg, png)</small></label>
                      <input type="file" name="product_image" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label>Second Image <small>(format: jpg, jpeg, png)</small></label>
                      <input type="file" name="second_image" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label>Color</label>
                      <input type="text" name="color" class="form-control" placeholder="Enter Product Color">
                    </div>
                  </div>
                  <!-- <input type="hidden" name="add_product" value="1"> -->
                  <div class="col-12">
                    <button type="submit" name="add-product" class="btn btn-primary add-product">Add Product</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Add Product Modal end -->

      <!-- Edit Product Modal start -->
      <div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">
              <form id="edit-product-form" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label>Product Name</label>
                      <input type="text" name="e_product_name" class="form-control" placeholder="Enter Product Name">
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label>Category Name</label>
                      <select class="form-control category_list" name="e_category_id">
                        <option value="">Select Category</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label>Product Description</label>
                      <textarea class="form-control" name="e_product_desc" placeholder="Enter product desc"></textarea>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label>Product Qty</label>
                      <input type="number" name="e_product_qty" class="form-control" placeholder="Enter Product Quantity">
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-group">
                      <label>Product Price</label>
                      <input type="number" name="e_product_price" class="form-control" placeholder="Enter Product Price">
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
                      <input type="file" name="e_product_image" class="form-control">
                      <img class="img-fluid" width="50" style="margin-top: 10px; border-radius: 4px">
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label>Second Image <small>(format: jpg, jpeg, png)</small></label>
                      <input type="file" name="e_second_image" class="form-control">
                      <img  class="img-fluid" width="50" style="margin-top: 10px; border-radius: 4px">
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label>Color</label>
                      <input type="text" name="e_color" class="form-control" placeholder="Enter Product Color">

                    </div>
                  </div>

                  <input type="hidden" name="pid">
                  <input type="hidden" name="edit_product" value="1">
                  <div class="col-12">
                    <button type="button" class="btn btn-primary submit-edit-product">Edit Product</button>
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
  <script type="text/javascript" src="js/products.js"></script>

<?php }
