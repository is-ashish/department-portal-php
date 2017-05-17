<?php
session_start();
if(!isset($_SESSION['utname'])){
    header("location:teacherlogin.php");
    die();
}
if(!isset($_SESSION['utid'])){
    header("location:teacherlogin.php");
    die();
}
if(isset($_POST['Title']) && isset($_POST['Sno']) && isset($_POST['Content'])){
 
include('connection.php');
$title=$_POST['Title'];
$content=$_POST['Content'];
$sno=$_POST['Sno'];
$query="update noticemas set title='$title',content='$content' where sno='$sno'";
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
    header("location:t_editnotice.php");
    die();
}
?>