
<?php
$to="ms19071996@gmail.com [ MANDEEP SINGH , ( STUDENT ) ]";
echo substr($to,0,strpos($to,".com")+4);
echo substr($to,strpos($to," , ( ")+5,(strpos($to," , ( ")-strlen($to))+6);
?>
