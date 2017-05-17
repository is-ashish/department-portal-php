<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>Change Password</title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    <style>
    .q{
        color:hotpink;
    }
    </style>
</head>

<?php
 session_start();
    include('connection.php');
if(isset($_POST['Submit'])){
   
    $i=1;
    $pass1=$_POST['Pass1'];
    $pass2=$_POST['Pass2'];
    if($pass1==$pass2){
        $query="select uuid()";
        $result=mysqli_query($link,$query);
        $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $uuid=$data['uuid()'];
        $query="update teachermas set password='$pass1',uuid='$uuid' where teacherid='$_SESSION[utid]'";
        $result=mysqli_query($link,$query);
        if(mysqli_affected_rows($link)==1){
            $i=2;
            
            }
        else{
            
        $str="<div class=errormessage><br />You have already used that password<br /><div class=infomessage>Please try a different one...!!</div></div>";
        }
    }
    else{
        $str="<div class=errormessage><br />Password not match</div>";
    }
    ?><body>
<form id="phpForm" name="phpForm" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
<div class="container">
<br />
<br />
<br />
<br />
<br />
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
           <div class="panel panel-primary" >
    <div class="bgcolor">
    <div class=" panel-heading "> 
     <h3 >Confirm Password</h3>
    </div>
    </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>New Password <span style="color:red;size:19px;"> * </span> : </label>
                            <input type="password" id="pass1" name="Pass1" placeholder="Enter your new password" class="form-control input-md" required=""/>
                        </div>
                        <div class="col-md-12">
                            <label>Confirm Password <span style="color:red;size:19px;"> * </span> : </label>
                            <input type="password" id="pass2" name="Pass2" placeholder="Confirm your new password" class="form-control input-md" required=""/>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-12">
                            <input type="submit"  id="submit" name="Submit" value="Submit" class="btn btn-primary" />
                        </div>
                    </div>
                
                </div>
           </div>
        </div>
        <div class="col-md-3"></div>
    </div>    
</div>
</form></body><?php
}
else
{
    $i=0;
if(!isset($_REQUEST['email']) || !isset($_REQUEST['uuid']) || !isset($_REQUEST['utid'])){
    echo "<br /><br /><center><h1>Session has expired....</h1><h3 class=q>Please wait you are re-directing in few seconds</center>";
    echo "<h3 class=q><center>If you don't redirect automatically, Please <a href=teacherlogin.php>Click Here</a> to redirect yourself...</center>";
    die();
}
?>

<?php
$email=$_REQUEST['email'];
$uuid=$_REQUEST['uuid'];
$UID=$_REQUEST['utid'];
$i=0;
$query="select teacherid from teacherdetail where teacherid='$UID'";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)!=1){
    echo "<div class=errormessage><br />Change password link is invalid<br />Please try again....!!!!</div>";
}
else{
    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
     $UID=$data['teacherid'];
    $query="select email from teacherdetail where teacherid='$UID'";
    $result=mysqli_query($link,$query);
     if(mysqli_affected_rows($link)==1){
        $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
        if($email==$data['email']){
            $query="select uuid from teachermas where teacherid='$UID'";
            $result=mysqli_query($link,$query);
            if(mysqli_affected_rows($link)==1){
             $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                if($uuid==$data['uuid']){
                    
                    $_SESSION['utid']=$UID;
            ?>


<body >
<form id="phpForm" name="phpForm" method="post" action="<?php $_SERVER['PHP_SELF'];?>">
<div class="container">
<br />
<br />
<br />
<br />
<br />
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
           <div class="panel panel-primary" >
    <div class="bgcolor">
    <div class=" panel-heading "> 
     <h3 >Confirm Password</h3>
    </div>
    </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>New Password <span style="color:red;size:19px;" > * </span> : </label>
                            <input type="password" id="pass1" name="Pass1" placeholder="Enter your new password" class="form-control input-md" required=""/>
                        </div>
                        <div class="col-md-12">
                            <label>Confirm Password <span style="color:red;size:19px;"> * </span> : </label>
                            <input type="password" id="pass2" name="Pass2" placeholder="Confirm your new password" class="form-control input-md" required=""/>
                        </div>
                        <div class="col-md-12">&nbsp;</div>
                        <div class="col-md-12">
                            <input type="submit"  id="submit" name="Submit" value="Submit" class="btn btn-primary" />
                        </div>
                    </div>
                
                </div>
           </div>
        </div>
        <div class="col-md-3"></div>
    </div>    
</div>
</form>
</body>
<?php
    
        }
        else{
             echo "<div class=errormessage><br />You had already used this Change password link<br /><div class=infomessage>Please generate a new one....!!!!</div></div>";
             
        }
     }
     else{
        echo "<div class=errormessage><br />Change password link is invalid<br /><div class=infomessage>Please generate a new one....!!!!!!</div></div>";
        
     }
    }
    else{echo "<div class=errormessage><br />Change password link is invalid<br /><div class=infomessage>Please generate a new one....!!!!!!!</div></div>";
      }
     }
    else{echo "<div class=errormessage><br />Change password link is invalid<br /><div class=infomessage>Please generate a new one....!!!!!!!!</div></div>";
      }
}
}
$jkm=0;
if($i==1){
      echo '<script language="javascript">';
        echo 'bootbox.alert("<br />'.$str.'")';
        echo '</script>';
}
else if($i==2){
        ?>
        <script>
         bootbox.confirm("<div class=successmessage><br>Password updated successfully....<br /><div class=infomessage>Please login to proceed further......</div></div>",function(res){
            if(res==true){
            
                    window.location="teacherlogin.php";
               }
               else{
                
                    window.location="teacherlogin.php";
               }  
            });
        
        </script>
        <?php
        
}

?>

</html>