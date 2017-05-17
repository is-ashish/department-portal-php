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
if(isset($_POST['Drollno']) || isset($_SESSION['utid'])){
    
if(isset($_POST['Drollno']))
 $_SESSION['utid']=$_POST['Drollno'];
 if(!isset($_POST['Drollno']))
 $_POST['Drollno']=$_SESSION['utid'];

?>

<!DOCTYPE HTML>
<html>
<head>

	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>FACULTY_PROFILE</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="bootstrap-datepicker.css" />
    
    
    <style>
    .datepicker{
        color:red;
    }
    </style>
</head>

<body>
<?php  include('suc_header.php'); ?>
<?php
include("connection.php");
$query="SELECT FNAME,MNAME,LNAME,MOBNO,EMAIL,FATHERNAME,DOB,GENDER,TYPE FROM teacherdetail WHERE teacherid='$_SESSION[utid]'";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $fname=$data['FNAME'];
    $mname=$data['MNAME'];
    $lname=$data['LNAME'];
    $email=$data['EMAIL'];
    $fathername=$data['FATHERNAME'];
    $type=$data['TYPE'];
    $dob=$data['DOB'];
    $arr=explode("-",$dob);
    $dob=$arr[2]."/".$arr[1]."/".$arr[0];
    $mob=$data['MOBNO'];
    $gender=$data['GENDER'];
    
    
    $query="SELECT DEGREE FROM teachermas WHERE teacherid='$_SESSION[utid]'";
    $result=mysqli_query($link,$query);
    if(mysqli_affected_rows($link)>0){
    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    $degree=$data['DEGREE'];
    
    }
    }
?>

<br /><br /><br /><br /><br />
<div class="container-fluid">
    <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">

                    <div class="panel panel-primary" >
                        <div class="bgcolor">
                            <div class=" panel-heading ">      
                            <input type="button" onclick="statechanged()" class="btn btn-primary myhomebtn" style="float: right; margin-right:30px;margin-top: 12px; " value="  Edit  "/>
                                <h3 ><?php echo "$fname's"; ?> Profile</h3>
                             </div>
                        </div>
    
                    <div class="panel-body" >
                        <form class="form-horizontal" method="post" name="phpForm" id="phpForm" action="<?php $_SERVER['PHP_SELF'];?>">

                                        <fieldset><br />
                                                                      
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" >First Name <label style="color: red;" > * </label> :</label>   
                                            
                                                <div class="col-md-6">
                                                    <input id="fname" name="Fname" type="text" disabled="" value="<?php echo $fname;?>" placeholder="Enter First Name" class="form-control input-md" required="">
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" >Middle Name  :</label>   
                                                
                                                <div class="col-md-6">
                                                    <input id="mname" name="Mname" type="text" disabled="" value="<?php echo $mname;?>" placeholder="Enter Middle Name" class="form-control input-md" required="">
    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="lname">Last Name <label style="color: red;" > * </label> :</label>  </label> 
                                            
                                                <div class="col-md-6">
                                                    <input id="lname" name="Lname" disabled="false" type="text" value="<?php echo $lname;?>" placeholder="Enter Last Name" class="form-control input-md" required="">
    
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="email">Email <label style="color: red;" > * </label> :</label>  </label> 
                                            
                                                <div class="col-md-6">
                                                    <input id="email" name="Email" type="text" disabled="" value="<?php echo $email;?>" placeholder="Enter Email" class="form-control input-md" required="">
    
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="mob">Mobile Number <label style="color: red;" > * </label> :</label>  </label> 
                                            
                                                <div class="col-md-6">
                                                <div class="input-group">
                                                        <span class="input-group-addon">+91 </span>
      
                                                    <input id="mob" name="Mob" type="text" disabled="" value="<?php echo $mob;?>" placeholder="Enter Mobile Number" class="form-control input-md" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="fathername">Father's Name <label style="color: red;" > * </label> :</label>  </label> 
                                            
                                                <div class="col-md-6">
                                                <div class="input-group">
                                                        <span class="input-group-addon">Mr. </span>
      
                                                    <input id="fathername" name="Fathername" disabled="" type="text" value="<?php echo $fathername;?>" placeholder="Enter Father's Name" class="form-control input-md" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="gender">Gender <label style="color: red;" for="gender"> * </label> :</label>  </label> 
                                            
                                                <div class="col-md-6">
                                                    <input id="gender1" disabled="" name="Gender" <?php if($gender=="Male") echo 'checked=""';?>type="radio" value="Male" required=""/> Male
                                                    <input id="gender2" disabled="" name="Gender" <?php if($gender=="Female") echo 'checked=""';?> type="radio" value="Female" required=""/> Female
    
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="dob">Date of Birth <label style="color: red;" for="Course"> * </label> :</label>   
                                            
                                                <div class="col-md-6">
                                                    <input id="dob" name="Dob" disabled=""  value="<?php echo $dob;?>" placeholder="Enter Date of birth" class="datepicker form-control input-md" required="" /> ( Format : dd/mm/yyyy )
    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="type">Type <label style="color: red;" for="type"> * </label> :</label>  </label> 
                                            
                                                <div class="col-md-6">
                                                    <input id="type1" disabled="" name="Type" <?php if($type=="permanent") echo 'checked=""';?>type="radio" value="permanent" required=""/> Permanent
                                                    <input id="type2" disabled="" name="Type" <?php if($type=="guest") echo 'checked=""';?> type="radio" value="guest" required=""/> Guest
    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="email">Degree <label style="color: red;" > * </label> :</label>  </label> 
                                            
                                                <div class="col-md-6">
                                                    <input id="degree" name="Degree" type="text" disabled="" value="<?php echo $degree;?>" placeholder="Highest Degree you have" class="form-control input-md" required="">
    
                                                </div>
                                            </div>
                         
                                                <div class="row">
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-8"></div>
                                                </div>
                                            </div>
