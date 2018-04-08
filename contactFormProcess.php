<?php session_start();
  //echo phpinfo();
  $serverName = "waystonepm.database.windows.net";
  $connectionOptions = array(
      "Database" => "tenant_accounts",
      "Uid" => "waystoneadmin",
      "PWD" => "waystoneMGMT!"
  );
  //Establishes the connection
  $conn = sqlsrv_connect($serverName, $connectionOptions);

  function submitContactInfo(&$conn) {
    $fname = filter_var($_POST['fname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_var($_POST['lname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_SPECIAL_CHARS);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($fname) || empty($lname) || empty($email) || empty($phone)) {
      return ['all fields required', false];
    }
    preg_match('/[a-z0-9!#$%&'*+\/=?^_{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9][a-z0-9-]*[a-z0-9]/', $email, $matches);
    if ($matches !== null) {
      return ['Email is not Valid', false];
    }
    preg_match('/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im', $phone, $matches);
    if ($matches !== null) {
      return ['Phone is not Valid', false];
    }
    if (empty($message)) {
      $q = "insert CONTACT (FIRSTNAME, LASTNAME, EMAIL, PHONE) values('$fname','$lname','$email','$phone')";
    } else {
      $q = "insert CONTACT (FIRSTNAME, LASTNAME, EMAIL, PHONE, MESSAGES) values('$fname','$lname','$email','$phone','$message')";
    }
    $result = sqlsrv_query($conn, $q);
    if ($result === false) {
      die(print_r(sqlsrv_errors(), true));
      return ['insert failed', false];
    } else {
      return [null, true];
    }
  }

  list($msg, $success) = submitContactInfo($conn);
  $_SESSION['msg'] = $msg;
  $_SESSION['sentMessage'] = true;

  sqlsrv_free_stmt($result);
  echo $_SESSION['msg'];
  //header("Location: contact.php");

  ?>
