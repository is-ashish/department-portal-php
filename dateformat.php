<?php
function dateformat($str){
$str=substr($str,0,10);
$arr=explode("-",$str);
if($arr[1]=="01")
    $m="Jan";
else if($arr[1]=="02")
    $m="Feb";
else if($arr[1]=="03")
    $m="Mar";
else if($arr[1]=="04")
    $m="Apr";
else if($arr[1]=="05")
    $m="May";
else if($arr[1]=="06")
    $m="Jun";
else if($arr[1]=="07")
    $m="Jul";
else if($arr[1]=="08")
    $m="Aug";
else if($arr[1]=="09")
    $m="Sep";
else if($arr[1]=="10")
    $m="Oct";
else if($arr[1]=="11")
    $m="Nov";
else if($arr[1]=="12")
    $m="Dec";
$arr[1]="";
$arr[1]=$m;
$m=$arr[2];
$arr[2]=$arr[0];
$arr[0]=$m;
$str=implode(" / ",$arr);
return $str;
}
?>