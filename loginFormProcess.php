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
  $stmt = sqlsrv_query($conn, $testQuery);
  if ($testResults === false) {
    die(print_r(sqlsrv_errors(), true));
  }

  while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo "Email: " . $row['email'] . " | Password: " . $row['password'] . "<br />";
  }

  sqlsrv_free_stmt($stmt);

?>
