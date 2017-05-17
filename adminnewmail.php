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

	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>ADMIN_ComposeMail</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
        <script src="js/bootbox.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css"/>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <?php 

include("connection.php");
if(isset($_REQUEST['sno']) && isset($_REQUEST['code'])) {
    $sno=$_REQUEST['sno'];
    if($_REQUEST['code']==1){
        $query="SELECT body,sbjct,sendto FROM sendmas where senderid='$_SESSION[uid]' and sno='$sno' order by date desc";
        $result=mysqli_query($link,$query);
        
        if(mysqli_affected_rows($link)>0){
            $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
            $to="";
            $subject=$data['sbjct'];
            $body=$data['body'];
        }    
    }
    else if($_REQUEST['code']==0){
    $query="SELECT body,sbjct,sendto FROM mailsavemas where id='$_SESSION[uid]' and sno='$sno' order by date desc";
    $result=mysqli_query($link,$query);
     if(mysqli_affected_rows($link)>0){
        $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $to=$data['sendto'];
        $subject=$data['sbjct'];
        $body=$data['body'];
        }    
    
    }
}
else{
    $to="";
        $subject="";
        $body="";
}
$str="";
$query="SELECT email,fname,lname from  studentdetail";

$result=mysqli_query($link,$query);
while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $str=$str."\"";
        $str=$str."$data[email]"." [ "." ".trim($data['fname'])." ".trim($data['lname'])." , ("." STUDENT"." ) ]";
        $str=$str."\"";
        $str=$str.",";
    }
$query="SELECT email,fname,lname from teacherdetail";
$result=mysqli_query($link,$query);
while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $str=$str."\"";
        $str=$str."$data[email]"." [ "." ".trim($data['fname'])." ".trim($data['lname'])." , ("." FACULTY"." ) ]";
        $str=$str."\"";
        $str=$str.",";
    }
$str=substr($str,0,strlen($str)-1);

?>
    <script>
  $( function() {
    var availableEmails = [
      <?php echo $str;?>
    ];
    $( "#to" ).autocomplete({
      source: availableEmails
    });
  } );
  </script>
    <style>
    sup{
        border:1px solid red;
        background-color:red;
        width:20px;
        height:20px;
        border-radius: 50%;
        font-size:14px;
        color:white;
    }
    div.image{  background-image:url('images/1.jpg'); background-repeat: no-repeat;background-position: center;
                    background-size: cover;
        }
 
        .closebtn{
            border:1px solid red;
            width:30px;
            color:#d8f9ff;
        }
        .closebtn:hover{
              border:1px solid red;
            width:30px;
            background-color: red;
            color:white;
        }
        .deattach{
            color:red;
        }
        .deattach:hover{
            color:darkred;
        }
        .deattach:visited{
            color:red;
        }
        .deattach.morelink {
    text-decoration:none;
    outline: none;
}
   .a1deattach{
    color:red;
    font-weight: bold;
    font-size:17px;
   }
   .a1deattach:hover{
    color:darkred;
    font-weight: bold;
    font-size:17px;
   }
   .a1deattach:visited{
    color:red;
    font-weight: bold;
    font-size:17px;
   }
    </style>
    
    
</head>

<body>
<?php  include('suc_header.php'); 
       include('countpendingnotice.php');
?>

<br /><br /><br /><br /><br /><br />
<div class="container-fluid">
<div class="row ">

