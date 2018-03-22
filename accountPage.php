<?php include("templates/header.php")
  if (is_null($_SESSION['email'])) {
    header("Location: index.php");
  }
?>
<p>
  You logged in with this email: <?= $_SESSION['email']?>
</p>
<?php include("templates/footer.php")?>
