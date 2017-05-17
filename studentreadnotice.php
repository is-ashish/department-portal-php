<?php
session_start();
if(!isset($_SESSION['usname'])){
    header("location:studentlogin.php");
    die();
}
if(!isset($_SESSION['usid'])){
    header("location:studentlogin.php");
    die();
}



if(!isset($_GET['sno']) || !isset($_GET['title'])){
    $checksno=1;
    $str="<div class=errormessage><br />Link may be invlaid....</div>";
   
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
$query="select DATE_FORMAT(DATE,'%d-%b-%Y') DATE,SNO,TITLE,CONTENT,CREATEBY from noticemas where sno='$_GET[sno]' and title='$_GET[title]' and createby='Admin' and output in ('Both','Student') and status='1'";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)==1){
$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
$d=$data['DATE'];
$sno=$_GET['sno'];
$date=str_replace("-"," / ",$d);
$title=$data['TITLE'];
$content=$data['CONTENT'];
$createby=$data['CREATEBY'];
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
 <?php include('stusuc_header.php'); ?><br /><br /><br /><br /><br />
 <div class="container">
<div class="panel panel-success"> 
    <div class="bgcolor">    
    <div class="panel-heading">
    
    <a href="studentnoticedb.php"  style="float: right;margin-top: 12px;  margin-right: 20px;" ><input type="button" class="btn btn-info myhomebtn" value="  Notice-board  "/></a>
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
 
 <?php
 if($i==1){
    ?>
    <script>
    bootbox.confirm("<?php echo $str;?>",function(res){
        if(res==true){
            window.location="studentnoticedb.php";
        }
        else{
            window.location="studentnoticedb.php";
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
            window.location="studentnoticedb.php";
        }
        else{
            window.location="studentnoticedb.php";
        }
    });
    
    
    </script><?php
 }
 ?>