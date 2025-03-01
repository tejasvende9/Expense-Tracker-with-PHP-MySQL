<?php
include 'connection.php';
$msg ="";

if(isset($_POST['b1']))
{
    $em  =$_POST['em'];
    $pwd  =$_POST['pwd'];

    $qS="SELECT * FROM userdetails WHERE uemail = '$em' AND upwd = '$pwd'";
    $result = mysqli_query($cn,$qS);
    $count = mysqli_num_rows($result);

    if($count ==1)
        {
            session_start();
            $data = mysqli_fetch_assoc($result);
           // var_dump($data);
           $_SESSION['id'] =$data['uid'];
           echo "<script>
            alert('Login Successfully');
            window.location.href='profile.php';
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
    <title>Expense Tracker | User Login</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body class="">
        <div class="col-md-4 mx-auto p-3 bg-white shadow-lg mt-5">
    <h3 class="text-center text-danger  animate__animated animate__flash">
                    Login Here...
                </h3>
        <p class="text-center text-danger">
            <?php echo $msg;?>
        </p>
                <hr>


                <form action="index.php" method="post">

    <label>Email </label>
    <input type="email" name="em" placeholder="eg. ajinkya@gmail.com"
    class="form-control mb-3" required>

    <label>Password </label>
    <input type="password" name="pwd" placeholder="Password"
    class="form-control mb-3" required>

    <div class="text-center">
        <input type="submit" value="Login"
        class="btn btn-sm btn-danger" name="b1">

        <p class="mt-2">
            <a href="register.php" class="text-decoration-none">
                Create New Account?
            </a>

            <a href="forgot-password.php" 
            class="text-danger text-decoration-none">
                Forgot Password?
            </a>
        </p>
    </div>
                </form>
        </div>
</body>
</html>