<?php
$query="select status from rcvmas where rcvto='$_SESSION[utid]'";
$result=mysqli_query($link,$query);
$mailcount=0;
while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    if($data['status']==1){
       $mailcount++; 
    }
}
if($mailcount<10){
    $pendingmailcount=" ".$mailcount."&nbsp;";
}
else{
      $pendingmailcount=$mailcount."&nbsp;";
}
?>