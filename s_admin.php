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
	<title>ADMIN_DASHBOARD</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
   
    </style>
    
    
</head>

<body>
<?php  include('suc_header.php'); 
       include('connection.php');
       include('countpendingnotice.php');
       include('countpendingmail.php');
?>

<br /><br /><br /><br /><br /><br />
<div class="container-fluid">
<div class="row ">
        <div class="col-md-6">
            <div class="panel panel-primary" >
                <div class="bgcolor">
                    <div class=" panel-heading "> 
                    <div class="row">
                    <div class="col-xs-3"><h3 >Notice</h3></div><div class="col-md-5"></div>
                    <span class="col-md-9 visible-md" >
                    <span class="col-md-5"></span>
                    <span class="col-md-7">
                    <a href="pendingnotice.php"  style="margin-top: 13px;"  type="button" class="btn btn-info myhomebtn" <?php if($pendingnoticecount==0) echo "disabled";?>>Pending Notice's
                        </a><?php  if($pendingnoticecount>0){?><sup><?php echo $pendingnoticecount; ?></sup><?php } ?></span>
                    </span>
                    <span class="col-md-9 visible-lg" >
                   <span class="col-md-7"></span>
                    <a href="pendingnotice.php"  style="margin-top: 13px;"  type="button" class="btn btn-info myhomebtn" <?php if($pendingnoticecount==0) echo "disabled";?>>Pending Notice's</a><?php  if($pendingnoticecount>0){?><sup><?php echo $pendingnoticecount; ?></sup><?php } ?>
                    </span>
                    <span class="col-sm-9 visible-sm" >
                    <span class="col-sm-8"></span>
                    <a href="pendingnotice.php"  style="margin-top: 13px;"  type="button" class="btn btn-info myhomebtn" <?php if($pendingnoticecount==0) echo "disabled";?>>Pending Notice's</a><?php  if($pendingnoticecount>0){?><sup><?php echo $pendingnoticecount; ?></sup><?php } ?>
                    </span>
                    <span class="col-xs-9 visible-xs" ><span class="col-xs-12">
                    <a href="pendingnotice.php"  style="margin-top: 13px;"  type="button" class="btn btn-info myhomebtn" <?php if($pendingnoticecount==0) echo "disabled";?>>Pending</a>
                    <?php  if($pendingnoticecount>0){?><sup><?php echo $pendingnoticecount; ?></sup><?php } ?>
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
                            <a href="a_addnotice.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;Add a Notice</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                 <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <a href="adminnoticedb.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> &nbsp;Edit a Notice</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                            <a href="adminnoticedb.php" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> &nbsp;Delete Notice</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                            <a href="adminnoticedb.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span> &nbsp;Notice Board</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <!-- for sm devices-->
            
            <div class="col-md-12 visible-sm">
                <a href="a_addnotice.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;Add a Notice</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="adminnoticedb.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> &nbsp;Edit Notice</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="adminnoticedb.php" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> &nbsp;Delete Notice</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="adminnoticedb.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span> &nbsp;Notice Board</a>
            
            </div>
            <div class="col-md-12 visible-md">
                <a href="a_addnotice.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;&nbsp;Add&nbsp; Notice&nbsp;&nbsp;</a>
            <span style="float: right; margin-right: 90px;">            <a href="adminnoticedb.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> &nbsp;&nbsp;Edit&nbsp; Notice&nbsp;</a>
            </span>

            <br /><br />
            <a href="adminnoticedb.php" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> &nbsp;Delete Notice</a>
            <span style="float: right; margin-right: 90px;">            
            <a href="adminnoticedb.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span> &nbsp;Notice Board</a>
            </span>
            </div>
            <div class="visible-lg">
                <div class="col-md-12">
                            <a href="a_addnotice.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;Add a Notice</a>
                            <a href="adminnoticedb.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> &nbsp;Edit Notice</a>
                    
                            <a href="adminnoticedb.php" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> &nbsp;Delete Notice</a>
                
                            <a href="adminnoticedb.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span> &nbsp;Notice Board</a>
                </div>
                
            </div>
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
                    <span class="col-md-8"></span>
                    <span class="col-md-4">
                    <a href="admin-inbox.php"  style="margin-top: 13px; font-size:18px;float:right;margin-right:10px;"  type="button" class="btn btn-info myhomebtn "><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp; Inbox
                        </a><?php  if($pendingmailcount>0){?><sup><?php echo $pendingmailcount; ?></sup><?php } ?></span>
                    </span>
                    <span class="col-md-9 visible-lg" >
                   <span class="col-md-9"></span>
                    <a href="admin-inbox.php"  style="margin-top: 13px; font-size:18px;float:right;margin-right:10px;"  type="button" class="btn btn-info myhomebtn "><span class="glyphicon glyphicon-envelope"></span> &nbsp;&nbsp;Inbox</a><?php  if($pendingmailcount>0){?><sup><?php echo $pendingmailcount; ?></sup><?php } ?>
                    </span>
                    <span class="col-sm-9 visible-sm" >
                    <span class="col-sm-8"></span>
                    <a href="admin-inbox.php"  style="margin-top: 13px; font-size:18px;float:right;margin-right:10px;"  type="button" class="btn btn-info myhomebtn"><span class="glyphicon glyphicon-envelope"></span> &nbsp;&nbsp;Inbox</a><?php  if($pendingmailcount>0){?><sup><?php echo $pendingmailcount; ?></sup><?php } ?>
                    </span>
                    <span class="col-xs-9 visible-xs" ><span class="col-xs-12">
                    <a href="admin-inbox.php"  style="margin-top: 13px;float:right;font-size:18px;margin-right:10px;"  type="button" class="btn btn-info myhomebtn"><span class="glyphicon glyphicon-envelope"></span> &nbsp;&nbsp;Inbox</a>
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
                            <a href="adminnewmail.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;Compose</a>
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
                <a href="adminnewmail.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;Compose</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="admindraft.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-book"></span> &nbsp;Drafts</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="adminsentmail.php" type="button" class="btn btn-info"><span class="glyphicon glyphicon-send"></span> &nbsp;Sent Mail</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="adminnoticedb.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-star-empty"></span> &nbsp;Starred Mail's</a>
            
            </div>
            <div class="col-md-12 visible-md">
                <a href="adminnewmail.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;Compose</a>
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
                            <a href="adminnewmail.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;Compose</a>
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
    </div>

