<?php
session_start();
/**
 * 
 */
class Customers
{

  private $con;

  function __construct()
  {
    include_once("Database.php");
    $db = new Database();
    $this->con = $db->connect();
  }

  public function getCustomers()
  {
    $query = $this->con->query("SELECT `user_id`, `first_name`, `last_name`, `email`, `mobile`, `address1`, `address2` FROM `user_info`");
    $ar = [];
    if (@$query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
        $ar[] = $row;
      }
      return ['status' => 202, 'message' => $ar];
    }
    return ['status' => 303, 'message' => 'no customer data'];
  }


  public function getCustomersOrder()
  {
    $query = $this->con->query("SELECT * FROM orders, products, user_info WHERE orders.product_id = products.product_id AND orders.user_id = user_info.user_id");
    $ar = [];
    if (@$query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
        $ar[] = $row;
      }
      return ['status' => 202, 'message' => $ar];
    }
    return ['status' => 303, 'message' => 'no orders yet'];
  }
}


if (isset($_POST["GET_CUSTOMERS"])) {
  if (isset($_SESSION['admin_id'])) {
    $c = new Customers();
    echo json_encode($c->getCustomers());
    exit();
  }
}

if (isset($_POST["GET_CUSTOMER_ORDERS"])) {
  if (isset($_SESSION['admin_id'])) {
    $c = new Customers();
    echo json_encode($c->getCustomersOrder());
    exit();
  }
}


if (isset($_POST["update_status"])) {
  include("Database.php");

  $db = new Database();
  $con = $db->connect();

  $order_id = $_POST['order_id'];
  $order_status = $_POST['order_status'];

  $sql = $con->query("UPDATE `orders` SET `p_status` = '$order_status' WHERE order_id = '$order_id'");

  if ($sql) {
    $_SESSION['success'] = 'Status successfully Updated ' . $msg;
  } else {
    $_SESSION['error'] = 'Status update failed ';
  }

  header("Location: ../customer_orders.php?id=$id");
}

if (isset($_POST["generate_code"])) {
  include("Database.php");

  $db = new Database();
  $con = $db->connect();

  $marketer_name = $_POST['marketer_name'];

  $prefix = strtoupper(substr($marketer_name, 0, 3));
  $sufix = rand(1000, 9999);

  $code = $prefix . $sufix;

  $sql = $con->query("INSERT INTO codes (marketer_name, code) VALUES ('$marketer_name', '$code')");

  if ($sql) {
    $_SESSION['success'] = 'Code successfully generated ' . $msg;
  } else {
    $_SESSION['error'] = 'Code generation failed ';
  }

  header("Location: ../refCodes.php");
}
