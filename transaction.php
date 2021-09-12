<?php
    $link=mysqli_connect("localhost","users"," ","bankdetails");

    $create="CREATE TABLE Transaction_Details
            (SNo int NOT NULL AUTO_INCREMENT,
            Sender_Id int(5) NOT NULL,
            Sender_Name varchar(50) NOT NULL,
            Receiver_Name varchar(50) NOT NULL,
            Amount int(10) NOT NULL,
            DateTime datetime NOT NULL,
            PRIMARY KEY  (SNo))";

    mysqli_query($link,$create);

    $receiver_name=$_POST['receiver_name'];
        
    $sender_id=$_POST['user_id'];
    
    $receiver_bal = "SELECT * from Customer_Details WHERE Customer_Name='$receiver_name'";
    $sql1=mysqli_query($link,$receiver_bal);
    $receiver_current_bal = mysqli_fetch_array($sql1);

    $sender_bal="SELECT * from Customer_Details WHERE id='$sender_id'";
    $sql2=mysqli_query($link,$sender_bal);
    $sender_current_bal = mysqli_fetch_array($sql2);

    if($_POST['user_amt'] < 0){
        echo '<script type="text/javascript">';
        echo 'alert("Sorry! Negative values cannot be transferred")';
        echo '</script>';
    }

    else if($_POST['user_amt'] > $sender_current_bal['CurrentBalance']) 
    {
        echo '<script type="text/javascript">';
        echo 'alert("Bad Luck! Insufficient Balance")';
        echo '</script>';
    }

    else if($_POST['user_amt'] == 0){
        echo '<script type="text/javascript">';
        echo 'alert("No money is tranferred from your account")';
        echo '</script>';
    }

    else{
        $insert="INSERT INTO Transaction_Details(Sender_Id, Sender_Name, Receiver_Name, Amount, DateTime)
                VALUES('".mysqli_real_escape_string($link,$_POST['user_id'])."',
                '".mysqli_real_escape_string($link,$_POST['user_name'])."',
                '".mysqli_real_escape_string($link,$_POST['receiver_name'])."',
                '".mysqli_real_escape_string($link,$_POST['user_amt'])."',now())";
        
        mysqli_query($link,$insert);
        
        $receiver_finalBal = $receiver_current_bal['CurrentBalance'] + $_POST['user_amt'];

        $sender_finalBal = $sender_current_bal['CurrentBalance'] - $_POST['user_amt'];
        
        $update1="UPDATE Customer_Details SET CurrentBalance = $receiver_finalBal WHERE Customer_Name='$receiver_name'";
        mysqli_query($link,$update1);

        $update2="UPDATE Customer_Details SET CurrentBalance = $sender_finalBal WHERE id='$sender_id'";
        mysqli_query($link,$update2);

        echo '<script>
        alert("Congratulations!! Your payment is successful");
        </script> ';

    }

?>

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