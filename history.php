<html>
<?php
$SENDER_ID=$_POST['fro'];
$RECIEVER_ID=$_POST['rec'];
$TRANSFER_AMOUNT=$_POST['amo'];


$DATE=date("Y-m-d");


$conn=new mysqli('localhost','root','','bank');
$sql=mysqli_query($conn,"SELECT name FROM user where ID=$SENDER_ID");
$print_data=mysqli_fetch_row($sql);
$SENDER_NAME=$print_data[0];
$sql=mysqli_query($conn,"SELECT name FROM user where ID=$RECIEVER_ID");
$print_data=mysqli_fetch_row($sql);
$RECIEVER_NAME=$print_data[0];

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into transcation_history(SENDER_ID,SENDER_NAME,RECIEVER_ID,RECIEVER_NAME,TRANSFER_AMOUNT) 
    values(?,?,?,?,?)");
    $stmt->bind_param("isisi",$SENDER_ID,$SENDER_NAME,$RECIEVER_ID,$RECIEVER_NAME,$TRANSFER_AMOUNT);
    $stmt->execute();
    header("Location:http://localhost:8080/Bank_Website_GRIP/Homepage.html");
    $stmt->close();
    $conn->close();
}



?>
</html>