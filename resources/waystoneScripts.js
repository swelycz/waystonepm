// Scroll Events
$(window).scroll(function(){
  var $distanceTop = $(document).scrollTop();
  var $headerHeight = 100 - ($distanceTop / 2.5);
  var $whitespaceHeight = 60 - ($distanceTop / 2.5);
/*
  var $MSbackgroundPosition = 40 + ($distanceTop / 30);
  var $miamiBackgroundPosition = 40 + ($distanceTop / 30);
  var $newyorkBackgroundPosition = 40 + (($distanceTop - 448) / 40);
  var $chicagoBackgroundPosition = 40 + (($distanceTop - 955) / 50);
  var $vegasBackgroundPosition = 40 + (($distanceTop - 1463) / 30);
  var $losangelesBackgroundPosition = 40 + (($distanceTop - 1957) / 50);

  if ($MSbackgroundPosition >= 90) {
    $MSbackgroundPosition = 90;
  }
  if ($miamiBackgroundPosition >= 90) {
    $miamiBackgroundPosition = 90;
  }
  if ($newyorkBackgroundPosition >= 90) {
    $newyorkBackgroundPosition = 90;
  }
  if ($chicagoBackgroundPosition >= 90) {
    $chicagoBackgroundPosition = 90;
  }
  if ($vegasBackgroundPosition >= 90) {
    $vegasBackgroundPosition = 90;
  }
  if ($losangelesBackgroundPosition >= 90) {
    $losangelesBackgroundPosition = 90;
  }
  $('.MS-Wrapper').css('background-position','50% ' + $MSbackgroundPosition + '%');
  $('.miami-Wrapper').css('background-position','50% ' + $miamiBackgroundPosition + '%');
  if ($distanceTop > 448) {
    $('.newyork-Wrapper').css('background-position','50% ' + $newyorkBackgroundPosition + '%');
    if ($distanceTop > 955) {
      $('.chicago-Wrapper').css('background-position','50% ' + $chicagoBackgroundPosition + '%');
      if ($distanceTop > 1463) {
        $('.vegas-Wrapper').css('background-position','50% ' + $vegasBackgroundPosition + '%');
        if ($distanceTop > 1957) {
          $('.losAngeles-Wrapper').css('background-position','50% ' + $losangelesBackgroundPosition + '%');
        }
      }
    }
  }
*/
  $('header').css('height',$headerHeight);
  $('.navWhitespace').css('height',$whitespaceHeight);
  $('.logsignWhitespace').css('height',$whitespaceHeight);
});
$(document).ready(function() {

  var $loginModule = "<div id = 'loginModule'><div class = 'logSignTitle'>Login</div><form class = 'loginForm' name='loginForm' id='loginForm' action='loginFormProcess.php' method='post'><input type='text' name='email' id='email' placeholder='Email Address' maxlength='64'><input type='password' name='password' id='password' placeholder='Password' maxlength='32'><button type='submit' class = 'loginButton'></button></form></div>";
  var $signupModule = "<div id = 'signupModule'><script>$('.signupButton').click(function() {if (!$('.signupButton').hasClass('validate')) {$('.signupButton').addClass('onclic', 250); validateSignup();}}); function validateSignup() {var fname = $('#fname').value; var mi = $('#mIni').value; var lname = $('#lname').value; var email = $('#email').value; var confEmail = ('#confEmail').value; var pass = $('#password').value; var confPass = ('#confPass').value; setTimeout(function() {if (fname == null || fname == '',mi == null || mi == '',lname == null || lname == '',email == null || email == '',confEmail == null || confEmail == '',pass == null || pass == '',confPass == null || confPass == '') { $('.signupButton').removeClass('onclic');} else { $('.signupButton').removeClass('onclic'); $('.signupButton').addClass('validate', 450);}}, 2250);}</script><div class = 'logSignTitle'>Sign Up</div><form class = 'signupForm' name='signupForm' id='signupForm' action='signupFormProcess.php' method='post'><div class = 'signupFormInputs'><input type='text' name='fname' id='fname' placeholder='First  Name' maxlength='32' required><input type='text' name='mIni' id='mIni' placeholder='MI' maxlength='1' required><input type='text' name='lname' id='lname' placeholder='Last Name' maxlength='32' required></div><div class='signupFormInputs'><input type='text' name='email' id='email' placeholder='Email Address' maxlength='64' required><input type='text' name='confEmail' id='confEmail' placeholder='Confirm Email' maxlength='64' required></div><div class='signupFormInputs'><input type='password' name='password' id='password' placeholder='Password' maxlength='32' required><input type='password' name='confPass' id='confPass' placeholder='Confirm Password' maxlength='32' required></div><button type='submit' class = 'signupButton'></button></form></div>";
  $("#loginModuleButton").click(function() {
    if (!$("#loginModuleButton").hasClass("focused")) {
      $("#signupModule").remove();
      $(".logSignButtonsContainer").after($loginModule);
      $(".logSignModuleContiainer").css("width","400px");
      $("#loginModuleButton").removeClass("unfocused");
      $("#signupModuleButton").removeClass("focused");
      $("#loginModuleButton").addClass("focused");
      $("#signupModuleButton").addClass("unfocused");
    }
  });
  $("#signupModuleButton").click(function() {
    if (!$("#signupModuleButton").hasClass("focused")) {
      $("#loginModule").remove();
      $(".logSignButtonsContainer").after($signupModule);
      $(".logSignModuleContiainer").css("width","600px");
      $("#signupModuleButton").removeClass("unfocused");
      $("#loginModuleButton").removeClass("focused");
      $("#signupModuleButton").addClass("focused");
      $("#loginModuleButton").addClass("unfocused");
    }
  });


  $(".submitContactButton").click(function() {
    if (!$(".submitContactButton").hasClass("validate")) {
      $(".submitContactButton").addClass("onclic", 250);
      validateContact();
    }
  });
  function validateContact() {
    var fname = $("#fname").value;
    var lname = $("#lname").value;
    var email = $("#email").value;
    var phone = $("#phone").value;
    setTimeout(function() {
      if (fname == null || fname == "",lname == null || lname == "",email == null || email == "",phone == null || phone == "") {
        $(".submitContactButton").removeClass("onclic");
      } else {
        $(".submitContactButton").removeClass("onclic");
        $(".submitContactButton").addClass("validate", 450);
      }
    }, 2250);
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
  emailInput.addEventListener('input', function()
  {
    validateEmail();
  });

  $("#phone").mask('(000) 000-0000');
});
