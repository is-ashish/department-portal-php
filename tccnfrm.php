
<?php
session_start();
if(!isset($_SESSION['check'])){
    header("location:teacherlogin.php");
    die();
}
else{
    if($_SESSION['check']!=true)
    die();
    
    else
    {
        session_destroy();
    }
}
$i=1;
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,inital-scale=1" />
	<title>Faculty_Success</title>
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
     <a href="index.php"  style="float: right; margin-right:30px;margin-top: 12px; " ><input type="button" class="btn btn-info myhomebtn" value="  Home  "/></a>
    <h3 >Password Changed</h3>
    </div>
    </div>
    <div class="panel-body" >
<form class="form-horizontal" method="post" name="phpForm" action="teacherlogin.php">
<fieldset>
<br /><br />
<div class="row">
<div class="col-md-2"></div>
<div class="col-md-10">
<label class="text-success">
                <div class="visible-lg"><span style="font-size:19px;">You have successfully changed your password...</span></div>
                <div class="visible-xs"><span>You have successfully changed your password...</span></div>
</label>
</div>
</div>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-8">
<label class="text-info">
                <div class="visible-lg"><span style="font-size:19px;">&nbsp;Click here to Login</span></div>
                <div class="visible-xs"><span style="font-size:14px;">Click here to Login</span></div>
</label>
</div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-5 control-label" for="login"></label>
  <div class="col-md-4">
    <input type="submit" id="submit" name="Submit" class="btn btn-primary" value="&nbsp;&nbsp;Login&nbsp;&nbsp;" />
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
if($i==1){
    echo '<script language="javascript">';
                    echo 'bootbox.alert("<div class=successmessage><br>Password Updated....</div>")';
                    echo '</script>';
}
?>