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
	<title>NOTICE_DATABASE</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
   <style type="text/css">
   .morecontent span {
    display: none;
}
.morelink{
  display: block;  
}
 .a1 {
    color: #266ff3;
    font-weight:bold;
}
.a1:visited {
    color: #266ff3;
    
    font-weight:bold;
}


.a1.morelink {
    text-decoration:none;
    outline: none;
}
hr{
    width:95%;
    background-color:#CCC;
    color:#CCC;
}
sup{
        border:1px solid red;
        background-color:red;
        width:20px;
        height:20px;
        border-radius: 50%;
        font-size:14px;
        color:white;
    }
</style> 
   
</head>

<body>
<?php 
include('suc_header.php');

include("connection.php");
include('countpendingnotice.php');


include("dateformat.php");
$query="SELECT DATE,SNO,TITLE,CONTENT,STATUS,OUTPUT,CREATEBY,SENDERNAME,SENDERID FROM NOTICEMAS where status='1' order by date desc";
$result=mysqli_query($link,$query);
?>
<br /><br /><br /><br /><br /><br />
<form id="phpForm" name="phpForm" method="post" action="adminnoticedb.php">
<input type="hidden" id="sno" name="Sno" />
<div class="container-fluid">
<div class="panel panel-success"> 
    <div class="bgcolor">    
    <div class="panel-heading">
       <div class="row">
                    <div class="col-xs-3"><h3 >Notice Database</h3></div><div class="col-md-5"></div>
                    <span class="col-md-9 visible-md" >
                    <span class="col-md-8"></span>
                    <span class="col-md-4">
                    <a href="pendingnotice.php"  style="margin-top: 13px;"  type="button" class="btn btn-info myhomebtn">Pending Notice's
                        </a><?php  if($pendingnoticecount>0){?><sup><?php echo $pendingnoticecount; ?></sup><?php } ?></span>
                    </span>
                    <span class="col-md-9 visible-lg" >
                   <span class="col-md-9"></span>
                    <a href="pendingnotice.php"  style="margin-top: 13px;"  type="button" class="btn btn-info myhomebtn">Pending Notice's</a><?php  if($pendingnoticecount>0){?><sup><?php echo $pendingnoticecount; ?></sup><?php } ?>
                    </span>
                    <span class="col-sm-9 visible-sm" >
                    <span class="col-sm-8"></span>
                    <a href="pendingnotice.php"  style="margin-top: 13px;"  type="button" class="btn btn-info myhomebtn">Pending Notice's</a><?php  if($pendingnoticecount>0){?><sup><?php echo $pendingnoticecount; ?></sup><?php } ?>
                    </span>
                    <span class="col-xs-9 visible-xs" ><span class="col-xs-12">
                    <a href="pendingnotice.php"  style="margin-top: 13px;"  type="button" class="btn btn-info myhomebtn">Pending</a>
                    <?php  if($pendingnoticecount>0){?><sup><?php echo $pendingnoticecount; ?></sup><?php } ?>
                    </span></span>
                    </div>
    </div>
    </div>

    <div class="panel-body">
        <!-- <div class="row">
            <div class="col-md-2">
                <input type="text" id="tid" name="Tid" placeholder="Search by Teacher id" class="form-control" />
            </div>
            <div class="col-md-2">
                <input type="text" id="name" name="Name" placeholder="Search by name" class="form-control" />
            </div>
            <div class="col-md-2">
                <input type="text" id="joinyear" name="Joinyear" placeholder="Search by joining year" class="form-control" />
            </div>
            
            <div class="col-md-2">
                <input type="button" onclick="search()" value="Search" class="btn btn-success" />
            </div>
        </div> -->
        <div class="row">&nbsp;
        <span class="hidden-lg hidden-md" ><hr /></span></div>
        <div class="row">
            <div class="col-md-2">
                <a href="a_addnotice.php" id="add" name="Add" class="btn btn-primary" style="color: white;">Add a Notice</a>
            </div>
            <span class="hidden-lg hidden-md"><br /></span>
            <?php
             if(mysqli_affected_rows($link)>0){
            ?>
            <div class="col-md-2">
                <a href="javascript:void(0)" id="edit" onclick="editnotice()" class="btn btn-warning">Edit a notice</a>
            </div>
            <span class="hidden-lg hidden-md"><br /></span>
            <div class="col-md-2">
                <a href="javascript:void(0)" id="delete" onclick="deletenotice()" class="btn btn-danger">Delete a notice</a>
            </div>
            <span class="hidden-lg hidden-md"><br /></span>
            <div class="col-md-2">
                <a href="javascript:void(0)" id="read" onclick="readnotice()" class="btn btn-info">View Full notice</a>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="row">&nbsp;</div>
       <div class="row">
            <div class="col-md-12">
                <?php
                    if(mysqli_affected_rows($link)>0){
                ?>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="bg-info">
                          <tr>
                                <th><input type="checkbox" id="header" onchange="checkAll(this)" /></th>
                                <th >Title</th>
                                <th >Content</th>
                                <th style="width:20px">Status</th>
                                <th style="width:20px">Show's to</th>
                                <th style="width:20px">Create By</th>
                                
                                <th >Created On</th>
                                
                            </tr>
                        </thead>
                        <tbody class="bg-warning"> 
                        <?php
                        while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            echo "<tr>";
                            echo "<td>";
                            echo "<input type=checkbox name=row[] value=$data[SNO] />";
                            echo "</td>";
                            echo "<td><span class='more'>$data[TITLE]</span></td>";
                            echo "<td><span class='more'>$data[CONTENT]</span></td>";
                            
                            if($data['STATUS']==1)
                            $status="Verified";
                            else
                            $status="&nbsp;&nbsp;&nbsp;Not Verified";;
                            
                            echo "<td>$status</td>";
                            echo "<td>$data[OUTPUT]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            echo "<td>$data[CREATEBY]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>";
                            
                            echo "<td>".dateformat($data['DATE'])."</td>";
                            echo "</tr>";
                        }
                        ?>
                        
                        </tbody>
                        <tfoot class="bg-info">
                        
                            <tr>
                                <th><input type="checkbox" id="footer" onchange="checkAll(this)" /></th>
                                <th>Title</th>
                                <th >Content</th>
                                <th>Status</th>
                                <th>Show's to</th>
                                <th>Create By</th>
                                <th>Created On</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <?php
                }
                else{
                ?>
                <div class="errormessage">
                    There is no record found
                </div>
                <?php
                }
                ?>
            </div>
       </div>
    </div>
