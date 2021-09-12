<?php
    @$demo=$_POST['number'];
    if(!$demo){
      header("Location:customer_list.php");
    }
    $link=mysqli_connect("localhost","users"," ","bankdetails"); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="style_transfer.css">
    </head>
    <body>
      <form method="post" action="transaction.php">
    
        <div class="form-group">
          <label for="exampleInput1" class="sender_label">Sender ID:</label>
          <textarea class="form-control" id="exampleInput1" name="user_id" rows="2" readonly>
            <?php
              $user_id="select Id from Customer_Details where SNo=$demo";
              $result= mysqli_query($link,$user_id);
              $row=mysqli_fetch_assoc($result);
              echo($row['Id']);
            ?>
          </textarea>
          <label for="exampleInput2" class="sender_label"> Sender Name:</label>
          <textarea class="form-control" id="exampleInput2" name="user_name" rows="2" readonly>
            <?php 
              $user_name="select Customer_Name from Customer_Details where SNo=$demo";
              $result= mysqli_query($link,$user_name);
              $row=mysqli_fetch_assoc($result);
              echo($row['Customer_Name']);
              
            ?>
          </textarea>
        </div>
        
        <div class="form-group">
          <label for="exampleSelect">Transfer To:</label>
          <select class="form-control" id="exampleSelect" name="receiver_name">
              <?php
                $query="select * from Customer_Details where SNo!= $demo";
                $result = mysqli_query($link,$query);
                  while ($row = mysqli_fetch_assoc($result)) :;
              ?>
              <option>
                  <?php echo $row["Customer_Name"];
                  ?>
              </option>
              <?php 
                endwhile; 
            ?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Enter Amount To Transfer:</label>
          <input type="number" class="form-control" id="amount" name="user_amt" rows="1" placeholder="Please type in Rupees" required>
        </div>
        <button type="submit" id= "submit_btn">Submit</button>
        
      </form>
      

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
    </body>
</html>