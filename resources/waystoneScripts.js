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

  /*var $loginModule = "<div id = 'loginModule'><div class = 'logSignTitle'>Login</div><form class = 'loginForm' name='loginForm' id='loginForm' action='loginFormProcess.php' method='post'><input type='text' name='email' id='email' placeholder='Email Address' maxlength='64'><input type='password' name='password' id='password' placeholder='Password' maxlength='32'><button type='submit' class = 'loginButton'></button></form></div>";
  var $loginScripts = "<div id='loginScripts'><script> $('.loginButton').click(function(){if (!$('.loginButton').hasClass('validate')){$('.loginButton').addClass('onclic', 250);validateSignup();}});function validateSignup(){ var email=$('#email').value; var pass=$('#password').value;setTimeout(function(){if (email==null || email=='',pass==null || pass==''){$('.loginButton').removeClass('onclic');}else{$('.loginButton').removeClass('onclic'); $('.loginButton').addClass('validate', 450);}}, 2250);} var emailInput=document.querySelector('#email'); function checkEmail(email){ var re=/[a-z0-9!#$%&'*+\/=?^_{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9][a-z0-9-]*[a-z0-9]/; return re.test(email);}function validateEmail(){ var email=emailInput.value; if (!checkEmail(email)){$('#email').css('border-color','#ff0000'); $('#email').css('box-shadow','0 0 10px #ff0000'); $('#emailValidationMsg').css('visibility','visible'); return false;}else{$('#email').css('border-color',''); $('#email').css('box-shadow',''); $('#emailValidationMsg').css('visibility',''); return true;}}emailInput.addEventListener('input', function(){validateEmail();}); </script></div>";
  var $signupModule = "<div id='signupModule'> <div class='logSignTitle'>Sign Up</div><form class='signupForm' name='signupForm' id='signupForm' action='signupFormProcess.php' method='post'> <div class='signupFormInputs'> <input type='text' name='fname' id='fname' placeholder='First Name' maxlength='32' required> <input type='text' name='mIni' id='mIni' placeholder='MI' maxlength='1' required> <input type='text' name='lname' id='lname' placeholder='Last Name' maxlength='32' required> </div><div class='signupFormInputs'> <input type='text' name='address' id='address' placeholder='Address' maxlength='64' required> <input type='text' name='city' id='city' placeholder='City' maxlength='32' required> <select name='state' id='state' required> <option value=''>State</option> <option value='AL'>Alabama</option> <option value='AK'>Alaska</option> <option value='AZ'>Arizona</option> <option value='AR'>Arkansas</option> <option value='CA'>California</option> <option value='CO'>Colorado</option> <option value='CT'>Connecticut</option> <option value='DE'>Delaware</option> <option value='FL'>Florida</option> <option value='GA'>Georgia</option> <option value='HI'>Hawaii</option> <option value='ID'>Idaho</option> <option value='IL'>Illinois</option> <option value='IN'>Indiana</option> <option value='IA'>Iowa</option> <option value='KS'>Kansas</option> <option value='KY'>Kentucky</option> <option value='LA'>Louisiana</option> <option value='ME'>Maine</option> <option value='MD'>Maryland</option> <option value='MA'>Massachusetts</option> <option value='MI'>Michigan</option> <option value='MN'>Minnesota</option> <option value='MS'>Mississippi</option> <option value='MO'>Missouri</option> <option value='MT'>Montana</option> <option value='NE'>Nebraska</option> <option value='NV'>Nevada</option> <option value='NH'>New Hampshire</option> <option value='NJ'>New Jersey</option> <option value='NM'>New Mexico</option> <option value='NY'>New York</option> <option value='NC'>North Carolina</option> <option value='ND'>North Dakota</option> <option value='OH'>Ohio</option> <option value='OK'>Oklahoma</option> <option value='OR'>Oregon</option> <option value='PA'>Pennsylvania</option> <option value='RI'>Rhode Island</option> <option value='SC'>South Carolina</option> <option value='SD'>South Dakota</option> <option value='TN'>Tennessee</option> <option value='TX'>Texas</option> <option value='UT'>Utah</option> <option value='VT'>Vermont</option> <option value='VA'>Virginia</option> <option value='WA'>Washington</option> <option value='WV'>West Virginia</option> <option value='WI'>Wisconsin</option> <option value='WY'>Wyoming</option> </select> </div><div class='signupFormInputs'> <input type='text' name='zip' id='zip' placeholder='Zip Code' maxlength='10' required> <input type='text' name='phone' id='phone' placeholder='Phone Number' maxlength='14' required> <p class='dobLabel'>Date of Birth:</p><select name='years' id='years' required></select> <select name='months' id='months' required></select> <select name='days' id='days' required></select> </div><div class='signupFormInputs'> <p id='emailValidationMsg'>Email entered is not valid</p><p id='confEmailValidationMsg'>Emails do not match</p></div><div class='signupFormInputs'> <input type='text' name='email' id='email' placeholder='Email Address' maxlength='64' required> <input type='text' name='confEmail' id='confEmail' placeholder='Confirm Email' maxlength='64' required> </div><div class='signupFormInputs'> <p id='confPassValidationMsg'>Passwords do not match</p></div><div class='signupFormInputs'> <input type='password' name='password' id='password' placeholder='Password' maxlength='32' required> <input type='password' name='confPass' id='confPass' placeholder='Confirm Password' maxlength='32' required> </div><button type='submit' class='signupButton'></button> </form> </div>";
  var $signupScripts = "<div id='signupScripts'><script> $('.signupButton').click(function(){if (!$('.signupButton').hasClass('validate')){$('.signupButton').addClass('onclic', 250);validateSignup();}});function validateSignup(){ var fname=$('#fname').value; var mi=$('#mIni').value; var lname=$('#lname').value; var address=$('#address').value; var city=$('#city').value; var state=$('#state').value; var zip=$('#zip').value; var phone=$('#phone').value; var days=$('#days').value; var months=$('#months').value; var years=$('#years').value; var email=$('#email').value; var confEmail=('#confEmail').value; var pass=$('#password').value; var confPass=('#confPass').value; setTimeout(function(){if (fname==null || fname=='',mi==null || mi=='',lname==null || lname=='',address==null || address=='',city==null || city=='',state==null || state=='',zip==null || zip=='',phone==null || phone=='',days==null || days=='',months==null || months=='',years==null || years=='',email==null || email=='',confEmail==null || confEmail=='',pass==null || pass=='',confPass==null || confPass==''){$('.signupButton').removeClass('onclic');}else{$('.signupButton').removeClass('onclic'); $('.signupButton').addClass('validate', 450);}}, 2250);} var emailInput=document.querySelector('#email'); function checkEmail(email){ var re=/[a-z0-9!#$%&'*+\/=?^_{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9][a-z0-9-]*[a-z0-9]/;return re.test(email);}function validateEmail(){ var email=emailInput.value;if (!checkEmail(email)){$('#email').css('border-color','#ff0000'); $('#email').css('box-shadow','0 0 10px #ff0000'); $('#emailValidationMsg').css('visibility','visible'); return false;}else{$('#email').css('border-color',''); $('#email').css('box-shadow',''); $('#emailValidationMsg').css('visibility',''); return true;}}emailInput.addEventListener('input', function(){validateEmail();compareEmails();}); var emailInput=document.querySelector('#email'); function checkEmail(email){ var re=/[a-z0-9!#$%&'*+\/=?^_{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9][a-z0-9-]*[a-z0-9]/;return re.test(email);}function validateEmail(){ var email=emailInput.value;if (!checkEmail(email)){$('#email').css('border-color','#ff0000'); $('#email').css('box-shadow','0 0 10px #ff0000'); $('#emailValidationMsg').css('visibility','visible'); return false;}else{$('#email').css('border-color',''); $('#email').css('box-shadow',''); $('#emailValidationMsg').css('visibility',''); return true;}}emailInput.addEventListener('input', function(){validateEmail();compareEmails();}); var confEmailInput=document.querySelector('#confEmail'); function compareEmails(){ var email=emailInput.value; var confEmail=confEmailInput.value;if (confEmail !==email){$('#confEmail').css('border-color','#ff0000'); $('#confEmail').css('box-shadow','0 0 10px #ff0000'); $('#confEmailValidationMsg').css('visibility','visible'); return false;}else{$('#confEmail').css('border-color',''); $('#confEmail').css('box-shadow',''); $('#confEmailValidationMsg').css('visibility',''); return true;}}confEmailInput.addEventListener('input', function(){compareEmails();}); var passInput=document.querySelector('#password'); var confPassInput=document.querySelector('#confPass'); function comparePass(){ var pass=passInput.value; var confPass=confPassInput.value;if (confPass !==pass){$('#confPass').css('border-color','#ff0000'); $('#confPass').css('box-shadow','0 0 10px #ff0000'); $('#confPassValidationMsg').css('visibility','visible'); return false;}else{$('#confPass').css('border-color',''); $('#confPass').css('box-shadow',''); $('#confPassValidationMsg').css('visibility',''); return true;}}confPassInput.addEventListener('input', function(){comparePass();}); passInput.addEventListener('input', function(){comparePass();}); $('#zip').mask('00000-0000'); $('#phone').mask('(000) 000-0000'); for (i=new Date().getFullYear(); i > 1900; i--){$('#years').append($('<option/>').val(i).html(i));}for (i=1; i < 13; i++){$('#months').append($('<option/>').val(i).html(i));}updateNumberOfDays(); $('#years, #months').change(function(){updateNumberOfDays();});function updateNumberOfDays(){$('#days').html('');month=$('#months').val();year=$('#years').val();days=daysInMonth(month, year);for(i=1; i < days+1 ; i++){$('#days').append($('<option/>').val(i).html(i));}}function daysInMonth(month, year){return new Date(year, month, 0).getDate();}</script></div>";
  $("#loginModuleButton").click(function() {
    if (!$("#loginModuleButton").hasClass("focused")) {
      $("#signupModule").remove();
      $("#signupScripts").remove();
      $(".logSignButtonsContainer").after($loginModule);
      $("#scriptsContainer").after($loginScripts);
      $(".logSignModuleContiainer").css("width","400px");
      $(".logSignModuleContiainer").css("height","475px");
      $("#loginModuleButton").removeClass("unfocused");
      $("#signupModuleButton").removeClass("focused");
      $("#loginModuleButton").addClass("focused");
      $("#signupModuleButton").addClass("unfocused");
    }
  });
  $("#signupModuleButton").click(function() {
    if (!$("#signupModuleButton").hasClass("focused")) {
      $("#loginModule").remove();
      $("#loginScripts").remove();
      $(".logSignButtonsContainer").after($signupModule);
      $("#scriptsContainer").after($signupScripts);
      $(".logSignModuleContiainer").css("width","750px");
      $(".logSignModuleContiainer").css("height","500px");
      $("#signupModuleButton").removeClass("unfocused");
      $("#loginModuleButton").removeClass("focused");
      $("#signupModuleButton").addClass("focused");
      $("#loginModuleButton").addClass("unfocused");
    }
  }); */
  $('.signupButton').click(function(){
    if (!$('.signupButton').hasClass('validate')){
      $('.signupButton').addClass('onclic', 250);validateSignup();
    }
  });
  function validateSignup(){
    var fname=$('#fname').value;
    var mi=$('#mIni').value;
    var lname=$('#lname').value;
    var address=$('#address').value;
    var city=$('#city').value;
    var state=$('#state').value;
    var zip=$('#zip').value;
    var phone=$('#phone').value;
    var days=$('#days').value;
    var months=$('#months').value;
    var years=$('#years').value;
    var email=$('#email').value;
    var confEmail=('#confEmail').value;
    var pass=$('#password').value;
    var confPass=('#confPass').value;
    setTimeout(function(){
      if (fname==null || fname=='',mi==null || mi=='',lname==null || lname=='',address==null || address=='',city==null || city=='',state==null || state=='',zip==null || zip=='',phone==null || phone=='',days==null || days=='',months==null || months=='',years==null || years=='',email==null || email=='',confEmail==null || confEmail=='',pass==null || pass=='',confPass==null || confPass==''){
        $('.signupButton').removeClass('onclic');
      } else {
        $('.signupButton').removeClass('onclic');
        $('.signupButton').addClass('validate', 450);
      }
    }, 2250);
  }
  var emailInput=document.querySelector('#email');
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
  emailInput.addEventListener('input', function(){validateEmail();compareEmails();
  });
  var emailInput=document.querySelector('#email');
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
  emailInput.addEventListener('input', function(){
    validateEmail();compareEmails();
  });
  var confEmailInput=document.querySelector('#confEmail');
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
  confEmailInput.addEventListener('input', function(){
    compareEmails();
  });
  var passInput=document.querySelector('#password');
  var confPassInput=document.querySelector('#confPass');
  function comparePass(){
    var pass=passInput.value;
    var confPass=confPassInput.value;
    if (confPass !==pass){
      $('#confPass').css('border-color','#ff0000');
      $('#confPass').css('box-shadow','0 0 10px #ff0000');
      $('#confPassValidationMsg').css('visibility','visible');
      return false;
    } else {
      $('#confPass').css('border-color','');
      $('#confPass').css('box-shadow','');
      $('#confPassValidationMsg').css('visibility','');
      return true;
    }
  }
  confPassInput.addEventListener('input', function(){
    comparePass();
  });
  passInput.addEventListener('input', function(){
    comparePass();
  });
  $('#zip').mask('00000');
  $('#phone').mask('(000) 000-0000');
  for (i=new Date().getFullYear(); i > 1900; i--){
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
    $('#days').html('');
    month=$('#months').val();
    year=$('#years').val();
    days=daysInMonth(month, year);
    for(i=1; i < days+1 ; i++){
      $('#days').append($('<option/>').val(i).html(i));
    }
  }
  function daysInMonth(month, year){
    return new Date(year, month, 0).getDate();
  }
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
  emailInput.addEventListener('input', function() {
    validateEmail();
  });

  $("#topScroll").click(function() {
    $('html, body').animate({
      scrollTop: 0,
      scrollLeft: 0
    }, 700);
  });
  $("#miamiScroll").click(function() {
    $('html, body').animate({
      scrollTop: 760,
      scrollLeft: 0
    }, 700);
  });
  $("#newyorkScroll").click(function() {
    $('html, body').animate({
      scrollTop: 1634,
      scrollLeft: 0
    }, 700);
  });
  $("#chicagoScroll").click(function() {
    $('html, body').animate({
      scrollTop: 2509,
      scrollLeft: 0
    }, 700);
  });
  $("#vegasScroll").click(function() {
    $('html, body').animate({
      scrollTop: 3384,
      scrollLeft: 0
    }, 700);
  });
  $("#losAngelesScroll").click(function() {
    $('html, body').animate({
      scrollTop: 4259,
      scrollLeft: 0
    }, 700);
  });
});
