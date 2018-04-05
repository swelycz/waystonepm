<?php include("templates/header.php") ?>
<div class = "logSignModuleWrapper">
  <div class = "logSignModuleContiainer">
    <div class = "logSignButtonsContainer">
      <div id = "loginModuleButton" class = "focused">Login</div>
      <div id = "signupModuleButton" class = "unfocused">Sign Up</div>
    </div>
    <div class = "scriptsWrapper">
      <div id="scriptsContainer"></div>
      <div id='loginScripts'>
        <script> $('.loginButton').click(function(){if (!$('.loginButton').hasClass('validate')){$('.loginButton').addClass('onclic', 250); validateSignup();}}); function validateSignup(){ var email=$('#email').value; var pass=$('#password').value;setTimeout(function(){if (email==null || email=='',pass==null || pass==''){$('.loginButton').removeClass('onclic');}else{$('.loginButton').removeClass('onclic'); $('.loginButton').addClass('validate', 450);}}, 2250);} var emailInput=document.querySelector('#email'); function checkEmail(email){ var re=/[a-z0-9!#$%&'*+\/=?^_{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9][a-z0-9-]*[a-z0-9]/; return re.test(email);}function validateEmail(){ var email=emailInput.value; if (!checkEmail(email)){$('#email').css('border-color','#ff0000'); $('#email').css('box-shadow','0 0 10px #ff0000'); $('#emailValidationMsg').css('visibility','visible'); return false;}else{$('#email').css('border-color',''); $('#email').css('box-shadow',''); $('#emailValidationMsg').css('visibility',''); return true;}}emailInput.addEventListener('input', function(){validateEmail();}); </script>
      </div>
    </div>
    <div id = 'loginModule'>
      <div class = "logSignTitle">Login</div>
      <form class = "loginForm" name="loginForm" id="loginForm" action="loginFormProcess.php" method="post">
        <p id="emailValidationMsg">Email entered is not valid</p>
        <input type="text" name="email" id="email" placeholder="Email Address" maxlength="64" autofocus required>
        <input type="password" name="password" id="password" placeholder="Password" maxlength="32" required>
        <button type="submit" class = "loginButton"></button>
      </form>
    </div>
  </div>
</div>
<?php include("templates/footer.php") ?>
