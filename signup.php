<?php include("templates/header.php") ?>
<div class = "logSignModuleWrapper">
  <div class = "logSignModuleContiainer">
    <div class = "logSignButtonsContainer">
      <div id = "signupModuleButton" class = "unfocused">Sign Up</div>
    </div>
    <div id='signupModule'>
      <p class = "signupFormErrorMsg">
        <?php
          if (isset($_SESSION['msg'])) {
            if ($_SESSION['msg']) {
              $_SESSION['msg'];
            }
          }
        ?>
      </p>
      <form class='signupForm' name='signupForm' id='signupForm' action='signupFormProcess.php' method='post'>
        <div class='signupFormInputs'>
          <input type='text' name='fname' id='fname' placeholder='First Name' maxlength='32' required>
          <input type='text' name='mIni' id='mIni' placeholder='MI' maxlength='1' required>
          <input type='text' name='lname' id='lname' placeholder='Last Name' maxlength='32' required>
        </div>
        <div class='signupFormInputs'>
          <input type='text' name='address' id='address' placeholder='Address' maxlength='64' required>
          <input type='text' name='city' id='city' placeholder='City' maxlength='32' required>
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
        <div class='signupFormInputs'>
          <input type='text' name='zip' id='zip' placeholder='Zip Code' maxlength='5' required>
          <input type='text' name='phone' id='phone' placeholder='Phone Number' maxlength='12' required>
          <p class='dobLabel'>Date of Birth:</p><input type="text" name="DOB" id="DOB" placeholder="Click here">
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
        <button type='submit' class='signupButton'></button>
      </form>
      <script>
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
        function checkEmail(email){
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

        /*for (i=(new Date().getFullYear()) - 18; i > 1900; i--){
          $('#years').append($('<option/>').val(i).html(i));
        }
        for (i=1; i < 13; i++){
          $('#months').append($('<option/>').val(i).html(i));
        }
        updateNumberOfDays();
        $('#years, #months').change(function(){
          updateNumberOfDays();
        });
        function updateNumberOfDays(){
          $('#days').html("<option value=''>D</option>");
          month=$('#months').val();
          year=$('#years').val();
          days=daysInMonth(month, year);
          for(i=1; i < days+1 ; i++){
            $('#days').append($('<option/>').val(i).html(i));
          }
        }
        function daysInMonth(month, year){
          return new Date(year, month, 0).getDate();
        }*/
      </script>
    </div>
  </div>
</div>
<?php include("templates/footer.php") ?>
