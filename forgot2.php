<?php
session_start();
if(!isset($_SESSION['uid'])){
    header("location:adminlogin.php");
    die();
}


include("connection.php");
$arr=array();
$UID=$_SESSION['uid'];
unset($arr);
$query="SELECT MOBNO FROM admin WHERE USERID='$UID'";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
}
if(isset($_POST['Submit'])){
$MOB=$_POST['Mob'];
if($data['MOBNO']==$MOB){
    header("location:changepass.php");
}
else{$i=1;}
}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,inital-scale=1" />
	<title>ADMIN_ChangePassword</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
<!--#000D1D bgcolor
    #D8F9FF title text color
    #266FF3 selected text color/hover box color
    #C6FFF7 menu text color
    #C6FFF7 selected menu hover color
-->


</head>
<body>

<br /><br /><br /><br /><br /><br /><br />

<div class="container-fluid">
<div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

<div class="panel panel-primary" >
    <div class="bgcolor">
    <div class=" panel-heading "> 
     <h3 >For Changing Password</h3>
    </div>
    </div>
    <div class="panel-body" >
<form class="form-horizontal" method="post" name="phpForm" id="phpForm" action="<?php $_SERVER['PHP_SELF'];?>">
<fieldset>
<!-- Form Name -->
<?php
 $arr=str_split($data['MOBNO']);
    ?>
<label class="text-info">Please enter the complete Mobile Number :</label>
<label class="text-primary"> <?php echo "XXXXXXXX$arr[8]$arr[9]"; ?></label>

<!-- mobno input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Mob">Mobile Number</label>
  <div class="col-md-4">
    <input id="mob" name="Mob" type="text" placeholder="Enter the MobileNumber" class="form-control input-md" required="">
    </div>
    
<div class="row"></div>
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-10">

</div>
</div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="login"></label>
  <div class="col-md-8">
    <input type="submit" id="submit" name="Submit" class="btn btn-success" value="Submit" />
    <a href="adminlogin.php"><input type="button"  class="btn btn-primary" value="Cancel" /></a>
  </div>
</div>

</fieldset>
</form>
        </div></div>
    <div class="col-md-4"></div>
  </div>

</body>
</html>

<?php

if(isset($_POST['Submit'])){
if($i==1){
        echo '<script language="javascript">';
        echo 'bootbox.alert("<div class=errormessage><br>You have entered wrong mobile number</div>")';
        echo '</script>';
        }
}
?>