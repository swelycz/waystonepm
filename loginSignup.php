<?php include("templates/header.php") ?>
<div class = "logSignModuleWrapper">
  <div class = "logSignModuleContiainer">
    <div class = "logSignButtonsContainer">
      <div id = "loginModuleButton" class = "focused">Login</div>
      <div id = "signupModuleButton" class = "unfocused">Sign Up</div>
    </div>
    <div id = 'loginModule'>
      <div class = "logSignTitle">Login</div>
      <form class = "loginForm" name="loginForm" id="loginForm" action="loginFormProcess.php" method="post"">
        <p id="emailValidationMsg">Email entered is not valid</p>
        <input type="text" name="email" id="email" placeholder="Email Address" maxlength="64" autofocus required>
        <input type="password" name="password" id="password" placeholder="Password" maxlength="32" required>
        <button type="submit" class = "loginButton"></button>
      </form>
    </div>
  </div>
</div>
<?php include("templates/footer.php") ?>
