<?php
function Send_Mail($from,$fromname,$to,$subject,$body,$replyto,$replyname,$cc=null,$bcc=null)
{
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->IsSMTP(true); // SMTP
$mail->SMTPAuth   = true;  // SMTP authentication
$mail->Mailer = "smtp";
$mail->Host       = "smtp.gmail.com"; 
$mail->Port       = 587;
$mail->SMTPSecure="tls";                    // set the SMTP port
$mail->Username   ="tphpmailer@gmail.com";  // SES SMTP  username
$mail->Password   ="phpmailer@123";  // SES SMTP password
$mail->SetFrom($from,$fromname,0);
$mail->AddReplyTo($replyto, $replyname);
$mail->AddCC($cc);
$mail->AddBCC($bcc);
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);

if(!$mail->Send())
return "<div class=errormessage><br>Error Sending Mail</div>";
else
return "<div class=successmessage><br>Mail Sent successfully..!!!<br><div class=infomessage>Kindly check your mail for further instructions..</div>";
}
?>