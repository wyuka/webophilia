<?php
require_once('database.php');
if (isset($_POST['register']))
{
  $uname = $_POST['uname'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];
  $contact = $_POST['contact'];

  if ($uname == "" or $fname == "" or $pass == "" or $cpass == "" or $contact == "" or $email == "")
  {
    Header("location: register.php?incomplete=1");
    exit(0);
  }
  if ($pass != $cpass)
  {
    Header("location: register.php?passnotmatch=1");
    exit(0);
  }
  $sql_checkexists = "SELECT COUNT(uname) AS count from users WHERE uname = '$uname'";
  $ref = mysql_query($sql_checkexists);
  $row = mysql_fetch_assoc($ref);
  if ($row['count'] >= 1)
  {
    Header("location: register.php?unameexists=1");
  }
  else
  {
    $sql_register = "INSERT INTO users (uname, fname, lname, email, contact, pass, level) VALUES ('$uname', '$fname', '$lname', '$email', '$contact', '$pass', 1)";
    //echo $sql_register;
    $ref = mysql_query($sql_register);
    Header("location: index.php?regsuccess=1");
  }
}
else
{?>
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

  <title><?php echo $title; ?></title>
  <link rel="stylesheet" href="stylesheets/foundation.min.css">
  <link rel="stylesheet" href="stylesheets/app.css">

  <script src="javascripts/modernizr.foundation.js"></script>

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
<body>
  <div class="row">
    <div class="twelve columns centered" style="text-align: center"><h1>Registration</h1></div>
  </div>
  <?php
  if (isset($_GET['incomplete']))
  {
  ?>
  <div class="row">
    <div class="twelve columns centered" style="text-align: center"><div class="alert-box alert">Please fill in all the details</div></div>
  </div>
  <?php
  }
  ?>
  <?php
  if (isset($_GET['unameexists']))
  {
  ?>
  <div class="row">
    <div class="twelve columns centered" style="text-align: center"><div class="alert-box alert">Username already exists. Choose a new one</div></div>
  </div>
  <?php
  }
  ?>
  <?php
  if (isset($_GET['passnotmatch']))
  {
  ?>
  <div class="row">
    <div class="twelve columns centered" style="text-align: center"><div class="alert-box alert">Passwords do not match</div></div>
  </div>
  <?php
  }
  ?>
  <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="twelve columns centered panel">
      <form action="register.php" method="POST">
        <div class="row">
          <div class="six columns">Username</div><div class="six columns"><input type="text" name="uname"/></div>
        </div>
        <div class="row">
          <div class="six columns">Email Address</div><div class="six columns"><input type="text" name="email"/></div>
        </div>
        <div class="row">
          <div class="six columns">First Name</div><div class="six columns"><input type="text" name="fname"/></div>
        </div>
        <div class="row">
          <div class="six columns">Last Name</div><div class="six columns"><input type="text" name="lname"/></div>
        </div>
        <div class="row">
          <div class="six columns">Contact</div><div class="six columns"><input type="text" name="contact"/></div>
        </div>
        <div class="row">
          <div class="six columns">Password</div><div class="six columns"><input type="password" name="pass"/></div>
        </div>
        <div class="row">
          <div class="six columns">Confirm Password</div><div class="six columns"><input type="password" name="cpass"/></div>
        </div>
        <div class="row">
          <div class="twelve columns"><input type="submit" name="register" value="Register" class="button" style="width: 100%"></div>
        </div>
      </form>
    </div>
  </div>
  
  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/jquery.js"></script>
  <script src="javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>

</body>
</html>

<?php
}
?>