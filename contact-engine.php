<?php

$Space = Trim(stripslashes($_POST['space']));
$EmailTo = "faithcorinne@gmail.com";
$Subject = "New Space Hub Request";
$Name = Trim(stripslashes($_POST['Name'])); 
$Tel = Trim(stripslashes($_POST['Tel'])); 
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
$Body .= "Tel: ";
$Body .= $Tel;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Space Description: ";
$Body .= $Descript;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$Name>");
echo ($success);
// redirect to success page 
/*if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contact-thanks.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.html\">";
}*/
?>