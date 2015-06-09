<?php
	$name = $_POST['name'];
	$email = $_POST['email'];	
	$source = 'magazine';
	$contest_id = $_POST['contest_id'];	
	$success_url = 'http://magdev.tripzilla.com/';
	$form_url = 'http://magdev.tripzilla.com/contest/contest-form.php';
	
	$success_content = '<div>Hi There</div>
						<div>Thank you for participating in TripZilla Giveaways!</div>
						<div>The winner will be announced on <a href="http://magazine.tripzilla.com/contest">http://magazine.tripzilla.com/contest</a> on May 4th.</div>
						<div>Till then, get more of your good friends to participate in the TripZilla Giveaways!</div>
						<div>Simply forward this email or share the links on your Facebook page.</div>
						<div>May the contest be ever in your favour and remember to stay tuned to TripZilla for more travel goodies!</div>';
	if (!$name || !$email){
    	$error = true;    	
  	}

	$check_submission = check_already_submit($email);
	if (!empty($check_submission)) {
		$error = true;		
	}

	if (!$error) {
		$success = add_submission($email,$name,$source,$contest_id);
		$result = send_success_email($email,$name,$success_content);
		header('Location: '.$success_url);
		exit();	
	}	
	else{
		header('Location: '.$form_url);
		exit();	
		echo 'will redirect form page with error msg';
	}  

function add_submission($email,$name,$source,$contest_id){	
	$dbh = getdbh();
	$mobile_id = NULL;
	$email = $email;	
	$location = 'SG';
	$source = $source;
	$contest_id = $contest_id;
	$statement = 'INSERT INTO `T_Contest` 
				(mobile_id,email, name,location,contest_id,source,created_dt) 
				VALUES (?,?,?,?,?,?,NOW())';
	$sql = $dbh->prepare($statement);
	$result = $sql->execute(array($mobile_id,$email,$name, $location,$contest_id,$source));
	return $result;
}

function check_already_submit($email){
	$dbh = getdbh();
	$statement="SELECT email FROM `T_Contest` WHERE email = '$email'"; 	  
    $sql = $dbh->prepare($statement);
    $sql->execute();
    $result=$sql->fetch();    
    return $result;  
}

function send_success_email($email,$name,$success_content){
	require_once '/var/www/sites/magazine/contest/phpmailer/PHPMailerAutoload.php';	 
	//PHPMailer Object
	$mail = new PHPMailer;	 
	//From email address and name
	$mail->From = "magdev.tripzilla.com";
	$mail->FromName = "TripZilla Magazine";
	 
	//To address and name
	$mail->addAddress($email, $name);
	//$mail->addAddress("recepient1@example.com"); //Recipient name is optional
	 
	//Address to which recipient will reply
	$mail->addReplyTo("yehtut.it@gmail.com", "Reply");
	 
	//CC and BCC
	// $mail->addCC("cc@example.com");
	// $mail->addBCC("bcc@example.com");
	 
	//Send HTML or Plain Text email
	$mail->isHTML(true);
	 
	$mail->Subject = "Success Email";
	$mail->Body = $success_content;
	$mail->AltBody = "This is the plain text version of the email content";	 

	if(!$mail->send()) 
	{
	    $result =  "Mailer Error: " . $mail->ErrorInfo;
	} 
	else
	{
	    $result = "Message has been sent successfully";
	}
	
	return $result;
}

function send_success_email_with_smtp(){
	require_once '/var/www/sites/magazine/contest/phpmailer/PHPMailerAutoload.php';
	$mail = new PHPMailer;
	//Enable SMTP debugging. 
	// $mail->SMTPDebug = 3;                               
	// //Set PHPMailer to use SMTP.
	// $mail->isSMTP();            
	                    
	// $mail->Host = "smtp.mailgun.org";
	// //Set this to true if SMTP host requires authentication to send email
	// $mail->SMTPAuth = true;                          
	// //Provide username and password     
	// $mail->Username = "edm@tripzilla.com";                 
	// $mail->Password = "edm1234!";                           
	// //If SMTP requires TLS encryption then set it
	// $mail->SMTPSecure = "tls";                           
	// //Set TCP port to connect to 
	// $mail->Port = 587;                                   
	 
	// $mail->From = "edm@tripzilla.com";
	// $mail->FromName = "TripZilla Magazine";
	 
	// $mail->addAddress("ye.minhtut@travelogy.com", "Recepient Name");
	 
	// $mail->isHTML(true);
	 
	// $mail->Subject = "Subject Text";
	// $mail->Body = "<i>Mail body in HTML</i>";
	// $mail->AltBody = "This is the plain text version of the email content";
	 
	// if(!$mail->send()) 
	// {
	//     echo "Mailer Error: " . $mail->ErrorInfo;
	// } 
	// else
	// {
	//     echo "Message has been sent successfully";
	// }
	

}

function getdbh() {
  if (!isset($GLOBALS['dbh']))
    try {      
      $GLOBALS['dbh'] = new PDO('mysql:host=localhost;dbname=wp', 'wp', 'wp88!');
    } catch (PDOException $e) {
      die('Connection failed: '.$e->getMessage());
    }
  return $GLOBALS['dbh'];
}



