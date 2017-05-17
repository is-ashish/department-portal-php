<?php

session_start();
if(!isset($_SESSION['utname'])){
    header("location:teacherlogin.php");
    die();
}
if(!isset($_SESSION['utid'])){
    header("location:teacherlogin.php");
    die();
} 
include("connection.php");
include("dateformat.php");
$query="SELECT DATE,SNO,TITLE,CONTENT FROM NOTICEMAS where createby='Admin' and status='1' and output in ('Both','Faculty') order by date desc";

$result=mysqli_query($link,$query);
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
</style> 
   
</head>

<body>
<?php 
include('tcsuc_header.php');?>
<br /><br /><br /><br /><br /><br />
<form id="phpForm" name="phpForm" method="post">
<input type="hidden" id="sno" name="Sno" />
<div class="container-fluid">
<div class="panel panel-success"> 
    <div class="bgcolor">    
    <div class="panel-heading">
        <h3>Notice Database</h3>
    </div>
    </div>

    <div class="panel-body">
        
       <div class="row">
            <div class="col-md-12">
                <?php
                    if(mysqli_affected_rows($link)>0){
                ?>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="bg-info">
                          <tr>
                                <th style="width: 20px;"></th>
                                <th >Title</th>
                                <th >Content</th>
                                <th>Create By</th>
                                <th >Created On</th>
                                
                            </tr>
                        </thead>
                        <tbody class="bg-warning"> 
                        <?php
                        while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            echo "<tr>";
                            echo "<td>";
                            echo "<a href='teacherreadnotice.php?".rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand()."&sno=$data[SNO]&title=$data[TITLE]&code=".rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand()."'><input type=button class='btn btn-info' value='Read'/></a>";
                            echo "</td>";
                            echo "<td><span class='more'>$data[TITLE]</span></td>";
                            echo "<td><span class='more'>$data[CONTENT]</span></td>";
                             echo "<td>Admin</td>";
                            echo "<td>".dateformat($data['DATE'])."</td>";
                            echo "</tr>";
                        }
                        ?>
                        
                        </tbody>
                        <tfoot class="bg-info">
                        
                            <tr>
                                <th></th>
                                <th>Title</th>
                                <th >Content</th>
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