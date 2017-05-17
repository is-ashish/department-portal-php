
<?php

session_start();
if(!isset($_SESSION['utid'])){
    header("location:studentlogin.php");
    die();
}


if(isset($_POST['Submit'])){
include("connection.php");
include('PHPmailer/Send_Mail.php');
$UID=$_SESSION['utid'];

$query="SELECT email FROM teacherdetail WHERE teacherid='$UID'";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $email=$_POST['Email'];
    if($data['email']==$email){
        $query="SELECT uuid FROM teachermas WHERE teacherid='$UID'";
        $result=mysqli_query($link,$query);
        $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $uuid=$data['uuid'];
        $to=$email;
        
        $link="<a href='http://localhost:80//project/tchangepassword.php?email=$to&utid=$UID&uuid=$uuid'>Click Here</a>";
        $message="Dear Faculty,<br /><br /><br />Click the below link to change your password :<br>";
        $message.=$link;
        $from="sagarjough12021994@gmail.com";
        $fromname="CSE-DEPARTMENT";
        $reply="no-reply@rcplindia.in";
        $replyname="no-reply";
        $subject="Change Password link from CSE";
        $body=$message;
        //$cc="cse@uiet.org";
        $res=Send_Mail($from,$fromname,$to,$subject,$body,$reply,$replyname);
        $i=2;
    }
    else{$i=1;}
}
else{$i=1;}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1" />
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
<form class="form-horizontal" method="post" name="phpForm" id="phpForm" action="<?php $_SERVER['PHP_SELF'];?>">
<fieldset>

<!-- Form Name -->
<!-- mobno input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Mob">Email Address  <label style="color: red;" for="Course"> * </label> : </label>
  <div class="col-md-6">
    <input id="email" name="Email" type="text" placeholder="Enter your Email Address" class="form-control input-md" required="">
    </div>
    
<div class="row"></div>
<div class="row">
<div class="col-md-6"></div>
<div class="col-md-6">
</div>
</div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="login"></label>
  <div class="col-md-8">
    <input type="submit" id="submit" name="Submit" class="btn btn-success" value="Submit" />
    <a href="studentlogin.php"><input type="button"  class="btn btn-primary" value="Cancel" /></a>
  </div>
</div>
  <div class="col-md-7"></div>
  <div class="col-md-5">&nbsp;&nbsp;&nbsp;&nbsp;<a href="tcforgot2.php" style="font-size: 17px;">Try another way for <b>Sign-in</b></a></div>
</fieldset>
</form>
        </div></div>
    <div class="col-md-4">
  </div>

</body>
</html>
<?php 
if(isset($_POST['Submit'])){
if($i==1){
echo '<script language="javascript">';
echo 'bootbox.alert("<div class=errormessage><br>The Entered Email Address does not exists</div>")';
echo '</script>';
}
else if($i==2){
echo '<script language="javascript">';
echo 'bootbox.alert("'.$res.'")';
echo '</script>';
}}
?>
