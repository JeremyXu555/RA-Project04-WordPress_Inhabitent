
<?php 

include("../../../wp-config.php");
//get the form elements and store them in variables
$name=$_POST["name"]; 
$email=$_POST["email"]; 
$subject=$_POST["subject"];
$message = $_POST["message"];

//establish connection
$con = mysqli_connect(DB_HOST, DB_USER,DB_PASSWORD, DB_NAME); 
//on connection failure, throw an error
if(!$con) {  
die('Could not connect: '.mysql_error()); 
} else {
	echo "connected database successfully";
}

$sql="INSERT INTO wp_contact ( name, email, subject, message) VALUES ('$name','$email', '$subject', '$message')";

mysqli_query($con,$sql); 

// mail($email, $subject, $message);

//Redirects to the specified page
// header("Location: http://your-success-page-url"); 

?>

