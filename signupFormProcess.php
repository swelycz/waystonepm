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
    $address = filter_var($_POST['address'], FILTER_SANITIZE_SPECIAL_CHARS);
    $city = filter_var($_POST['city'], FILTER_SANITIZE_SPECIAL_CHARS);
    $state = filter_var($_POST['state'], FILTER_SANITIZE_SPECIAL_CHARS);
    $zip = filter_var($_POST['zip'], FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_SPECIAL_CHARS);
    $day = filter_var($_POST['days'], FILTER_SANITIZE_SPECIAL_CHARS);
    $month = filter_var($_POST['months'], FILTER_SANITIZE_SPECIAL_CHARS);
    $year = filter_var($_POST['years'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confEmail = filter_var($_POST['confEmail'], FILTER_SANITIZE_SPECIAL_CHARS);
    $pass = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confPass = filter_var($_POST['confPass'], FILTER_SANITIZE_SPECIAL_CHARS);
    var_dump($_POST);
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
