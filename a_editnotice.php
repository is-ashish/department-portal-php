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

if(isset($_REQUEST['Sno']) || isset($_SESSION['Sno'])){

if(isset($_REQUEST['Sno'])){$sno=$_REQUEST['Sno'];
 $_SESSION['Sno']=$_REQUEST['Sno'];}
 if(!isset($_REQUEST['Sno'])){$sno=$_SESSION['Sno'];
 $_REQUEST['Sno']=$_SESSION['Sno'];}
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>ADMIN_EDIT_NOTICE</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
</head>
<body>
<?php
    include('connection.php');
    include('suc_header.php');
$query="select SNO,TITLE,CONTENT,STATUS,OUTPUT from noticemas where sno=$sno";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)==1){
$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
$title=$data['TITLE'];
$content=$data['CONTENT'];
$status=$data['STATUS'];
$showto=$data['OUTPUT'];

?><br /><br /><br /><br /><br />
<div class="container">
        <div class="panel panel-primary" >
                <div class="bgcolor">
                    <div class=" panel-heading "> 
                      <a href="adminnoticedb.php"  style="margin-top: 13px;float:right;margin-right: 20px;"  type="button" class="btn btn-info myhomebtn">Notice-Board</a>
                      
                        <h3 >Edit Notice</h3>
                    </div>
                </div>
                
                <div class="panel-body" >
                
            
                        <form class="form-horizontal" method="post" name="phpForm" id="phpForm" action="<?php $_SERVER['PHP_SELF'];?>">
                            <fieldset>
                            
                            <!-- Form Name -->
                            <input type="hidden" id="sno" name="Sno" value="<?php echo $sno;?>"/>
                            <!-- Text input-->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="title">Title  <label style="color: red;" for="title"> * </label> :</label>  
                                  <div class="col-md-7">
                                  
                                  <input id="title" name="Title" type="text"  placeholder="Enter the Title for notice" class="form-control input-md" required="" value="<?php echo $title;?>"/>
                                    </div>
                                  
                                </div>
                            
                            <!-- Password input-->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="content">Content <label style="color: red;" for="content"> * </label> :</label></label>
                                                                                
                                  <div class="col-md-7">
                                      <textarea id="content" name="Content"   rows="5" cols="20"  data-toggle="tooltip" data-placement="bottom" title="Content of the Notice" class="form-control input-md" required=""><?php echo $content;?>
                                        </textarea>
                                   </div>
                                    </div>
                                <div class="form-group">
                                                 <label class="col-md-4 control-label" for="status">Status <label style="color: red;" for="gender"> * </label> :</label>  </label> 
                                
                                                <div class="col-md-7" style="margin-top: 6px;">
                                                    <input id="status1" name="Status" <?php if($status==1) echo 'checked=""';?>type="radio" value="1" required=""/> Verified
                                                    <input id="status2" name="Status" <?php if($status==0) echo 'checked=""';?> type="radio" value="0" required=""/> Not Verified
    
                                                </div>
                                </div>
                                <?php
                                if($showto=="Faculty"){
                                ?>
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="output">Show To <label style="color: red;" > * </label> :</label>  </label> 
                                                                            
                                     <div class="col-md-7">
                                       <select id="output" name="Output" class="form-control input-md"  data-toggle="tooltip" data-placement="bottom" title="Notice display to" >
                                          <option value="<?php echo $showto; ?>">FACULTY</option>
                                           <option value="Student">STUDENT 's</option>
                                           <option value="Both">BOTH</option>
                                       </select>
                                     </div>
                                </div>
                                <?php 
                                }
                                else if($showto=="Student"){
                                ?>
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="output">Show To <label style="color: red;" > * </label> :</label>  </label> 
                                                                            
                                     <div class="col-md-7">
                                       <select id="output" name="Output" class="form-control input-md"  data-toggle="tooltip" data-placement="bottom" title="Notice display to" >
                                          <option value="<?php echo $showto; ?>">STUDENT 's</option>
                                           <option value="Faculty">FACULTY</option>
                                           <option value="Both">BOTH</option>
                                       </select>
                                     </div>
                                </div>
                                <?php 
                                }
                                else if($showto=="Both"){
                                ?>
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="output">Show To <label style="color: red;" > * </label> :</label>  </label> 
                                                                            
                                     <div class="col-md-7">
                                       <select id="output" name="Output" class="form-control input-md"  data-toggle="tooltip" data-placement="bottom" title="Notice display to" >
                                          <option value="<?php echo $showto; ?>">BOTH</option>
                                           <option value="Faculty">FACULTY</option>
                                           <option value="Student">STUDENT 's</option>
                                       </select>
                                     </div>
                                </div>
                                <?php 
                                }
                                ?>
    
                                 
                            <!-- Button (Double) -->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="login"></label>
                                  <div class="col-md-8">
                                    <input type="button" id="submit" name="Submit" class="btn btn-success" value="  UPDATE " onclick="validate()"/>
                                    <a href="adminnoticedb.php"><input type="button"  class="btn btn-primary" value="CANCEL" /></a>
                                  </div>
                                </div>
                            
                            </fieldset>
                        </form>
                </div>
        </div>
</div>
</body>
</html>

<script>
function validate(){
    var title=$('#title');
    var content=$('#content');
    var output=$('#output');
    
   if(title.val()==""){
        bootbox.alert('<div class=errormessage><br />Please enter the TITLE for notice</div>');
        return false;
    }
   else if(content.val()==""){
        bootbox.alert('<div class=errormessage><br />Please enter the CONTENT of notice</div>');
        return false;
    }
    else if(output.val()==-1){
        bootbox.alert('<div class=errormessage><br />Please select to whom you want to show this notice</div>');
        return false;
    }
    bootbox.confirm("<div class=infomessage><br />Are you sure to Update this notice ?</div>",function(res){
       if(res==true){
         $.post("a_editnotice1.php",$('#phpForm').serialize(),
            function(res){
                if(res=="OK"){
                    bootbox.confirm("<div class=successmessage><br />Notice Updated successfully....",
                    function(check){
                        if(check==true){
                        window.location="adminnoticedb.php";
                        }
                        else{
                            window.location="adminnoticedb.php";
                        }
               });
              }
              else{
                bootbox.alert(res);
              }
              
            });
       } 
    });
}

</script>
<?php
}
}
else{
    ?>
    
<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>ADMIN_EDIT_NOTICE</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
</head>
<body></body>
</html>
    <script>
     bootbox.confirm("<div class=errormessage><br />Go back and Select a Notice to edit</div>",function(res){
        if(res==true){
            window.location="adminnoticedb.php";
        }
        else{
            window.location="adminnoticedb.php";
        }
     });
    </script>
    <?php
}

?>
