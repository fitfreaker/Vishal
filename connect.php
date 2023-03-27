<?php
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$email=$_POST['email'];
$number=$_POST['number'];
$message=$_POST['message'];

//database connection
$conn=new mysqli('localhost','root','','gym');
if($conn->connect_error)
{
    die('connection failed : '.$conn->connect_error);
}else{
    $stmt=$conn->prepare("insert into registration(firstName,lastName,email,number,message)values(?,?,?,?,?)");
    $stmt->bind_param("sssi",$firstName,$lastName,$email,$number,$message);
    $stmt->execute();
    echo "Registration Successfully..";
    $stmt->close();
    $conn->close();
}
?>