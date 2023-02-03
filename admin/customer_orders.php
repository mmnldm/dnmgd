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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
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

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders</h3>
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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="orders" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ORDER ID</th>
                      <th>PRODUCT NAME</th>
                      <th>PRODUCT PRICE</th>
                      <th>CUSTOMER NAME</th>
                      <th>PHONE NO.</th>
                      <th>CUSTOMER ADDRESS</th>
                      <th>QUANTITY</th>
                      <th>COLOR</th>
                      <th>SIZE</th>
                      <th>TRX ID</th>
                      <th>STATUS</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $query = $con->query("SELECT * FROM orders, products, user_info WHERE orders.product_id = products.product_id AND orders.user_id = user_info.user_id");
                    if ($query->num_rows > 0) {
                      while ($row = $query->fetch_assoc()) {
                        $order_id = $row['order_id'];
                        $pro_title = $row['product_title'];
                        $firstname = $row['first_name'];
                        $lastname = $row['last_name'];
                        $mobile = $row['mobile'];
                        $address1 = $row['address1'];
                        $qty = $row['qty'];
                        $color = $row['color'];
                        $size = $row['size'];
                        $trx_id    = $row['trx_id'];
                        $p_status    = $row['p_status'];
                        $pro_price    = $row['product_price'];
                        $formatted_price = number_format($pro_price, '2');


                        echo "
                              <tr>
                                  <td>$order_id</td>
                                  <td>$pro_title</td>
                                  <td> " . 'N' . " $formatted_price</td>
                                  <td>$firstname  $lastname</td>
                                  <td>$mobile</td>
                                  <td>$address1</td>
                                  <td>$qty</td>
                                  <td>$color</td>
                                  <td>$size</td>
                                  <td>$trx_id</td>
                                  <td>
                                  <form action='classes/Customers.php' method='POST'>
                                    <input type='hidden' name='order_id' value='$order_id'>

                                    <select class='form-control' name='order_status'>
                                      <option value='pending' " . (($p_status == 'pending') ? 'selected' : '') . ">Pending</option>
                                      <option value='shipped' " . (($p_status == 'shipped') ? 'selected' : '') . ">Shipped</option>
                                      <option value='delivered' " . (($p_status == 'delivered') ? 'selected' : '') . ">Delivered</option>
                                    </select>

                                    <button class='btn btn-success mt-2' name='update_status' type='submit'>Update Status</button>
                                  </form>
                                  </td>
                              </tr>
                          ";
                      }
                    }
                    ?>
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
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <?php include('layouts/footer.php') ?>
  <script type="text/javascript" src="js/customers.js"></script>

<?php }
