<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";
include "config/ip_function.php";


if (isset($_POST["category"])) {
  $category_query = "SELECT * FROM categories";
  $run_query = mysqli_query($con, $category_query) or die(mysqli_error($con));
  echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Categories</h4></a></li>
	";
  if (mysqli_num_rows($run_query) > 0) {
    while ($row = mysqli_fetch_array($run_query)) {
      $cid = $row["cat_id"];
      $cat_name = $row["cat_title"];
      echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
    }
    echo "</div>";
  }
}

if (isset($_POST["page"])) {
  $sql = "SELECT * FROM products";
  $run_query = mysqli_query($con, $sql);
  $count = mysqli_num_rows($run_query);
  $pageno = ceil($count / 9);
  for ($i = 1; $i <= $pageno; $i++) {
    echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
  }
}

if (isset($_POST["addToCart"])) {


  $p_id = $_POST["proId"];
  $color = $_POST["color"];
  $size = $_POST["size"];

  if (isset($_SESSION["uid"])) {

    $user_id = $_SESSION["uid"];

    $sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
    $run_query = mysqli_query($con, $sql);
    $count = mysqli_num_rows($run_query);
    if ($count > 0) {
      echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			"; //not in video
    } else {
      $sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`, `color`, `size`) 
			VALUES ('$p_id','$ip_add','$user_id','1', '$color', '$size')";
      if (mysqli_query($con, $sql)) {
        echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
      }
    }
  } else {
    $sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
      echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
      exit();
    }
    $sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
    if (mysqli_query($con, $sql)) {
      echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product is Added Successfully..!</b>
					</div>
				";
      exit();
    }
  }
}

//Count User cart item
if (isset($_POST["count_item"])) {
  //When user is logged in then we will count number of item in cart by using user session id
  if (isset($_SESSION["uid"])) {
    $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
  } else {
    //When user is not logged in then we will count number of item in cart by using users unique ip address
    $sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
  }

  $query = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($query);
  echo $row["count_item"];
  exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

  if (isset($_SESSION["uid"])) {
    //When user is logged in this query will execute
    $sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty, b.color, b.size FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]' LIMIT 0,5";
  } else {
    //When user is not logged in this query will execute
    $sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0 LIMIT 0,5";
  }
  $query = mysqli_query($con, $sql);
  if (isset($_POST["getCartItem"])) {
    //display cart item in dropdown menu
    if (mysqli_num_rows($query) > 0) {
      $n = 0;
      while ($row = mysqli_fetch_array($query)) {
        $n++;
        $product_id = $row["product_id"];
        $product_title = $row["product_title"];
        $product_price = $row["product_price"];
        $product_image = $row["product_image"];
        $cart_item_id = $row["id"];
        $color = $row["color"];
        $size = $row["size"];
        $qty = $row["qty"];
        echo '

   
                  <li class="item">
                      <a class="product-image" href="#">
                          <img src="./admin/product_images/' . $product_image . '" alt="3/4 Sleeve Kimono Dress" title="" height="60px" />
                      </a>
                      <div class="product-details">
                          <a href="#" remove_id="' . $product_id . '" class="remove"><i class="anm anm-times-l" aria-hidden="true"></i></a>
                          <a class="pName" href="cart.php">' . $product_title . '</a>
                          
                          <div class="priceRow">
                              <div class="product-price">
                                  <span class="money">' . CURRENCY . '' . $product_price . '</span>
                              </div>
                          </div>
                      </div>
                  </li>

				';
      }
?>
<?php
      exit();
    }
  }
  if (isset($_POST["checkOutDetails"])) {
    if (mysqli_num_rows($query) > 0) {
      //display user cart item with "Ready to checkout" button if user is not login
      echo "<form method='post' action='login_form.php'>";
      $n = 0;
      while ($row = mysqli_fetch_array($query)) {
        $n++;
        $product_id = $row["product_id"];
        $product_title = $row["product_title"];
        $product_price = $row["product_price"];
        $product_image = $row["product_image"];
        $color = $row["color"];
        $size = $row["size"];
        $cart_item_id = $row["id"];
        $qty = $row["qty"];

        echo
        '

     
            <div class="mt-4" style="display: flex !important; justify-content: space-between !important;">
								
								<input type="hidden" name="product_id[]" value="' . $product_id . '"/>
								<input type="hidden" name="" value="' . $cart_item_id . '"/>
								<div class="tb-d"><img class="img-responsive cart_img" src="./admin/product_images/' . $product_image . '"></div>
								<div class="tb-d" style="display: block !important">
                <p class="text-white">' . $product_title . '</p>
                <p class="text-white">
                color: ' . $color . '
                </p>
                <p class="text-white">
                size: ' . $size . '
                </p>
                </div>
								<div class="tb-d qtt"><input type="text" class="form-control qty" value="' . $qty . '" ></div>
                
								<div class="tb-d price">' . $product_price . '</div>
                
                <div class="tb-d"><input type="text" class="form-control total" value="' . $product_price . '" readonly="readonly"></div>


                <div class="tb-d">
									<div class="btn-group">
										<a href="#" remove_id="' . $product_id . '" class="btn btn--danger cart__remove remove" title="Remove tem"><i class="icon icon anm anm-times-l"></i></a>
							      <a href="#" update_id="' . $product_id . '" class="btn3 btn-primary update"><i class="fa fa-refresh"></i></a>
									</div>
								</div>

							</div>
                ';
      }


      echo '<div class="row pt-3">
							<div class="col-md-8"></div>
							<div class="col-md-4 d-flex justify-content-end">
								<b class="net_total" id="net_total" style="font-size:18px;"></b>
					</div>';
      if (!isset($_SESSION["uid"])) {
        echo '<input type="submit" name="login_user_with_product" class="btn btn-primary" value="Ready to Checkout" >
							</form>';
      } else if (isset($_SESSION["uid"])) {

        $user_ip = getenv("REMOTE_ADDR");
        $ip_details = ip_info($user_ip, "Location");

        $shipping_fee;

        if ($ip_details['continent'] != 'Africa') {
          $shipping_fee = 5000 * 100;
        } else if ($ip_details['country'] == 'Nigeria' && $ip_details['state'] != 'Cross River') {
          $shipping_fee = 3000 * 100;
        } else if ($ip_details['country'] == 'Nigeria' && $ip_details['state'] == 'Cross River') {
          $shipping_fee = 500 * 100;
        }

        //Paystack checkout form
        echo '
        <div class="pl-5">
        <a onclick="payWithPaystack()" class="btn btn-primary">Pay Now</a>

        <input type="hidden" name="emailval" id="emailVal" value="' . $_SESSION["email"] . '" >
        </div>
					<script>

        var net_total = 0;
        $(".qty").each(function () {
          var row = $(this).parent().parent();
          var price = row.find(".price").text();
          var total = price * $(this).val() - 0;
          row.find(".total").val(total);
        });
        $(".total").each(function () {
          net_total += $(this).val() - 0;
        });

        let email = document.getElementById("emailVal").value

          let refNumber=Math.floor((Math.random() * 1000000000) + 1)
					function payWithPaystack() {
						var handler = PaystackPop.setup({
						  key: "pk_live_9ee30737d98c8715211e3f5a2386914f57cd8685",  
						  email: email,
						  amount: net_total * 100 +' . $shipping_fee . ', 
						  currency: "NGN", 
						  ref: refNumber,  
						  callback: function(response) {
							 
                var reference = response.reference;
                alert("Payment complete! Reference: " + reference);
                $.post("action.php", {a: 1, ref: reference}, function(data){                                          
                
                alert("Thank you for shopping with Blackk British")
                window.location.href = orders.php;
              });
						  },
              
						  onClose: function() {
							alert("Transaction was not completed, window closed.");
							window.location.replace("cart.php");
						  },
						});
						handler.openIframe();
					  }
					 	</script> 
					  ';
      }
    } else {
      echo "<div class='mt-5 pt-2' style='width: 100%; display:flex; justify-content: center'>No items in cart</div>";
    }
  }
}

if (isset($_REQUEST['a']) && isset($_REQUEST['ref'])) {
  $a = $_REQUEST['a'];
  $ref = $_REQUEST['ref'];

  $user_id = $_SESSION["uid"];
  $code = $_SESSION["code"];

  $sql = "SELECT * FROM cart WHERE user_id = '$user_id'";

  $query = mysqli_query($con, $sql);
  if (mysqli_num_rows($query) > 0) {
    //update code table here
    $no = mysqli_num_rows($query);
    $sql = "UPDATE codes SET no_of_sales=no_of_sales + $no WHERE code = '$_SESSION[code]'";

    if (!mysqli_query($con, $sql)) {
      echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Sorry an error occurred</b>
				</div>";
    }

    $n = 0;
    while ($row = mysqli_fetch_array($query)) {
      $product_id = $row["p_id"];
      $qty = $row["qty"];
      $color = $row["color"];
      $size = $row["size"];

      $sql = "INSERT INTO `orders`
      (`user_id`, `product_id`, `qty`, `trx_id`, `p_status`, `color`, `size`) 
      VALUES ('$user_id','$product_id','$qty','$ref', 'pending', '$color', $size)";
      //insert into orders table then delete
      if (mysqli_query($con, $sql)) {
        $sql = "DELETE FROM cart WHERE p_id = '$product_id' AND user_id = '$user_id'";
        if (mysqli_query($con, $sql)) {
          $n++;
        }
      }
    }
  }
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
  $remove_id = $_POST["rid"];
  if (isset($_SESSION["uid"])) {
    $sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
  } else {
    $sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
  }
  if (mysqli_query($con, $sql)) {
    echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
    exit();
  }
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
  $update_id = $_POST["update_id"];
  $qty = $_POST["qty"];
  if (isset($_SESSION["uid"])) {
    $sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
  } else {
    $sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
  }
  if (mysqli_query($con, $sql)) {
    echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
    exit();
  }
}


//change password
if (isset($_POST["changepassword"])) {
  $id = $_SESSION["uid"];
  $oldpassword = $_POST['oldpassword'];
  $newpassword = $_POST['newpassword'];
  $confirmpassword = $_POST['confirmpassword'];

  if ($oldpassword == '' || $newpassword == '' || $confirmpassword == '') {
    $_SESSION['error'] = 'Please fill in the fields';
    header("Location: changePassword.php?id=$id");
  } else {
    $stmt = $con->query("SELECT user_id, email, password FROM `user_info` WHERE user_id = '$id'");

    $user = $stmt->fetch_assoc();

    if ($user === false) {
      $_SESSION['error'] = 'Wrong Password ' . $msg;
      header("Location: changePassword.php?id=$id");
    } else {
      //Compare and decrypt passwords.

      $oldpassword = md5($oldpassword);
      // $validPassword = password_verify($oldpassword, $user['password']);

      //If $validPassword is TRUE, the login has been successful.
      if ($oldpassword == $user['password']) {
        if ($oldpassword == $newpassword) {
          $_SESSION['error'] = 'Old and New passwords cannot be the same ' . $msg;
          header("Location: changePassword.php?id=$id");
        } else if ($confirmpassword != $newpassword) {
          $_SESSION['error'] = 'New and Confirm passwords must match ' . $msg;
          header("Location: changePassword.php?id=$id");
        } else {
          $newhashedpassword = md5($newpassword);
          // $newhashedpassword = password_hash($newpassword, PASSWORD_BCRYPT, array("cost" => 12));
          $sql = $con->query("UPDATE `user_info` SET `password` = '$newhashedpassword' WHERE user_id = '$id'");

          if ($sql) {
            $_SESSION['success'] = 'Password successfully Updated ' . $msg;
          } else {
            $_SESSION['error'] = 'Update failed ';
          }

          header("Location: changePassword.php?id=$id");
        }
      } else {
        $_SESSION['error'] = 'Wrong Password ' . $msg;
        header("Location: changePassword.php?id=$id");
      }
    }
  }
}




?>