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
if(isset($_POST['Title']) && isset($_POST['Content'])){
    
    $title=$_POST['Title'];
    $content=$_POST['Content'];
    $showto=$_POST['Output'];
    include('connection.php');
    $query="SELECT IFNULL(max(sno),0)+1 SNO from noticemas";
    $result=mysqli_query($link,$query);
   
    if(mysqli_affected_rows($link)>0){
        $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
         $sno=$data['SNO'];
        $query="insert into noticemas (sno,title,content,status,output,createby,sendername,senderid) values('$sno','$title','$content','1','$showto','Admin','$_SESSION[uname]','$_SESSION[uid]');";
        $result=mysqli_query($link,$query);
        
        if(mysqli_affected_rows($link)>0){
            echo "OK";
        }
        else{
            echo "<div class=errormessage><br />Error occured while adding a notice</div>";
        }
    }
     else{
        echo "<div class=errormessage><br />Error occured while adding a notice</div>";
    }
}
else
{
    header("location:a_addnotice.php");
    die();
}
?>