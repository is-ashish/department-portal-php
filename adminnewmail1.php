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

if(isset($_POST['To']) && isset($_POST['Subject']) && isset($_POST['Body'])){
include("connection.php");
$to=$_POST['To'];
$t1=strpos($to," [");
$t2=substr($to,strpos($to,"[  ")+3,strpos($to," , ( ")-strlen($to)); // name
$arr=explode(" ",$t2);
$fname=$arr[0];
$lname=$arr[1];
$email=substr($to,0,$t1); //email
$s=substr($to,strpos($to," , ( ")+5,strpos($to," ) ]")-strlen($to)); /// faculty or student
$id="";
$table="";
if($s=="STUDENT"){
    $table="studentdetail";
    $id="rollno";
}
else if($s=="FACULTY"){
    $table="teacherdetail";
    $id="teacherid";
}
$query="select $id from $table where email='$email' and fname='$fname' and lname='$lname'";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
if($id=="rollno"){
    $id="";
    $id=$data['rollno'];
}
else if($id="teacherid"){
    $id="";
    $id=$data['teacherid'];
}




$uploaddir="mail/";
$filename1="";
$filename2="";
$filename3="";
$filename4="";
$filename5="";
$check1=0;
$check2=0;
$check3=0;
$check4=0;
$check5=0;

if(!empty($_FILES['File1']['name'])){
$filename1=basename($_FILES['File1']['name']);

$ext=pathinfo($filename1,PATHINFO_EXTENSION);
$filename1="Admin_to_$id"."_1_".date('Y_n_j_h_i_s').".".$ext;
$uploadpath=$uploaddir.$filename1;
if($_FILES['File1']['size']>99000){
    $_SESSION['send']="1";
        $_SESSION['value']="NOK1";
        $_SESSION['filename']=basename($_FILES['File1']['name']);
        header("location:adminnewmail.php");
        die();
}
    if(move_uploaded_file($_FILES['File1']['tmp_name'],$uploadpath)){
     $check1=1;
}
else{
    $_SESSION['send']="1";
        $_SESSION['value']="NOK";
        header("location:adminnewmail.php");
}
}
else{
    $filename1="null";
     
}


if(!empty($_FILES['File2']['name'])){
$filename2=basename($_FILES['File2']['name']);

$ext=pathinfo($filename2,PATHINFO_EXTENSION);
$filename2="Admin_to_$id"."_2_".date('Y_n_j_h_i_s').".".$ext;
$uploadpath=$uploaddir.$filename2;
if($_FILES['File2']['size']>99000){
    $_SESSION['send']="1";
        $_SESSION['value']="NOK1";
        $_SESSION['filename']=basename($_FILES['File2']['name']);
        header("location:adminnewmail.php");
        die();
}
    if(move_uploaded_file($_FILES['File2']['tmp_name'],$uploadpath)){
     $check2=1;
}
else{
    $_SESSION['send']="1";
        $_SESSION['value']="NOK";
        header("location:adminnewmail.php");
}
}
else{
    $filename2="null";
     
}


if(!empty($_FILES['File3']['name'])){
$filename3=basename($_FILES['File3']['name']);

$ext=pathinfo($filename3,PATHINFO_EXTENSION);
$filename3="Admin_to_$id"."_3_".date('Y_n_j_h_i_s').".".$ext;
$uploadpath=$uploaddir.$filename3;
if($_FILES['File3']['size']>99000){
    $_SESSION['send']="1";
        $_SESSION['value']="NOK1";
        $_SESSION['filename']=basename($_FILES['File3']['name']);
        header("location:adminnewmail.php");
        die();
}
    if(move_uploaded_file($_FILES['File3']['tmp_name'],$uploadpath)){
     $check3=1;
}
else{
    $_SESSION['send']="1";
        $_SESSION['value']="NOK";
        header("location:adminnewmail.php");
}
}
else{
    $filename3="null";
     
}


if(!empty($_FILES['File4']['name'])){
$filename4=basename($_FILES['File4']['name']);

$ext=pathinfo($filename4,PATHINFO_EXTENSION);
$filename4="Admin_to_$id"."_4_".date('Y_n_j_h_i_s').".".$ext;
$uploadpath=$uploaddir.$filename4;
if($_FILES['File4']['size']>99000){
    $_SESSION['send']="1";
        $_SESSION['value']="NOK1";
        $_SESSION['filename']=basename($_FILES['File4']['name']);
        header("location:adminnewmail.php");
        die();
}
    if(move_uploaded_file($_FILES['File4']['tmp_name'],$uploadpath)){
     $check4=1;
}else{
    $_SESSION['send']="1";
        $_SESSION['value']="NOK";
        header("location:adminnewmail.php");
}
}
else{
    $filename4="null";
     
}


if(!empty($_FILES['File5']['name'])){
$filename5=basename($_FILES['File5']['name']);

$ext=pathinfo($filename5,PATHINFO_EXTENSION);
$filename5="Admin_to_$id"."_5_".date('Y_n_j_h_i_s').".".$ext;
$uploadpath=$uploaddir.$filename5;
if($_FILES['File5']['size']>99000){
    $_SESSION['send']="1";
        $_SESSION['value']="NOK1";
        $_SESSION['filename']=basename($_FILES['File5']['name']);
        header("location:adminnewmail.php");
        die();
}
    if(move_uploaded_file($_FILES['File5']['tmp_name'],$uploadpath)){
    $check5=1;
}
else{
    $_SESSION['send']="1";
        $_SESSION['value']="NOK";
        header("location:adminnewmail.php");
}
}
else{
    $filename5="null";
     
}


if(!empty($_FILES['File1']['name'])){
   if($check1==0){
    $_SESSION['send']="1";
        $_SESSION['value']="NOK";
        header("location:adminnewmail.php");
   }     
    }
    if(!empty($_FILES['File2']['name'])){
   if($check2==0){
    $_SESSION['send']="1";
        $_SESSION['value']="NOK";
        header("location:adminnewmail.php");
   }     
    }
    if(!empty($_FILES['File3']['name'])){
   if($check3==0){
    $_SESSION['send']="1";
        $_SESSION['value']="NOK";
        header("location:adminnewmail.php");
   }     
    }
    if(!empty($_FILES['File4']['name'])){
   if($check4==0){
    $_SESSION['send']="1";
        $_SESSION['value']="NOK";
        header("location:adminnewmail.php");
   }     
    }
    if(!empty($_FILES['File5']['name'])){
   if($check5==0){
    $_SESSION['send']="1";
        $_SESSION['value']="NOK";
        header("location:adminnewmail.php");
   }     
    }


$query="SELECT IFNULL(max(sno),0)+1 sno from sendmas";
                 $result=mysqli_query($link,$query);
                 $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                 $sno=$data['sno'];
                 
$query="insert into sendmas (sno,sendto,sendby,sendername,senderid,body,sbjct,file1,file2,file3,file4,file5)  values('$sno','$id','Admin','$_SESSION[uname]','$_SESSION[uid]','$_POST[Body]','$_POST[Subject]','$filename1','$filename2','$filename3','$filename4','$filename5')";
$result=mysqli_query($link,$query);
if(mysqli_affected_rows($link)>0){
   $query="insert into rcvmas (sno,rcvto,sendby,sendername,senderid,body,sbjct,file1,file2,file3,file4,file5,status)  values('$sno','$id','Admin','$_SESSION[uname]','$_SESSION[uid]','$_POST[Body]','$_POST[Subject]','$filename1','$filename2','$filename3','$filename4','$filename5','1')";
$result=mysqli_query($link,$query);
 if(mysqli_affected_rows($link)>0){
    $_SESSION['send']="1";
$_SESSION['value']="OK";
header("location:adminnewmail.php");die();
 }
 else{
    $_SESSION['send']="1";
        $_SESSION['value']="NOK";
        header("location:adminnewmail.php");
}
}
else{
    $_SESSION['send']="1";
        $_SESSION['value']="NOK";
        header("location:adminnewmail.php");
}
}// $id mysqli if
else{
    $_SESSION['send']="1";
        $_SESSION['value']="NOK";
        header("location:adminnewmail.php");
}
}// to body and subject isset closed
else{
    header("location:adminnewmail.php");die();
}
?>