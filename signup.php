<?php include("templates/header.php") ?>
<div class = "logSignModuleWrapper">
  <div class = "logSignModuleContiainer">
    <div class = "logSignButtonsContainer">
      <div id = "signupModuleButton" class = "unfocused">Sign Up</div>
    </div>
    <div id='signupModule'>
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
          <input type='text' name='phone' id='phone' placeholder='Phone Number' maxlength='14' required>
          <p class='dobLabel'>Date of Birth:</p>
          <select name='years' id='years' required></select>
          <select name='months' id='months' required></select>
          <select name='days' id='days' required></select>
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
          <input type='password' name='confPass' id='confPass' placeholder='Confirm Password' maxlength='32' required>
        </div>
        <button type='submit' class='signupButton'></button>
      </form>
    </div>
  </div>
</div>
<?php include("templates/footer.php") ?>
