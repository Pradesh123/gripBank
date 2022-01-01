<html>
    <head>
        <title>Transaction Process</title>
        <link rel="stylesheet" href="process.css">
    </head>
    <body> 
      <div class="sender">
      <h1>SENDER DETAILS</h1>
      </div> 
      <table>
            <tr>
                <th>ACCOUNT ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>BALANCE</th>
            </tr>

            <?php
            $rowid=$_GET['idd'];
            $conn=mysqli_connect('127.0.0.1','root','','bank');
            $sql=mysqli_query($conn,"SELECT ID,NAME,EMAIL,BALANCE FROM user where ID=$rowid");
            $print_data=mysqli_fetch_row($sql);
            ?>
                    
            <tr><td><?php echo $print_data[0]?></td>
            <td><?php echo $print_data[1]?></td>
            <td><?php echo $print_data[2]?></td>
            <td><?php echo $print_data[3]?></td></tr>
                   
        </table>

        <h1 class="reciever">RECIEVER ACCOUNT ID :</h1>
        <h1 class="amount">Transfer Amount :</h1>
        <form action="processresult.php" method="post">
        <input type="hidden" name="fro" value="<?php echo $rowid; ?>">
        <input type="text" name="sendaccno" placeholder="Enter Account Id"><br>
        <input type="text" name="Amount" placeholder="Enter the Amount"><br><br>
        <input type="submit" name="submit" value="submit">
        </form>
      
    </body>
</html>