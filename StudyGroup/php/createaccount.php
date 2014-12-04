<?php
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="studygroup";

$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

//$con->close();
$firstname = $_POST['firstname']; 
$lastname = $_POST['lastname']; 
$email = $_POST['email']; 
$password = $_POST['password']; 
$month = $_POST['month']; 
$day = $_POST['day']; 
$year = $_POST['year']; 
$birthday =  $month.'/'.$day.'/'.$year;
$school = $_POST['school']; 
$zipcode = $_POST['zipcode'];
//Query
$query = "INSERT INTO student (firstName,lastName,email,password,dateOfBirth,federalCode,zipCode) VALUES ('$firstname','$lastname','$email','$password','$birthday','$school','$zipcode')";
if ($querytest = mysqli_query($con, $query)) {
		header('Location: ../login.html');
	}
	else {
		echo 'Connection Error.';
	}
?>