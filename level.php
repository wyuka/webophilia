<?php
  session_start();
  require_once('database.php');
  $level = $_SESSION['level'];
  if ($level > DB_QUESTIONS)
  {
    require_once("justchill.php");
    exit(0);
  }
  $sql = "SELECT * FROM levels WHERE level = $level";
  $ref = mysql_query($sql);
  $row = mysql_fetch_assoc($ref);
  $imgurl = $row['imgurl'];
  $title = $row['title'];
  $cleared_count = $row['cleared_count'];
?>
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
  <nav class="top-bar">
  <ul class="right" style="margin-right: 5px;">
    <li><a href="#" class="button" data-reveal-id="rulesModal">Rules</a></li>
    <li><a href="logout.php" class="button"> Log Out</a></li>
  </ul>
  </nav>
  <div id="rulesModal" class="reveal-modal expand">
    <h2>Rules</h2>
    <ul>
      <li>Connect the clues in the pictures or documents to find a word or phrase. The first person to finish all the levels wins.</li>
      <li>Example: If I have a picture of two people tied by a wire, the answer may be <strong>Nokia</strong> (connecting people).</li>
      <li>All answers are in lowercase, with no special characters in between. Omit any spaces or special characters from your answer, if any.</li>
      <li>In some levels, you might have to change the image extension from <strong>.jpg</strong> to something else.</li>
      <li>In case you win, you might be asked for the answers to all the levels. Please note them down somewhere.</li>
      <li>For hints or questions, please refer to the <a href="http://www.facebook.com/ank.webophilia">Facebook page</a></li>
      <li>The decision of the organizers (Maths 'N' Tech Club, NIT Durgapur) is final and binding in case of any disputes.</li>
    </ul>
    <a class="close-reveal-modal">&#215;</a>
  </div>
  <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="twelve columns centered panel">
      <div class="row">
        <div class="twelve columns centered">
          <div style="text-align: center;">
            <h2><?php echo $title; ?></h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="twelve columns centered">
          <div style="text-align: center;">
          <img src="levelimages/<?php echo $imgurl; ?>"/>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top: 30px;">
        <div class="three columns centered">
          <div style="text-align: center;">
          <form action="checkanswer.php" method="POST">
            <input type="text" value="" name="answer" id="answer" placeholder="youranswerhere"/>
            <input class = "button" type="submit" value="Answer" name="submit" id="submit"/>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr />
  <div class="row" style="margin-bottom: 20px;">
    <div class="twelve columns centered">
      <div style="text-align: center;"><?php echo $cleared_count; ?> people have cleared this level</div>
    </div>
  </div>
  
  <!-- Included JS Files (Compressed) -->
  <script src="javascripts/jquery.js"></script>
  <script src="javascripts/foundation.min.js"></script>
  
  <!-- Initialize JS Plugins -->
  <script src="javascripts/app.js"></script>

</body>
</html>