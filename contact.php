<?php	include("templates/header.php");
  if (isset($_SESSION['sentMessage'])) {
    if ($_SESSION['sentMessage']) {
      $sentMessage = true;
    } else {
      $sentMessage = false;
    }
  } else {
    $sentMessage = false;
  }
?>
  <div class = "contactSideNav">
    <div class = "topPageButton">
      <a>
        <span id="topScroll" class = "link-spanner"></span>
      </a>
    </div>
    <div>Miami
      <a>
        <span id="miamiScroll" class = "link-spanner"></span>
      </a>
    </div>
    <div>New York
      <a>
        <span id="newyorkScroll" class = "link-spanner"></span>
      </a>
    </div>
    <div>Chicago
      <a>
        <span id="chicagoScroll" class = "link-spanner"></span>
      </a>
    </div>
    <div>Las Vegas
      <a>
        <span id="vegasScroll" class = "link-spanner"></span>
      </a>
    </div>
    <div>Los Angeles
      <a>
        <span id="losAngelesScroll" class = "link-spanner"></span>
      </a>
    </div>
  </div>
  <div class="contactFormPannelBackground">
    <div class="contactFormPannel">
      <div class = "pageTitle"><p>Contact</p></div>
      <?php
        if ($sentMessage) {
          include("templates/contactFormCover.php");
        } else {
          include("templates/contactForm.php");
        }
       ?>
      <script>
        function Check(e) {
          var keyCode = (e.keyCode ? e.keyCode : e.which);
          if ((keyCode > 47 && keyCode < 58) || keyCode > 90) {
            e.preventDefault();
          }
        }
        var emailInput = document.querySelector('#email');
        function checkEmail(email) {
          var re = /[a-z0-9!#$%&'*+\/=?^_{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9][a-z0-9-]*[a-z0-9]/;
          return re.test(email);
        }
        function validateEmail() {
          var email = emailInput.value;
          if (!checkEmail(email)) {
            $("#email").css("border-color","#ff0000");
            $("#email").css("box-shadow","0 0 10px #ff0000");
            $("#emailValidationMsg").css("visibility","visible");
            return false;
          } else {
            $("#email").css("border-color",'');
            $("#email").css("box-shadow",'');
            $("#emailValidationMsg").css("visibility",'');
            return true;
          }
        }
        emailInput.addEventListener('input', function(){
          validateEmail();
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
    </div>
    <div id = "miami"></div>
  </div>
  <div class = "contentPannel contactPannel">
    <div class = "pageTitle"><p>Miami</p></div>
    <div class = "contactBoxWrapper">
      <div class = "contactBoxContainer">
        <div class = "contactBox">
          <div class = "apptName">Suncrest Grove</div>
          <div>5638 North River Dr</div>
          <div>Miami FL 33135</div>
          <div>(305) 363-6732</div>
        </div>
        <div class = "contactWhitespace"></div>
        <div class = "contactBox">
          <div class = "apptName">Hidden Palms</div>
          <div>1295 Green Ln</div>
          <div>Miami FL 33135</div>
          <div>(305) 547-8936</div>
        </div>
        <div class = "contactWhitespace"></div>
        <div class = "contactBox">
          <div class = "apptName">Bayside Heights</div>
          <div>4832 Palm Ln</div>
          <div>Miami FL 33132</div>
          <div>(305) 326-8156</div>
        </div>
      </div>
    </div>
  </div>
  <div id = "newyork" class = "separator separatorNewyork"></div>
  <div class="contentPannel contactPannel">
    <div class = "pageTitle"><p>New York</p></div>
    <div class = "contactBoxWrapper">
      <div class = "contactBoxContainer">
        <div class = "contactBox">
          <div class = "apptName">Highland Square</div>
          <div>3296 Lexington Ave</div>
          <div>New York, NY 10118</div>
          <div>(929) 538-3262</div>
        </div>
        <div class = "contactWhitespace"></div>
        <div class = "contactBox">
          <div class = "apptName">Hudson Court</div>
          <div>1249 Madison Ave</div>
          <div>New York, NY 10016</div>
          <div>(929) 235-7291</div>
        </div>
        <div class = "contactWhitespace"></div>
        <div class = "contactBox">
          <div class = "apptName">Fairway Manor</div>
          <div>2677 Dyer Ave</div>
          <div>New York, NY 10001</div>
          <div>(929) 263-5381</div>
        </div>
      </div>
    </div>
  </div>
  <div id = "chicago" class = "separator separatorChicago"></div>
  <div class="contentPannel contactPannel">
    <div class = "pageTitle"><p>Chicago</p></div>
    <div class = "contactBoxWrapper">
      <div class = "contactBoxContainer">
        <div class = "contactBox">
          <div class = "apptName">Primrose Heights</div>
          <div>4635 Ashland Ave</div>
          <div>Chicago IL, 60613</div>
          <div>(773) 585-7895</div>
        </div>
        <div class = "contactWhitespace"></div>
        <div class = "contactBox">
          <div class = "apptName">Bridgewater Park</div>
          <div>8917 Magnolia Ave</div>
          <div>Chicago IL 60640</div>
          <div>(773) 489-7892</div>
        </div>
        <div class = "contactWhitespace"></div>
        <div class = "contactBox">
          <div class = "apptName">Stoneridge Terrace</div>
          <div>1389 Edgewater Ave</div>
          <div>Chicago IL 60660</div>
          <div>(773) 895-1632</div>
        </div>
      </div>
    </div>
  </div>
  <div id = "vegas" class = "separator separatorVegas"></div>
  <div class="contentPannel contactPannel">
    <div class = "pageTitle"><p>Las Vegas</p></div>
    <div class = "contactBoxWrapper">
      <div class = "contactBoxContainer">
        <div class = "contactBox">
          <div class = "apptName">Sandy Ridge</div>
          <div>4891 Stewart Ave</div>
          <div>Las Vegas, NV 89101</div>
          <div>(702) 786-8735</div>
        </div>
        <div class = "contactWhitespace"></div>
        <div class = "contactBox">
          <div class = "apptName">Desert Estates</div>
          <div>2357 Valley View Blvd</div>
          <div>Las Vegas, NV 89119</div>
          <div>(702) 602-3942</div>
        </div>
        <div class = "contactWhitespace"></div>
        <div class = "contactBox">
          <div class = "apptName">Emerald Springs</div>
          <div>3572 Flamingo Rd</div>
          <div>Las Vegas, NV 89119</div>
          <div>(702) 894-3846</div>
        </div>
      </div>
    </div>
  </div>
  <div id = "losAngeles" class = "separator separatorLosangeles"></div>
  <div class="contentPannel contactPannel">
    <div class = "pageTitle"><p>Los Angeles</p></div>
    <div class = "contactBoxWrapper">
      <div class = "contactBoxContainer">
        <div class = "contactBox">
          <div class = "apptName">Fairview Villa</div>
          <div>7891 Palms Blvd</div>
          <div>Los Angeles, CA 90066</div>
          <div>(310) 689-2923</div>
        </div>
        <div class = "contactWhitespace"></div>
        <div class = "contactBox">
          <div class = "apptName">Broadview Terrace</div>
          <div>1678 Fox Hills Dr</div>
          <div>Los Angeles, CA 90230</div>
          <div>(310) 248-8762</div>
        </div>
        <div class = "contactWhitespace"></div>
        <div class = "contactBox">
          <div class = "apptName">Woodland Hills</div>
          <div>8943 Rose Ave</div>
          <div>Los Angeles, CA 90291</div>
          <div>(310) 924-2681</div>
        </div>
      </div>
    </div>
  </div>
<?php	include("templates/footer.php") ?>
