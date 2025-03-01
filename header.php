<?php

$qCr ="SELECT SUM(tamt) as camt FROM  transactiondetails WHERE uid =$id AND tstatus ='Credit'";
$resultCr= mysqli_query($cn,$qCr);
$datCr = mysqli_fetch_assoc($resultCr);
//var_dump($datCr);
$credit = $datCr['camt'];


$qEx ="SELECT SUM(tamt) as eamt FROM  transactiondetails WHERE uid =$id AND tstatus ='Expense'";
$resultEx= mysqli_query($cn,$qEx);
$datEx = mysqli_fetch_assoc($resultEx);
//var_dump($datEx);
$expense = $datEx['eamt'];

$balance = $credit - $expense;

 ?>

<div class="col-md-8 mx-auto bg-white shadow my-4">
    
        <div class="row">
            <div class="col-md-3 text-center p-3">
<img src="<?php if($dataU['uphoto']=='-'){ echo 'photo/user.png';}
 else { echo $dataU['uphoto'];}?>" alt=""
                width="80%" class="rounded-circle">
            </div>
            <div class="col-md-9 pt-5">
                <h3><?php echo $dataU['unm']?>

                        <br>
                        <?php echo $dataU['uemail']?>
                      
</h3>
    <p>
    <br>
                        Balance = <?php echo $balance;?> Rs /-
    </p>
            </div>
        </div>

        <div class=" text-center p-3">
                <a href="profile.php" class="btn btn-sm btn-danger mx-3">Profile</a>
                <a href="add-credit.php" class="btn btn-sm btn-danger mx-3">Add Entry</a>
                <a href="show-transaction.php" class="btn btn-sm btn-danger mx-3">Show Transaction</a>
                <a href="change-password.php" class="btn btn-sm btn-danger mx-3">Change Password</a>
                <a href="logout.php" class="btn btn-sm btn-danger mx-3">Logout</a>
        </div>
   </div>
