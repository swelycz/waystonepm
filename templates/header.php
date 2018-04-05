<?php session_start() ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Waystone Property Management</title>
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nanum+Myeongjo" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="resources/waystoneStyles.css?<?php echo time(); ?>" />
    <link rel="icon" href="images/LOGO.PNG">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="resources/jquery.mask.js"></script>
    <script src="resources/waystoneScripts.js?<?php echo time();?>"></script>
  </head>
  <body>
  	<header class = "noSelect">
      <div class = "headerContainer">
        <nav>
          <div class="navOverlay">
            <div class = "navWhitespace"></div>
            <ul id = "headerNav">
              <li class = "boxEffect">Contact
                <a href = "contact.php">
                  <span class = "link-spanner"></span>
                </a>
              </li>
              <li class = "boxEffect">FAQ
                <a href = "FAQ.php">
                  <span class = "link-spanner"></span>
                </a>
              </li>
              <li class = "boxEffect">Marketing
                <a href = "marketing.php">
                  <span class = "link-spanner"></span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
        <div class = "titleContainer"><a class = "title">WAYSTONE PROPERTY MANAGEMENT</a>
          <a href = "index.php">
						<span class = "link-spanner"></span>
					</a>
        </div>
        <div class = "logSignWrapper">
          <div class="logSignOverlay">
            <div class = "logsignWhitespace"></div>
            <div class = "logSignContainer">
              <div class = "login boxEffect">Tenant Portal
                <a href = "https://waystonepm-tenantportal.azurewebsites.net" target="_blank">
      						<span class = "link-spanner"></span>
      					</a>
              </div>
              <div class = "signup boxEffect">Sign Up
                <a href = "signup.php">
      						<span class = "link-spanner"></span>
      					</a>
              </div>
            </div>
          </div>
        </div>
      </div>
  	</header>
    <div class = "bodyWhitespace"></div>