<!-- Button (Double) -->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="login"></label>
                                                    
                                                <div class="col-md-8">
                                                     <input type="button" disabled="" id="login" name="login" class="btn btn-success" value="Submit" onclick="validate()"/>
                                                     <input type="reset" disabled="" id="reset" name="reset" class="btn btn-danger" value="Reset" />
                                                     <input type="button" onclick="statechanged()" class="btn btn-info myhomebtn"  value="  Edit  "/>
                            
                                                </div>
                                            </div>
                                            <br /><br /><br />
                                        </fieldset>
                                   
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
function statechanged(){
    $('#upload').removeAttr("disabled");
    
    $('#fname').removeAttr("disabled");
    $('#lname').removeAttr("disabled");
    $('#mname').removeAttr("disabled");
    $('#fathername').removeAttr("disabled");
    $('#email').removeAttr("disabled");
    $('#gender1').removeAttr("disabled");
    $('#gender2').removeAttr("disabled");
    $('#type1').removeAttr("disabled");
    $('#type2').removeAttr("disabled");
    $('#login').removeAttr("disabled");
   $('#mob').removeAttr("disabled");
   $('#submit').removeAttr("disabled");
   $('#reset').removeAttr("disabled");
   $('#degree').removeAttr("disabled");
    
    $('#dob').removeAttr("disabled");
    
    
   
}


$('#dob').datepicker({
    format:'dd/mm/yyyy'
});
function validate(){
    
    var fname=$('#fname');
    var lname=$('#lname');
    var fathername=$('#fathername');
   var email=$('#email');
    var mob=$('#mob');
  var dob=$('#dob');
    
   if(fname.val()==""){
        bootbox.alert('<div class=errormessage><br />Please enter your First Name</div>');
        return false;
    }
   
   else if(lname.val()==""){
        bootbox.alert('<div class=errormessage><br />Please enter your Last Name</div>');
        return false;
    }
   else if(fathername.val()==""){
        bootbox.alert('<div class=errormessage><br />Please enter your Father\'s Name</div>');
        return false;
    }
    else if(email.val()==""){
        bootbox.alert('<div class=errormessage><br />Please enter your Email Address</div>');
        return false;
    }
    
     else if(mob.val()==""){
        bootbox.alert('<div class=errormessage><br />Please enter your Mobile Number</div>');
        return false;
    }
    else if(mob.val().length!=10){
            bootbox.alert('<div class=errormessage><br />Invalid Mobile Number</div>');
        return false;
   
    }
    else if(dob.val()==""){
             bootbox.alert('<div class=errormessage><br />Please select your date of birth</div>');
        return false;
    }
    else if(dob.val().length!=10){
             bootbox.alert('<div class=errormessage><br />Invalid date of birth</div>');
        return false;
    }
     
    bootbox.confirm("Are you sure to submit this form?",function(res){
       if(res==true){
       
           $.post("teacher_edit1.php",$('#phpForm').serialize(),
            function(res){
               if(res=="OK"){
                    window.location="admindb1.php";
               }
               else{
                bootbox.confirm(res,function(r){
                    if(r==true){
                    window.location="admindb1.php";
                    }
                    else{window.location="tceditprofile.php";
                    }
                }); 
               } 
                
            });
       } 
    });
        
    
    return true;
}
</script>
<?php
}
else{
    ?>
    
<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>FACULTY_EDIT_PROFILE</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
</head>
<body></body>
</html>
    <script>
     bootbox.confirm("<div class=errormessage><br />Go back and re-select a record to edit</div>",function(res){
        if(res==true){
            window.location="admindb1.php";
        }
        else{
            window.location="admindb1.php";
        }
     });
    </script>
    <?php
}
?>

