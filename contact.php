<?php

$EmailFrom = "noreply@legitdevelopment.com";
$EmailTo = "toltmanns@gmail.com";
$Subject = "New Contact Message";
$name = Trim(stripslashes($_REQUEST['name']));
$contact = Trim(stripslashes($_REQUEST['contact']));
$email = Trim(stripslashes($_REQUEST['email']));
$message = Trim(stripslashes($_REQUEST['message']));
//var_dump($_REQUEST);
//exit;

// validation
$validationOK=true;
if($email){
	$validationOK = false;
}
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Contact: ";
$Body .= $contact;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=thanks.html\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
}
?>