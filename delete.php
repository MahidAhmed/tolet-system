<?php
require_once  "vendor/autoload.php";
use App\Classes\Connection;
use App\Classes\Database;

$db = new Connection();

$id = $_GET['id'];
$sq = "select * from advertise where id='$id' ";
$get = mysqli_query($db->dbConnection(), $sq);
$row = mysqli_fetch_assoc($get);
$email = $row['email'];
//echo $email;

$sql = "delete from advertise where id='$id' ";
if($res = mysqli_query($db->dbConnection(), $sql)){
    header("Location:advertise.php?email=$email");
}

  //  print '<script language="javaScript">alert("Data Deleted"); window.location="advertise.php?email=$email"</script>';

require 'inc/header.php';
?>
