<?php include("templates/header.php") ?>
<div class = "logSignModuleWrapper">
  <div class = "logSignModuleContiainer">
    <div class = "logSignButtonsContainer noSelect">
      <div id = "signupModuleButton" class = "unfocused">Sign Up</div>
    </div>
    <div id='signupModule'>
      <p class = "signupFormErrorMsg">
        <?php
          if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
          }
          if (isset($_SESSION['signupAttempt'])) {
            if ($_SESSION['signupAttempt']) {
              $signupAttempt = true;
            } else {
              $signupAttempt = false;
            }
          } else {
            $signupAttempt = false;
          }
        ?>
      </p>
      <form class='signupForm' name='signupForm' id='signupForm' action='signupFormProcess.php' method='post'>
        <div class='signupFormInputs'>
          <input type='text' name='fname' id='fname' value = "<?= isset($_SESSION['fname']) ? $_SESSION['fname'] : "" ?>" placeholder='First Name' maxlength='32' required onkeydown="Check(event);" >
          <input type='text' name='mIni' id='mIni' value = "<?= isset($_SESSION['mIni']) ? $_SESSION['mIni'] : "" ?>" placeholder='MI' maxlength='1' required onkeydown="Check(event);" >
          <input type='text' name='lname' id='lname' value = "<?= isset($_SESSION['lname']) ? $_SESSION['lname'] : "" ?>" placeholder='Last Name' maxlength='32' required onkeydown="Check(event);">
        </div>
        <div class='signupFormInputs'>
          <input type='text' name='address' id='address' value = "<?= isset($_SESSION['address']) ? $_SESSION['address'] : "" ?>" placeholder='Address' maxlength='64' required>
          <input type='text' name='city' id='city' value = "<?= isset($_SESSION['city']) ? $_SESSION['city'] : "" ?>" placeholder='City' maxlength='32' required onkeydown="Check(event);">
          <select name='state' id='state' required>
            <option value=''>State</option>
            <option value='AL' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'AL' ? "selected" : "" ?>>Alabama</option>
            <option value='AK' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'AK' ? "selected" : "" ?>>Alaska</option>
            <option value='AZ' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'AZ' ? "selected" : "" ?>>Arizona</option>
            <option value='AR' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'AR' ? "selected" : "" ?>>Arkansas</option>
            <option value='CA' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'CA' ? "selected" : "" ?>>California</option>
            <option value='CO' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'CO' ? "selected" : "" ?>>Colorado</option>
            <option value='CT' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'CT' ? "selected" : "" ?>>Connecticut</option>
            <option value='DE' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'DE' ? "selected" : "" ?>>Delaware</option>
            <option value='FL' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'FL' ? "selected" : "" ?>>Florida</option>
            <option value='GA' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'GA' ? "selected" : "" ?>>Georgia</option>
            <option value='HI' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'HI' ? "selected" : "" ?>>Hawaii</option>
            <option value='ID' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'ID' ? "selected" : "" ?>>Idaho</option>
            <option value='IL' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'IL' ? "selected" : "" ?>>Illinois</option>
            <option value='IN' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'IN' ? "selected" : "" ?>>Indiana</option>
            <option value='IA' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'IA' ? "selected" : "" ?>>Iowa</option>
            <option value='KS' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'KS' ? "selected" : "" ?>>Kansas</option>
            <option value='KY' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'KY' ? "selected" : "" ?>>Kentucky</option>
            <option value='LA' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'LA' ? "selected" : "" ?>>Louisiana</option>
            <option value='ME' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'ME' ? "selected" : "" ?>>Maine</option>
            <option value='MD' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'MD' ? "selected" : "" ?>>Maryland</option>
            <option value='MA' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'MA' ? "selected" : "" ?>>Massachusetts</option>
            <option value='MI' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'MI' ? "selected" : "" ?>>Michigan</option>
            <option value='MN' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'MN' ? "selected" : "" ?>>Minnesota</option>
            <option value='MS' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'MS' ? "selected" : "" ?>>Mississippi</option>
            <option value='MO' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'MO' ? "selected" : "" ?>>Missouri</option>
            <option value='MT' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'MT' ? "selected" : "" ?>>Montana</option>
            <option value='NE' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'NE' ? "selected" : "" ?>>Nebraska</option>
            <option value='NV' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'NV' ? "selected" : "" ?>>Nevada</option>
            <option value='NH' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'NH' ? "selected" : "" ?>>New Hampshire</option>
            <option value='NJ' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'NJ' ? "selected" : "" ?>>New Jersey</option>
            <option value='NM' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'NM' ? "selected" : "" ?>>New Mexico</option>
            <option value='NY' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'NY' ? "selected" : "" ?>>New York</option>
            <option value='NC' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'NC' ? "selected" : "" ?>>North Carolina</option>
            <option value='ND' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'ND' ? "selected" : "" ?>>North Dakota</option>
            <option value='OH' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'OH' ? "selected" : "" ?>>Ohio</option>
            <option value='OK' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'OK' ? "selected" : "" ?>>Oklahoma</option>
            <option value='OR' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'OR' ? "selected" : "" ?>>Oregon</option>
            <option value='PA' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'PA' ? "selected" : "" ?>>Pennsylvania</option>
            <option value='RI' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'RI' ? "selected" : "" ?>>Rhode Island</option>
            <option value='SC' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'SC' ? "selected" : "" ?>>South Carolina</option>
            <option value='SD' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'SD' ? "selected" : "" ?>>South Dakota</option>
            <option value='TN' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'TN' ? "selected" : "" ?>>Tennessee</option>
            <option value='TX' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'TX' ? "selected" : "" ?>>Texas</option>
            <option value='UT' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'UT' ? "selected" : "" ?>>Utah</option>
            <option value='VT' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'VT' ? "selected" : "" ?>>Vermont</option>
            <option value='VA' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'VA' ? "selected" : "" ?>>Virginia</option>
            <option value='WA' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'WA' ? "selected" : "" ?>>Washington</option>
            <option value='WV' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'WV' ? "selected" : "" ?>>West Virginia</option>
            <option value='WI' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'WI' ? "selected" : "" ?>>Wisconsin</option>
            <option value='WY' <?= isset($_SESSION['state']) && $_SESSION['state'] == 'WY' ? "selected" : "" ?>>Wyoming</option>
          </select>
        </div>
        <div class="formErrorMsgContainer">
          <p id='zipValidationMsg' style="<?= $signupAttempt && !isset($_SESSION['zip']) ? "visibility: visible;" : "" ?>">Invalid Zip Code</p>
          <p id='phoneValidationMsg' style="<?= $signupAttempt && !isset($_SESSION['phone']) ? "visibility: visible;" : "" ?>">Invalid Phone #</p>
        </div>
        <div class='signupFormInputs'>
          <input type='text' name='zip' id='zip' style="<?= $signupAttempt && !isset($_SESSION['zip']) ? "border-color: #ff0000; box-shadow: 0 0 10px #ff0000;" : "" ?>" value = "<?= $signupAttempt && isset($_SESSION['zip']) ? $_SESSION['zip'] : "" ?>" placeholder='Zip Code' maxlength='5' required>
          <input type='text' name='phone' id='phone' style="<?= $signupAttempt && !isset($_SESSION['phone']) ? "border-color: #ff0000; box-shadow: 0 0 10px #ff0000;" : "" ?>" value = "<?= $signupAttempt && isset($_SESSION['phone']) ? $_SESSION['phone'] : "" ?>" placeholder='Phone Number' maxlength='12' required>
          <input type="text" name="DOB" id="DOB" value = "<?= isset($_SESSION['DOB']) ? $_SESSION['DOB'] : "" ?>" placeholder="Date of Birth" maxlength="0">
        </div><div class='signupFormInputs'>
          <p id='emailValidationMsg' style="<?= $signupAttempt && !isset($_SESSION['email']) ? "visibility: visible;" : "" ?>">Email entered is not valid</p>
          <p id='confEmailValidationMsg' style="<?= $signupAttempt && !isset($_SESSION['confEmail']) ? "visibility: visible;" : "" ?>">Emails do not match</p>
        </div>
        <div class='signupFormInputs'>
          <input type='text' name='email' id='email' style="<?= $signupAttempt && !isset($_SESSION['email']) ? "border-color: #ff0000; box-shadow: 0 0 10px #ff0000;" : "" ?>" value = "<?= $signupAttempt && isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>" placeholder='Email Address' maxlength='64' required>
          <input type='text' name='confEmail' id='confEmail' style="<?= $signupAttempt && !isset($_SESSION['confEmail']) ? "border-color: #ff0000; box-shadow: 0 0 10px #ff0000;" : "" ?>" value = "<?= $signupAttempt && isset($_SESSION['confEmail']) ? $_SESSION['confEmail'] : "" ?>" placeholder='Confirm Email' maxlength='64' required>
        </div>
        <div class='signupFormInputs'>
          <p id='confPassValidationMsg' style="<?= $signupAttempt && !isset($_SESSION['validConfPass']) ? "visibility: visible;" : "" ?>">Passwords do not match</p>
        </div>
        <div class='signupFormInputs'>
          <input type='password' name='password' id='password' style="<?= $signupAttempt && !isset($_SESSION['validPass']) ? "border-color: #ff0000; box-shadow: 0 0 10px #ff0000;" : "" ?>" placeholder='Password' maxlength='32' required>
          <input type='password' name='confPass' id='confPassword' style="<?= $signupAttempt && !isset($_SESSION['validConfPass']) ? "border-color: #ff0000; box-shadow: 0 0 10px #ff0000;" : "" ?>" placeholder='Confirm Password' maxlength='32' required>
        </div>
        <button type='submit' class='signupButton noSelect'></button>
      </form>
    </div>
  </div>
