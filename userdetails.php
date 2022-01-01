<?php
$name=$_POST['name'];
$email=$_POST['email'];
$balance=$_POST['balance'];
$conn=new mysqli('localhost','root','','bank');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into user(name,email,balance) 
    values(?,?,?)");
    $stmt->bind_param("ssi",$name,$email,$balance);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}
header("Location:http://localhost/Bank_Website_GRIP/Homepage.html");
?>
