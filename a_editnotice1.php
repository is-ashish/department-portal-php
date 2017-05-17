<?php
session_start();
if(!isset($_SESSION['uname'])){
    header("location:adminlogin.php");
    die();
}
if(!isset($_SESSION['uid'])){
    header("location:adminlogin.php");
    die();
}
if(isset($_POST['Title']) && isset($_POST['Sno']) && isset($_POST['Content']) && isset($_POST['Output']) && isset($_POST['Status'])){
 
include('connection.php');
$title=$_POST['Title'];
$content=$_POST['Content'];
$showto=$_POST['Output'];
$status=$_POST['Status'];
$sno=$_POST['Sno'];
$query="update noticemas set title='$title',content='$content',status='$status',output='$showto' where sno='$sno'";
 $result=mysqli_query($link,$query);
         if(mysqli_affected_rows($link)>0){ 
            echo "OK";
         }
         else{
            echo "<div class=errormessage><br />Unable to Update the Notice</div>";
         }
}
else
{
    header("location:a_editnotice.php");
    die();
}
?>