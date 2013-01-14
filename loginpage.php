<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Log In</title>
  <link rel="stylesheet" href="stylesheets/foundation.min.css">
  <link rel="stylesheet" href="stylesheets/app.css">

  <script src="javascripts/modernizr.foundation.js"></script>

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
<body>
  <div class="row" style="margin-top:10%">
  <?php if (isset($_GET['regsuccess']))
  {
  ?>
    <div class="five columns centered">
      <div class="alert-box success">Registration successful</div>
    </div>
  <?php
  }
  ?>
  <?php if (isset($_GET['wrongpass']))
  {
  ?>
    <div class="five columns centered">
      <div class="alert-box alert">Incorrect password</div>
    </div>
  <?php
  }
  ?>
  <?php if (isset($_GET['wronguname']))
  {
  ?>
    <div class="five columns centered">
      <div class="alert-box alert">Username does not exist</div>
    </div>
  <?php
  }
  ?>
  </div>
  <div class="row" style="margin-top:15px">
    <div class="five columns centered panel">
      <div class="row">
        <div class="twelve columns centered">
          <h3 style="text-align: center;">Log In to Webophilia</h3>
        </div>
      </div>
      <hr/>
      <div class="row">
        <div class="twelve columns centered">
          <form action="login.php" method="POST">
            <input type="text" id="uname" name="uname" placeholder="Username"/>
            <input type="password" id="passwd" name="pass"  placeholder="Password"/>
            <input class="button" style="width:100%; margin-bottom: 13px;" type="submit" value="Login" name="login"/>
            <a class="button" style="width:100%;" href="register.php">Register Now</a>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- Included JS Files (Compressed) -->
  <script src="javascripts/jquery.js"></script>
  <script src="javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>

</body>
</html>
