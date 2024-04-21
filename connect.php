<?php

$name=$_POST['name']
$email=$_POST['email']
$Subject=$_POST['Subject']
$Message=$_POST['Message']


// Database connection
$conn = new mysqli('localhost','root','',contact);
if($conn->connect_error)
{
    die('conection failed :'. $conn->connect_error)
} else {
    $stmt = $conn->prepare("insert into contact(name, email, Subject, Message) values(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $Subject, $Message);
    $execval = $stmt->execute();
    echo $execval;
    echo "Request sent successfully...";
    $stmt->close();
    $conn->close();
}

?>