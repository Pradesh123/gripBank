<html>
    <head>
        <title>Transaction Details</title>
        <link rel="stylesheet" href="transaction.css">
    </head>
    <body>
    <div class="heading"><h1>
                <span class="shead"><b>T</b></span>HE 
                <span class="shead"><b>S</b></span>PARKS 
                <span class="shead"><b>F</b></span>OUNDATION 
                <span class="shead"><b>B</b></span>ANK</b></h1></div>
        <div class="sologan">
        <h2><span class="shead"><b>T</b></span>RANSACTION <span class="shead"><b>H</b></span>ISTORY</h2>
        </div>
        <form action="rowfetch.php">
        <table>
            <tr>
                <th>TRANSACTION_NO</th>
                <th>SENDER_ID</th>
                <th>SENDER_NAME</th>
                <th>RECIEVER_ID</th>
                <th>RECIEVER_NAME</th>
                <th>TRANSFER_AMOUNT</th>
                <th>DATE</th>
                
                
            </tr>
            <?php
            $conn=new mysqli('localhost','root','','bank');
            if($conn->connect_error){
                die('Connection Failed : '.$conn->connect_error);
            }
            $sql="SELECT TRANSACTION_NO,SENDER_ID,SENDER_NAME,RECIEVER_ID,RECIEVER_NAME,TRANSFER_AMOUNT,DATE  
            from transcation_history";
            
            $result=$conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
            ?>
                    <tr>
                        <td><?php echo $row["TRANSACTION_NO"];?></td>
                        <td><?php echo $row["SENDER_ID"];?></td>
                        <td><?php echo $row["SENDER_NAME"];?></td>
                        <td><?php echo $row["RECIEVER_ID"];?></td>
                        <td><?php echo $row["RECIEVER_NAME"];?></td>
                        <td><?php echo $row["TRANSFER_AMOUNT"];?></td>
                        <td><?php echo $row["DATE"];?></td>
                        
                       
                    </tr>
                    <?php
                }   
            }
           
            ?>
        </table>
    </body>
</html>