<form class="form-horizontal" method="post" name="phpForm" id="phpForm" action="adminnewmail1.php" enctype="multipart/form-data">
        <div class="col-md-2"></div>
    <div class="col-md-8">
            <div class="panel panel-primary" >
                <div class="bgcolor">
                    <div class=" panel-heading "> 
                        <h3 >Compose a Mail</h3>
                    </div>
                </div>
                <div class="panel-body" >
                    <div class="row">
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-2"></div>
                                <div class="col-md-8">&nbsp;&nbsp;
                                    <span class="hidden-lg hidden-md">&nbsp;&nbsp;</span>
                                    <a href="javascript:void(0)" type="button" id="send" name="Send" onclick="validateSend()" class="btn btn-success "><span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp; Send</a>
                                    <a href="javascript:void(0)" type="button" id="save" name="Save" onclick="validateSave()" class="btn btn-info " ><span class="glyphicon glyphicon-save"></span>&nbsp;&nbsp; Save</a>
                                    
                                    <span class="visible-lg visible-md" style="float: right; margin-right:10px;">    
                                    <a href="s_admin.php" type="button" id="cancel"  class="btn btn-warning" ><span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Cancel</a>
                                    <a href="javascript:void(0)" type="reset" id="reset"  class="btn btn-danger " onclick="resetall()"><span class="glyphicon glyphicon-retweet"></span>&nbsp;&nbsp;Reset</a>
                                    </span>
                                    <span class="visible-sm visible-xs" ><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="s_admin.php" type="button" id="cancel"  class="btn btn-warning" ><span class="glyphicon glyphicon-remove"></span>&nbsp;Cancel</a>
                                    <a href="javascript:void(0)" type="reset" id="reset"  class="btn btn-danger " onclick="resetall()"><span class="glyphicon glyphicon-retweet"></span>&nbsp;Reset</a>
                                    </span>
                                </div>
                                
                            <div class="col-md-2"></div>
                            </div>
                            </div>
                            
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon" style="font-size:20px" ><b >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To :&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
                                    <input id="to" name="To" class="form-control"   type="text" class="form-control" autocomplete="off" required="" value="<?php echo $to; ?>" />
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon" style="font-size:20px" ><b >Subject :</b></span>
                                    <input id="subject" name="Subject" class="form-control"   type="text" required="" value="<?php echo $subject; ?>" />
                                </div>
                            <div class="col-md-2"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon" style="font-size:20px" ><b >&nbsp;&nbsp;Body :&nbsp;&nbsp;</b></span>
                                    <textarea rows="7" cols="20" class="form-control" id="body" name="Body" required=""><?php echo $body; ?></textarea> </div>
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <span id="moretext" >
                                    <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal"> <span class="glyphicon glyphicon-paperclip"></span> Attach File</button>
                                
                                    <span style='color: #000d1d;'>
                                        <b>Attached File : </b>
                                    </span>
                                    <span style="color: red;">
                                        <b>No file chosen</b>
                                    </span>
                                </span>

                                <!-- Modal -->
                                <div id="myModal" class="modal fade image" role="dialog" >
                                    <div class="modal-dialog" >
                                        <!-- Modal content-->
                                        <div class="modal-content" style=" border:2px solid #266ff3;">
                                            <div class="modal-header" style="background-color:#000d1d ;border-bottom:3px solid #266ff3;">
                                                <button type="button" class="close btn closebtn" data-dismiss="modal">&times;</button>
                                                    <h3 class="modal-title">Attach File</h3>
                                            </div>
                                            <div class="modal-body">
                                                <p>
                                                    <div class="input-group">
                                                        <i class="input-group-addon" data-toggle="popover" title="Attach File First" data-content="Click Here to Attach More Files"><span  style="font-size: 17px;" >1.</span></a></i>
                                                        <input type="file" class="form-control" name="File1" id="file1" onchange="changestate()" value="a.jpg"/>
                                                        <i class="input-group-addon" data-toggle="popover" title="" id="ideattachfile1"><span  style="font-size: 17px;" ><a href="javascript:void(0)" class="deattach" id="deattachfile1" style="pointer-events:none; color:maroon;" onclick="deleteattach('file1')"><span class="glyphicon glyphicon-remove-circle "></span></a></span></i>
                                                    </div><br />
                                       
                                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel">
                                		                  <div class="input-group">
                                                                <i class="input-group-addon" data-toggle="popover" title="Attach File Second" ><span  style="font-size: 17px;" >2.</span></a></i>
                                                                <input type="file" class="form-control" name="File2" id="file2" onchange="changestate()"/>
                                                                <i class="input-group-addon" data-toggle="popover" title="" id="ideattachfile2"><span  style="font-size: 17px;" ><a href="javascript:void(0)" class="deattach" id="deattachfile2" style="pointer-events:none; color:maroon;" onclick="deleteattach('file2')"><span class="glyphicon glyphicon-remove-circle "></span></a></span></i>
                                                          </div><br />
                                                          <div class="input-group">
                                                                <i class="input-group-addon" data-toggle="popover" title="Attach File Third" ><span  style="font-size: 17px;" >3.</span></a></i>
                                                                <input type="file" class="form-control" name="File3" id="file3" onchange="changestate()"/>
                                                                <i class="input-group-addon" data-toggle="popover" title="" id="ideattachfile3"><span  style="font-size: 17px;" ><a href="javascript:void(0)" class="deattach" id="deattachfile3" style="pointer-events:none; color:maroon;" onclick="deleteattach('file3')"><span class="glyphicon glyphicon-remove-circle "></span></a></span></i>
                                         
                                                          </div><br />
                                                          <div class="input-group">
                                                                <i class="input-group-addon" data-toggle="popover" title="Attach File Third" ><span  style="font-size: 17px;" >4.</span></a></i>
                                                                <input type="file" class="form-control" name="File4" id="file4" onchange="changestate()"/>
                                                                <i class="input-group-addon" data-toggle="popover" title="" id="ideattachfile4"><span  style="font-size: 17px;" ><a href="javascript:void(0)" class="deattach" id="deattachfile4" style="pointer-events:none; color:maroon;" onclick="deleteattach('file4')"><span class="glyphicon glyphicon-remove-circle "></span></a></span></i>
                                                          </div><br />
                                                          <div class="input-group">
                                                                <i class="input-group-addon" data-toggle="popover" title="Attach File Third" ><span  style="font-size: 17px;" >5.</span></a></i>
                                                                <input type="file" class="form-control" name="File5" id="file5" onchange="changestate()"/>
                                                                <i class="input-group-addon" data-toggle="popover" title="" id="ideattachfile5"><span  style="font-size: 17px;" ><a href="javascript:void(0)" class="deattach" id="deattachfile5" style="pointer-events:none; color:maroon;" onclick="deleteattach('file5')"><span class="glyphicon glyphicon-remove-circle "></span></a></span></i>
                                                          </div><br />
                                                    </div>
                         	                      </p> 
                                                </div>
                                      <div class="modal-footer">
                                      <span style="float: left;">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                				            <input type="button" class="btn btn-primary " id="attachmore" value="Attach More Files" onclick="changetext()"/>
                                			             </a></span>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                        <button type="button" class="btn btn-success" data-dismiss="modal" id="attach" onclick="addText()">Attach</button>
                                      
                                      </div>
                                    </div>
                                
                                  </div>
                                </div>
                              </div><!-- div class=col-md-10 closed -->
                            
                            
                            </div><!-- fromgroup for attached file closed -->
                            
                    
                    </div>
                </div>
            </div>
    </div>
        <div class="col-md-2"></div>
        </form>
