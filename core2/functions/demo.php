<?php



$to = "parth@localhost";
$subject = "Hi!";
$body="test";

$headers = "From: admin@localhost"; 

if (mail($to, $subject, $body, $headers)) 
{
echo "Message successfully sent!";
} 

else

{
echo "Message delivery failed...";
}
?>