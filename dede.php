<?php
include('connection.php');
$query="select sno from noticemas order by sno desc;";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    $c=0;
    while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        
        echo $data['sno']."<br />";
        $c++;
        if($c>2)
        break;
    }
}

?>