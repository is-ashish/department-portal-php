
<?php 
session_start();session_destroy();

$y1=date("Y");
$y2=date("Y")-1;
$y3=date("Y")-2;
$y4=date("Y")-3;
$b1=str_replace("0","K",$y1);
$b2=str_replace("0","K",$y2);
$b3=str_replace("0","K",$y3);
$b4=str_replace("0","K",$y4);
$i=0;
if(isset($_POST['Next'])){
if($_POST['Jyear']==-1){  
        $i=1;  
}
else{
    session_start();
    $_SESSION['joinyear']=$_POST['Jyear'];
    header("location:studentreg2.php");
}
}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,inital-scale=1" />
	<title>Student_Register</title>
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

<style>
.navbar-nav > li > a {
  
  line-height: 20px;
}
.header{
    z-index:9999;
}

</style>
</head>
<body><br />
<?php include('menubar.php'); ?><br /><br />
<div class="container-fluid">
<div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

<div class="panel panel-primary" >
    <div class="bgcolor">
    <div class=" panel-heading "> 
    <h3 >Student Registration</h3>
    </div>
    </div>
    <div class="panel-body" >
<form class="form-horizontal" method="post" name="phpForm" action="<?php $_SERVER['PHP_SELF'];?>">
<fieldset>

<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Course">Course  <label style="color: red;" for="Course"> * </label> :</label>
  <div class="col-md-4">
    <select id="course" name="Course" class="form-control">
      <option value="btech">B.Tech</option>
      <optgroup label="...................................................">
      <option value="" disabled="" style="background: #d2d2d2;">BCA</option>
      <option value="" disabled="" style="background: #d4d4d4;">MCA</option>
      <option value="" disabled="" style="background: #d4d4d4;">M.Phil</option>
      <option value="" disabled="" style="background: #d4d4d4;">MBA</option>
      </optgroup>
    </select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="Course">Branch <label style="color: red;" for="Course"> * </label> :</label>
  <div class="col-md-4">
    <select id="branch" name="Branch" class="form-control">
      <option value="CSE">Computer Science</option>
      <optgroup label="...................................................">
      <option value="" disabled="" style="background: #d2d2d2;">Chemical</option>
      <option value="" disabled="" style="background: #d4d4d4;">Information Tech.</option>
      <option value="" disabled="" style="background: #d4d4d4;">Mechanical</option>
      <option value="" disabled="" style="background: #d4d4d4;">Electrical</option>
      </optgroup>
    </select>
  </div>
</div>
<!-- Password input-->
<div class="form-group">
<label class="col-md-4 control-label" for="jyear">Select Joining Year <label style="color: red;" for="Course"> * </label> :</label>
  <div class="col-md-4">
    <select id="jyear" name="Jyear" class="form-control">
      <option value="-1">None</option>
      <option value="<?php echo $b1;?>" ><?php echo $y1;?></option>
      <option value="<?php echo $b2;?>" ><?php echo $y2;?></option>
      <option value="<?php echo $b3;?>" ><?php echo $y3;?></option>
      <option value="<?php echo $b4;?>" ><?php echo $y4;?></option>
    </select>
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
    <input type="submit" id="next" name="Next" class="btn btn-success " value="&nbsp;&nbsp;Next&nbsp;&nbsp;" />
    <a href="index.php" type="button" id="next"  class="btn btn-primary " >Cancel</a>
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
    $i=0;
    echo '<script language="javascript">';
        echo 'bootbox.alert("<div class=errormessage><br>You must have to select a joining year:</div>")';
        echo '</script>';
}?>