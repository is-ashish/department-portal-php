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
include('connection.php');
    $fname=strtoupper($_POST['Fname']);
    $mname=strtoupper($_POST['Mname']);
    $lname=strtoupper($_POST['Lname']);
    $email=$_POST['Email'];
    $fathername=$_POST['Fathername'];
    $dob=$_POST['Dob'];
    $arr=explode("/",$dob);
    $dob=$arr[2]."/".$arr[1]."/".$arr[0];
    
     $mob=$_POST['Mob'];
    $gender=$_POST['Gender'];
    $degree=$_POST['Degree'];
    
            //$query="update teachermas set degree='$degree' WHERE teacherid='$_SESSION[utid]'";
            $query="select teacherid from teachermas";
            $result=mysqli_query($link,$query);
            if(mysqli_affected_rows($link)>0){
            $query="update teacherdetail set FNAME='$fname',MNAME='$mname',LNAME='$lname',MOBNO='$mob',EMAIL='$email',FATHERNAME='$fathername',DOB='$dob',GENDER='$gender' WHERE teacherid='$_SESSION[utid]'";
            $result=mysqli_query($link,$query);
            if(mysqli_affected_rows($link)>0){
                echo "<div class=successmessage><br>Profile updated successfully..!!</div>";
            }
            else{
            echo "<div class=errormessage><br>Problem while updating...!!!<br>Try again later...<br /><div class=infomessage>or You must have to update a value</div></div>";
         }
                
         }
         else{
            echo "<div class=errormessage><br>Problem while updating...!!!<br>Try again later...<br /><div class=infomessage>or You must have to update a value</div></div>";
         }
  




?>


