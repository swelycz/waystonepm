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

    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['message'] = $message;

    $emailValidate = preg_match("/[a-z0-9!#$%&'*+\/=?^_{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9][a-z0-9-]*[a-z0-9]/", $email, $matches);
    if ($emailValidate !== 1) {
      echo "line 27: email not valid";
      $validEmail = false;
    } else {
      echo "line 30: email valid";
      $validEmail = true;
    }
    if (strlen($phone) < 12) {
      echo "line 34: phone not valid";
      $validPhone = false;
    } else {
      echo "line 37: phone valid";
      $validPhone = true;
    }

    if (empty($fname) || empty($lname) || empty($email) || empty($phone)) {
      return ['All Fields Required', false];
    }

    if (!$validEmail && !$validPhone) {
      unset($_SESSION['email']);
      unset($_SESSION['phone']);
      echo "unset email and phone";
      return ['Email and Phone # are not Valid', false];
    } elseif (!$validEmail) {
      unset($_SESSION['email']);
      echo "unset email";
      return ['Email is invalid', false];
    } elseif (!$validPhone) {
      unset($_SESSION['phone']);
      echo "unset phone";
      return ['Phone # is invalid', false];
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
  if ($success) {
    $_SESSION['msgAttempt'] = false;
    $_SESSION['sentMessage'] = true;
    unset($_SESSION['fname']);
    unset($_SESSION['lname']);
    unset($_SESSION['email']);
    unset($_SESSION['phone']);
    unset($_SESSION['message']);
  } else {
    $_SESSION['msgAttempt'] = true;
    $_SESSION['sentMessage'] = false;
  }

  //sqlsrv_free_stmt($result);
  $_SESSION['msg'] = $msg;
  echo $_SESSION['msg'];
  var_dump($_SESSION);
  //header("Location: contact.php");

  ?>
