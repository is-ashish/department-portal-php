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
    </style>
    
    
</head>

<body vlink="black">
<?php  include('stusuc_header.php');
include('connection.php'); 
?>
<br /><br /><br /><br />
<div class="visible-lg">
<div class="row">
    <div   data-toggle="tooltip" data-placement="bottom" title="Complete your profile to unlock new features" style="position:fixed; right:0px; top:74px; float: left; z-index:999; width:470px;height: 40px;  border: 5px double #266ff3; background-color:#000d1d;">
              
                     <div class="col-md-4">
                     <span style="color: #d8f9ff; margin-left:10px; font-family:times monospace;size:17px">
                         <label style="margin:3px 0px;">Profile Completed :</label>
                    </span>
                    </div>
                     <div class="col-md-8">
                     
                        <div class="progress" style="margin:5px 0px; ">
                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%;  font-weight:bold;" >
                               40%
                            </div>                
                        </div>
                     </div>
                     </div>
                 
    </div>
</div>
</div>
<div class="visible-md">
    <div class="row">
    <div data-toggle="tooltip" data-placement="bottom" title="Complete your profile to unlock new features" style="position:fixed; right:0px; top:74px; float: left; z-index:999; width:470px;height: 40px;  border: 5px double #266ff3; background-color:#000d1d;">
              
                     <div class="col-md-4">
                     <span style="color: #d8f9ff; margin-left:10px; font-family:times monospace;size:17px">
                         <label style="margin:3px 0px;">Profile Completed :</label>
                    </span>
                    </div>
                     <div class="col-md-8">
                     
                        <div class="progress" style="margin:5px 0px; ">
                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%;  font-weight:bold;" >
                               40%
                            </div>                
                        </div>
                     </div>
                     </div>
                 
    </div>
</div>
</div>
<div class="visible-sm">
    <div class="row">
    <div data-toggle="tooltip" data-placement="bottom" title="Complete your profile to unlock new features" style="position:fixed; right:0px; top:74px; float: left; z-index:999; width:470px;height: 40px;  border: 5px double #266ff3; background-color:#000d1d;">
              
                     <div class="col-sm-4">
                     <span style="color: #d8f9ff; margin-left:10px; font-family:times monospace;size:17px">
                         <label style="margin:3px 0px;">Profile Completed :</label>
                    </span>
                    </div>
                     <div class="col-sm-8">
                     
                        <div class="progress" style="margin:5px 0px; ">
                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%;  font-weight:bold;" >
                               40%
                            </div>                
                        </div>
                     </div>
                     </div>
                 
    </div>
</div>
</div>
<div class="visible-xs">
      <div class="row">
    <div data-toggle="tooltip" data-placement="bottom" title="Complete your profile to unlock new features" style="position:absolute; left:0px;top:60px;   width:157px;height: 70px;  border: 5px double #266ff3; background-color:#000d1d;">
              
                     <div class="col-sm-4">
                     <span style="color: #d8f9ff;  font-family:times monospace;size:17px">
                         <label style="margin:3px 0px;">Profile Completed:</label>
                    </span>
                    </div>
                     <div class="col-sm-8">
                     
                        <div class="progress" style="margin:5px 0px; ">
                            <div class="progress-bar progress-bar-striped active" role="progressbar"
                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%;  font-weight:bold;" >
                               40%
                            </div>                
                        </div>
                     </div>
                     </div>
                 
    </div>
</div>
</div>
<br /><br /><br />
<div class="container-fluid">
    <div class="row">
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
                        $query="select sno,title from noticemas where createby='Admin' and status='1' and output in ('Both','Student') order by sno desc;";
                        $result=mysqli_query($link,$query);
                        if(mysqli_affected_rows($link)>0){
                            $c=0;
                            while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                ?>
                                <li>
                                    <a class="a1" href="<?php echo "studentreadnotice.php?".rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand()."&sno=$data[sno]&title=$data[title]&code=".rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand(); ?>"><?php echo $data['title'];?></a>
                                    
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
                        $query="SELECT COUNT(sno) counter FROM noticemas where createby='Admin' and status='1' and output in ('Both','Student');";
                        $result=mysqli_query($link,$query);
                        if(mysqli_affected_rows($link)==1)
                        {
                            $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                            if($data['counter']>3){
                                $f=1;
                        ?>   <a href="studentnoticedb.php" class="a2" style="float: right;margin-right: 10px; "><span style="text-decoration: underline;">More</span>...</a>
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
                        <h3 >Faculty Notice Board</h3>
                    </div>
                </div>
            <div class="panel-body" >
                 <div class="row">
                     <ul>
                        <?php 
                        $query="select sno,title from noticemas where createby='Faculty' and status='1' and output in ('Both','Student') order by sno desc;";
                        $result=mysqli_query($link,$query);
                        if(mysqli_affected_rows($link)>0){
                            $c=0;
                            while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                ?>
                                <li>
                                    <a class="a1" href="<?php echo "studentreadnotice1.php?".rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand()."&sno=$data[sno]&title=$data[title]&code=".rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand().rand(); ?>"><?php echo $data['title'];?></a>
                                    
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
                        $query="SELECT COUNT(sno) counter FROM noticemas where createby='Faculty' and status='1' and output in ('Both','Student');";
                        $result=mysqli_query($link,$query);
                        if(mysqli_affected_rows($link)==1)
                        {
                            $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                            if($data['counter']>3){
                        ?>   <a href="studentnoticedb1.php" class="a2" style="float: right;margin-right: 10px; "><span style="text-decoration: underline;">More</span>...</a>
                         <?php
                         }
                         if($f==1){
                            $f=0;
                            echo"<br />";
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
    </div>
</div>
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