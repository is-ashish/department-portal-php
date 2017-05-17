<?php
session_start();
if(!isset($_SESSION['uname'])){
    header("location:adminlogin.php");
    die();
}
if(!isset($_SESSION['uid'])){
    header("location:adminlogin.php");
    die();
}
if(!isset($_SESSION['joinyear'])||!isset($_SESSION['ftype'])){
    header("location:teacherreg.php");
    die();
}
else if(!isset($_POST['Submit'])){
    $FNAME=null;
$LNAME=null;
$MNAME=null;
$FATHERNAME=null;
$EMAIL=null;
$DOB=null;
$GENDER=null;
$PASS=null;
$CPASS=null;
$MOB=null;
$DEGREE=null;
}
else if(isset($_POST['Submit'])){
    $FNAME=ucfirst($_POST['Fname']);
$LNAME=ucfirst($_POST['Lname']);
$MNAME=ucfirst($_POST['Mname']);
$FATHERNAME=ucwords($_POST['Fathername']);
$DEGREE=ucwords($_POST['Degree']);
$EMAIL=$_POST['Email'];
$DOB=$_POST['Dob'];
    $GENDER=$_POST['Gender'];
 
$PASS=$_POST['Pass2'];
$CPASS=$_POST['Pass1'];
$MOB=$_POST['Mobno'];

include("connection.php");
include('adminteacherreg_2.php');
}

?>

<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width,inital-scale=1" />
	<title>Faculty-details</title>
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
<br /><br /><br /><br />

<div class="container-fluid">
<div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

<div class="panel panel-primary" >
    <div class="bgcolor">
    <div class=" panel-heading "> 
        <a href="index.php"  style="float: right; margin-right:30px;margin-top: 12px; " ><input type="button" class="btn btn-info myhomebtn" value="  Home  "/></a>
    <h3 >Faculty-details</h3>
    </div>
    </div>
    <div class="panel-body" >
<form class="form-horizontal" method="post" name="phpForm" id="phpForm" action="<?php $_SERVER['PHP_SELF'];?>">
<fieldset>

<!-- Form Name -->
<div id="ret"></div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fname">First Name <label style="color: red;" for="Course"> * </label> :</label>  
  <div class="col-md-2">
  <input id="fname" name="Fname" type="text" style="text-transform: capitalize;" value="<?php echo $FNAME;?>" placeholder="First Name" class="form-control input-md" required=""/>
    
  </div>  
  <div class="col-md-2">
  <input id="mname" name="Mname" type="text" style="text-transform: capitalize;" value="<?php echo $MNAME;?>" placeholder="Middle Name" class="form-control input-md" data-toggle="tooltip" title="Not Mandatory"/>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="lname">Last Name <label style="color: red;" for="Course"> * </label> :</label>  
  <div class="col-md-4">
  <input id="lname" name="Lname" type="text" style="text-transform: capitalize;" value="<?php echo $LNAME;?>" placeholder="Enter last Name" class="form-control input-md" required=""/>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email <label style="color: red;" for="Course"> * </label> :</label>  
  <div class="col-md-4">
  <input id="email" name="Email" type="text" value="<?php echo $EMAIL;?>" placeholder="Enter Email" class="form-control input-md" required=""/>
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="mobno">Mobile Number <label style="color: red;" for="Course"> * </label> :</label>  
  <div class="col-md-4">
  <div class="input-group">
      <span class="input-group-addon">+91</span>
      <input id="mobno" name="Mobno" class="form-control" value="<?php echo $MOB;?>" placeholder="Enter Mobile Number" type="text">
    </div>
    </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="fathername">Father's Name <label style="color: red;" for="Course"> * </label> :</label>  
  <div class="col-md-4">
  <div class="input-group">
      <span class="input-group-addon">Mr. </span>
      <input id="fathername" name="Fathername" style="text-transform: capitalize;" value="<?php echo $FATHERNAME;?>" class="form-control" placeholder="Enter Father's Name" type="text">
    </div>
    </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="degree">Highest Degree <label style="color: red;" for="Course"> * </label> :</label>  
  <div class="col-md-4">
  <input id="degree" name="Degree" type="text" value="<?php echo $DEGREE;?>" placeholder="Highest Degree you have?" class="form-control input-md" required=""/>
    
  </div>
</div>


<div class="form-group">
  <label class="col-md-4 control-label" for="dob">Date of Birth <label style="color: red;" for="Course"> * </label> :</label>  
  <div class="col-md-4">
  <input id="dob" name="Dob" type="date" placeholder="Select Date" value="<?php echo $DOB;?>" class="form-control input-md" required=""/>
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="gender">Gender <label style="color: red;" for="Course"> * </label> :</label>  
  <div class="col-md-4">
  <input id="gender" name="Gender" type="radio"   required=""  <?php if($GENDER=="Male")echo "checked=true";?> value="Male"/> Male
   <input id="gender" name="Gender" type="radio"   required=""  <?php if($GENDER=="Female")echo "checked=true";?>value="Female"/> Female
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password <label style="color: red;" for="Course"> * </label> :</label>
  <div class="col-md-4">
    <input id="pass1" name="Pass1" type="password"  placeholder="Enter Password" class="form-control input-md" required="">
    </div>
    </div>
<div class="form-group">
  <label class="col-md-4 control-label" for="confirmpassword">Confirm Password <label style="color: red;" for="Course"> * </label> :</label>
  <div class="col-md-4">
    <input id="pass2" name="Pass2" type="password" placeholder="Confirm Password" class="form-control input-md" required="">
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
    <input type="submit" id="submit" name="Submit"  class="btn btn-success" value="Submit" />
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
if($i==1){
       echo '<script language="javascript">';
                            echo 'bootbox.confirm("<div class=successmessage><br>You have successfully registered a faculty <br><br>His Roll Number is : <div class=errormessage style=float:right>'.$SID.'</div><br><div class=smallinfomessage>( This will be his <b>USER ID</b> )   &nbsp; Do you want to add more?</div></div>",function(res){';
                                    echo 'if(res==true){';
                                    
                            echo 'window.location="adminteacherreg.php";';
                                 echo '}  ';
                                 echo 'else{';
                                    echo 'window.location="admindb1.php";';
                                 echo '} '; 
                            echo '});'; 
    echo '</script>';
 }
else if($i==2){
    
            $query="DELETE from teachermas WHERE teacherid='$SID'";
             $result=mysqli_query($link,$query);
    echo '<script language="javascript">';
                    echo 'bootbox.alert("<div class=errormessage><br>There is a problem while registring <br>Please try after sometime..!!</div>")';
                    echo '</script>'; 
}
else if($i==3){
      echo '<script language="javascript">';
                    echo 'bootbox.alert("<div class=errormessage><br>Must not start from 0</div>")';
                    echo '</script>'; 
}
else if($i==4){
    echo '<script language="javascript">';
                    echo 'bootbox.alert("<div class=errormessage><br>Mobile number must be of 10 digits only</div>")';
                    echo '</script>';
}
else if($i==5){
    
echo '<script language="javascript">';
                    echo 'bootbox.alert("<div class=errormessage><br>Mobile number does not contain characters</div>")';
                    echo '</script>'; 
}
else if($i==6){
    
   echo '<script language="javascript">';
                    echo 'bootbox.alert("<div class=errormessage><br>Entered Password does not match..!!</div>")';
                    echo '</script>'; 
}
}
?>