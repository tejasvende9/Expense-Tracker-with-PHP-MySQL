<?php
include 'connection.php';
$msg ="";
if(isset($_POST['b1']))
{
  
    $em = $_POST['em'];
    $que = $_POST['que'];
    $ans = $_POST['ans'];

    $qF="SELECT * FROM userdetails WHERE  uemail='$em' AND uque='$que'
    AND uans = '$ans'";

    $resultF = mysqli_query($cn,$qF);
    $count = mysqli_num_rows($resultF);

        if($count ==1)
        {
            session_start();
            $dataF = mysqli_fetch_assoc($resultF);
           // var_dump($dataF);
                $_SESSION['email']  = $dataF['uemail'];

                echo "<script>
                window.location.href='reset-password.php';
                </script>";

        }

        else
        {
            $msg = "Invalid Credentials";

        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Forgot Password</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body class="">
        <div class="col-md-4 mx-auto p-3 bg-white shadow-lg mt-5">
    <h3 class="text-center text-danger  animate__animated animate__flash">
                    Forgot Password..
                </h3>

                <p class="text-center text-danger">
                    <?php echo $msg;?>
                </p>

                <hr>


                <form action="forgot-password.php" method="post">

 
    <label>Email </label>
    <input type="email" name="em" placeholder="eg. ram@gmail.com"
    class="form-control mb-3" required>

   
    <label>Select Question </label>
    <select name="que" class="form-control">
        <option selected diasbled>--Select Security question --</option>
        <option value="What is your Hobby">What is your Hobby?</option>
        <option value="What is your School Name">What is your Schhol Name?</option>
        <option value="What is your Favourite food ">What is your Favourite Food?</option>

    </select>

    <label>Answer </label>
    <input type="password" name="ans" placeholder="Answer"
    class="form-control mb-3" required>


    <div class="text-center">
        <input type="submit" value="Forgot Password"
        class="btn btn-sm btn-danger" name="b1">

        <p class="mt-2">
            <a href="index.php" class="text-decoration-none">
                Back
            </a>
        </p>
    </div>
                </form>
        </div>
</body>
</html