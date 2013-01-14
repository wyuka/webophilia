<?php
session_start();
require_once('database.php');
if(isset($_POST['answer']))
{
  $answer = $_POST['answer'];
  $level = $_SESSION['level'];
  $uname = $_SESSION['uname'];
  $sql = "SELECT answer FROM levels WHERE level = $level";
  $ref = mysql_query($sql);
  $row = mysql_fetch_assoc($ref);
  if ($answer == $row['answer'])
  {
    $_SESSION['level'] = $level + 1;
    $sql_count = "SELECT cleared_count FROM levels WHERE level = $level";
    $ref = mysql_query($sql_count);
    $row = mysql_fetch_assoc($ref);

    $cleared_count = $row['cleared_count'];
    $cleared_count = $cleared_count + 1;
    $sql_count_increase = "UPDATE levels SET cleared_count = $cleared_count WHERE level = $level";
    $ref = mysql_query($sql_count_increase);

    $newlevel = $level + 1;
    $sql_user_level_inc = "UPDATE users SET level = $newlevel WHERE uname = '$uname'";
    $ref = mysql_query($sql_user_level_inc);

    $phpdate = date_create();
    $mysqldate = date_format($phpdate, 'Y-m-d H:i:s');
    $sql_user_timestamp = "UPDATE users SET timestamp = '$mysqldate' WHERE uname = '$uname'";
    $ref = mysql_query($sql_user_timestamp);
  }
}
Header("location: index.php");
?>