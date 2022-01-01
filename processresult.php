<html>
<?php
$from=$_POST['fro'];
$to=$_POST['sendaccno'];
$amount=$_POST['Amount'];

$conn=mysqli_connect('127.0.0.1','root','','bank');
$sql=mysqli_query($conn,"SELECT BALANCE FROM user where ID=$from");
$print_data=mysqli_fetch_row($sql);

if($print_data[0]<0){
    echo "<script>alert('Negative Value(amount) not Accepted')</script>";
    echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
}
if($print_data[0]==0){
    echo "<script>alert('Can't Send ₹0 Amount')</script>";
    echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
}
if($print_data[0]<$amount){
    echo "<script>alert('Insufficient Balance...')</script>";
    echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";

}
$final=$print_data[0]-$amount;
$sql = "UPDATE user SET BALANCE=$final WHERE ID=$from";
if ($conn->query($sql) === TRUE) {
  } else {
    echo "Error updating record: " . $conn->error;
  }
$conn->close();

$conn=mysqli_connect('127.0.0.1','root','','bank');
$sql=mysqli_query($conn,"SELECT BALANCE FROM user where ID=$to");
$print_data=mysqli_fetch_row($sql);
$inc=$print_data[0]+$amount;

$sql = "UPDATE user SET BALANCE=$inc WHERE ID=$to";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record updated successfully')</script>";
  } else {
    echo "Error updating record: " . $conn->error;
  }
$conn->close();

?>

<form action="history.php" method="post">
        <input type="hidden" name="fro" value="<?php echo $from; ?>">
        <input type="hidden" name="rec" value="<?php echo $to; ?>">
        <input type="hidden" name="amo" value="<?php echo $amount; ?>">
        <input type="submit" value="Click Here To Return Home" 
        onclick="alert('Transaction updated successfully in database...')">
</form>

</html>
 
