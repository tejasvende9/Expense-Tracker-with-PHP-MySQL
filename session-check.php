<?php session_start();

$cn =mysqli_connect("localhost","root","","expensetracker");
    if(!isset( $_SESSION['id']))
    {
        echo "<script>
       
        window.location.href='index.php';
        </script>";
    }
    else
    {
        $id =$_SESSION['id'];
        $qcu = "SELECT * FROM userdetails WHERE uid = $id";
        $resultU=mysqli_query($cn,$qcu);
        $dataU=mysqli_fetch_assoc($resultU);
    }

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
    
    //var_dump($dataU);
?>