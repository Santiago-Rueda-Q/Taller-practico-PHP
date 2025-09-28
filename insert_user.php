<?php
include("connection.php");
$con = connection();

$id=null;
$name=$_POST['name'];
$lastname=$_POST['lastname'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];


$sql = "INSERT INTO users (name, lastname, username, email, password) 
        VALUES ('$name', '$lastname', '$username', '$email', '$password')";

$query = mysqli_query($con, $sql);

if($query){
    Header("Location: index.php");
};

?>