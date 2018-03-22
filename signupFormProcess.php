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

  function signupUser(&$conn) {
    $fname = filter_var($_POST['fname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $mi = filter_var($_POST['mIni'], FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_var($_POST['lname'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confEmail = filter_var($_POST['confEmail'], FILTER_SANITIZE_SPECIAL_CHARS);
    $pass = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confPass = filter_var($_POST['confPass'], FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($fname) || empty($mi) || empty($lname) || empty($email) || empty($confEmail) || empty($pass) || empty($confPass)) {
      return ['all fields required', false];
    } else if ($email !== $confEmail) {
      return ['emails do not match', false];
    } else if ($pass !== $confPass) {
      return ['passwords do not match', false];
    }

    $q = "select * from tenant_login where email = '$email'";
    $result = sqlsrv_query($conn, $q);
    if ($result === false) {
      die(print_r(sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

    if (!is_null($row)) {
      return ['email is already registered', false];
    }
    sqlsrv_free_stmt($result);
    $q = "insert TENANT (FIRSTNAME,MI,LASTNAME,EMAIL) values('$fname','$mi','$lname','$email')";
    $result = sqlsrv_query($conn, $q);
    if ($result === false) {
      die(print_r(sqlsrv_errors(), true));
    }
    sqlsrv_free_stmt($result);
    $q = "insert tenant_login (email, password) values('$email','$pass')";
    $result = sqlsrv_query($conn, $q);
    if ($result === false) {
      die(print_r(sqlsrv_errors(), true));
    }
    return [null, true];
  }

  list($msg, $success) = signupUser($conn);
  $_SESSION['msg'] = $msg;
  $_SESSION['email'] = $email;

  if ($success) {
    $location = 'accountPage.php';
    $_SESSION['loggedin'] = true;
  } else {
    $location = 'loginSignup.php';
  }
  echo $_SESSION['msg'];

  //header("Location: $location");

  ?>
