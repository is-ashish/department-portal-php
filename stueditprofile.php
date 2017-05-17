
<?php
session_start();
if(!isset($_SESSION['usname'])){
    header("location:studentlogin.php");
    die();
} $piccheck=-1;
if(isset($_SESSION['piccheck'])){
   
    
    if($_SESSION['piccheck']=="OK"){
    unset($_SESSION['piccheck']);
    $piccheck=1;
    }
    else if($_SESSION['piccheck']=="NOK"){
    unset($_SESSION['piccheck']);
    $piccheck=0;
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>

	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>STUDENT_PROFILE</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="bootstrap-datepicker.css" />
    
    
    <style>
    .datepicker{
        color:red;
    }
    </style>
</head>

<body>
<?php  include('stusuc_header.php'); ?>

<br /><br /><br /><br /><br />
<div class="container-fluid">
    <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">

                    <div class="panel panel-primary" >
                        <div class="bgcolor">
                            <div class=" panel-heading ">      
                            <input type="button" onclick="statechanged()" class="btn btn-primary myhomebtn" style="float: right; margin-right:30px;margin-top: 12px; " value="  Edit  "/>
                                <h3 ><?php echo "$_SESSION[usname]'s"; ?> Profile</h3>
                             </div>
                        </div>
    
                    <div class="panel-body" >
                        <form class="form-horizontal" method="post" name="phpForm" id="phpForm" action="<?php $_SERVER['PHP_SELF'];?>">
<?php
include("connection.php");
$query="SELECT FNAME,MNAME,LNAME,MOBNO,EMAIL,FATHERNAME,ADDRESS,CITY,STATE,DOB,GENDER,PHOTO,STATEID,CITYID FROM studentdetail WHERE rollno='$_SESSION[usid]'";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $fname=$data['FNAME'];
    $mname=$data['MNAME'];
    $lname=$data['LNAME'];
    $email=$data['EMAIL'];
    $fathername=$data['FATHERNAME'];
    $address=$data['ADDRESS'];
    $city=$data['CITY'];
    $state=$data['STATE'];
    $cityid=$data['CITYID'];
    $stateid=$data['STATEID'];
    if($stateid==null || $cityid==null ||$state==null ||$city==null){
        $cityid=-1;
        $stateid=-1;
        $state="Select your state";
        $city="Select your city";
    }
    $dob=$data['DOB'];
    $arr=explode("-",$dob);
    $dob=$arr[2]."/".$arr[1]."/".$arr[0];
    $mob=$data['MOBNO'];
    $gender=$data['GENDER'];
    $photo=$data['PHOTO'];
    if($photo==null)
    $photo="default.jpg";
    
    $query="SELECT ACDACHVMT,SPORTS,CULTURAL,OTHERS,INTER_BOARD,INTER_YEAR,INTER_ROLLNO,HIGHSCHOOL_BOARD,HIGHSCHOOL_YEAR,HIGHSCHOOL_ROLLNO FROM studentacad WHERE rollno='$_SESSION[usid]'";
    $result=mysqli_query($link,$query);
    if(mysqli_affected_rows($link)>0){
$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    $ipy=$data['INTER_YEAR'];
    $irn=$data['INTER_ROLLNO'];
    $ib=$data['INTER_BOARD'];
    $hpy=$data['HIGHSCHOOL_YEAR'];
    $hrn=$data['HIGHSCHOOL_ROLLNO'];
    $hb=$data['HIGHSCHOOL_BOARD'];
    $others=$data['OTHERS'];
    $sports=$data['SPORTS']; 
    $cultural=$data['CULTURAL'];
    $acd=$data['ACDACHVMT'];
    
    }
    }
?>

                            <table >
                                    <td width="70% " >
                                        <fieldset><br />
                                            <div class="visible-xs">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label" >Photo  :</label>   
                                                     <div style="border: 1px solid black; width:80px;height:80px;margin-left: 15px;">  
                                                        <img src="studentphoto/<?php echo $photo;?>" width="78px" height="78px" alt="INSERT YOUR PHOTOGRAPH"  data-toggle="tooltip" data-placement="bottom" title="Your PhotoGraph"> 
                                                        </div> 
                                                        <div class="col-md-5">
                                                            <a href="fileupload.php"><input id="photo" disabled="" name="Photo" type="button" value="Click Here to Upload your photograph"  class="form-control input-md btn btn-info" /></a>
                                                                
                                                        </div><br />
                                                </div>
                                            </div>                              
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" >First Name <label style="color: red;" > * </label> :</label>   
                                            
                                                <div class="col-md-7">
                                                    <input id="fname" name="Fname" type="text" disabled="" value="<?php echo $fname;?>" placeholder="Enter First Name" class="form-control input-md" required="">
                                                </div>
                                            </div>
                
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" >Middle Name  :</label>   
                                                
                                                <div class="col-md-7">
                                                    <input id="mname" name="Mname" type="text" disabled="" value="<?php echo $mname;?>" placeholder="Enter Middle Name" class="form-control input-md" required="">
    
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="lname">Last Name <label style="color: red;" > * </label> :</label>  </label> 
                                            
                                                <div class="col-md-7">
                                                    <input id="lname" name="Lname" disabled="false" type="text" value="<?php echo $lname;?>" placeholder="Enter Last Name" class="form-control input-md" required="">
    
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="email">Email <label style="color: red;" > * </label> :</label>  </label> 
                                            
                                                <div class="col-md-7">
                                                    <input id="email" name="Email" type="text" disabled="" value="<?php echo $email;?>" placeholder="Enter Email" class="form-control input-md" required="">
    
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="mob">Mobile Number <label style="color: red;" > * </label> :</label>  </label> 
                                            
                                                <div class="col-md-7">
                                                <div class="input-group">
                                                        <span class="input-group-addon">+91 </span>
      
                                                    <input id="mob" name="Mob" type="text" disabled="" value="<?php echo $mob;?>" placeholder="Enter Mobile Number" class="form-control input-md" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="fathername">Father's Name <label style="color: red;" > * </label> :</label>  </label> 
                                            
                                                <div class="col-md-7">
                                                <div class="input-group">
                                                        <span class="input-group-addon">Mr. </span>
      
                                                    <input id="fathername" name="Fathername" disabled="" type="text" value="<?php echo $fathername;?>" placeholder="Enter Father's Name" class="form-control input-md" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="gender">Gender <label style="color: red;" for="gender"> * </label> :</label>  </label> 
                                            
                                                <div class="col-md-7">
                                                    <input id="gender1" disabled="" name="Gender" <?php if($gender=="Male") echo 'checked=""';?>type="radio" value="Male" required=""/> Male
                                                    <input id="gender2" disabled="" name="Gender" <?php if($gender=="Female") echo 'checked=""';?> type="radio" value="Female" required=""/> Female
    
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="dob">Date of Birth <label style="color: red;" for="Course"> * </label> :</label>   
                                            
                                                <div class="col-md-7">
                                                    <input id="dob" name="Dob" disabled=""  value="<?php echo $dob;?>" placeholder="Enter Date of birth" class="datepicker form-control input-md" required="" /> ( Format : dd/mm/yyyy )
    
                                                </div>
                                            </div>
                                

                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="Address">Address <label style="color: red;" for="Course"> * </label> :</label></label>
                                                
                                                <div class="col-md-7">
                                                    <textarea id="address" name="Address" disabled=""  value="" rows="5" cols="20"  class="form-control input-md" required=""><?php echo $address;?></textarea>
                                                </div>
                                            </div>
                                           <div class="form-group">
                                                 <label class="col-md-4 control-label" for="state">State <label style="color: red;" for="Course"> * </label> :</label>  </label> 
                                            
                                                <div class="col-md-7">
                                               <select id="state" name="State" disabled="" class="form-control" onchange="addCity()">
                                               
                                                             <option value="<?php echo $stateid;?>"><?php echo $state;?></option>
                                                                  <?php
                                                                         $query="SELECT ID,STATE FROM states_master order by state";
                                                                         $result=mysqli_query($link,$query);
                                                                         
                                                                         while($data=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                                                              echo "<option value=$data[ID]>$data[STATE]</option>";
                                                                         }
                                 
                                                                    ?>
                                                </select> </div>
                                            </div> 
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="city">City <label style="color: red;" for="Course"> * </label> :</label>  </label> 
                                            
                                                <div class="col-md-7">
                                                   <div id="divcity">
                                                     <select id="city" name="City" class="form-control" disabled="">
                                                        <option value="<?php echo $cityid;?>"><?php echo $city;?></option>
                                                         
                                                     </select>
                                                     </div>  
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="ipy">Intermediate passing year <label style="color: red;" for="Course"> * </label> :</label>  </label> 
                                            
                                                <div class="col-md-7">
                                                    <select id="ipy" name="Ipy" class="form-control input-md" disabled="" >
                                                        <?php 
                                                        if($ipy==null || $ipy==""){
                                                            echo "<option value=-1>Select Passing Year</option>";
                                                        }
                                                        else{
                                                           echo "<option value=$ipy>$ipy</option>";
                                                         
                                                        }
                                                        ?>
                                                        <option value="2016">2016</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="ib">Intermediate Board <label style="color: red;" for="Course"> * </label> :</label>  </label> 
                                            
                                                <div class="col-md-7">
                                                     <select id="ib" name="Ib" class="form-control input-md" disabled="" >
                                                         <?php 
                                                        if($ib==null || $ib==""){
                                                            echo "<option value=-1>Select Board</option>";
                                                        }
                                                        else{
                                                           echo "<option value=$ib>$ib</option>";
                                                         
                                                        }
                                                        ?><option value="C.B.S.E.">C.B.S.E.</option>
                                                        <option value="I.C.S.E.">I.C.S.E.</option>
                                                        <option value="State-Board">State-Board</option>
                                                        </select>
                                                        
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="irn">Intermediate Roll Number <label style="color: red;" for="Course"> * </label> :</label>  </label> 
                                            
                                                <div class="col-md-7">
                                                    <input id="irn" name="Irn" disabled="" type="text" value="<?php echo $irn;?>" placeholder="Enter Intermediate Roll Number " class="form-control input-md" required="" /> 
    
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                 <label class="col-md-4 control-label" for="hpy">Highschool passing year <label style="color: red;" for="Course"> * </label> :</label>  </label> 
                                            
                                                <div class="col-md-7">
                                                    <select id="hpy" name="Hpy" class="form-control input-md" disabled="" >
                                                         <?php 
                                                        if($hpy==null || $hpy==""){
                                                            echo "<option value=-1>Select Passing Year</option>";
                                                        }
                                                        else{
                                                           echo "<option value=$hpy>$hpy</option>";
                                                         
                                                        }
                                                        ?> <option value="2016">2016</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2014">2014</option>
                                                        <option value="2013">2013</option>
                                                        <option value="2012">2012</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2004">2004</option>
                                                        <option value="2003">2003</option>
                                                        <option value="2002">2002</option>
                                                        <option value="2001">2001</option>
                                                        <option value="2000">2000</option>
                                                        <option value="1999">1999</option>
                                                        <option value="1998">1998</option>
                                                        <option value="1997">1997</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="ib">Highschool Board <label style="color: red;" for="Course"> * </label> :</label>  </label> 
                                            
                                                <div class="col-md-7">
                                                     <select id="hb" name="Hb" class="form-control input-md" disabled="" >
                                                         <?php 
                                                        if($hb==null || $hb==""){
                                                            echo "<option value=-1>Select Passing Year</option>";
                                                        }
                                                        else{
                                                           echo "<option value=$hb>$hb</option>";
                                                         
                                                        }
                                                        ?><option value="C.B.S.E.">C.B.S.E.</option>
                                                        <option value="I.C.S.E.">I.C.S.E.</option>
                                                        <option value="State-Board">State-Board</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="hrn">Highschool Roll Number <label style="color: red;" for="Course"> * </label> :</label>  </label> 
                                            
                                                <div class="col-md-7">
                                                    <input id="hrn" name="Hrn" disabled="" type="text" value="<?php echo $hrn;?>" placeholder="Enter Highschool Roll Number " class="form-control input-md" required="" /> 
    
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="acd">Academic Achievement :</label>
                                                
                                                <div class="col-md-7">
                                                    <textarea id="acd" name="Acd" disabled=""  rows="5" cols="20"  class="form-control input-md" ><?php echo $acd;?></textarea>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="cultural">Cultural :</label>
                                                
                                                <div class="col-md-7">
                                                    <textarea id="cultural" disabled="" name="Cultural"   rows="5" cols="20"  class="form-control input-md" ><?php echo $cultural;?></textarea>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                 <label class="col-md-4 control-label" for="sports">Sports :</label>
                                                
                                                <div class="col-md-7">
                                                    <textarea id="sports" disabled="" name="Sports"   rows="5" cols="20"  class="form-control input-md" ><?php echo $sports;?></textarea>
                                                </div>
                                            </div>  
                                              <div class="form-group">
                                                 <label class="col-md-4 control-label" for="others">Others :</label>
                                                
                                                <div class="col-md-7">
                                                    <textarea id="others" disabled="" name="Others"   rows="5" cols="20"  class="form-control input-md" ><?php echo $others;?></textarea>
                                                </div>
                                            </div>                          
                                                <div class="row">
                                                    <div class="col-md-3"></div>
                                                    <div class="col-md-8"></div>
                                                </div>
                                            </div>
<!-- Button (Double) -->
                                            <div class="form-group">
                                                <label class="col-md-4 control-label" for="login"></label>
                                                    
                                                <div class="col-md-8">
                                                     <input type="button" disabled="" id="login" name="login" class="btn btn-success" value="Submit" onclick="validate()"/>
                                                     <input type="reset" disabled="" id="reset" name="reset" class="btn btn-danger" value="Reset" />
                                                     <input type="button" onclick="statechanged()" class="btn btn-info myhomebtn"  value="  Edit  "/>
                            
                                                </div>
                                            </div>

                                        </fieldset>
                                    </td>
                                    <td>
                                    <div class="visible-lg">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label" for="fname">Photo  <label style="color: red;" for="Course"> * </label>  : </label>   
                                                     <div class="col-md-5">
                                                     <div style="border:1px solid black;width:80px;height:80px;" > 
                                                     <img  src="studentphoto/<?php echo $photo?>" width="78px" height="78px" alt="INSERT YOUR PHOTO"  data-toggle="tooltip" data-placement="bottom" title="Your PhotoGraph">
                                                       
                                                        </div>  
                                                        </div>
                                                       <div class="col-md-12"></div>
                                                       <div class="col-md-12"></div>
                                                       <div class="col-md-12"></div>
                                                       <div class="col-md-10">
                                                      <a href="fileupload.php" id="photo"  style=" margin-left:55px;"  type="button"  class="btn btn-primary"> Click Here to Upload your photograph</a>
                                                             
                                                        </div>
                                                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                                </div>
                                    </div>
                                    <div class="visible-md">
                                                <div class="form-group">
                                                    <label class="col-md-5 control-label" for="fname">Photo  <label style="color: red;" for="Course"> * </label>  : </label>   
                                                    <div class="col-md-5">
                                                     <div style="border:1px solid black;width:80px;height:80px;" >
                                                        <img src="studentphoto/<?php echo $photo?>" width="78px" height="78px" alt="INSERT YOUR PHOTO"  data-toggle="tooltip" data-placement="bottom" title="Your PhotoGraph">
                                                        </div>  
                                                        </div>
                                                       <div class="col-md-12"></div>
                                                       <div class="col-md-12"></div>
                                                       <div class="col-md-12"></div>
                                                       <div class="col-md-10">
                                                      <a href="fileupload.php"><input id="photo" disabled="" style=" margin-left:55px;" name="Photo" type="button" value="Click Here to Upload your photograph"  class="form-control input-md btn btn-info" disabled=""/></a>
                                                      
                                                          
                                                        </div>
                                                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                                
                                                </div>
                                    </div>
                                    <div class="visible-sm">
                                                <div class="form-group">
                                                    <label class="col-sm-5 control-label" for="fname">Photo  <label style="color: red;" for="Course"> * </label>  : </label>   
                                                     <div class="col-md-5">
                                                     <div style="border:1px solid black;width:80px;height:80px; margin-left: 120px;" >
                                                        <img src="studentphoto/<?php echo $photo?>" width="78px" height="80px" alt="INSERT YOUR PHOTO"  data-toggle="tooltip" data-placement="bottom" title="Your PhotoGraph">
                                  
                                                        </div> 
                                                        </div> 
                                                       <div class="col-sm-12"></div>
                                                       <div class="col-sm-12"></div>
                                                       <div class="col-sm-12"></div>
                                                       <div class="col-sm-10">
                                                      
                                                      <a href="fileupload.php"><input id="photo" disabled="" style=" margin-top:5px;" name="Photo" type="button" value="Click Here to Upload your photograph"  class="btn btn-info" disabled=""/></a>
                                                                          
                                                        </div>
                                                       <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                                        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
                                                        <br /><br /><br /><br />
                                                </div>
                                    </div>
                                            <br /><br /><br /><br /><br />
                                    </td>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if($piccheck==1){
    $piccheck=-1;
      echo '<script language="javascript">';
        echo 'bootbox.alert("<div class=successmessage><br>Photograph uploaded successfully</div>")';
        echo '</script>';
}
else if($piccheck==0){
    $piccheck=-1;
      echo '<script language="javascript">';
                            echo 'bootbox.confirm("<div class=errormessage><br>'.$_SESSION['perror'].'</div>",function(res){';
                                    echo 'if(res==true){';
                              echo '}  ';
                                
                            echo '});'; 
    echo '</script>';
    
}
$_SESSION['piccheck']="";
?>
<script>
function statechanged(){
    $('#upload').removeAttr("disabled");
    
    $('#fname').removeAttr("disabled");
    $('#lname').removeAttr("disabled");
    $('#mname').removeAttr("disabled");
    $('#fathername').removeAttr("disabled");
    $('#city').removeAttr("disabled");
    $('#state').removeAttr("disabled");
    $('#email').removeAttr("disabled");
    $('#gender1').removeAttr("disabled");
    $('#gender2').removeAttr("disabled");
    $('#photo').removeAttr("disabled");
    $('#ipy').removeAttr("disabled");
    $('#irn').removeAttr("disabled");
    $('#ib').removeAttr("disabled");
    $('#hpy').removeAttr("disabled");
    $('#hrn').removeAttr("disabled");
    $('#hb').removeAttr("disabled");
   $('#login').removeAttr("disabled");
   $('#mob').removeAttr("disabled");
   $('#submit').removeAttr("disabled");
   $('#reset').removeAttr("disabled");
   $('#address').removeAttr("disabled");
   
    $('#dob').removeAttr("disabled");
    $('#others').removeAttr("disabled");
    $('#sports').removeAttr("disabled"); 
    $('#cultural').removeAttr("disabled");
    $('#acd').removeAttr("disabled");
   
    
   
}

function addCity(){
    $.post("addcity.php",$('#phpForm').serialize(),function(res){
        $('#divcity').html(res);
    });
}
$('#dob').datepicker({
    format:'dd/mm/yyyy'
});
function validate(){
    
    var fname=$('#fname');
    var lname=$('#lname');
    var fathername=$('#fathername');
    var city=$('#city');
    var state=$('#state');
    var email=$('#email');
    var photo=$('#photo');
    var ipy=$('#ipy');
    var irn=$('#irn');
    var ib=$('#ib');
    var hpy=$('#hpy');
    var hrn=$('#hrn');
    var hb=$('#hb');
   var mob=$('#mob');
   var address=$('#address');
   var dob=$('#dob');
    <?php 
    if($photo=="default.jpg"){
    
    ?>
     bootbox.alert('<div class=errormessage><br />Please Upload Your photo</div>');
     
    <?php
    }
    ?>
   if(fname.val()==""){
        bootbox.alert('<div class=errormessage><br />Please enter your First Name</div>');
        return false;
    }
   
   else if(lname.val()==""){
        bootbox.alert('<div class=errormessage><br />Please enter your Last Name</div>');
        return false;
    }
   else if(fathername.val()==""){
        bootbox.alert('<div class=errormessage><br />Please enter your Father\'s Name</div>');
        return false;
    }
    else if(email.val()==""){
        bootbox.alert('<div class=errormessage><br />Please enter your Email Address</div>');
        return false;
    }
    else if(state.val()==-1){
        bootbox.alert('<div class=errormessage><br />Please select your state</div>');
        return false;
    }
    else if(city.val()==-1){
        bootbox.alert('<div class=errormessage><br />Please select your city</div>');
        return false;
    }
    else if(photo.val()==""){
        bootbox.alert('<div class=errormessage><br />Please select your photograph</div>');
        return false;
    }
    else if(ipy.val()==""){
        bootbox.alert('<div class=errormessage><br />Please select your Intermediate passing year</div>');
        return false;
    }
    else if(irn.val()==""){
        bootbox.alert('<div class=errormessage><br />Please enter your Intermediate roll number</div>');
        return false;
    }
    else if(ib.val()==""){
        bootbox.alert('<div class=errormessage><br />Please select your Intermediate Board</div>');
        return false;
    }
    else if(hpy.val()==""){
        bootbox.alert('<div class=errormessage><br />Please select your Highschool passing year</div>');
        return false;
    }
    else if(hrn.val()==""){
        bootbox.alert('<div class=errormessage><br />Please enter your Highschool roll number</div>');
        return false;
    }
    else if(hb.val()==""){
        bootbox.alert('<div class=errormessage><br />Please select your Highschool Board</div>');
        return false;
    }
    else if(address.val()==""){
        bootbox.alert('<div class=errormessage><br />Please enter Your Address</div>');
        return false;
    }
    
     else if(mob.val()==""){
        bootbox.alert('<div class=errormessage><br />Please enter your Mobile Number</div>');
        return false;
    }
    else if(mob.val().length!=10){
            bootbox.alert('<div class=errormessage><br />Invalid Mobile Number</div>');
        return false;
   
    }
    else if(dob.val()==""){
             bootbox.alert('<div class=errormessage><br />Please select your date of birth</div>');
        return false;
    }
    else if(dob.val().length!=10){
             bootbox.alert('<div class=errormessage><br />Invalid date of birth</div>');
        return false;
    }
     
    bootbox.confirm("Are you sure to submit this form?",function(res){
       if(res==true){
          //  phpForm.action="stueditprofile.php";
            //phpForm.submit();
           $.post("stueditprofile1.php",$('#phpForm').serialize(),
            function(res){
               if(res=="OK"){
                    window.location="s_student.php";
               }
               else{
                bootbox.alert(res); 
               } 
                
            });
       } 
    });
        
    
    return true;
}
</script>
