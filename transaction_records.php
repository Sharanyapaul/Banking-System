<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="transaction.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">ZMFC BANK</a>
            <div class="collapse" id="navbarNavAltMarkup"></div>
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="home.html">Home</a>
                <a class="nav-item nav-link" href="customer_list.php">Our Customers</a>
                <a class="nav-item nav-link" href="transaction_records.php">Transaction Details</a>
            </div>
        </nav>

        <h1>Transaction Details</h1>

        <?php
                $link=mysqli_connect("localhost","users"," ","bankdetails");
                $select="select * from Transaction_Details";

                echo '<table border="1" cellspacing="0" cellpadding="25"> 
                    <thead>
                        <tr> 
                            <td> SNo. </td>
                            <td> Sender Id </td> 
                            <td> Sender Name </td> 
                            <td> Receiver Name </td> 
                            <td> Amount Transferred(Rs) </td> 
                            <td> Date and Time of Transaction </td>
                            
                        </tr>
                    </thead>';

                if ($result = mysqli_query($link,$select)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $field1name = $row["SNo"];
                        $field2name = $row["Sender_Id"];
                        $field3name = $row["Sender_Name"];
                        $field4name = $row["Receiver_Name"];
                        $field5name = $row["Amount"];
                        $field6name = $row["DateTime"]; 
                
                        echo '<tbody>
                                <tr> 
                                        <td>'.$field1name.'</td> 
                                        <td>'.$field2name.'</td> 
                                        <td>'.$field3name.'</td> 
                                        <td>'.$field4name.'</td> 
                                        <td>'.$field5name.'</td>
                                        <td>'.$field6name.'</td> 
                                </tr>
                            </tbody>';
                    }
                    $result->free();
                }
                
            ?>
    </body>
</html>