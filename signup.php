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
        ?>
      </p>
      <form class='signupForm' name='signupForm' id='signupForm' action='signupFormProcess.php' method='post'>
        <div class='signupFormInputs'>
          <input type='text' name='fname' id='fname' placeholder='First Name' maxlength='32' required onkeydown="Check(event);" >
          <input type='text' name='mIni' id='mIni' placeholder='MI' maxlength='1' required onkeydown="Check(event);">
          <input type='text' name='lname' id='lname' placeholder='Last Name' maxlength='32' required onkeydown="Check(event);">
        </div>
        <div class='signupFormInputs'>
          <input type='text' name='address' id='address' placeholder='Address' maxlength='64' required>
          <input type='text' name='city' id='city' placeholder='City' maxlength='32' required onkeydown="Check(event);">
          <select name='state' id='state' required>
            <option value=''>State</option>
            <option value='AL'>Alabama</option>
            <option value='AK'>Alaska</option>
            <option value='AZ'>Arizona</option>
            <option value='AR'>Arkansas</option>
            <option value='CA'>California</option>
            <option value='CO'>Colorado</option>
            <option value='CT'>Connecticut</option>
            <option value='DE'>Delaware</option>
            <option value='FL'>Florida</option>
            <option value='GA'>Georgia</option>
            <option value='HI'>Hawaii</option>
            <option value='ID'>Idaho</option>
            <option value='IL'>Illinois</option>
            <option value='IN'>Indiana</option>
            <option value='IA'>Iowa</option>
            <option value='KS'>Kansas</option>
            <option value='KY'>Kentucky</option>
            <option value='LA'>Louisiana</option>
            <option value='ME'>Maine</option>
            <option value='MD'>Maryland</option>
            <option value='MA'>Massachusetts</option>
            <option value='MI'>Michigan</option>
            <option value='MN'>Minnesota</option>
            <option value='MS'>Mississippi</option>
            <option value='MO'>Missouri</option>
            <option value='MT'>Montana</option>
            <option value='NE'>Nebraska</option>
            <option value='NV'>Nevada</option>
            <option value='NH'>New Hampshire</option>
            <option value='NJ'>New Jersey</option>
            <option value='NM'>New Mexico</option>
            <option value='NY'>New York</option>
            <option value='NC'>North Carolina</option>
            <option value='ND'>North Dakota</option>
            <option value='OH'>Ohio</option>
            <option value='OK'>Oklahoma</option>
            <option value='OR'>Oregon</option>
            <option value='PA'>Pennsylvania</option>
            <option value='RI'>Rhode Island</option>
            <option value='SC'>South Carolina</option>
            <option value='SD'>South Dakota</option>
            <option value='TN'>Tennessee</option>
            <option value='TX'>Texas</option>
            <option value='UT'>Utah</option>
            <option value='VT'>Vermont</option>
            <option value='VA'>Virginia</option>
            <option value='WA'>Washington</option>
            <option value='WV'>West Virginia</option>
            <option value='WI'>Wisconsin</option>
            <option value='WY'>Wyoming</option>
          </select>
        </div>
        <div class="formErrorMsgContainer">
          <p id='zipValidationMsg'>Invalid Zip Code</p>
          <p id='phoneValidationMsg'>Invalid Phone #</p>

        </div>
        <div class='signupFormInputs'>
          <input type='text' name='zip' id='zip' placeholder='Zip Code' maxlength='5' required>
          <input type='text' name='phone' id='phone' placeholder='Phone Number' maxlength='12' required>
          <input type="text" name="DOB" id="DOB" placeholder="Date of Birth" maxlength="0">
        </div><div class='signupFormInputs'>
          <p id='emailValidationMsg'>Email entered is not valid</p>
          <p id='confEmailValidationMsg'>Emails do not match</p>
        </div>
        <div class='signupFormInputs'>
          <input type='text' name='email' id='email' placeholder='Email Address' maxlength='64' required>
          <input type='text' name='confEmail' id='confEmail' placeholder='Confirm Email' maxlength='64' required>
        </div>
        <div class='signupFormInputs'>
          <p id='confPassValidationMsg'>Passwords do not match</p>
        </div>
        <div class='signupFormInputs'>
          <input type='password' name='password' id='password' placeholder='Password' maxlength='32' required>
          <input type='password' name='confPass' id='confPassword' placeholder='Confirm Password' maxlength='32' required>
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
  function passInputListen() {
    if (passInput !== null) {
      passInput.addEventListener('input', function(){
        comparePass();
      });
    }
  }
  //function confPassInputListen() {
    if (confPassInput !== null) { // Was experimenting solutions
      confPassInput.addEventListener('input', function(){
        comparePass();
      });
    }
  //}
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
