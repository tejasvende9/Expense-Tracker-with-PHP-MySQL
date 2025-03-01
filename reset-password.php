<?php session_start();
include 'connection.php';
$msg="";
    if(!isset($_SESSION['email']))
    {
        echo "<script>
        window.location.href='forgot-password.php';
        </script>";
    }
    else
    {
$email =   $_SESSION['email'];

    }
if(isset($_POST['b1']))
{
    $np = $_POST['npwd'];
    $cp = $_POST['cpwd'];
        if($np == $cp)
        {
$qUP="UPDATE userdetails SET upwd = '$np' WHERE uemail = '$email'";
            if(mysqli_query($cn,$qUP))
            {
                echo "<script>
                    alert('Password Reset Successfully');
                    window.location.href='index.php';
                </script>";
            }

            else
            {
                $msg ="Failed To Reset Password";
            }
        }

        else
        {
            $msg = "Password Does Not Match";
        }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Reset Password</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body class="">
        <div class="col-md-4 mx-auto p-3 bg-white shadow-lg mt-5">
    <h3 class="text-center text-danger  animate__animated animate__flash">
                    Reset Password...
                </h3>

                <p class="text-center text-danger">
                    <?php echo $msg;?>
                </p>

                <hr>


                <form action="reset-password.php" method="post">

    
    <label>New Password </label>
    <input type="password" name="npwd" placeholder="Password"
    class="form-control mb-3" required>

      
    <label>Confirm Password </label>
    <input type="password" name="cpwd" placeholder="Password"
    class="form-control mb-3" required>

    <div class="text-center">
        <input type="submit" value="Reset"
        class="btn btn-sm btn-danger" name="b1">

        <p class="mt-2">
            
            <a href="index.php" 
            class="text-danger text-decoration-none">
                Back
            </a>
        </p>
    </div>
                </form>
        </div>
</body>
</html>