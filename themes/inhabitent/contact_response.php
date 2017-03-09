
<?php 

include("../../../wp-config.php");
//get the form elements and store them in variables
$name=$_POST["name"]; 
$email=$_POST["email"]; 
$subject=$_POST["subject"];
$message = $_POST["message"];
$redirect = $_POST['redirect'];

//establish connection
$con = mysqli_connect(DB_HOST, DB_USER,DB_PASSWORD, DB_NAME); 
//on connection failure, throw an error
if(!$con) {  
die('Could not connect: '.mysql_error()); 
}

$sql="INSERT INTO wp_contact ( name, email, subject, message) VALUES ('$name','$email', '$subject', '$message')";

mysqli_query($con,$sql); 

mail("$email, info@inhabitent.com", $subject, $message);

//Redirects to the specified page
header("Location: $redirect"); 
?>









