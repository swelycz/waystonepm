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
  /*$testQuery = "select * from tenant_login";
  $stmt = sqlsrv_query($conn, $testQuery);
  if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
  }

  while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo "Email: " . $row['email'] . " | Password: " . $row['password'] . "<br />";
  }

  sqlsrv_free_stmt($stmt);
*/
  function loginUser(&$conn) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
    $pass = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($email) || empty($pass)) {
      return ['all fields required', false];
    }

    $q = "select * from tenant_login where email = '$email'";
    $result = sqlsrv_query($conn, $q);
    if ($result === false) {
      die(print_r(sqlsrv_errors(), true));
    }
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

    if (is_null($row)) {
      return ['email is not registered', false];
    } else if ($row['password'] !== $pass) {
      return ['password is not correct', false];
    } else {
      return [null, true];
    }
  }

  list($msg, $success) = loginUser($conn);
  $_SESSION['msg'] = $msg;
  $_SESSION['email'] = $email;


  if ($success) {
    $location = 'accountPage.php';
    $_SESSION['loggedin'] = true;
  } else {
    $location = 'loginSignup.php';
  }

  sqlsrv_free_stmt($result);
  header("Location: $location");

?>
