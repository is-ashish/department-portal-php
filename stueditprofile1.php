<?php
session_start();
if(!isset($_SESSION['usname'])){
    header("location:studentlogin.php");
    die();
}
if(!isset($_SESSION['usid'])){
    header("location:studentlogin.php");
    die();
} 
include('connection.php');
    $fname=strtoupper($_POST['Fname']);
    $mname=strtoupper($_POST['Mname']);
    $lname=strtoupper($_POST['Lname']);
    $email=$_POST['Email'];
    $fathername=$_POST['Fathername'];
    $address=$_POST['Address'];
    $cityid=$_POST['City'];
    $stateid=$_POST['State'];
    $dob=$_POST['Dob'];
    $arr=explode("/",$dob);
    $dob=$arr[2]."/".$arr[1]."/".$arr[0];
    
     $mob=$_POST['Mob'];
    $gender=$_POST['Gender'];
    
    $ipy=$_POST['Ipy'];
    $irn=$_POST['Irn'];
    $ib=$_POST['Ib'];
    $hpy=$_POST['Hpy'];
    $hrn=$_POST['Hrn'];
    $hb=$_POST['Hb'];
    $others=$_POST['Others'];
    $sports=$_POST['Sports']; 
    $cultural=$_POST['Cultural'];
    $acd=$_POST['Acd'];
    
    
    
    $query="select STATE from states_master where id=$stateid";
    $result=mysqli_query($link,$query);
         if(mysqli_affected_rows($link)>0){  
            $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
            
            $state=$data['STATE'];
            
            $query="select CITY from city_master where id=$cityid";
            $result=mysqli_query($link,$query);
            $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $city=$data['CITY'];
            
            $query="update studentdetail set FNAME='$fname',MNAME='$mname',LNAME='$lname',MOBNO='$mob',EMAIL='$email',FATHERNAME='$fathername',ADDRESS='$address',CITY='$city',STATE='$state',DOB='$dob',GENDER='$gender',STATEID=$stateid,CITYID=$cityid WHERE rollno='$_SESSION[usid]'";
            $result=mysqli_query($link,$query);
            if(mysqli_affected_rows($link)>0){
            $query="update studentacad set ACDACHVMT='$acd',SPORTS='$sports',CULTURAL='$cultural',OTHERS='$others',inter_board='$ib',INTER_YEAR='$ipy',INTER_ROLLNO='$irn',highschool_board='$hb',highschool_YEAR='$hpy',highschool_ROLLNO='$hrn' WHERE rollno='$_SESSION[usid]'";
            $result=mysqli_query($link,$query);
            if(mysqli_affected_rows($link)>0){
                echo "<div class=successmessage><br>Profile updated successfully..!!</div>";
            }
            else{
            echo "<div class=errormessage><br>Problem while updating...!!!<br>Try again later...<br /><div class=infomessage>go back and please re-select a record</div></div>";
         }
                
         }
         else{
            echo "<div class=infomessage><br>Problem while updating...!!!<br>Try again later...<br /><div class=infomessage>go back and please re-select a record</div></div>";
         }
    }
    else{
        echo "Invalid State..!!";
    }
    




?>


