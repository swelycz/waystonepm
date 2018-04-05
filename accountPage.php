<?php include("templates/header.php");
  if (!$_SESSION['loggedin']) {
    header("Location: index.php");
  }
?>
<p>
  You logged in with this email: <?= $_SESSION['email']?>
</p>
<?php include("templates/footer.php")?>