</div>
</div>
</body>
</html>

<script>
function validateSend(){
    if(document.getElementById('to').value==""){
         bootbox.alert("<div class=errormessage><br />Sender 's <B>Email-Address</b> can't be empty</div>");
         $('#to').val("");
         return;
    }
    if(document.getElementById('to').value.length<15){
        bootbox.alert("<div class=errormessage><br />Invalid Sender 's<B>Email-Address</b></div>");
        $('#to').val("");
         return;
    }
    if(document.getElementById('subject').value==""){
         bootbox.alert("<div class=errormessage><br />There must be a <B>Subject</b> for a mail</div>");
         return;
    }
    if(document.getElementById('body').value==""){
         bootbox.alert("<div class=errormessage><br />There must be a <B>Body</b> for a mail</div>");
         return;
    }
    document.getElementById('phpForm').action="adminnewmail1.php";
    document.getElementById('phpForm').submit();
    
}

function validateSave(){
     if(document.getElementById('file1').value.length>0){
        bootbox.alert("<div class=errormessage><br />Cannot save a message with a attached file<br /><span class=infomessage>Kindly <strong>De-Attach</strong> File for save a Mail</span></div>");
         return;
        }
     else if(document.getElementById('file2').value.length>0){
        bootbox.alert("<div class=errormessage><br />Cannot save a message with a attached file<br /><span class=infomessage>Kindly <strong>De-Attach</strong> File for save a Mail</span></div>");
         return;
        }
     else if(document.getElementById('file3').value.length>0){
        bootbox.alert("<div class=errormessage><br />Cannot save a message with a attached file<br /><span class=infomessage>Kindly <strong>De-Attach</strong> File for save a Mail</span></div>");
         return;
        }
     else if(document.getElementById('file4').value.length>0){
        bootbox.alert("<div class=errormessage><br />Cannot save a message with a attached file<br /><span class=infomessage>Kindly <strong>De-Attach</strong> File for save a Mail</span></div>");
         return;
        }
     else if(document.getElementById('file5').value.length>0){
        bootbox.alert("<div class=errormessage><br />Cannot save a message with a attached file<br /><span class=infomessage>Kindly <strong>De-Attach</strong> File for save a Mail</span></div>");
         return;
        }
     else if(document.getElementById('to').value=="" && document.getElementById('body').value=="" && document.getElementById('subject').value=="")
     {
        bootbox.alert("<div class=errormessage><br />Unable to save a <strong>blank </strong>message</div>");
         return;
     }
     else{
    $.post("adminsavemail1.php",$('#phpForm').serialize(),
            function(res){
                    
                    if(res=="OK")
                    {bootbox.confirm("<div class=successmessage><br />Mail saved Successfully.....<br /><div class=infomessage>Do you want to send more <strong>Mail</strong>? </div></div>",function(r){
                        if(r==true){
                            window.location="adminnewmail.php";
                         }
                         else
                         {  
                            window.location="s_admin.php";
                         }
                    }); 
                    }
                    else{
                        bootbox.alert(res);
                    }
                                   
            });
    }
    
}
function resetall(){
    
    $('#to').val("");
    $('#body').val("");
    $('#subject').val("");
    $('#file1').val("");
    $('#file2').val("");
    $('#file3').val("");
    $('#file4').val("");
    $('#file5').val("");
    addText();
}
function deattachselected(str){
    
    if(str=="file1"){
    $('#file1').val("");
        }
     else if(str=="file2"){
    $('#file2').val("");
       }
     else if(str=="file3"){
    $('#file3').val("");
       }
     else if(str=="file5"){
    $('#file5').val("");
       }
     else if(str=="file4"){
    $('#file4').val("");
       }
     
    addText();
}
function deleteattach(str){
    if(str=="file1"){
    $('#file1').val("");
     $("#deattachfile1").attr("style", "pointer-events:none; color:maroon;");
        }
     else if(str=="file2"){
    $('#file2').val("");
     $("#deattachfile2").attr("style", "pointer-events:none; color:maroon;");
        }
     else if(str=="file3"){
    $('#file3').val("");
     $("#deattachfile3").attr("style", "pointer-events:none; color:maroon;");
        }
     else if(str=="file5"){
    $('#file5').val("");
     $("#deattachfile5").attr("style", "pointer-events:none; color:maroon;");
        }
     else if(str=="file4"){
    $('#file4').val("");
     $("#deattachfile4").attr("style", "pointer-events:none; color:maroon;");
        }
     
    changestate();
        
}
function changestate(){
    if(document.getElementById('file1').value.length>0){
        $('#deattachfile1').removeAttr("style");
        $("#ideattachfile1").attr("title", "Remove the seleced File");
        }
    else if(document.getElementById('file1').value==""){
        $("#ideattachfile1").attr("title", "First, please Choose a file");
        }
    if(document.getElementById('file2').value.length>0){
        $('#deattachfile2').removeAttr("style");
        $("#ideattachfile2").attr("title", "Remove the seleced File");
        }
    else if(document.getElementById('file2').value==""){
        $("#ideattachfile2").attr("title", "First, please Choose a file");
        }
    if(document.getElementById('file3').value.length>0){
        $('#deattachfile3').removeAttr("style");
        $("#ideattachfile3").attr("title", "Remove the seleced File");
        }
    else if(document.getElementById('file3').value==""){
        $("#ideattachfile3").attr("title", "First, please Choose a file");
        }
    if(document.getElementById('file4').value.length>0){
        $('#deattachfile4').removeAttr("style");
        $("#ideattachfile4").attr("title", "Remove the seleced File");
        }
    else if(document.getElementById('file4').value==""){
        $("#ideattachfile4").attr("title", "First, please Choose a file");
        }
    if(document.getElementById('file5').value.length>0){
        $('#deattachfile5').removeAttr("style");
        $("#ideattachfile5").attr("title", "Remove the seleced File");
        }
    else if(document.getElementById('file5').value==""){
        $("#ideattachfile5").attr("title", "First, please Choose a file");
        }
    
}
function addText()
{   
    if(document.getElementById('file1').value=="" && document.getElementById('file2').value=="" && document.getElementById('file3').value=="" && document.getElementById('file4').value=="" && document.getElementById('file5').value=="")
    {document.getElementById('moretext').innerHTML = "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal'  title='Attach a File'> <span class='glyphicon glyphicon-paperclip'></span> Attach File</button>&nbsp;<span style='color: #000d1d;'><b>Attached File : </b></span><span style='color: red;'><b>No file chosen</b></span>";
    }
    else{
        
        var str=""; var filename="";
        var count=0;
        var s="";
        if(document.getElementById('file1').value.length>0){
            count=count+1;
            filename=document.getElementById('file1').value;
            str="<span style='color:#000d1d; font-weight:bold;'>"+count+". )&nbsp;</span>";
            str = str.concat(filename.replace(/^.*[\\\/]/, ''));
            str=str.concat(" <a href='javascript:void(0)' class='a1deattach' data-toggle='popover' title='De-Attach the Selected file' onclick=deattachselected('file1') ><span class='glyphicon glyphicon-trash'></span></a><br /> ");
            
        }
        if(document.getElementById('file2').value.length>0){
            count=count+1;
             filename="";
            filename=document.getElementById('file2').value;
            str=str.concat("<span style='color:#000d1d; font-weight:bold;'>"+count+". )&nbsp;</span>");
            str = str.concat(filename.replace(/^.*[\\\/]/, ''));
            str=str.concat(" <a href='javascript:void(0)' class='a1deattach' data-toggle='popover' title='De-Attach the Selected file' onclick=deattachselected('file2') ><span class='glyphicon glyphicon-trash'></span></a><br /> ");
            
            
        }
        if(document.getElementById('file3').value.length>0){
            filename="";
            count=count+1;
            filename=document.getElementById('file3').value;
            str=str.concat("<span style='color:#000d1d; font-weight:bold;'>"+count+". )&nbsp;</span>");
            str = str.concat(filename.replace(/^.*[\\\/]/, ''));
            str=str.concat(" <a href='javascript:void(0)' class='a1deattach' data-toggle='popover' title='De-Attach the Selected file' onclick=deattachselected('file3') ><span class='glyphicon glyphicon-trash'></span></a><br /> ");
            
            
        }
         if(document.getElementById('file4').value.length>0){
            filename="";
            count=count+1;
            filename=document.getElementById('file4').value;
            str=str.concat("<span style='color:#000d1d; font-weight:bold;'>"+count+". )&nbsp;</span>");
            str = str.concat(filename.replace(/^.*[\\\/]/, ''));
            str=str.concat(" <a href='javascript:void(0)' class='a1deattach' data-toggle='popover' title='De-Attach the Selected file' onclick=deattachselected('file4') ><span class='glyphicon glyphicon-trash'></span></a><br /> ");
            
            
        }
        if(document.getElementById('file5').value.length>0){
            count=count+1;
            filename="";
            filename=document.getElementById('file5').value;
            str=str.concat("<span style='color:#000d1d; font-weight:bold;'>"+count+". )&nbsp;</span>");
            str = str.concat(filename.replace(/^.*[\\\/]/, ''));
            str=str.concat(" <a href='javascript:void(0)' class='a1deattach' data-toggle='popover' title='De-Attach the Selected file' onclick=deattachselected('file5') ><span class='glyphicon glyphicon-trash'></span></a><br /> ");
            
            
        }
        str=str.substr(0,str.length-2);
        if(count==5){
            document.getElementById('moretext').innerHTML = "<button type='button' title='De-Attach all the attached File' data-toggle='popover' class='btn btn-danger' onclick='deattachall()'> <span class='glyphicon glyphicon-scissors'></span>&nbsp; De-attach All </button>&nbsp;<span style=''><span style='color: #000d1d;'><b>Attached File : </b></span></span><span style='color: #266ff3; float:right; margin-right:50px;'><b>"+str+"</b></span>";
        }
        else if(count==3 || count==4){
                document.getElementById('moretext').innerHTML = "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal' title='Attach More File'> <span class='glyphicon glyphicon-paperclip'></span> Attach More File 's </button>&nbsp;<span style=''><span style='color: #000d1d;'><b>Attached File : </b></span></span><span style='color: #266ff3; float:right; margin-right:50px;'><b>"+str+"</b></span><br /><br /><span style='float:left'><button type='button' title='De-Attach all the attached File' data-toggle='popover' class='btn btn-danger' onclick='deattachall()'> <span class='glyphicon glyphicon-scissors'></span>&nbsp; De-attach All </button>&nbsp;</span>";
        
        }
        else{
    document.getElementById('moretext').innerHTML = "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal' title='Attach More File'> <span class='glyphicon glyphicon-paperclip'></span> Attach More File 's </button>&nbsp;<span style=''><span style='color: #000d1d;'><b>Attached File : </b></span></span><span style='color: #266ff3; float:right; margin-right:50px;'><b>"+str+"</b></span>";
        }
    }
}
function changetext(){  // do something…
 var attach=document.getElementById("attachmore");
 if(attach.value=="Attach More Files")
 attach.value="Attach Less Files";
else if(attach.value=="Attach Less Files")
 attach.value="Attach More Files";

  }
 function deattachall(){
    
    $('#file1').val("");
    $('#file2').val("");
    $('#file3').val("");
    $('#file4').val("");
    $('#file5').val("");
    addText();
 } 
  </script>
  <?php 
  if(isset($_SESSION['send']) && isset($_SESSION['value'])){
    if($_SESSION['send']==1){
        if($_SESSION['value']=="OK"){
        ?><script>
            bootbox.confirm("<div class=successmessage><br />Mail Sent Successfully.....<br /><div class=infomessage>Do you want to send more ?</div></div>",function(res){
                if(res==true){
                    window.location="adminnewmail.php";
                }
                else{
                    window.location="s_admin.php";
                }
            });
        </script>
    <?php }
    else if($_SESSION['value']=="NOK1"){
        ?><script>
            bootbox.alert("<div class=errormessage><br />Unable to upload file ( Size of File is too large... )<br /><div class=infomessage>Problem with the file is :<span style='color:#000d1d;'>  <?php echo " ".$_SESSION['filename'] ?></span></div>");
        </script>
    <?php }
    else if($_SESSION['value']=="NOK"){
        ?><script>
            bootbox.alert("<div class=errormessage><br />Problem occuring while <b>sending a Mail</b></div>");
        </script>
    <?php }
    else {
        ?><script>
            bootbox.alert("<div class=errormessage><br />Problem occuring while <b>sending a Mail</div>");
        </script>
    <?php }
    }
    $_SESSION['value']=" ";$_SESSION['send']=" ";
    unset($_SESSION['value']);unset($_SESSION['send']);
  }
 ?>