<form class="contactForm" id="contactForm" action="contactFormProcess.php" method="post">
  <div class = "contactFormCover"></div>
  <div class="contactFormInputs">
    <input type="text" id="fname" name="fname" maxlength="32" value = "<?= isset($_SESSION['fname']) ? $_SESSION['fname'] : "" ?>" placeholder="First Name" required autofocus onkeydown="Check(event);">
    <input type="text" id="lname" name="lname"maxlength="32" value = "<?= isset($_SESSION['lname']) ? $_SESSION['lname'] : "" ?>" placeholder="Last Name" required onkeydown="Check(event);">
  </div>
  <div class = "contactFormInputs">
    <div class = "contactEmailContainer">
      <p id="emailValidationMsg" style="<?= !$sentMessage && !isset($_SESSION['email']) ? "visibility: visible;" : "" ?>">Email entered is not valid</p>
      <input type="email" id="email" name="email" maxlength="64" style="<?= isset($_SESSION['sentMessage']) && !isset($_SESSION['email']) ? "border-color: #ff0000; box-shadow: 0 0 10px #ff0000;" : "" ?>" value = "<?= isset($_SESSION['email']) ? $_SESSION['email'] : "" ?>" placeholder="Email Address" required>
    </div>
    <div class="phoneContainer">
      <p id="phoneValidationMsg" style="<?= isset($_SESSION['sentMessage']) && !isset($_SESSION['phone']) ? "visibility: visible;" : "" ?>">Phone # entered is not valid</p>
      <input type="text" id="phone" name="phone" maxlength="14" style="<?= isset($_SESSION['sentMessage']) && !isset($_SESSION['phone']) ? "border-color: #ff0000; box-shadow: 0 0 10px #ff0000;" : "" ?>" value = "<?= isset($_SESSION['phone']) ? $_SESSION['phone'] : "" ?>" placeholder="Phone Number" required>
    </div>
  </div>
  <div class="contactFormInputs">
    <textarea id="message" cols="30" rows="5" name="message" maxlength="255" placeholder="Optional message..." ></textarea>
  </div>
  <div class = "buttonContainer">
    <button type="submit" class = "submitContactButton noSelect"></button>
  </div>
</form>
