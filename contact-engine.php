<?php

ini_set("SMTP","smtp.my.isp.net" ); 
ini_set('sendmail_from', 'user@example.com'); 

$Space = $_POST['space'];
$EmailTo = "dskwon19@gmail.com";
$Subject = "New Space Hub Request";
$Name = Trim(stripslashes($_POST['Name'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$Descript = Trim(stripslashes($_POST['Descript'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name of Space: ";
$Body .= $Space;
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Space Description: ";
$Body .= $Descript;
$Body .= "\n";

// send email 
$header = 'From: '.$Email."\r\n";
mail($EmailTo, $Subject, $Body, $header);

// redirect to success page 
/*  print "<meta http-equiv=\"refresh\" content=\"0;URL=contact-thanks.php\">";*/
/*else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
}*/
?>