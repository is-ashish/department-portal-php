<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,inital-scale=1" />
	<title>ADMIN_login</title>
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
<?php
session_start();
session_destroy();// to destroying all previous sessions
?>

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
        <a href="index.php"  style="float: right; margin-right:30px;margin-top: 12px; " ><input type="button" class="btn btn-info myhomebtn" value="  Home  "/></a>
    <h3 >Admin Login</h3>
    </div>
    </div>
    <div class="panel-body" >
<form class="form-horizontal" method="post" name="phpForm" action="<?php $_SERVER['PHP_SELF'];?>">
<fieldset>

<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="username">User Id  <label style="color: red;" for="Course"> * </label> :</label>  
  <div class="col-md-7">
  <div class="input-group">
   <span class="input-group-addon"> <span class="glyphicon glyphicon-user"></span></span>
  <input id="username" name="Username" type="text"  placeholder="Enter User Name" class="form-control input-md" required="">
    </div>
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password">Password  <label style="color: red;" for="Course"> * </label> :</label>
  <div class="col-md-7">
  
  <div class="input-group">
   <span class="input-group-addon"> <span class="glyphicon glyphicon-lock"></span></span>
    <input id="password" name="Password" type="password" placeholder="Enter Password" class="form-control input-md" required="">
    </div>
    <span class="help-block"><input type="checkbox" id="show" name="Show"  onchange="ShowHide()" /> Show Password</label>
    <a href="forgot1.php" style="float: right;">Forgot Password?</a></span>
  
   </div>
<div class="row"></div>
<div class="row">

<div class="col-md-3"></div>
<div class="col-md-8">
<?php
if(isset($_POST['login'])){
session_start();
include("connection.php");
$UID=$_POST['Username'];
$PASSWORD=$_POST['Password'];
$query="SELECT NAME,USERID,PASSWORD 
        FROM admin WHERE USERID='$UID'";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
    if($PASSWORD==$data['PASSWORD']){
        $_SESSION['uname']=$data['NAME'];
        $_SESSION['uid']=$data['USERID'];
        header("location:s_admin.php");
    }
    else{
                    echo '<script language="javascript">';
                    echo 'bootbox.alert("<div class=errormessage><br>You have entered a wrong password</div>")';
                    echo '</script>';       
    }
}
else{
                    echo '<script language="javascript">';
                    echo 'bootbox.alert("<div class=errormessage><br>This username does not exists</div>")';
                    echo '</script>';
}
}
?>
 </div>
</div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="login"></label>
  <div class="col-md-8">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" id="login" name="login" class="btn btn-success" value="LOGIN" />
    <input type="reset" id="reset" name="reset" class="btn btn-danger" value="RESET" />
  </div>
</div>

</fieldset>
</form>
        </div></div>
    <div class="col-md-4"></div>
  </div>

</body>
</html>

<script type="text/javascript">
        <!--
        function ShowHide() {
            if (document.getElementById('show').checked) {
                document.getElementById('password').type = 'text';
            } else {
                document.getElementById('password').type = 'password';
            }
        }
</script>