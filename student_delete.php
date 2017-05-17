<?php
include("connection.php");
$rollno=$_POST['Drollno'];
$query="delete from studentmas where rollno in $rollno";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    echo "<div class=successmessage><br /> Deleted successfully...........</div>";
    $query="select firstyear,secondyear,thirdyear,fourthyear from studentcount";
    $result=mysqli_query($link,$query);
    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $y1=substr(date("Y"),2);
    $y2=substr(date("Y")-1,2);
    $y3=substr(date("Y")-2,2);
    $y4=substr(date("Y")-3,2);
    $c1=0;
    $c2=0;
    $c3=0;
    $c4=0;
    $str=$rollno;
    $str=substr($str,1,strlen($str)-2);
    $arr=explode(",",$str);
    $n=count($arr);

    for($i=0;$i<$n;$i++){
        $str=$arr[$i];
    
        $ch=substr($str,6,-10);
        if($ch==$y1){
            $c1++;
        }
        else if($ch==$y2){
            $c2++;
        }
        else if($ch==$y3){
            $c3++;
        }
        else if($ch==$y4){
            $c4++;
        }
    }//for loop closed
    $c1=$data['firstyear']-$c1;
    $c2=$data['secondyear']-$c2;
    $c3=$data['thirdyear']-$c3;
    $c4=$data['fourthyear']-$c4;
    $query="update studentcount set firstyear='$c1',secondyear='$c2',thirdyear='$c3',fourthyear='$c4'";
    $result=mysqli_query($link,$query);
    
}
else{
     echo "<div class=errormessage><br />Error occured while deleting a record</div>";
}
?>