</div>
</div>
</form>
</div>
</body>
</html>
<script>
function checkAll(chk){
    var ch=document.getElementsByName("row[]");
    for(var i=0;i<ch.length;i++){
        ch[i].checked=chk.checked;
    }
    
}

function readnotice(){
    var ch=document.getElementsByName("row[]");
    var count=0;
    for(var i=0;i<ch.length;i++){
        if(ch[i].checked){
            count++;
        }
    }
    if(count==0){
        bootbox.alert("<div class=errormessage><br />Please select one record</div>");
        return false;
    }
    if(count>1){
        bootbox.alert("<div class=errormessage><br />Can't read multiple Notice's at a time</div>");
        return false;
    }
    var val;
    for(var i=0;i<ch.length;i++){
        if(ch[i].checked){
            val=ch[i].value;
        }
    }
    bootbox.confirm("<div class=infomessage><br />Are you sure to read the notice ?<br /></div>",function(res){
        if(res==true){
            var sno=document.getElementById('sno');
            sno.value=val;
              phpForm.action="a_readnotice.php";
            phpForm.submit();
        }    
    });
    
}
function editnotice(){
    var ch=document.getElementsByName("row[]");
    var count=0;
    for(var i=0;i<ch.length;i++){
        if(ch[i].checked){
            count++;
        }
    }
    if(count==0){
        bootbox.alert("<div class=errormessage><br />Please select one record</div>");
        return false;
    }
    if(count>1){
        bootbox.alert("<div class=errormessage><br />Can't edit multiple records</div>");
        return false;
    }
    var val;
    for(var i=0;i<ch.length;i++){
        if(ch[i].checked){
            val=ch[i].value;
        }
    }
    bootbox.confirm("<div class=infomessage><br />Do you want to edit the selected Notice?</div>",function(res){
        if(res==true){
            var tid=document.getElementById('sno');
            tid.value=val;
              phpForm.action="a_editnotice.php";
            phpForm.submit();
        }    
    });
    
}

function deletenotice(){
    var ch=document.getElementsByName("row[]");
    var count=0;
    for(var i=0;i<ch.length;i++){
        if(ch[i].checked){
            count++;
        }
    }
    if(count==0){
        bootbox.alert("<div class=errormessage><br />Please select atleast one record</div>");
        return false;
    }
    var val="(";
    for(var i=0;i<ch.length;i++){
        if(ch[i].checked){
            val=val+"'"+ch[i].value+"',";
        }
    }
    val=val.substring(0, val.length - 1);
    val=val+")";
    bootbox.confirm("<div class=errormessage><br />Are you sure to delete the Notice's</div>",function(res){
        if(res==true){
            var rollno=document.getElementById('sno');
            rollno.value=val;
             $.post("a_deletenotice.php",$('#phpForm').serialize(),
            function(res){
                    bootbox.confirm(res,function(r){
                        if(r==true){
                            window.location="adminnoticedb.php";
                         }
                         else
                         {
                            window.location="adminnoticedb.php";  
                         }
                    }); 
                                   
            });
        }    
    });
}

// code for readmore and read less
$(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 85; // How many characters are shown by default
    var ellipsestext = " <span style='size:17px; font-weight:bold;'> .......</span>";
    var moretext = "Read more >>";
    var lesstext = "<< Read less";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink a1">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});


</script>