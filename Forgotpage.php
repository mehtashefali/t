<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include("./db.php");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);


$filter = ['Email' => $_POST["Email"]]; 
$options = ['limit' => 1];
$query = new MongoDB\Driver\Query($filter, $options);
$cursor =$manager->executeQuery('tpp.Student', $query);
$cursor1 =$manager->executeQuery('tpp.Student', $query);
$arr = $cursor1->toArray();

$messg="";

if(count($arr)>=1)
{
	
foreach ($cursor as $document) 
{	
$row = (array)$document;
//$_SESSION['userid']= $row['_id'];
$myname= $row['FirstName'].' '.$row['MidName'].' '.$row['LastName'];
$myemail= $row['Email'];
$mypassword= $row['Password'];

$messg="Hi ".$myname." </br> Your Email Id - ".$myemail." </br> Your Password=".$mypassword;

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mehtashefali1999@gmail.com';                     //SMTP username
    $mail->Password   = 'Shefu@10';                               //SMTP password
    $mail->SMTPSecure = 'tls';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('mehtashefali1999@gmail.com', 'Mailer');
    $mail->addAddress($myemail, $myname);     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
   
//   $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Forgot Password Request';
    $mail->Body    = $messg;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<font color="#009900" >Message has been sent On Your Email</font>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


}
}
	

if($messg=="")
	{

	    echo "<font color='#990000' >Enter Valid Email.!</font>";
	}

?>
