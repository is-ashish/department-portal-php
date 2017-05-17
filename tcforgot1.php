
<?php
if(isset($_POST['Submit'])){
include("connection.php");
$UID=$_POST['Username'];
$query="SELECT TEACHERID FROM teachermas WHERE TEACHERID='$UID'";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
        session_start();
        $_SESSION['utid']=$data['TEACHERID'];
       header("location:tcforgot_1.php");
    }

else{
    $i=1;
}
}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,inital-scale=1" />
	<title>Faculty_ChangePassword</title>
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
<form class="form-horizontal" method="post" id="phpForm" name="phpForm" action="<?php $_SERVER['PHP_SELF'];?>"   >
<fieldset>

<!-- Form Name -->



<!-- username input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="Username">User Id <label style="color: red;" > * </label> :</label>  </label>
  <div class="col-md-6">
  <div class="input-group">
   <span class="input-group-addon "><span class="glyphicon glyphicon-user"></span> </span>
      
    <input id="username" name="Username" type="text" placeholder="Enter the User Id" class="form-control input-md" required=""  />
    </div>
    </div>
<div class="row"></div>
<div class="row">

<div class="col-md-3"></div>
<div class="col-md-6">
 </div>
</div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="login"></label>
  <div class="col-md-8">
    <input type="submit" id="submit" name="Submit" class="btn btn-success" value="Submit"  />
    <a href="studentlogin.php"><input type="button"  class="btn btn-primary" value="Cancel" /></a>
  </div>
</div>

</fieldset>
</form>
        </div></div>
    
  </div>

</body>
</html>
<?php
if(isset($_POST['Submit'])){
if($i==1){
 echo '<script language="javascript">';
    echo 'bootbox.alert("<div class=errormessage><br>This username does not exists</div>")';
    echo '</script>';
}}
?>