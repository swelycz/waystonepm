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
  $testQuery = "select * from tenant_login";
  $testResults = sqlsrv_query($conn, $testQuery);
  echo $testResults;

  /*$email = $_POST["email"];
  $pass = $_POST["pass"];

  if ($email == "index") {
    header('Location: index.php');
    die();
  } */
?>
