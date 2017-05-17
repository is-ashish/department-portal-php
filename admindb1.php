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
include("connection.php");
$query="SELECT td.TEACHERID,td.FNAME,td.MNAME,td.LNAME,td.MOBNO,td.EMAIL,td.FATHERNAME, 
DATE_FORMAT(td.DOB,'%d-%b-%Y') DOB,td.GENDER,td.TYPE,tm.JOINYEAR,tm.DEGREE,tm.DEPTT FROM teacherdetail td 
inner join teachermas tm on td.TEACHERID=tm.TEACHERID";

$orderby=" order by td.fname desc";
$where=null;
if(!empty($_POST['Tid'])){
    $where.=" and tm.TEACHERID='$_POST[Tid]'";
}
if(!empty($_POST['Name'])){
    $where.=" and td.fname like '%$_POST[Name]%'";
}
if(!empty($_POST['Joinyear'])){
    $where.=" and tm.Joinyear like '$_POST[Joinyear]'";
}
$query=$query.$where;
$result=mysqli_query($link,$query);
?>
<!DOCTYPE HTML>
<html>
<head>

	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>FACULTY_DATABASE</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="bootstrap-datepicker.css" />
    
   
</head>

<body>
<?php 
include('suc_header.php');?>
<br /><br /><br /><br /><br /><br /><br /><br />
<form id="phpForm" name="phpForm" method="post" action="admindb1.php">
<input type="hidden" id="drollno" name="Drollno" />
<div class="container-fluid">
<div class="panel panel-success"> 
    <div class="bgcolor">    
    <div class="panel-heading">
        <h3>Faculty Database</h3>
    </div>
    </div>

    <div class="panel-body">
        <div class="row">
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
        </div>
        <div class="row">&nbsp;</div>
        <div class="row">
            <div class="col-md-2">
                <a href="adminteacherreg.php" id="add" name="Add" class="btn btn-primary">Add a Faculty</a>
            </div>
            <?php
             if(mysqli_affected_rows($link)>0){
            ?>
            <div class="col-md-2">
                <a href="javascript:void(0)" id="edit" onclick="editstudent()" class="btn btn-warning">Edit Record</a>
            </div>
            <div class="col-md-2">
                <a href="javascript:void(0)" id="delete" onclick="deletestudent()" class="btn btn-danger">Delete Record</a>
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
                                <th>Teacher id</th>
                                <th>First Name</th>
                                <th>Middle  Name</th>
                                <th>Last Name</th>
                                <th>Mobile Number</th>
                                <th>Email Address</th>
                                <th>Father's Name</th>
                                <th>Date-Of-Birth</th>
                                <th>Gender</th>
                                <th>Type</th>
                                <th>Degree</th>
                                <th>Join year</th>
                                <th>Department</th>
                            </tr>
                        </thead>
                        <tbody class="bg-warning"> 
                        <?php
                        while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            echo "<tr>";
                            echo "<td>";
                            echo "<input type=checkbox name=row[] value=$data[TEACHERID] />";
                            echo "</td>";
                            echo "<td>$data[TEACHERID]</td>";
                            echo "<td>$data[FNAME]</td>";
                            echo "<td>$data[MNAME]</td>";
                            echo "<td>$data[LNAME]</td>";
                            echo "<td>$data[MOBNO]</td>";
                            echo "<td>$data[EMAIL]</td>";
                            echo "<td>$data[FATHERNAME]</td>";
                            echo "<td>$data[DOB]</td>";
                            echo "<td>$data[GENDER]</td>";
                            echo "<td>$data[TYPE]</td>";
                            echo "<td>$data[DEGREE]</td>";
                            echo "<td>$data[JOINYEAR]</td>";
                            echo "<td>$data[DEPTT]</td>";
                            echo "</tr>";
                        }
                        ?>
                        
                        </tbody>
                        <tfoot class="bg-info">
                        
                            <tr>
                                <th><input type="checkbox" id="footer" onchange="checkAll(this)" /></th>
                                <th>Teacher id</th>
                                <th>First Name</th>
                                <th>Middle  Name</th>
                                <th>Last Name</th>
                                <th>Mobile Number</th>
                                <th>Email Address</th>
                                <th>Father's Name</th>
                                <th>Date-Of-Birth</th>
                                <th>Gender</th>
                                <th>Type</th>
                                <th>Degree</th>
                                <th>Join year</th>
                                <th>Department</th>
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
function editstudent(){
    var ch=document.getElementsByName("row[]");
    var count=0;
    for(var i=0;i<ch.length;i++){
        if(ch[i].checked){
            count++;
        }
    }
    if(count==0){
        bootbox.alert("Please select one record");
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
    bootbox.confirm("<div class=infomessage><br />Are you sure to edit profile of this faculty ?<br /><div class=errormessage>"+val+"</div></div>",function(res){
        if(res==true){
            var tid=document.getElementById('drollno');
            tid.value=val;
              phpForm.action="teacher_edit.php";
            phpForm.submit();
        }    
    });
    
}
function deletestudent(){
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
    bootbox.confirm("<div class=errormessage>Are you sure to delete these faculties</div><div class=text-info>"+val+"</div>",function(res){
        if(res==true){
            var rollno=document.getElementById('drollno');
            rollno.value=val;
             $.post("teacher_delete.php",$('#phpForm').serialize(),
            function(res){
                    bootbox.confirm(res,function(r){
                        if(r==true){
                            window.location="admindb1.php";
                         }
                         else
                         {
                            window.location="admindb1.php";  
                         }
                    }); 
                                   
            });
        }    
    });
}
function search(){
    phpForm.action="admindb1.php";
    phpForm.submit();
}
</script>