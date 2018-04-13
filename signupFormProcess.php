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

    $_SESSION['fname'] = $fname;
    $_SESSION['mIni'] = $mi;
    $_SESSION['lname'] = $lname;
    $_SESSION['address'] = $address;
    $_SESSION['city'] = $city;
    $_SESSION['state'] = $state;
    $_SESSION['zip'] = $zip;
    $_SESSION['phone'] = $phone;
    $_SESSION['DOB'] = $DOB;
    $_SESSION['email'] = $email;
    $_SESSION['confEmail'] = $confEmail;
    //var_dump($_POST);
    if (empty($fname) || empty($mi) || empty($lname) || empty($address) || empty($city) || empty($state) || empty($zip) || empty($phone) || empty($DOB) || empty($email) || empty($confEmail) || empty($pass) || empty($confPass)) {
      return ['All Fields Required', false]; // stop function execution w/ error message
    }
    $emailValidate = preg_match("/[a-z0-9!#$%&'*+\/=?^_{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9][a-z0-9-]*[a-z0-9]/", $email, $matches);
    if ($emailValidate !== 1) {
      unset($_SESSION['email']);
      //echo "line 45: unset email";
      $validEmail = false;
    } else {
      $validEmail = true;
    }
    if ($email !== $confEmail) {
      unset($_SESSION['confEmail']);
      //echo "line 45: unset confEmail";
      $validConfEmail = false;
    } else {
      $validConfEmail = true;
    }
    if ($pass !== $confPass) {
      //echo "line 51: passwords dont match";
      $_SESSION['validConfPass'] = false;
      $validConfPass = false;
    } else {
      unset($_SESSION['validConfPass']);
      $validConfPass = true;
    }
    if ($pass !== $confPass) {
      //echo "line 51: password invalid";
      $_SESSION['validPass'] = false;
      $validPass = false;
    } else {
      unset($_SESSION['validPass']);
      $validPass = true;
    }
    $zipValidate = preg_match("/(^\d{5}$)|(^\d{5}-\d{4}$)/", $zip, $matches);
    if (strlen($zip) < 5 || $zipValidate !== 1) {
      unset($_SESSION['zip']);
      //echo "line 59: unset zip";
      $validZip = false;
    } else {
      $validZip = true;
    }
    if (strlen($phone) < 12) {
      //echo "line 34: phone not valid";
      unset($_SESSION['phone']);
      $validPhone = false;
    } else {
      //echo "line 37: phone valid";
      $validPhone = true;
    }
    if (!$validZip) {
      return ['Zip code is not valid', false]; // stop function execution w/ error message
    } elseif (!$validPhone) { // checks for invalid phone #
      return ['Phone # is not valid', false]; // stop function execution w/ error message
    } elseif (!$validEmail) { // checks for invalid email
      return ['Email is not Valid', false]; // stop function execution w/ error message
    } elseif (!$validConfEmail) {
      return ['Emails do NOT Match', false]; // stop function execution w/ error message
    } elseif (!$validConfPass) {
      return ['Passwords Do NOT Match', false]; // stop function execution w/ error message
    } elseif (!$validPass) { // checks for invalid password
      return ['Password is not Valid', false]; // stop function execution w/ error message
    }


    $q = "select * from ten_login where email = '$email'";
    $result = sqlsrv_query($conn, $q);
    if ($result === false) {
      die(print_r(sqlsrv_errors(), true));
      return ["CUSTOM PHPERROR: connection error during tenant_login query", false]; // stop function execution w/ error message
    }
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

    if (!is_null($row)) {
      return ['Email is Already Registered', false]; // stop function execution w/ error message
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

  $_SESSION['success'] = $success;

  if ($success) { // send user to tenant portal if the signup was successful
    session_destroy();
    $location = 'https://waystonepm-tenantportal.azurewebsites.net';
  } else {
    $_SESSION['signupAttempt'] = true;
    $location = 'signup.php'; // if it didn't work, redirect back to signup page
  }
  //$_SESSION['msg'] = $msg; // Bind error message to session variable
  //echo $_SESSION['msg']; // Here for debugging
  //var_dump($_SESSION);
  header("Location: $location");

  ?>
