<?php
session_start();
if(!isset($_SESSION['utname'])){
    header("location:teacherlogin.php");
    die();
}
if(!isset($_SESSION['utid'])){
    header("location:teacherlogin.php");
    die();
}?>
<!DOCTYPE HTML>
<html>
<head>

	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>NOTICE_DELETE</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
</head>
<body></body>
</html><?php
if(isset($_POST['Sno'])){
include("connection.php");
$sno=$_POST['Sno'];
$query="delete from noticemas where sno in $sno";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    echo "<div class=successmessage><br /> Deleted successfully...........</div>";
      
}
else{
     echo "<div class=errormessage><br />Error occured while deleting a record</div>";
}
}
else{
    $str="<div class=errormessage><br />Please select atleast one record of Notice to delete...<div class=infomessage>Do you want to select a Notice</div></div>";
    ?>

<script>
bootbox.confirm("<?php echo $str;?>",function(res){
    if(res==true)
        window.location="teachernoticedb.php";
    else
        window.location="s_teacher.php";
});
</script>
    <?php
}
?>