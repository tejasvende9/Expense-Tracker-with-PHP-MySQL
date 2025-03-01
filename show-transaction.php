<?php include 'session-check.php';
    if(isset($_GET['delid']))
    {
       $delId=  $_GET['delid'];

       $QD="DELETE FROM  transactiondetails WHERE tid =$delId";
        if(mysqli_query($cn,$QD))
        {
            echo "<script>
        alert('Transaction Deleted Successfully');
        window.location.href='show-transaction.php';
    </script>";
        }
        else
        {
            echo "<script>
            alert('Failed To Delete Transaction');
            window.location.href='show-transaction.php';
        </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Transaction History</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body class="">
  
   <?php  include 'header.php';?>


        <div class="col-md-8 mx-auto p-3 bg-white shadow-lg ">
    <h3 class="text-center text-danger  animate__animated animate__flash">
                    Your Transaction History(  <?php echo $balance;?> Rs/-)
                </h3>

                <hr>

                <table class="table table-bordered display" id="mydata">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Date</th>
                            <th>Reason</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>


                    </thead>

                    <tbody>

                    <?php
    $qT="SELECT * FROM transactiondetails WHERE uid = $id";
    $resultT=mysqli_query($cn,$qT);
        while($dataT= mysqli_fetch_assoc($resultT))
        {
            //var_dump($dataT);
       ?>
                        <tr>
                            <td>ET-<?php echo $dataT['tid'];?></td>
                            <td><?php echo $dataT['tdate'];?></td>
                            <td><?php echo $dataT['treason'];?></td>
 <td class="<?php if($dataT['tstatus'] == 'Credit'){ echo 'text-success';} else{ echo 'text-danger';}?>">
    <?php echo $dataT['tamt'];?> Rs/-
</td>
                            <td>
                              
    <a href="show-transaction.php?delid=<?php echo $dataT['tid'];?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>

        <?php
         }
         ?>

                    </tbody>
                </table>


        </div>

        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>

new DataTable('#mydata');
</script>

    </body>
</html>