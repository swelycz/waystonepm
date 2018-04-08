<form class="contactForm" id="contactForm" action="contactFormProcess.php" method="post">
  <div class = "contactFormCover"></div>
  <div class="contactFormInputs">
    <input type="text" id="fname" name="fname" maxlength="32" placeholder="First Name" required autofocus onkeydown="Check(event);">
    <input type="text" id="lname" name="lname"maxlength="32" placeholder="Last Name" required onkeydown="Check(event);">
  </div>
  <div class = "contactFormInputs">
    <div class = "contactEmailContainer">
      <p id="emailValidationMsg">Email entered is not valid</p>
      <input type="email" id="email" name="email" maxlength="64" placeholder="Email Address" required>
    </div>
    <div class="phoneContainer">
      <p id="phoneValidationMsg">Phone # entered is not valid</p>
      <input type="text" id="phone" name="phone" maxlength="14" placeholder="Phone Number" required>
    </div>
  </div>
  <div class="contactFormInputs">
    <textarea id="message" cols="30" rows="5" name="message" maxlength="255" placeholder="Optional message..." ></textarea>
  </div>
  <div class = "buttonContainer">
    <button type="submit" class = "submitContactButton noSelect"></button>
  </div>
</form>
