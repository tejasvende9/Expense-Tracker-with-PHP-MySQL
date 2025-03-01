<?php include 'session-check.php';
$msg ="";

if(isset($_POST["b1"]))
{

  $opwd = $_POST['opwd'];
  $npwd = $_POST['npwd'];
  $cpwd = $_POST['cpwd'];
  $qP = "SELECT * FROM userdetails WHERE uid= $id AND upwd = '$opwd'";
  $resultP=mysqli_query($cn,$qP);
  $count = mysqli_num_rows($resultP);
        if($count ==1)
        {
            if($npwd == $cpwd)
            {
    $qU="UPDATE userdetails SET upwd = '$npwd' WHERE uid= $id";
                if(mysqli_query($cn,$qU))
                {
                    session_destroy();
                    echo "<script>
                    alert('Password Update Successfully');
                    window.location.href='index.php';
                    </script>";
                }

                else
                {
                    $msg ="Failed To Update Password";
                }

            }
            else
            {
                $msg="New And Confirm Password does not match";
            }
        }

        else
        {
            $msg ="Old Password is incorrect";
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Change Password</title>
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
                    Change Password
                </h3>

        <p class="text-danger text-center">
            <?php echo $msg;?>
        </p>

                <hr>


                <form action="change-password.php" method="post">

    
                <label>Old Password </label>
    <input type="password" name="opwd" placeholder="Password"
    class="form-control mb-3" required>


                <label>New Password </label>
    <input type="password" name="npwd" placeholder="Password"
    class="form-control mb-3" required>

      
    <label>Confirm Password </label>
    <input type="password" name="cpwd" placeholder="Password"
    class="form-control mb-3" required>

    <div class="text-center">
        <input type="submit" value="Change Password"
        class="btn btn-sm btn-danger" name="b1">

        
    </div>
                </form>
        </div>
</body>
</html>