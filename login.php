<?php
session_start();
require_once("database.php");
if (isset($_POST['login']))
{
  $uname = $_POST['uname'];
  $pass = mysql_real_escape_string($_POST['pass']);
  $sql = "SELECT * FROM users WHERE `uname` = '$uname'";
  $ref = mysql_query($sql);
  $row = mysql_fetch_assoc($ref);

  if ($row == NULL)
  {
    Header("Location: index.php?wronguname=1");
    $log = "Tried to login in with wrong username and password was $pass";
  }
  else if($row["pass"] == $pass)
  {
    $_SESSION["ids"] = $row["id"];
    $_SESSION["uname"]= $uname;
    $_SESSION["level"] = $row["level"];
    Header("Location: index.php");
    $log = "Logged into $uname successful, level is ". $_SESSION['level'];
  }
  else
  {
    Header("Location: index.php?wrongpass=1");
    $log = "Tried to login with username $uname and password $pass";
  }
  $sqllog = "INSERT INTO accesslogs (`ip`, `user`, `val`) VALUES ('" . mysql_real_escape_string($_SERVER['REMOTE_ADDR']) . "', '$uname','" . mysql_real_escape_string($log) . "')";
  $ref = mysql_query($sqllog);
}
else
{
  Header("location: index.php");
}
?>
