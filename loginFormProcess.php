<?php session_start();
<<<<<<< HEAD
  echo phpinfo();
  /*$serverName = "waystonepm.database.windows.net";
  $connectionOptions = array(
      "Database" => "tenant_accounts",
      "Uid" => "waystoneadmin",
      "PWD" => "waystoneMGMT!"
  );
  //Establishes the connection
  $conn = sqlsrv_connect($serverName, $connectionOptions);
=======
$serverName = "waystonepm.database.windows.net";
$connectionOptions = array(
    "Database" => "tenant_accounts",
    "Uid" => "waystoneadmin",
    "PWD" => "waystoneMGMT!"
);
//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

>>>>>>> 85d25fdb5b6ba46643fb0ee7e8d14db32e5d8973

  $email = $_POST["email"];
  $pass = $_POST["pass"];

  if ($email == "index") {
    header('Location: index.php');
    die();
<<<<<<< HEAD
  } */
=======
  }
>>>>>>> 85d25fdb5b6ba46643fb0ee7e8d14db32e5d8973
?>
