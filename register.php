<?php
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$race_type=$_POST['skill_level'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$age = $_POST['age'];
$pass = $_POST['password'];
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'lab');
$q="INSERT INTO users VALUES ('$fname', '$lname', '$race_type', '$email', '$phone', '$age', '$pass')";
$result=mysqli_query($con,$q);
if($result!=1){
    echo "Error registering your details.";
}
else
echo "Success.";
mysqli_close($con);
?>