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
?>

<!DOCTYPE HTML>
<html>
<head>

	<meta name="viewport" content="width=device-width,inital-scale=1" />
	<title>ADMIN_ADD_NOTICE</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    
    
    
</head>

<body>
<?php include('suc_header.php');?>
<br /><br /><br /><br /><br />


<div class="container-fluid">
<div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

<div class="panel panel-primary" >
    <div class="bgcolor">
    <div class=" panel-heading "> 
    <h3 >Add Notice</h3>
    </div>
    </div>
    <div class="panel-body" >
<form class="form-horizontal" method="post" name="phpForm" id="phpForm" action="<?php $_SERVER['PHP_SELF'];?>">
<fieldset>

<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="title">Title  <label style="color: red;" for="title"> * </label> :</label>  
  <div class="col-md-7">
  
  <input id="title" name="Title" type="text"  placeholder="Enter the Title for notice" class="form-control input-md" required=""/>
    </div>
  
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="content">Content <label style="color: red;" for="content"> * </label> :</label></label>
                                                
  <div class="col-md-7">
      <textarea id="content" name="Content"   rows="5" cols="20"  data-toggle="tooltip" data-placement="bottom" title="Content of the Notice" class="form-control input-md" required=""></textarea>
   </div>
    </div>
<div class="form-group">
  <label class="col-md-4 control-label" for="output">Show To <label style="color: red;" > * </label> :</label>  </label> 
                                            
     <div class="col-md-7">
       <select id="output" name="Output" class="form-control input-md"  data-toggle="tooltip" data-placement="bottom" title="Notice display to" >
          <option value="-1">None</option>
           <option value="Faculty">FACULTY</option>
           <option value="Student">STUDENT</option>
           <option value="Both">BOTH</option>
       </select>
     </div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="login"></label>
  <div class="col-md-8">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="button" id="submit" name="Submit" class="btn btn-success" value="  ADD " onclick="validate()"/>
    <input type="reset" id="reset" name="reset" class="btn btn-danger" value="RESET" />
    <a href="adminnoticedb.php"><input type="button"  class="btn btn-primary" value="CANCEL" /></a>
  </div>
</div>

</fieldset>
</form>
        </div></div>
    <div class="col-md-4"></div>
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
    bootbox.confirm("<div class=infomessage><br />Are you sure to add this notice ?</div>",function(res){
       if(res==true){
         $.post("a_addnotice1.php",$('#phpForm').serialize(),
            function(res){
                if(res=="OK"){
                    bootbox.confirm("<div class=successmessage><br />Notice added successfully..<br /><div class=infomessage>Do you want to add more ? </div>",
                    function(check){
                        if(check==true){
                        window.location="a_addnotice.php";
                        }
                        else{
                            window.location="s_admin.php";
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