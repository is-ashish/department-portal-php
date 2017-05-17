<?php
if(isset($_POST['Submit'])){

$YEAR=$_SESSION['joinyear'];
$TYPE=$_SESSION['ftype'];
//session_destroy();
if($PASS==$CPASS){
    if(ctype_digit($MOB)){
        if(strlen($MOB)==10){
            if(substr($MOB,0,1)!='0'){                
                                $query="SELECT permanent,guest,cp,cg,total from teachercount";
                                $result=mysqli_query($link,$query);
                                $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                                $p=$data['cp'];
                                $g=$data['cg'];
                                $p1=$data['permanent'];
                                $p2=$data['guest'];
                                if($TYPE=="permanent"){
                                    $p++;
                                    $p1++;
                                    if($data['permanent']>=10){
                                        $SID="CSJMACSEP0".$p;
                                    }
                                    else{ 
                                        $SID="CSJMACSEP00".$p;
                                    }
                                }
                                else  if($TYPE=="guest"){
                                    $g++;
                                    $p2++;
                                    if($data['guest']>=10)
                                        $SID="CSJMACSEG0".$g;
                                    else    
                                        $SID="CSJMACSEG00".$g;
                                }
                 
                                $query="select uuid()";
                                $result=mysqli_query($link,$query);
                                $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                                $uuid=$data['uuid()'];
                                $query="INSERT INTO teachermas (teacherid,password,joinyear,uuid,degree,deptt) values ('$SID','$PASS','$YEAR','$uuid','$DEGREE','CSE')";
                                $result=mysqli_query($link,$query);
                          
                                if(mysqli_affected_rows($link)>0){
                                    $query="INSERT INTO teacherdetail (teacherid,fname,mname,lname,email,mobno,fathername,dob,gender,type) values ('$SID','$FNAME','$MNAME','$LNAME','$EMAIL','$MOB','$FATHERNAME','$DOB','$GENDER','$TYPE')";
                                    $result=mysqli_query($link,$query);
                                    
                                    if(mysqli_affected_rows($link)>0){
                                        $query="update teachercount set cp='$p',cg='$g',permanent='$p1',guest='$p2';";
                                        $result=mysqli_query($link,$query);
                                        if(mysqli_affected_rows($link)>0){
                                            $i=1;
                                        }
                                        else{ $i=2; }
                                    }
                                    else{ $i=2; }
                                }
                                else{ $i=2; }
            }   
            else{ $i=3; }
        }
        else{ $i=4; }
      }
      else{ $MOB="";$i=5;}
      }
      else{$MOB="";$i=6; }              
}
else{ header("location:teacherreg.php"); }
?>