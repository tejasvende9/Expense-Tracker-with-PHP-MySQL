<?php include 'session-check.php';
      
$msg="";
if(isset($_POST['b1']))
{
   $tdate = $_POST['tdate'];
   $tamt = $_POST['tamt'];
   $treason = $_POST['treason'];
   $tstatus = $_POST['tstatus'];

   $qI="INSERT INTO transactiondetails (tdate,tamt,treason,tstatus,uid)
   VALUES('$tdate',$tamt,'$treason','$tstatus',$id)";

   if($tamt>$balance && $tstatus='Expense')
   {
    echo "<script>
        alert('Your Current balance is low for this transaction');
        window.location.href='show-transaction.php';
    </script>";
   }
   else
   {
    if(mysqli_query($cn,$qI))
   {
    if($tstatus == 'Credit')
    {
    echo "<script>
        alert('Amount Credit Successfully');
        window.location.href='show-transaction.php';
    </script>";
    }
    else
    {
        echo "<script>
        alert('Expense Added Successfully');
        window.location.href='show-transaction.php';
    </script>";
    }

   }
   }
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Add Transaction</title>
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
                    Add Transaction
                </h3>

                <hr>


                <form action="add-credit.php" method="post">

    
                <label>Date </label>
    <input type="date" name="tdate" 
    class="form-control mb-3" required>


                <label>Amount </label>
    <input type="number" name="tamt" placeholder="eg. 500"
    class="form-control mb-3" required>

      <label>Select Choice</label>

      <select name="tstatus" class="form-control">
        <option disabled selected>-- Select Choice --</option>
        <option value="Credit">Credit</option>
        <option value="Expense">Expense</option>
      </select>
    <label>Select Reson </label>
        <select name="treason" id="" class="form-control">
        <option disabled selected>-- Select Reason --</option>

            <option value="Petrol">Petrol</option>
            <option value="Education">Education</option>
            <option value="Shopping">Shopping</option>
        </select>

    <div class="text-center mt-4">
        <input type="submit" value="Add "
        class="btn btn-sm btn-danger" name="b1">

        
    </div>
                </form>
        </div>
</body>
</html>