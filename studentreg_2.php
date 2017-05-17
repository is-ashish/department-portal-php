<?php
if(isset($_POST['Submit'])){

$BATCH=$_SESSION['joinyear'];
//session_destroy();
if($PASS==$CPASS){
    if(ctype_digit($MOB)){
        if(strlen($MOB)==10){
            if(substr($MOB,0,1)!='0'){                
                 $query="SELECT IFNULL(max(sid),0)+1 Sid from studentmas";
                 $result=mysqli_query($link,$query);
                 $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                 $SID=$data['Sid'];
                 $query="SELECT IFNULL(max(sid),0)+1 Sid from studentmas";
                 
                $y1=date("Y");
                $y2=date("Y")-1;
                $y3=date("Y")-2;
                $y4=date("Y")-3;
                $b1=str_replace("0","K",$y1);
                $b2=str_replace("0","K",$y2);
                $b3=str_replace("0","K",$y3);
                $b4=str_replace("0","K",$y4);
                
                 if($BATCH==$b4){
                    
                    $query="SELECT fourthyear+1 rno from studentcount";
                    $result=mysqli_query($link,$query);
                    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                     $ROLLNO="CSJMA". substr($y4,2)."00".substr($y4,2)."90".str_pad($data['rno'],3,'0',STR_PAD_LEFT);
                    $PASSYEAR=$y4+4;
                 
                 }
                 else if($BATCH==$b3){
                     $query="SELECT thirdyear+1 rno from studentcount";
                    $result=mysqli_query($link,$query);
                    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                   $ROLLNO="CSJMA". substr($y3,2)."00".substr($y3,2)."90".str_pad($data['rno'],3,'0',STR_PAD_LEFT);
                     $PASSYEAR=$y3+4;
                 }
                 else if($BATCH==$b2){
                      $query="SELECT secondyear+1 rno from studentcount";
                    $result=mysqli_query($link,$query);
                    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $ROLLNO="CSJMA". substr($y2,2)."00".substr($y2,2)."90".str_pad($data['rno'],3,'0',STR_PAD_LEFT);
                     $PASSYEAR=$y2+4;
                 }
                 else if($BATCH==$b1){
                      $query="SELECT firstyear+1 rno from studentcount";
                    $result=mysqli_query($link,$query);
                    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $ROLLNO="CSJMA". substr($y1,2)."00".substr($y1,2)."90".str_pad($data['rno'],3,'0',STR_PAD_LEFT);
                     $PASSYEAR=date("Y")+4;
                 }
        
                 $query="INSERT INTO studentmas (sid,batch,branch,degree,passingyear,rollno) values ($SID,'$BATCH','CSE','B.Tech','$PASSYEAR','$ROLLNO')";
                 $result=mysqli_query($link,$query);
                
                 if(mysqli_affected_rows($link)>0){
                    $query="INSERT INTO studentdetail (sid,rollno,fname,mname,lname,email,mobno,fathername,dob,gender) values ($SID,'$ROLLNO','$FNAME','$MNAME','$LNAME','$EMAIL','$MOB','$FATHERNAME','$DOB','$GENDER')";
                    $result=mysqli_query($link,$query);
                        $a=0;
                 $query="INSERT INTO studentacad (rollno,totalfill) values ('$ROLLNO',$a)";
                 $result=mysqli_query($link,$query);
                  
                        if(mysqli_affected_rows($link)>0){
                    
                            if($BATCH==$b4){
                                $query="SELECT FOURTHYEAR from studentcount";$str="";$str='FOURTHYEAR';
                            }
                            else if($BATCH==$b3){
                                $query="SELECT THIRDYEAR from studentcount";$str="";$str='THIRDYEAR';
                            }
                            else if($BATCH==$b2){
                                $query="SELECT SECONDYEAR from studentcount";$str="";$str='SECONDYEAR';
                            }
                            else if($BATCH==$b1){
                                $query="SELECT FIRSTYEAR from studentcount";$str="";$str='FIRSTYEAR';
                            }
                    
                        $result=mysqli_query($link,$query);
                    
                        if(mysqli_affected_rows($link)>0){
                            $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                            $count=$data[$str]+1;
                            
                            if($BATCH==$b4){
                                $query="UPDATE studentcount set FOURTHYEAR=$count ";
                            }
                            else if($BATCH==$b3){
                                $query="UPDATE studentcount set THIRDYEAR=$count ";
                            }
                            else if($BATCH==$b2){
                                $query="UPDATE studentcount set SECONDYEAR=$count ";
                            }
                            else if($BATCH==$b1){
                                $query="UPDATE studentcount set FIRSTYEAR=$count ";
                            }
                            $result=mysqli_query($link,$query);
                            $query="select uuid()";
                            $result=mysqli_query($link,$query);
                            $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                            $uuid=$data['uuid()'];
                             $query="INSERT INTO loginmas (userid,password,status,uuid) values ('$ROLLNO','$PASS','studn','$uuid')";
                            $result=mysqli_query($link,$query);
                           $i=1;
                             }
                        else{
                            $i=2;
                        }
                }
        else{$i=3; 
            }
        }
        else{ 
           $i=4;
        }
      }
      else{ $MOB="";$i=5;}
      }
      else{$MOB="";$i=6; }              
}
else{$MOB="";$i=7;
}
}
else{$i=8;
}
}
else{
    header("location:studentreg.php");
}
?>