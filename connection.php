<?php
define("HOST","localhost");
define("USER","root");
define("PASSWORD","12345");
define("DATABASE","project");
$link=mysqli_connect(HOST,USER,PASSWORD);
mysqli_select_db($link,DATABASE);
?>