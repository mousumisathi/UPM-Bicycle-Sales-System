
<?php

include "db.php";
session_start();
$uid = $_SESSION["uid"];
$time = date("M,d,Y h:i:s A");
$sql2 = "UPDATE `user_info` SET `last_logout` = '$time' WHERE user_id = '$uid'";
$run_query2 = mysqli_query($con,$sql2);




$BackToMyPage = $_SERVER['HTTP_REFERER'];
if(isset($BackToMyPage)) {
    header('Location: '.$BackToMyPage);
} else {
    header('Location: admin/login.php'); // default page
}
   

?>