</div>
<script>
  function Check(e) {
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    if ((keyCode > 47 && keyCode < 58) || keyCode > 90) {
      e.preventDefault();
    }
  }
  var passInput=document.querySelector('#password');
  var confPassInput=document.querySelector('#confPassword');
  function comparePass(){
    var pass=passInput.value;
    var confPass=confPassInput.value;
    if (confPass !==pass){
      $('#confPassword').css('border-color','#ff0000');
      $('#confPassword').css('box-shadow','0 0 10px #ff0000');
      $('#confPassValidationMsg').css('visibility','visible');
      return false;
    } else {
      $('#confPassword').css('border-color','');
      $('#confPassword').css('box-shadow','');
      $('#confPassValidationMsg').css('visibility','');
      return true;
    }
  }
  if (passInput !== null) {
    passInput.addEventListener('input', function(){
      comparePass();
    });
  }
  if (confPassInput !== null) { // Was experimenting solutions
    confPassInput.addEventListener('input', function(){
      comparePass();
    });
  }
  var emailInput = document.getElementById('email');
  var confEmailInput=document.getElementById('confEmail');
  function compareEmails(){
    var email=emailInput.value;
    var confEmail=confEmailInput.value;
    if (confEmail !==email){
      $('#confEmail').css('border-color','#ff0000');
      $('#confEmail').css('box-shadow','0 0 10px #ff0000');
      $('#confEmailValidationMsg').css('visibility','visible');
      return false;
    } else {
      $('#confEmail').css('border-color','');
      $('#confEmail').css('box-shadow','');
      $('#confEmailValidationMsg').css('visibility','');
      return true;
    }
  }
  function checkEmail(email) {
    var re=/[a-z0-9!#$%&'*+\/=?^_{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9][a-z0-9-]*[a-z0-9]/;
    return re.test(email);
  }
  function validateEmail(){
    var email=emailInput.value;
    if (!checkEmail(email)){
      $('#email').css('border-color','#ff0000');
      $('#email').css('box-shadow','0 0 10px #ff0000');
      $('#emailValidationMsg').css('visibility','visible');
      return false;
    } else {
      $('#email').css('border-color','');
      $('#email').css('box-shadow','');
      $('#emailValidationMsg').css('visibility','');
      return true;
    }
  }
  if (emailInput !== null) {
    emailInput.addEventListener('input', function(){
      validateEmail();
      compareEmails();
    });
  }
  if (confEmailInput !== null) {
    confEmailInput.addEventListener('input', function(){
      compareEmails();
    });
  }
  $(function() {
    $("#DOB").datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "yy-mm-dd",
      minDate: new Date(1900),
      maxDate: -6570,
      showAnim: "slideDown"
    });
  });
  var zipInput = document.querySelector('#zip');
  function checkZip(zip) {
    var isValidZip = /(^\d{5}$)|(^\d{5}-\d{4}$)/;
    return isValidZip.test(zip);
  }
  function validateZip() {
    var zip = zipInput.value;
    if (!checkZip(zip)) {
      $("#zip").css("border-color","#ff0000");
      $("#zip").css("box-shadow","0 0 10px #ff0000");
      $("#zipValidationMsg").css("visibility","visible");
      return false;
    } else {
      $("#zip").css("border-color",'');
      $("#zip").css("box-shadow",'');
      $("#zipValidationMsg").css("visibility",'');
      return true;
    }
  }
  zipInput.addEventListener('input', function(){
    validateZip();
  });
  var phoneInput = document.querySelector('#phone');
  function checkPhone(phone) {
    var isValidPhone = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
    return isValidPhone.test(phone);
  }
  function validatePhone() {
    var phone = phoneInput.value;
    if (!checkPhone(phone)) {
      $("#phone").css("border-color","#ff0000");
      $("#phone").css("box-shadow","0 0 10px #ff0000");
      $("#phoneValidationMsg").css("visibility","visible");
      return false;
    } else {
      $("#phone").css("border-color",'');
      $("#phone").css("box-shadow",'');
      $("#phoneValidationMsg").css("visibility",'');
      return true;
    }
  }
  phoneInput.addEventListener('input', function(){
    validatePhone();
  });
</script>
<?php include("templates/footer.php") ?>
