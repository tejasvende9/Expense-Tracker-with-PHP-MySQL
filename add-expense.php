<?php include 'session-check.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Expense</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body class="">
  
   <?php  include 'header.php';?>

        <div class="col-md-4 mx-auto p-3 bg-white shadow-lg ">
    <h3 class="text-center text-danger  animate__animated animate__flash">
                    Add Expense
                </h3>

                <hr>


                <form action="add-credit.php" method="post">

    
                <label>Date </label>
    <input type="date" name="edate" 
    class="form-control mb-3" required>


                <label>Amount </label>
    <input type="number" name="amt" placeholder="eg. 500"
    class="form-control mb-3" required>

      
    <label>Select Reson </label>
        <select name="reason" id="" class="form-control">
            <option value="Petrol">Petrol</option>
            <option value="Education">Education</option>
            <option value="Shopping">Shopping</option>
        </select>

    <div class="text-center mt-4">
        <input type="submit" value="Add Expense"
        class="btn btn-sm btn-danger">

        
    </div>
                </form>
        </div>
</body>
</html>