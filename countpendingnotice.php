<?php
$query="select status from noticemas";
$result=mysqli_query($link,$query);
$noticecount=0;
while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    if($data['status']==0){
       $noticecount++; 
    }
}
if($noticecount<10){
    $pendingnoticecount=" ".$noticecount."&nbsp;";
}
else{
      $pendingnoticecount=$noticecount."&nbsp;";
}
?>