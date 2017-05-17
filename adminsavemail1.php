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
$to="";
$body="";
$subject="";
if(isset($_POST['To']) ){$to=$_POST['To'];}
if(isset($_POST['Body']) ){$body=$_POST['Body'];}
if(isset($_POST['Subject']) ){$subject=$_POST['Subject'];}

include("connection.php");

$query="SELECT IFNULL(max(sno),0)+1 sno from mailsavemas";
                 $result=mysqli_query($link,$query);
                 $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                 $sno=$data['sno'];
$query="insert into mailsavemas (sno,sendto,body,sbjct,id)  values('$sno','$to','$body','$subject','$_SESSION[uid]')";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
   echo "OK";
 }
 else{
    echo "<div class=errormessage><br />Problem occuring while <b>saving a Mail</b></div>";
}
?>