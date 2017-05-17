<?php
session_start();
//echo $_FILES['File']['name']."<br>";
//echo $_FILES['File']['tmp_name']."<br>";
//echo $_FILES['File']['type']."<br>";
//echo $_FILES['File']['error']."<br>";
//echo $_FILES['File']['size']."<br>";
$uploaddir="studentphoto/";
$filename=basename($_FILES['File']['name']);
//$date=date_create();
//$date=date_format($date,"dmyi");
$ext=pathinfo($filename,PATHINFO_EXTENSION);
$_SESSION['ext']=$ext;
$filename="$_SESSION[usid]".".".$ext;
$uploadpath=$uploaddir.$filename;
if($_FILES['File']['size']>99000){
    $_SESSION['piccheck']="NOK";
        $_SESSION['perror']="Unable to upload file<br>Size of File is too large...";
        header("location:stueditprofile.php");
        die();
}
if($ext=="jpg" ||$ext=="jpeg"|| $ext=="png"||$ext=="gif" ||$ext=="bmp"){
    if(move_uploaded_file($_FILES['File']['tmp_name'],$uploadpath)){
        
include('connection.php');
    $query="update studentdetail set photo='$filename' where rollno='$_SESSION[usid]'";
    $result=mysqli_query($link,$query);
     if(mysqli_affected_rows($link)>0){  
              
        $_SESSION['piccheck']="OK";
        header("location:stueditprofile.php");
    }
    }
    
    else{
        $_SESSION['piccheck']="NOK";
        $_SESSION['perror']="Unable to upload file";
        header("location:stueditprofile.php");
    }
}
else{
        $_SESSION['piccheck']="NOK";
    $_SESSION['perror']="Unable to upload file<br>File must be in jpg , jpeg , png , gif or bmp";
        header("location:stueditprofile.php");
}
?>