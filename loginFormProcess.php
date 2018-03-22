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
    $pass = filter_var($_POST['pass'], FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($email) || empty($pass)) {
      return ['all fields required', false];
    }

    $q = "select * from tenant_login where email = '$email'";
    $result = sqlsrv_query($conn, $testQuery);

    if (!$result) {
      return [$conn->error, false];
    } elseif ($result->num_rows !== 1) {
      return ['problem logging in', false];
    } else {
      $email = $result->fetch_object();
    }
  }

  list($msg, $success) = loginUser($conn);
  $_SESSION['msg'] = $msg;
  $_SESSION['email'] = $_POST['email'];

  if ($success) {
    $location = 'accountPage.php';
  } else {
    $location = 'loginSignup.php';
  }

  //sqlsrv_free_stmt($result);
  //header("Location: $location");

?>
