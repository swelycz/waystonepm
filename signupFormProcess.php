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
    $state = filter_var($_POST['state']);
    $zip = filter_var($_POST['zip'], FILTER_SANITIZE_SPECIAL_CHARS);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_SPECIAL_CHARS);
    $DOB = filter_var($_POST['DOB'], FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confEmail = filter_var($_POST['confEmail'], FILTER_SANITIZE_SPECIAL_CHARS);
    $pass = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
    $confPass = filter_var($_POST['confPass'], FILTER_SANITIZE_SPECIAL_CHARS);
    //var_dump($_POST);
    if (empty($fname) || empty($mi) || empty($lname) || empty($address) || empty($city) || empty($state) || empty($zip) || empty($phone) || empty($DOB) || empty($email) || empty($confEmail) || empty($pass) || empty($confPass)) {
      return ['CUSTOM PHPERROR: all fields required', false]; // stop function execution w/ error message
    } else if ($email !== $confEmail) {
      return ['CUSTOM PHPERROR: emails do not match', false]; // stop function execution w/ error message
    } else if ($pass !== $confPass) {
      return ['CUSTOM PHPERROR: passwords do not match', false]; // stop function execution w/ error message
    }

    $q = "select * from ten_login where email = '$email'";
    $result = sqlsrv_query($conn, $q);
    if ($result === false) {
      die(print_r(sqlsrv_errors(), true));
      return ["CUSTOM PHPERROR: connection error during tenant_login query", false]; // stop function execution w/ error message
    }
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

    if (!is_null($row)) {
      return ['CUSTOM PHPERROR: email is already registered', false]; // stop function execution w/ error message
    }
    // process to insert into tenant_login table first
    sqlsrv_free_stmt($result); // free up the $result variable
    $q = "insert ten_login (email, password) values('$email','$pass')"; // prepare query
    $result = sqlsrv_query($conn, $q); // query database and set equal to $result
    if ($result === false) { // check for connection/process errors
      die(print_r(sqlsrv_errors(), true)); // print errors
      return ["CUSTOM PHPERROR: connection error durring tenant_login insert", false]; // stop function execution w/ error message
    }

    sqlsrv_free_stmt($result); // free up the $result variable
    $q = "insert TENANT (FIRSTNAME,MI,LASTNAME,PERM_ADDRESS,PERM_CITY,PERM_STATE,PERM_ZIP,PHONE,EMAIL,DOB) values('$fname','$mi','$lname','$address','$city','$state','$zip','$phone','$email','$DOB')"; // prepare query
    $result = sqlsrv_query($conn, $q); // query database and set equal to $result
    if ($result === false) { // check for connection/process errors
      die(print_r(sqlsrv_errors(), true)); // print errors
      return ["CUSTOM PHPERROR: connection error durring TENANT insert", false]; // stop function execution w/ error message
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
  //echo $_SESSION['msg']; // Here for debugging

  header("Location: $location");

  ?>
