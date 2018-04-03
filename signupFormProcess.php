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
    var_dump($_POST);
    if (empty($fname) || empty($mi) || empty($lname) || empty($address) || empty($city) || empty($state) || empty($zip) || empty($phone) || empty($day) || empty($month) || empty($year) || empty($email) || empty($confEmail) || empty($pass) || empty($confPass)) {
      return ['all fields required', false]; // stop function execution w/ error message
    } else if ($email !== $confEmail) {
      return ['emails do not match', false]; // stop function execution w/ error message
    } else if ($pass !== $confPass) {
      return ['passwords do not match', false]; // stop function execution w/ error message
    }

    $q = "select * from tenant_login where email = '$email'";
    $result = sqlsrv_query($conn, $q);
    if ($result === false) {
      die(print_r(sqlsrv_errors(), true));
      return ["connection error during tenant_login query", false]; // stop function execution w/ error message
    }
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

    if (!is_null($row)) {
      return ['email is already registered', false]; // stop function execution w/ error message
    }
    // process to insert into tenant_login table first
    sqlsrv_free_stmt($result); // free up the $result variable
    $q = "insert tenant_login (email, password) values('$email','$pass')"; // prepare query
    $result = sqlsrv_query($conn, $q); // query database and set equal to $result
    if ($result === false) { // check for connection/process errors
      die(print_r(sqlsrv_errors(), true)); // print errors
      return ["connection error durring tenant_login insert", false]; // stop function execution w/ error message
    }

    $DOB = $year . "-" . $month . "-" . $day; // combine year, month, and day variables into one
    sqlsrv_free_stmt($result); // free up the $result variable
    $q = "insert TENANT (FIRSTNAME,MI,LASTNAME,PERM_ADDRESS,PERM_STATE,PERM_ZIP,PHONE,EMAIL,DOB) values('$fname','$mi','$lname','$address','$state','$zip','$phone','$email','$DOB')"; // prepare query
    $result = sqlsrv_query($conn, $q); // query database and set equal to $result
    if ($result === false) { // check for connection/process errors
      die(print_r(sqlsrv_errors(), true)); // print errors
      return ["connection error durring TENANT insert", false]; // stop function execution w/ error message
    }
    return [null, true]; // give thumbs up that everything worked
  }

  list($msg, $success) = signupUser($conn); // grab return values from signupUser function and store in two variables
  $_SESSION['msg'] = $msg; // Bind error message to session variable

  if ($success) { // send user to tenant portal if the signup was successful
    $location = 'https://waystonepm-tenantportal.azurewebsites.net';
  } else {
    $location = 'signup.php'; // if it didn't work, redirect back to signup page
  }
  echo $_SESSION['msg']; // Here for debugging

  //header("Location: $location");

  ?>