<?php
   $query="select permanent,guest,total from teachercount";
   $result=mysqli_query($link,$query);
   $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
     $mul=(100/$data['total'])*$data['permanent'];
        $pr=intval($mul)."%";     
     $mul=(100/$data['total'])*$data['guest'];
        $gu=intval($mul)."%";
      
      $showp="$data[permanent] / $data[total]";
      $showg="$data[guest] / $data[total]";
   ?>   
   <div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary" >
                <div class="bgcolor">
                    <div class=" panel-heading "> 
                        <h3 >Available Teacher's</h3>
                    </div>
                </div>
            <div class="panel-body" >
                 <div class="row">
                     <div class="col-md-12">
                     <label class="control-label">No. of permanent teacher :  <?php  echo $pr; 
                                                                                    if($data['permanent']<=1) 
                                                                                    echo " &nbsp;( $showp )"; 
                                                                                    
                                                                            ?></label>
                     </div>
                 </div>
                 
                 <div class="visible-md"><br /></div>
                 <div class="row">
                     <div class="col-md-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                                aria-valuenow="<?php echo $data['permanent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php  echo $pr; ?>; font-weight:bold; ">
                                <?php 
                                    if($data['permanent']>1) 
                                        echo "$showp";
                               ?>
                            </div>                
                        </div>
                     </div>
                 </div>
                 
                 <div class="visible-md"><br /><br /></div>
                 <div class="row">
                     <div class="col-md-12">
                     <label class="control-label">No. of guest teacher : <?php  echo $gu; 
                                                                                    if($data['guest']<=1) 
                                                                                    echo " &nbsp;( $showg )"; 
                                                                                    
                                                                            ?></label>
                     </div>
                 </div>
                 <div class="visible-md"><br /></div>
                 <div class="row">
                     <div class="col-md-12">
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active progress-bar-warning" role="progressbar"
                                aria-valuenow="<?php echo $data['guest']; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php  echo $gu; ?>; font-weight:bold; ">
                                <?php 
                                    if($data['guest']>1) 
                                        echo "$showg";
                               ?>
                            </div>                
                        </div>
                     </div>
                 </div>
                 
            </div>
            </div>
        </div>

   <?php
   $query="select FOURTHYEAR,THIRDYEAR,SECONDYEAR,FIRSTYEAR,TOTALSEATS from studentcount";
   $result=mysqli_query($link,$query);
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
   ?>     
        <div class="col-md-6">
            <div class="panel panel-primary" >
                <div class="bgcolor">
                    <div class=" panel-heading "> 
                        <h3 >Registered Student's</h3>
                    </div>
                </div>
            <div class="panel-body" >
             <div class="row">
                     <div class="col-md-6">
                     <label class="control-label">No. of 4th year students: <span class="visible-md"><br /></span> <?php  echo $four; 
                                                                                    if($data['FOURTHYEAR']<8) 
                                                                                    echo " &nbsp;($show4)"; 
                                                                                    
                                                                            ?>
                     </label>
                     <div class="progress">
                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                                aria-valuenow="<?php echo $data['FOURTHYEAR']; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php  echo $four; ?>;  font-weight:bold;" >
                                <?php 
                                    if($data['FOURTHYEAR']>=8) 
                                        echo "$show4";
                               ?>
                            </div>                
                        </div>
                     </div>
                     <div class="col-md-6">
                     <label class="control-label">No. of 3rd year students: <span class="visible-md"><br /></span><?php  echo $third;
                                                                                    if($data['THIRDYEAR']<8) 
                                                                                    echo " &nbsp;($show3)"; 
                                                                                    
                                                                            ?>
                     </label>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active " role="progressbar"
                                aria-valuenow="<?php echo $data['THIRDYEAR']; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php  echo $third; ?>;  font-weight:bold;">
                                <?php 
                                    if($data['THIRDYEAR']>=8) 
                                        echo "$show3";
                               ?>
                            </div>                
                        </div>
                     </div>
                 </div>
                 
                 <div class="row">
                     <div class="col-md-6">
                     <label class="control-label">No. of 2nd year students: <span class="visible-md"><br /></span><?php  echo $second;
                                                                                    if($data['SECONDYEAR']<8) 
                                                                                    echo "&nbsp;($show2)"; 
                                                                                    
                                                                            ?>
                     </label>
                     <div class="progress">
                            <div class="progress-bar progress-bar-striped active " role="progressbar"
                                aria-valuenow="<?php  echo $data['SECONDYEAR']; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php  echo $second; ?>">
                               <?php 
                                    if($data['SECONDYEAR']>=8) 
                                        echo "$show2";
                               ?>
                            </div>                
                        </div>
                     </div>
                     <div class="col-md-6">
                     <label class="control-label">No. of 1st year students: <span class="visible-md"><br /></span><?php  echo $first;
                                                                                    if($data['FIRSTYEAR']<8) 
                                                                                    echo " &nbsp;($show1)"; 
                                                                                    
                                                                            ?>
                     </label>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped active " role="progressbar"
                                aria-valuenow="<?php  echo $data['FIRSTYEAR']; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php  echo $first; ?>">
                                <?php 
                                    if($data['FIRSTYEAR']>=8) 
                                        echo "$show1";
                               ?>
                            </div>                
                        </div>
                    
                     </div>
                 </div>
                 
            </div>
        </div>
        </div>
        </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary" >
                <div class="bgcolor">
                    <div class=" panel-heading "> 
                        <h3 >Student</h3>
                    </div>
                </div>
            <div class="panel-body" >
            
            <div class="row">
            <div class="col-md-12 visible-xs">
                <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                            <a href="adminstudentreg.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;&nbsp;&nbsp;Add &nbsp;Student&nbsp;&nbsp;&nbsp;</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                 <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <a href="admindb.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> &nbsp;&nbsp;&nbsp;Edit &nbsp;Student&nbsp;&nbsp;&nbsp;</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                            <a href="admindb.php" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> &nbsp;&nbsp;Delete Student&nbsp;</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                            <a href="admindb.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;&nbsp;Show Database</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <!-- for sm devices-->
            
            <div class="col-md-12 visible-sm">
                <a href="adminstudentreg.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;Add Student</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="admindb.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> &nbsp;Edit Student</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="admindb.php" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> &nbsp;Delete Student</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="admindb.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span> &nbsp;Show Database</a>
            
            </div>
            <div class="col-md-12 visible-md">
            <span class="col-md-6">
                <a href="adminstudentreg.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;&nbsp;&nbsp;Add&nbsp; &nbsp;Student&nbsp;&nbsp;</a></span> <span class="col-md-6">
            <a href="admindb.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> &nbsp;&nbsp;Edit &nbsp;Student &nbsp;Record&nbsp;</a></span><br /> <br /><span class="col-md-6"> 
            
            <a href="admindb.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span> &nbsp;Show Database</a></span><span class="col-md-6">
            <a href="admindb.php" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> &nbsp;Delete Student Record</a></span>
            
            </div>
            <div class="visible-lg">
                <div class="col-md-12">
                            <a href="adminstudentreg.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;Add Student</a>
                            <a href="admindb.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> &nbsp;Edit Student</a>
                    
                            <a href="admindb.php" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> &nbsp;Delete Student</a>
                
                            <a href="admindb.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span> &nbsp;Database</a>
                </div>
                
            </div>
            </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
            <div class="panel panel-primary" >
                <div class="bgcolor">
                    <div class=" panel-heading "> 
                        <h3 >Staff / Teacher</h3>
                    </div>
                </div>
            <div class="panel-body" >
            
            <div class="row">
            <div class="col-md-12 visible-xs">
                <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                            <a href="adminteacherreg.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;&nbsp;&nbsp;Add &nbsp;Faculty&nbsp;&nbsp;&nbsp;</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                 <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <a href="admindb1.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> &nbsp;&nbsp;&nbsp;Edit &nbsp;Faculty&nbsp;&nbsp;&nbsp;</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                            <a href="admindb1.php" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> &nbsp;Delete &nbsp;Faculty&nbsp;</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="col-md-3">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                            <a href="admindb1.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span> &nbsp;Show Database</a>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <!-- for sm devices-->
            
            <div class="col-md-12 visible-sm">
                <a href="adminteacherreg.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;Add Faculty</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="admindb1.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> &nbsp;Edit Faculty</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="admindb1.php" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> &nbsp;Delete Faculty</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="admindb1.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span> &nbsp;Show Database</a>
            
            </div>
            <div class="col-md-12 visible-md">
            <span class="col-md-6">
                <a href="adminteacherreg.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;&nbsp;Add&nbsp;&nbsp; Faculty&nbsp;&nbsp;&nbsp;</a></span> <span class="col-md-6">
            <a href="admindb1.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> &nbsp;&nbsp;Edit&nbsp; Faculty &nbsp;Record&nbsp;</a></span><br /> <br /><span class="col-md-6"> 
            <a href="admindb1.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span> &nbsp;Show Database</a></span><span class="col-md-6">
            <a href="admindb1.php" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> &nbsp;Delete Faculty Record</a></span>
            
            </div>
            <div class="visible-lg">
                <div class="col-md-12">
                            <a href="adminteacherreg.php" type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> &nbsp;Add Faculty</a>
                            <a href="admindb1.php" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> &nbsp;Edit Faculty</a>
                    
                            <a href="admindb1.php" type="button" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> &nbsp;Delete Faculty</a>
                
                            <a href="admindb1.php" type="button" class="btn btn-warning"><span class="glyphicon glyphicon-list"></span> &nbsp;Database</a>
                </div>
                
            </div>
            </div>
            </div>
        </div>
    </div>
    </div>
</div>

</body>
</html>