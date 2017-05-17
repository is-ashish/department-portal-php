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
if(!isset($_POST['Sno'])){
    $checksno=1;
    $str="<div class=errormessage><br />Please go back and select a notice....</div>";
   
 ?>   
<!DOCTYPE HTML>
<html>
<head>

	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>NOTICE_Reader</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
 </head>
 <body>
 </body>
 </html>
 <?php
}
else{
     $checksno=0;
     
 $i=0;
include('connection.php');
$query="select DATE_FORMAT(DATE,'%d-%b-%Y') DATE,SNO,TITLE,CONTENT,STATUS,OUTPUT,CREATEBY,SENDERNAME,SENDERID from noticemas where sno=$_POST[Sno]";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)==1){
$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
$d=$data['DATE'];
$sno=$_POST['Sno'];
$date=str_replace("-"," / ",$d);
$title=$data['TITLE'];
$content=$data['CONTENT'];
if($data['STATUS']==1)
$status="Verified";
else
$status="Not Verified";
$showto=$data['OUTPUT'];
$createby=$data['CREATEBY'];
$sendername=$data['SENDERNAME'];
$senderid=$data['SENDERID'];
}

?>
<!DOCTYPE HTML>
<html>
<head>

	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>NOTICE_Reader</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    <style type="text/css">
hr{
    width:86%;
}
</style>
 </head>
 <body>
 <?php include('suc_header.php'); ?><br /><br /><br /><br /><br />
 <div class="container">
<div class="panel panel-success"> 
    <div class="bgcolor">    
    <div class="panel-heading">
    <form name="phpForm" id="phpForm" method="post">
    <input type="hidden" id="sno" name="Sno" value="<?php echo $sno;?>"/>
    
    <input type="button" class="btn btn-warning myeditbtn" id="editbutton" value="  Edit  " onclick="edit()" style="margin-right: 20px;float: right;margin-top: 12px;"/>
    </form>
    <a href="adminnoticedb.php"  style="float: right;margin-top: 12px;  margin-right: 20px;" ><input type="button" class="btn btn-info myhomebtn" value="  Notice-board  "/></a>
     <div class="visible-xs"><br /><br /></div>
    <h3>Notice Reader</h3>
    </div>
    </div>

    <div class="panel-body">
        
        <div class="container">
            <?php
             if(mysqli_affected_rows($link)==1){
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                      <label class="col-sm-4 control-label" style="font-size: 18px;">Title :</label>
                      <label class="col-sm-8 control-label text-justify" style="font-size: 18px; color: #266ff3;">
                            <?php echo $title; ?>
                      </label>
                    </div>
                    <div class="col-sm-2">&nbsp;</div>
                   
                </div>
                <hr />
                <div class="col-sm-12">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                      <label class="col-sm-4 control-label" style="font-size: 18px;">Content :</label>
                      
                      <label class="col-sm-8 control-label text-justify" style="font-size: 18px; color: #266ff3;"> 
                      <?php echo $content; ?>                     
                    </div>
                    <div class="col-sm-2">&nbsp;</div>
                </div>
                <hr />
                <div class="col-sm-12">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                      <label class="col-sm-4 control-label" style="font-size: 18px;">Status :</label>
                      <label class="col-sm-8 control-label" style="font-size: 18px; color: #266ff3;">
                            <?php echo $status; ?>
                      </label>
                    </div>
                    <div class="col-sm-2">&nbsp;</div>
                </div>
                <hr />
                <div class="col-sm-12">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                      <label class="col-sm-4 control-label" style="font-size: 18px;">Display to :</label>
                      <label class="col-sm-8 control-label" style="font-size: 18px; color: #266ff3;">
                            <?php echo $showto; ?>
                      </label>
                    </div>
                    <div class="col-sm-2">&nbsp;</div>
                </div>
                <hr />
                <div class="col-sm-12">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                      <label class="col-sm-4 control-label" style="font-size: 18px;">Created Date:</label>
                      <label class="col-sm-8 control-label" style="font-size: 18px; color: #266ff3;">
                            <?php echo $date; ?>
                      </label>
                    </div>
                    <div class="col-sm-2">&nbsp;</div>
                </div>
                <hr />
                <div class="col-sm-12">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                      <label class="col-sm-4 control-label" style="font-size: 18px;">Create By :</label>
                      <label class="col-sm-8 control-label" style="font-size: 18px; color: #266ff3;">
                            <?php echo $createby; ?>
                      </label>
                    </div>
                    <div class="col-sm-2">&nbsp;</div>
                </div>
                <?php
                if($createby!="Admin"){
                    ?>
                <hr />
                <div class="col-sm-12">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                      <label class="col-sm-4 control-label" style="font-size: 18px;">Creator's Name :</label>
                      <label class="col-sm-8 control-label" style="font-size: 18px; color: #266ff3;">
                            <?php echo $sendername; ?>
                      </label>
                    </div>
                    <div class="col-sm-2">&nbsp;</div>
                </div>
                <hr />
                <div class="col-sm-12">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                      <label class="col-sm-4 control-label" style="font-size: 18px;">Creator's Id :</label>
                      <label class="col-sm-8 control-label" style="font-size: 18px; color: #266ff3;">
                           <?php echo $senderid; ?>
                      </label>
                    </div>
                    <div class="col-sm-2">&nbsp;</div>
                </div>
                    <?php
                }
                ?>
            </div>
            <?php
            }
            else{
                $i=1;
                $str="<div class=errormessage><br />Unable to load Notice from database<br /><div class=infomessage><B>Please try again later....</b></div></div>";
                }
            ?>
       </div>
    </div>
</div>
</div>
 
 </body>
 </html>
 <script>
function edit(){
   
    bootbox.confirm("<div class=infomessage><br />Are you sure to Edit this notice ?</div>",function(res){
        if(res==true){
              phpForm.action="a_editnotice.php";
            phpForm.submit();
        }    
    });
    
}
 
 </script>
 <?php
 if($i==1){
    ?>
    <script>
    bootbox.confirm("<?php echo $str;?>",function(res){
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
 }
 if($checksno==1 && !isset($_POST['Sno'])){
    ?><script>
    bootbox.confirm("<?php echo $str;?>",function(res){
        if(res==true){
            window.location="adminnoticedb.php";
        }
        else{
            window.location="adminnoticedb.php";
        }
    });
    
    
    </script><?php
 }
 ?>