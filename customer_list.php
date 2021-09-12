<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        
        <link rel="stylesheet" href="customer_list.css">
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
        <h1>CUSTOMER LIST</h1>
        <div class="display">
            <form method="post" action="transfer.php">
                <input type="submit" name="button" class="btn" id="submit_button" value="Transfer Now">
                <input type="radio" name="number" id="button1" value=1><br>
                <input type="radio" name="number" id="button2" value=2><br>
                <input type="radio" name="number" id="button3" value=3><br>
                <input type="radio" name="number" id="button4" value=4><br>
                <input type="radio" name="number" id="button5" value=5><br>
                <input type="radio" name="number" id="button6" value=6><br>
                <input type="radio" name="number" id="button7" value=7><br>
                <input type="radio" name="number" id="button8" value=8><br>
                <input type="radio" name="number" id="button9" value=9><br>
                <input type="radio" name="number" id="button10" value=10>
            </form>
            <?php
                
                $link=mysqli_connect("localhost","users"," ","bankdetails");
                
                $create="CREATE TABLE Customer_Details
                (SNo int(2) NOT NULL,
                Id int(5) NOT NULL, 
                Customer_Name varchar(50) NOT NULL, 
                Email varchar(100) NOT NULL, 
                Gender varchar(6) NOT NULL, 
                Region varchar(20) NOT NULL, 
                CurrentBalance int(20) NOT NULL, 
                PRIMARY KEY  (SNo))";

                mysqli_query($link,$create);
                
                $query="INSERT INTO Customer_Details(SNo,Id, Customer_Name, Email, Gender, Region, CurrentBalance)
                        VALUES(1, 16789, 'Rahul Sinha', 'rahul2@gmail.com', 'Male', 'India', 4567),
                        (2, 15678, 'Neha Chowdhauri', 'chowdhauri_neha@yahoo.com', 'Female', 'United Kindom',500000),
                        (3, 14567, 'Rob Smith', 'rob_smith@outlook.com', 'Male', 'Canada',879000),
                        (4, 21537, 'Mukesh Agarwal', 'mukesh67@gmail.com', 'Male', 'India',4600),
                        (5, 20000, 'Disha Patel', 'patel_disha@outlook.com', 'Female', 'Germany',200),
                        (6, 30021, 'Robin Bakshi', 'robin_official@gmail.com', 'Male', 'Italy',3500),
                        (7, 38901, 'Alia Banerjee', 'banarjee_alia21@icloud.com', 'Female', 'Mexico',179590),
                        (8, 10567, 'Rob Hansen', 'hansen_rob@icloud.com', 'Male', 'Canada',700),
                        (9, 23567, 'Nancy Smith', 'nancy_smith@outlook.com', 'Female', 'Italy',13542),
                        (10, 30007, 'Arushi Patel', 'arushi@yahoo.in', 'Female', 'India',9800000)";
                
                mysqli_query($link,$query);

                $select="select * from Customer_Details";

                echo '<table border="1" cellspacing="0" cellpadding="25"> 
                    <thead>
                        <tr> 
                            <td> Customer Id </td> 
                            <td> Name</td> 
                            <td> Email Address</td> 
                            <td> Gender</td> 
                            <td> Region</td>
                            <td> Current Balance(Rs)</td> 
                        </tr>
                    </thead>';

                if ($result = mysqli_query($link,$select)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $field1name = $row["Id"];
                        $field2name = $row["Customer_Name"];
                        $field3name = $row["Email"];
                        $field4name = $row["Gender"];
                        $field5name = $row["Region"];
                        $field6name = $row["CurrentBalance"];
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
            
        </div>

        <script>
            alert("Please select any user to start transaction!!");
        </script>
    </body>
</html>