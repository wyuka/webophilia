<?php
session_start();
if (isset($_SESSION['uname']))
{
  require_once("level.php");
}
else
{
  require_once("loginpage.php");
}
?>
