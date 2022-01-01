<html>
    <head>
        <title>Transaction</title>
        <link rel="stylesheet" href="transaction.css">
    </head>
    <body>
    <div class="heading"><h1>
                <span class="shead"><b>T</b></span>HE 
                <span class="shead"><b>S</b></span>PARKS 
                <span class="shead"><b>F</b></span>OUNDATION 
                <span class="shead"><b>B</b></span>ANK</b></h1></div>
        <div class="sologan">
        <h2>A TRADITION OF TRUST</h2>
        </div>
        <form action="process.php">
        <table id="table">
            <tr>
                <th>ACCOUNT_ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>BALANCE</th>
                
                
            </tr>
            <?php
            $conn=new mysqli('localhost','root','','bank');
            if($conn->connect_error){
                die('Connection Failed : '.$conn->connect_error);
            }
            $sql="SELECT ID,NAME,EMAIL,BALANCE from user";
            
            $result=$conn->query($sql);
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
            ?>
                    <tr>
                        <td><?php echo $row["ID"];?></td>
                        <td><?php echo $row["NAME"];?></td>
                        <td><?php echo $row["EMAIL"];?></td>
                        <td><?php echo $row["BALANCE"];?></td>
                        <td><a href="process.php?idd= <?php echo $row["ID"]; ?>"><button type="button" id="btn">Transcation</button></td>
                       
                    </tr>
                    <?php
                }   
            }
           
            ?>
        </table>
    </body>
</html>