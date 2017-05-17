
<?php
session_start();
if(!isset($_SESSION['usid'])){
    header("location:studentlogin.php");
    die();
}
if(isset($_POST['Submit'])){
include("connection.php");
$PASS=$_POST['Pass1'];
$CPASS=$_POST['Pass2'];
if($PASS==$CPASS){

$query="UPDATE loginmas set PASSWORD='$PASS'  WHERE USERID='$_SESSION[usid]'";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    
    $_SESSION['check']=true;
    header("location:stucnfrm.php");
    }
    else{$i=1;
    }
}
else{$i=2;
}
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
     <h3 >Confirm Password</h3>
    </div>
    </div>
    <div class="panel-body" >
<form class="form-horizontal" method="post" name="phpForm" action="<?php $_SERVER['PHP_SELF'];?>">
<fieldset>

<!-- Form Name -->

<!-- password input-->

<div class="form-group">
  <label class="col-md-4 control-label" for="Pass1">New Password</label>  
  <div class="col-md-4">
  <input id="pass1" name="Pass1" type="password" placeholder="Enter New Password" class="form-control input-md" required="">
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="Pass2">Confirm New Password</label>
  <div class="col-md-4">
    <input id="pass2" name="Pass2" type="password" placeholder="Confirm New Password" class="form-control input-md" required="">
    </div>
<div class="row"></div>
<div class="row">

<div class="col-md-3"></div>
<div class="col-md-8">

 </div>
</div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="login"></label>
  <div class="col-md-8">
    <input type="submit" id="submit" name="Submit" class="btn btn-success" value="Submit" />
    <input type="reset"  class="btn btn-danger" value="Reset" />
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
        echo 'bootbox.alert("<div class=errormessage><br>You have already used this password<br>Try a different one...</div>")';
        echo '</script>';
    }
    else if($i==2){
        
                    echo '<script language="javascript">';
                    echo 'bootbox.alert("<div class=errormessage><br>Passwords does not match</div>")';
                    echo '</script>';
    }
}
?>