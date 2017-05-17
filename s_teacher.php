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
?>

<!DOCTYPE HTML>
<html>
<head>

	<meta name="viewport" content="width=device-width,inital-scale=1" />
	<title>STUDENT_DASHBOARD</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    
     <style>
     
 .a1:link{
    color: #266ff3;
    font-weight:bold;
    font-size:16px;
}
.a1:visited{
    color: black;
    font-weight:bold;
}
.a1:hover{
     color: #266ff3;
    font-weight:bold;
}

.a1:active{
     color: #266ff3;
    font-weight:bold;
} 
.a2:link{
    color: #266ff3;
    font-weight:bold;
    font-size:18px;
}
.a2:visited{
    color: #266ff3;
    font-weight:bold;
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
<?php  include('tcsuc_header.php');
       include('connection.php');
       include('countpendingmail1.php');?>
<br /><br /><br /><br />
<br /><br /><br />
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary" >
                <div class="bgcolor">
                    <div class=" panel-heading "> 
                    <h3 >Notice</h3>
                    
                        
                    </div>
                </div>
            <div class="panel-body" ><br />
            <div class="row">
            <div class="col-md-12 visible-xs">
                <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                            <a href="t_addnotice.php" type="button" class="btn btn-success">Add a Notice</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                 <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <a href="teachernoticedb.php" type="button" class="btn btn-primary">Edit a Notice</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                            <a href="teachernoticedb.php" type="button" class="btn btn-danger">Delete a Notice</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                            <a href="teachernoticedb.php" type="button" class="btn btn-warning">Show Notice Board</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <!-- for sm devices-->
            
            <div class="col-md-12 visible-sm">
                <a href="t_addnotice.php" type="button" class="btn btn-success">Add a Notice</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="teachernoticedb.php" type="button" class="btn btn-primary">Edit a Notice</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="teachernoticedb.php" type="button" class="btn btn-danger">Delete a Notice</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="teachernoticedb.php" type="button" class="btn btn-warning">Show Notice Board</a>
            
            </div>
            <div class="col-md-12 visible-md">
                <a href="t_addnotice.php" type="button" class="btn btn-success">Add Notice</a>
            <a href="teachernoticedb.php" type="button" class="btn btn-primary">Edit Notice</a>
            <a href="teachernoticedb.php" type="button" class="btn btn-danger">Delete Notice</a>
            <a href="teachernoticedb.php" type="button" class="btn btn-warning">Show Notice</a>
            
            </div>
            <div class="visible-lg">
                <div class="col-md-12">
                            <a href="t_addnotice.php" type="button" class="btn btn-success">Add a Notice</a>
                            <a href="teachernoticedb.php" type="button" class="btn btn-primary">Edit a Notice</a>
                    
                            <a href="teachernoticedb.php" type="button" class="btn btn-danger">Delete a Notice</a>
                
                            <a href="teachernoticedb.php" type="button" class="btn btn-warning">Show Notice Board</a>
                </div>
                
            </div>
            </div><br />
            </div>
        </div>
    </div>
   <?php
   $query="select FOURTHYEAR,THIRDYEAR,SECONDYEAR,FIRSTYEAR,TOTALSEATS from studentcount";
   $result=mysqli_query($link,$query);
   if(mysqli_affected_rows($link)>0){
   $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
     $mul=(100/$data['TOTALSEATS'])*$data['FOURTHYEAR'];
        $four=intval($mul)."%";     
     $mul=(100/$data['TOTALSEATS'])*$data['THIRDYEAR'];
        $third=intval($mul)."%";
      $mul=(100/$data['TOTALSEATS'])*$data['SECONDYEAR'];
        $second=intval($mul)."%";
      $mul=(100/$data['TOTALSEATS'])*$data['FIRSTYEAR'];
        $first=intval($mul)."%";
      $show4="$data[FOURTHYEAR] / $data[TOTALSEATS]";
      $show3="$data[THIRDYEAR] / $data[TOTALSEATS]";
      $show2="$data[SECONDYEAR] / $data[TOTALSEATS]";
      $show1="$data[FIRSTYEAR] / $data[TOTALSEATS]";
      }
   ?>     
        <div class="col-md-6">
            <div class="panel panel-primary" >
                <div class="bgcolor">
                    <div class=" panel-heading "> 
                        <h3 >Admin Notice Board</h3>
                    </div>
                </div>
            <div class="panel-body" >
             <div class="row">
                        <ul>
                        <?php 
                        $query="select sno,title from noticemas where createby='Admin' and status='1' and output in ('Both','Faculty') order by sno desc;";
                        $result=mysqli_query($link,$query);
                        if(mysqli_affected_rows($link)>0){
                            $c=0;
                            while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                ?>
                                <li>
                                    <a class="a1" href="<?php echo "teacherreadnotice.php?".rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand()."&sno=$data[sno]&title=$data[title]&code=".rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand(); ?>"><?php echo $data['title'];?></a>
                                    
                                </li>
                                <?php
                                $c++;
                                if($c>2)
                                    break;
                           }
                        if($c==1){
                                echo "<br /><br />";
                            }
                            else if($c==2){
                                echo "<br />";
                            }
                        $query="SELECT COUNT(sno) counter FROM noticemas where createby='Admin' and status='1' and output in ('Both','Faculty');";
                        $result=mysqli_query($link,$query);
                        if(mysqli_affected_rows($link)==1)
                        {
                            $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                            if($data['counter']>3){
                                $f=1;
                        ?>   <a href="teachernoticedb.php" class="a2" style="float: right;margin-right: 10px; "><span style="text-decoration: underline;">More</span>...</a>
                         <?php
                         }
                         }
                         }
                         else{
                            echo "<br /><marquee behavior=alternate width=182px loop=10 ><div class=errormessage>No Notice to display</div></marquee><div class=errormessage><br /><br /></div>";
                        }
                         ?>      
                               </ul>
                 </div>
            </div>
        </div>
        </div>
   <div class="col-md-6">
            <div class="panel panel-primary" >
                <div class="bgcolor">
                    <div class=" panel-heading "> 
                       <div class="row">
                    <div class="col-xs-3"><h3 >Mails</h3></div><div class="col-md-5"></div>
                    <span class="col-md-9 visible-md" >
                    <span class="col-md-6"></span>
                    <span class="col-md-6">
                    <a href="admin-inbox.php"  style="margin-top: 13px; "  type="button" class="btn btn-info myhomebtn "><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp; Inbox</a><?php  if($pendingmailcount>0){?><sup><?php echo $pendingmailcount; ?></sup><?php } ?>
                    </span>
                    </span>
                    <span class="col-md-9 visible-lg" >
                   <span class="col-md-8"></span>
                    <a href="admin-inbox.php"  style="margin-top: 13px;"  type="button" class="btn btn-info myhomebtn "><span class="glyphicon glyphicon-envelope"></span> &nbsp;&nbsp;Inbox</a><?php  if($pendingmailcount>0){?><sup><?php echo $pendingmailcount; ?></sup><?php } ?>
                    </span>
                    <span class="col-sm-9 visible-sm" >
                    <span class="col-sm-8"></span>
                    <a href="admin-inbox.php"  style="margin-top: 13px; "  type="button" class="btn btn-info myhomebtn"><span class="glyphicon glyphicon-envelope"></span> &nbsp;&nbsp;Inbox</a><?php  if($pendingmailcount>0){?><sup><?php echo $pendingmailcount; ?></sup><?php } ?>
                    </span>
                    <span class="col-xs-9 visible-xs" ><span class="col-xs-12">
                    <a href="admin-inbox.php"  style="margin-top: 13px;"  type="button" class="btn btn-info myhomebtn"><span class="glyphicon glyphicon-envelope"></span> &nbsp;&nbsp;Inbox</a>
                    <?php  if($pendingmailcount>0){?><sup><?php echo $pendingmailcount; ?></sup><?php } ?>
                    </span></span>
                    </div>
                    </div>
                </div>
            <div class="panel-body" >
            <div class="row">
            <div class="col-md-12 visible-xs">
                <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                            <a href="teachernewmail.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;Compose</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                 <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <a href="admindraft.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-book"></span> &nbsp;Drafts</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                            <a href="adminsentmail.php" type="button" class="btn btn-info"><span class="glyphicon glyphicon-send"></span> &nbsp;Sent Mail</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                            <a href="adminnoticedb.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-star-empty"></span> &nbsp;Starred Mail's</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <!-- for sm devices-->
            
            <div class="col-md-12 visible-sm">
                <a href="teachernewmail.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;Compose</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="admindraft.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-book"></span> &nbsp;Drafts</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="adminsentmail.php" type="button" class="btn btn-info"><span class="glyphicon glyphicon-send"></span> &nbsp;Sent Mail</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="adminnoticedb.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-star-empty"></span> &nbsp;Starred Mail's</a>
            
            </div>
            <div class="col-md-12 visible-md">
                <a href="teachernewmail.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;Compose</a>
            <span style="float: right; margin-right: 90px;">      
             <a href="admindraft.php" type="button" class="btn btn-primary btn-block">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-book"></span> &nbsp;&nbsp;&nbsp;&nbsp;Drafts&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </span><br /><br />
            <a href="adminsentmail.php" type="button" class="btn btn-info"><span class="glyphicon glyphicon-send"></span> &nbsp;Sent Mail</a>
            <span style="float: right; margin-right: 90px;">  
            <a href="adminnoticedb.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-star-empty"></span> &nbsp;Starred Mail's</a>
            </span>
            </div>
            <div class="visible-lg">
                <div class="col-md-12">
                            <a href="teachernewmail.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;Compose</a>
                            <a href="admindraft.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-book"></span> &nbsp;Drafts</a>
                    
                            <a href="adminsentmail.php" type="button" class="btn btn-info"><span class="glyphicon glyphicon-send"></span> &nbsp;Sent Mail</a>
                
                            <a href="adminnoticedb.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-star-empty"></span> &nbsp;Starred Mail's</a>
                </div>
                
            </div>
            </div>
            
            
            
            </div>
        </div>
        </div>     
</div>

<br /><br /><br /><br />
<br /><br /><br /><br />
<br /><br /><br /><br />
<br /><br /><br /><br />
<br /><br /><br /><br />
<br /><br /><br /><br />
<br /><br /><br /><br />
<br /><br /><br /><br />
<br /><br /><br /><br />
</body>
</html>
<?php
if(isset($_SESSION['check']))
if($_SESSION['check']==true)
 
                {
                    $_SESSION['check']=false;
                    unset($_SESSION['check']);
                    echo '<script language="javascript">';
                    echo 'bootbox.alert("<div class=successmessage><br>Password updated successfully...!!!</div>")';
                    echo '</script>';
                }
 ?>