<?php


include("connection.php");
$rollno=$_POST['Drollno'];

$query="delete from teachermas where teacherid in $rollno";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    echo "<div class=successmessage><br /> Deleted successfully...........</div>";
    $query="select permanent,guest from teachercount";
    $result=mysqli_query($link,$query);
    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
   
    $cp=0;$cg=0;
    $str=$rollno;
    $str=substr($str,1,strlen($str)-2);
    $arr=explode(",",$str);
    $n=count($arr);

    for($i=0;$i<$n;$i++){
        $str=$arr[$i];
        $ch=substr($str,9,-4);
        if($ch=="P"){
            $cp++;
        }
        else if($ch=="G"){
            $cg++;
        }
        }
        $cp=$data['permanent']-$cp;
    $cg=$data['guest']-$cg;
    $query="update teachercount set permanent='$cp',guest='$cg'";
    $result=mysqli_query($link,$query);
}
else{
     echo "<div class=errormessage><br />Error occured while deleting a record</div>";
}
?>