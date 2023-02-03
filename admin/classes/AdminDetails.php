<?php session_start();
include('Database.php');
$db = new Database();
$con = $db->connect();

if (isset($_POST["editprofile"])) {
  $id = $_GET['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];


  if ($name == '' || $email == '') {
    $_SESSION['error'] = 'Please fill in the fields';
    header("Location: ../update_admin_details.php?id=$id");
  } else {
    $q = $con->query("UPDATE `admin` SET 
  									`name` = '$name', 
  									`email` = '$email' 
  									WHERE id = '$id'");

    if ($q) {
      $_SESSION['success'] = 'Details successfully Updated ';
    } else {
      $_SESSION['error'] = 'Update failed ';
    }
    header("Location: ../update_admin_details.php?id=$id");
  }
}

//change password
if (isset($_POST["changepassword"])) {
  $id = $_GET['id'];
  $oldpassword = $_POST['oldpassword'];
  $newpassword = $_POST['newpassword'];
  $confirmpassword = $_POST['confirmpassword'];

  if ($oldpassword == '' || $newpassword == '' || $confirmpassword == '') {
    $_SESSION['error'] = 'Please fill in the fields';
    header("Location: ../changepassword.php?id=$id");
  } else {
    $stmt = $con->query("SELECT id, email, password FROM `admin` WHERE id = '$id'");

    $user = $stmt->fetch_assoc();

    if ($user === false) {
      $_SESSION['error'] = 'Wrong Password ' . $msg;
      header("Location: ../update_password.php?id=$id");
    } else {
      //Compare and decrypt passwords.
      $validPassword = password_verify($oldpassword, $user['password']);

      //If $validPassword is TRUE, the login has been successful.
      if ($validPassword) {
        if ($oldpassword == $newpassword) {
          $_SESSION['error'] = 'Old and New passwords cannot be the same ' . $msg;
          header("Location: ../update_password.php?id=$id");
        } else if ($confirmpassword != $newpassword) {
          $_SESSION['error'] = 'New and Confirm passwords must match ' . $msg;
          header("Location: ../update_password.php?id=$id");
        } else {
          $newhashedpassword = password_hash($newpassword, PASSWORD_BCRYPT, array("cost" => 12));
          $sql = $con->query("UPDATE `admin` SET `password` = '$newhashedpassword' WHERE id = '$id'");

          if ($sql) {
            $_SESSION['success'] = 'Password successfully Updated ' . $msg;
          } else {
            $_SESSION['error'] = 'Update failed ';
          }

          header("Location: ../update_password.php?id=$id");
        }
      } else {
        $_SESSION['error'] = 'Wrong Password ' . $msg;
        header("Location: ../update_password.php?id=$id");
      }
    }
  }
}
