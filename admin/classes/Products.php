<?php
session_start();

class Products
{

  private $con;

  function __construct()
  {
    include_once("Database.php");
    $db = new Database();
    $this->con = $db->connect();
  }

  public function getProducts()
  {
    $q = $this->con->query("SELECT p.product_id, p.product_title, p.product_price,p.product_qty, p.product_desc, p.product_image, p.second_image, p.color, c.cat_title, c.cat_id FROM products p JOIN categories c ON c.cat_id = p.product_cat");

    $products = [];
    if ($q->num_rows > 0) {
      while ($row = $q->fetch_assoc()) {
        $products[] = $row;
      }
      //return ['status'=> 202, 'message'=> $ar];
      $_DATA['products'] = $products;
    }

    $categories = [];
    $q = $this->con->query("SELECT * FROM categories");
    if ($q->num_rows > 0) {
      while ($row = $q->fetch_assoc()) {
        $categories[] = $row;
      }
      //return ['status'=> 202, 'message'=> $ar];
      $_DATA['categories'] = $categories;
    }

    return ['status' => 202, 'message' => $_DATA];
  }

  public function addProduct(
    $product_name,
    $category_id,
    $product_desc,
    $product_qty,
    $product_price,
    $file,
    $file2,
    $color
  ) {

      if ($file['size'] > (1024 * 2) && $file2['size'] > (1024 * 2) ) {

        $uniqueImageName = time() . "_" . $file['name'];
        $uniqueImageName2 = time() . "_" . $file2['name'];

        if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/dnmgd/admin/product_images/" . $uniqueImageName) && move_uploaded_file($file2['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/dnmgd/admin/product_images/" . $uniqueImageName2)) {

          $q = $this->con->query("INSERT INTO products (product_cat, product_title, product_qty, product_price, product_desc, product_image, second_image, color) VALUES ('$category_id', '$product_name', '$product_qty', '$product_price', '$product_desc', '$uniqueImageName', '$uniqueImageName2', '$color')");

          if ($q) {
            return ['status' => 202, 'message' => 'Product Added Successfully..!'];
          } else {
            return ['status' => 303, 'message' => 'Failed to run query'];
          }
        } else {
          return ['status' => 303, 'message' => 'Failed to upload image'];
        }
      } else {
        return ['status' => 303, 'message' => 'Large Image ,Max Size allowed 2MB'];
      }
  }


  public function editProductWithImage(
    $pid,
    $product_name,
    $category_id,
    $product_desc,
    $product_qty,
    $product_price,
    $file,
    $file2,
    $color,
  ) {
        $uniqueImageName = time() . "_" . $file['name'];
        $uniqueImageName2 = time() . "_" . $file2['name'];

        if($file['tmp_name'] != ''){
          if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/dnmgd/admin/product_images/" . $uniqueImageName)) {

            if($color == null){
            $q = $this->con->query("UPDATE `products` SET 
                      `product_cat` = '$category_id', 
                      `product_title` = '$product_name', 
                      `product_qty` = '$product_qty', 
                      `product_price` = '$product_price', 
                      `product_desc` = '$product_desc', 
                      `product_image` = '$uniqueImageName' WHERE product_id = '$pid'");
            }
            $q = $this->con->query("UPDATE `products` SET 
                      `product_cat` = '$category_id', 
                      `product_title` = '$product_name', 
                      `product_qty` = '$product_qty', 
                      `product_price` = '$product_price', 
                      `product_desc` = '$product_desc', 
                      `product_image` = '$uniqueImageName',
                      `color` = '$color' WHERE product_id = '$pid'");

            if ($q) {
              return ['status' => 202, 'message' => 'Product Modified Successfully..!'];
            } else {
              return ['status' => 303, 'message' => 'Failed to run query'];
            }
          } else {
            return ['status' => 303, 'message' => 'Failed to upload image'];
          }
        }
    

        if($file2['tmp_name'] != ''){
          if ( move_uploaded_file($file2['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/dnmgd/admin/product_images/" . $uniqueImageName2)) {
            if($color == null){
            $q = $this->con->query("UPDATE `products` SET 
                      `product_cat` = '$category_id', 
                      `product_title` = '$product_name', 
                      `product_qty` = '$product_qty', 
                      `product_price` = '$product_price', 
                      `product_desc` = '$product_desc', 
                      `second_image` = '$uniqueImageName2' WHERE product_id = '$pid'");
            }
            $q = $this->con->query("UPDATE `products` SET 
                      `product_cat` = '$category_id', 
                      `product_title` = '$product_name', 
                      `product_qty` = '$product_qty', 
                      `product_price` = '$product_price', 
                      `product_desc` = '$product_desc', 
                      `second_image` = '$uniqueImageName2',
                      `color` = '$color' WHERE product_id = '$pid'");

            if ($q) {
              return ['status' => 202, 'message' => 'Product Modified Successfully..!'];
            } else {
              return ['status' => 303, 'message' => 'Failed to run query'];
            }
          } else {
            return ['status' => 303, 'message' => 'Failed to upload image'];
          }
        }

        if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/dnmgd/admin/product_images/" . $uniqueImageName) && move_uploaded_file($file2['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/dnmgd/admin/product_images/" . $uniqueImageName2)) {
          if($color == null){
            $q = $this->con->query("UPDATE `products` SET 
                    `product_cat` = '$category_id', 
                    `product_title` = '$product_name', 
                    `product_qty` = '$product_qty', 
                    `product_price` = '$product_price', 
                    `product_desc` = '$product_desc', 
                    `product_image` = '$uniqueImageName',
                    `second_image` = '$uniqueImageName2' WHERE product_id = '$pid'");
          }
          $q = $this->con->query("UPDATE `products` SET 
                    `product_cat` = '$category_id', 
                    `product_title` = '$product_name', 
                    `product_qty` = '$product_qty', 
                    `product_price` = '$product_price', 
                    `product_desc` = '$product_desc', 
                    `product_image` = '$uniqueImageName',
                    `second_image` = '$uniqueImageName2',
                    `color` = '$color' WHERE product_id = '$pid'");

          if ($q) {
            return ['status' => 202, 'message' => 'Product Modified Successfully..!'];
          } else {
            return ['status' => 303, 'message' => 'Failed to run query'];
          }
        } else {
          return ['status' => 303, 'message' => 'Failed to upload image'];
        }


  }

  public function editProductWithoutImage(
    $pid,
    $product_name,
    $category_id,
    $product_desc,
    $product_qty,
    $product_price,
    $color
  ) {

    if ($pid != null) {
    if($color == null){
        $q = $this->con->query("UPDATE `products` SET 
										`product_cat` = '$category_id', 
										`product_title` = '$product_name', 
										`product_qty` = '$product_qty', 
										`product_price` = '$product_price', 
										`product_desc` = '$product_desc' WHERE product_id = '$pid'");
    }
      $q = $this->con->query("UPDATE `products` SET 
										`product_cat` = '$category_id', 
										`product_title` = '$product_name', 
										`product_qty` = '$product_qty', 
										`product_price` = '$product_price', 
										`product_desc` = '$product_desc',
                    `color` = '$color' WHERE product_id = '$pid'");

      if ($q) {
        return ['status' => 202, 'message' => 'Product updated Successfully'];
      } else {
        return ['status' => 303, 'message' =>  'Failed to run query'];
      }
    } else {
      return ['status' => 303, 'message' => 'Invalid product id'];
    }
  }




  public function addCategory($name)
  {
    $q = $this->con->query("SELECT * FROM categories WHERE cat_title = '$name' LIMIT 1");
    if ($q->num_rows > 0) {
      return ['status' => 303, 'message' => 'Category already exists'];
    } else {
      $q = $this->con->query("INSERT INTO categories (cat_title) VALUES ('$name')");
      if ($q) {
        return ['status' => 202, 'message' => 'New Category added Successfully'];
      } else {
        return ['status' => 303, 'message' => 'Failed to run query'];
      }
    }
  }

  public function getCategories()
  {
    $q = $this->con->query("SELECT * FROM categories");
    $ar = [];
    if ($q->num_rows > 0) {
      while ($row = $q->fetch_assoc()) {
        $ar[] = $row;
      }
    }
    return ['status' => 202, 'message' => $ar];
  }

  public function deleteProduct($pid = null)
  {
    if ($pid != null) {
      $q = $this->con->query("DELETE FROM products WHERE product_id = '$pid'");
      if ($q) {
        return ['status' => 202, 'message' => 'Product removed from stocks'];
      } else {
        return ['status' => 202, 'message' => 'Failed to run query'];
      }
    } else {
      return ['status' => 303, 'message' => 'Invalid product id'];
    }
  }

  public function deleteCategory($cid = null)
  {
    if ($cid != null) {
      $q = $this->con->query("DELETE FROM categories WHERE cat_id = '$cid'");
      if ($q) {
        return ['status' => 202, 'message' => 'Category removed'];
      } else {
        return ['status' => 202, 'message' => 'Failed to run query'];
      }
    } else {
      return ['status' => 303, 'message' => 'Invalid cattegory id'];
    }
  }
  public function deleteCode($cid = null)
  {
    if ($cid != null) {
      $q = $this->con->query("DELETE FROM codes WHERE id = '$cid'");
      if ($q) {
        return ['status' => 202, 'message' => 'Code removed'];
      } else {
        return ['status' => 202, 'message' => 'Failed to run query'];
      }
    } else {
      return ['status' => 303, 'message' => 'Invalid cattegory id'];
    }
  }



  public function updateCategory($post = null)
  {
    extract($post);
    if (!empty($cat_id) && !empty($e_cat_title)) {
      $q = $this->con->query("UPDATE categories SET cat_title = '$e_cat_title' WHERE cat_id = '$cat_id'");
      if ($q) {
        return ['status' => 202, 'message' => 'Category updated'];
      } else {
        return ['status' => 202, 'message' => 'Failed to run query'];
      }
    } else {
      return ['status' => 303, 'message' => 'Invalid category id'];
    }
  }
}


if (isset($_POST['GET_PRODUCT'])) {
  if (isset($_SESSION['admin_id'])) {
    $p = new Products();
    echo json_encode($p->getProducts());
    exit();
  }
}


if (isset($_POST['add_product'])) {

  extract($_POST);
  if (
    !empty($product_name)
    && !empty($category_id)
    && !empty($product_desc)
    && !empty($product_qty)
    && !empty($product_price)
    && !empty($color)
    && !empty($_FILES['product_image']['name'])
    && !empty($_FILES['second_image']['name'])
  ) {


    $p = new Products();
    $result = $p->addProduct(
      $product_name,
      $category_id,
      $product_desc,
      $product_qty,
      $product_price,
      $_FILES['product_image'],
      $_FILES['second_image'],
      $color,
    );

    header("Content-type: application/json");
    echo json_encode($result);
    http_response_code($result['status']);
    exit();
  } else {
    echo json_encode(['status' => 303, 'message' => 'Empty fields']);
    exit();
  }
}

if (isset($_POST['edit_product'])) {

  extract($_POST);
  if (
    !empty($pid)
    && !empty($e_product_name)
    && !empty($e_category_id)
    && !empty($e_product_desc)
    && !empty($e_product_qty)
    && !empty($e_product_price)
  ) {

    $p = new Products();

    if (
      isset($_FILES['e_product_image']['name'])
      && !empty($_FILES['e_product_image']['name'] ) || isset($_FILES['e_second_image']['name'])
      && !empty($_FILES['e_second_image']['name'] )
    ) {

      $result = $p->editProductWithImage(
        $pid,
        $e_product_name,
        $e_category_id,
        $e_product_desc,
        $e_product_qty,
        $e_product_price,
        $_FILES['e_product_image'],
        $_FILES['e_second_image'],
        $e_color
      );
    } else {
      $result = $p->editProductWithoutImage(
        $pid,
        $e_product_name,
        $e_category_id,
        $e_product_desc,
        $e_product_qty,
        $e_product_price,
        $e_color,
      );
    }

    echo json_encode($result);
    exit();
  } else {
    echo json_encode(['status' => 303, 'message' => 'Empty fields']);
    exit();
  }
}



if (isset($_POST['add_category'])) {
  if (isset($_SESSION['admin_id'])) {
    $cat_title = $_POST['cat_title'];
    if (!empty($cat_title)) {
      $p = new Products();
      echo json_encode($p->addCategory($cat_title));
    } else {
      echo json_encode(['status' => 303, 'message' => 'Empty fields']);
    }
  } else {
    echo json_encode(['status' => 303, 'message' => 'Session Error']);
  }
}

if (isset($_POST['GET_CATEGORIES'])) {
  $p = new Products();
  echo json_encode($p->getCategories());
  exit();
}

if (isset($_POST['DELETE_PRODUCT'])) {
  $p = new Products();
  if (isset($_SESSION['admin_id'])) {
    if (!empty($_POST['pid'])) {
      $pid = $_POST['pid'];
      echo json_encode($p->deleteProduct($pid));
      exit();
    } else {
      echo json_encode(['status' => 303, 'message' => 'Invalid product id']);
      exit();
    }
  } else {
    echo json_encode(['status' => 303, 'message' => 'Invalid Session']);
  }
}


if (isset($_POST['DELETE_CATEGORY'])) {
  if (!empty($_POST['cid'])) {
    $p = new Products();
    echo json_encode($p->deleteCategory($_POST['cid']));
    exit();
  } else {
    echo json_encode(['status' => 303, 'message' => 'Invalid details']);
    exit();
  }
}

if (isset($_POST['DELETE_CODE'])) {
  if (!empty($_POST['cid'])) {
    $p = new Products();
    echo json_encode($p->deleteCode($_POST['cid']));
    exit();
  } else {
    echo json_encode(['status' => 303, 'message' => 'Invalid details']);
    exit();
  }
}

if (isset($_POST['edit_category'])) {
  if (!empty($_POST['cat_id'])) {
    $p = new Products();
    echo json_encode($p->updateCategory($_POST));
    exit();
  } else {
    echo json_encode(['status' => 303, 'message' => 'Invalid details']);
    exit();
  }
}
