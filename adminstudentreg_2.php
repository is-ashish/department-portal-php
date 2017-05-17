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
                 
                 if($BATCH=="2K13"){
                    
                    $query="SELECT fourthyear+1 rno from studentcount";
                    $result=mysqli_query($link,$query);
                    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                     $ROLLNO="CSJMA13001390".str_pad($data['rno'],3,'0',STR_PAD_LEFT);
                    $PASSYEAR="2017";
                 
                 }
                 else if($BATCH=="2K14"){
                     $query="SELECT thirdyear+1 rno from studentcount";
                    $result=mysqli_query($link,$query);
                    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                   $ROLLNO="CSJMA14001490".str_pad($data['rno'],3,'0',STR_PAD_LEFT);
                     $PASSYEAR="2018";
                 }
                 else if($BATCH=="2K15"){
                      $query="SELECT secondyear+1 rno from studentcount";
                    $result=mysqli_query($link,$query);
                    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $ROLLNO="CSJMA15001590".str_pad($data['rno'],3,'0',STR_PAD_LEFT);
                     $PASSYEAR="2019";
                 }
                 else if($BATCH=="2K16"){
                      $query="SELECT firstyear+1 rno from studentcount";
                    $result=mysqli_query($link,$query);
                    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $ROLLNO="CSJMA16001690".str_pad($data['rno'],3,'0',STR_PAD_LEFT);
                     $PASSYEAR="2020";
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
                    
                            if($BATCH=="2K13"){
                                $query="SELECT FOURTHYEAR from studentcount";$str="";$str='FOURTHYEAR';
                            }
                            else if($BATCH=="2K14"){
                                $query="SELECT THIRDYEAR from studentcount";$str="";$str='THIRDYEAR';
                            }
                            else if($BATCH=="2K15"){
                                $query="SELECT SECONDYEAR from studentcount";$str="";$str='SECONDYEAR';
                            }
                            else if($BATCH=="2K16"){
                                $query="SELECT FIRSTYEAR from studentcount";$str="";$str='FIRSTYEAR';
                            }
                    
                        $result=mysqli_query($link,$query);
                    
                        if(mysqli_affected_rows($link)>0){
                            $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
                            $count=$data[$str]+1;
                            
                            if($BATCH=="2K13"){
                                $query="UPDATE studentcount set FOURTHYEAR=$count ";
                            }
                            else if($BATCH=="2K14"){
                                $query="UPDATE studentcount set THIRDYEAR=$count ";
                            }
                            else if($BATCH=="2K15"){
                                $query="UPDATE studentcount set SECONDYEAR=$count ";
                            }
                            else if($BATCH=="2K16"){
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
    header("location:adminstudentreg.php");
}
?>