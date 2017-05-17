<?php
session_start();
if(!isset($_SESSION['uname'])){
    header("location:adminlogin.php");
    die();
}
?>
<?php
if(isset($_POST['login'])){
$MOB=$_POST['Mob'];
$NAME=$_POST['Name'];
$UID=$_SESSION['uid'];
if(ctype_digit($MOB)){
if(strlen($MOB)==10){
if(substr($MOB,0,1)!='0'){
$query="UPDATE admin set NAME='$NAME',MOBNO=$MOB WHERE USERID='$UID'";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    $_SESSION['uname']=$NAME;
    
    echo $_SESSION['uid'];
    header("location:s_admin.php");
     }
    else{$i=1;}
    }
else{$i=2;}  
}
else{$i=3;
}
}
else{$i=4;
}
}

?>
<!DOCTYPE HTML>
<html>
<head>

	<meta name="viewport" content="width=device-width,inital-scale=1" />
	<title>ADMIN_DASHBOARD</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    
    
    
</head>

<body>
<?php  include('suc_header.php'); ?>

<br /><br /><br /><br /><br />
<div class="container-fluid">
<div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

<div class="panel panel-primary" >
    <div class="bgcolor">
    <div class=" panel-heading "> 
    <h3 >Admin Edit Profile</h3>
    </div>
    </div>
    <div class="panel-body" >
<form class="form-horizontal" method="post" name="phpForm" action="<?php $_SERVER['PHP_SELF'];?>">
<fieldset>

<?php
include("connection.php");
$query="SELECT NAME,MOBNO 
        FROM admin WHERE USERID='$_SESSION[uid]'";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    
    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
    }

?>

<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username">Name</label>  
  <div class="col-md-4">
  <input id="name" name="Name" type="text" value="<?php echo $data['NAME']; ?>" placeholder="Enter Name" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Mobile Number">MOBNO</label>
  <div class="col-md-4">
    <input id="mob" name="Mob" type="text" value="<?php echo $data['MOBNO']; ?>" placeholder="Enter Mobile Number" class="form-control input-md" required="">
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
    <input type="submit" id="login" name="login" class="btn btn-success" value="Submit" />
    <input type="reset" id="reset" name="reset" class="btn btn-danger" value="Reset" />
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
    if($i==1){           echo '<script language="javascript">';
                    echo 'bootbox.alert("<div class=errormessage><br>Profile Not Updated</div>")';
                    echo '</script>';
    }
    else if($i==2){echo '<script language="javascript">';
        echo 'bootbox.alert("<div class=errormessage><br>Mobile number must not start from 0</div>")';
        echo '</script>';
    }
    else if($i==3){
    echo '<script language="javascript">';
    echo 'bootbox.alert("<div class=errormessage><br>Mobile Number should be of 10 digits</div>")';
    echo '</script>';
        }
    else if($i==4){
        
    echo '<script language="javascript">';
    echo 'bootbox.alert("<div class=errormessage><br>Mobile number should contains digits only</div>")';
    echo '</script>';
        }
    else if($i==2){
        }
}
?>