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
    $fname = filter_var($_POST['fname']);
    $mi = filter_var($_POST['mIni']);
    $lname = filter_var($_POST['lname']);
    $address = filter_var($_POST['address']);
    $city = filter_var($_POST['city']);
    $state = filter_var($_POST['state']);
    $zip = filter_var($_POST['zip']);
    $phone = filter_var($_POST['phone']);
    $day = filter_var($_POST['days']);
    $month = filter_var($_POST['months']);
    $year = filter_var($_POST['years']);
    $email = filter_var($_POST['email']);
    $confEmail = filter_var($_POST['confEmail']);
    $pass = filter_var($_POST['password']);
    $confPass = filter_var($_POST['confPass']);
    //var_dump($_POST);
    if (empty($fname) || empty($mi) || empty($lname) || empty($address) || empty($city) || empty($state) || empty($zip) || empty($phone) || empty($day) || empty($month) || empty($year) || empty($email) || empty($confEmail) || empty($pass) || empty($confPass)) {
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
    $DOB = $year . "-" . $month . "-" . $day;
    sqlsrv_free_stmt($result);
    $q = "insert TENANT (FIRSTNAME,MI,LASTNAME,PERM_ADDRESS,PERM_STATE,PERM_ZIP,PHONE,EMAIL,DOB) values('$fname','$mi','$lname','$address','$state','$zip','$phone','$email','$DOB')";
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

  if ($success) {
    $location = 'accountPage.php';
    $_SESSION['loggedin'] = true;
  } else {
    $location = 'loginSignup.php';
  }
  echo $_SESSION['msg'];

  //header("Location: $location");

  ?>
