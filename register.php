<?php
include 'connection.php';
$msg ="";
if(isset($_POST["b1"]))
{

        $nm = $_POST['nm'];
        $em = $_POST['em'];
        $pwd = $_POST['pwd'];
        $mob = $_POST['mob'];
        $que = $_POST['que'];
        $ans = $_POST['ans'];

        $qS="SELECT * FROM userdetails WHERE uemail = '$em' ";
        $result = mysqli_query($cn,$qS);
        $count = mysqli_num_rows($result);

       
    if($count ==0)
    {
$qI="INSERT INTO userdetails(unm,uemail,upwd,uque,uans,uphoto,umb)
    VALUES('$nm','$em','$pwd','$que','$ans','-','$mob')";

        if(mysqli_query($cn,$qI))
        {

            echo "<script>
            alert('Register Successfully');
            window.location.href='index.php';
            </script>";
        }

        else
        {

            $msg =  "Failed To Register";
        }

    }

    else
    {
            $msg = "Username Already Exists";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | User Registeration</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
</head>
<body class="">
        <div class="col-md-4 mx-auto p-3 bg-white shadow-lg mt-5">
    <h3 class="text-center text-danger  animate__animated animate__flash">
                    Register Here...
                </h3>

                <p class="text-danger text-center">
                    <?php echo $msg;?>
                </p>

                <hr>


                <form action="register.php" method="post">

    <label>Name </label>
    <input type="text" name="nm" placeholder="eg. ajinkya"
    class="form-control mb-3" required>

    <label>Email </label>
    <input type="email" name="em" placeholder="eg. ram@gmail.com"
    class="form-control mb-3" required>

    <label>Password </label>
    <input type="password" name="pwd" placeholder="Password"
    class="form-control mb-3" required>
     

    <label>Mobile No</label>
    <input type="text" name="mob" placeholder="9865789545"
    class="form-control mb-3" required >

   
    <label>Select Question </label>
    <select name="que" class="form-control" required>
        <option selected diasbled>--Select Security question --</option>
        <option value="What is your Hobby">What is your Hobby?</option>
        <option value="What is your School Name">What is your School Name?</option>
        <option value="What is your Favourite food ">What is your Favourite Food?</option>

    </select>

    <label>Answer </label>
    <input type="password" name="ans" placeholder="Answer"
    class="form-control mb-3" required>


    <div class="text-center">
        <input type="submit" value="Register"
        class="btn btn-sm btn-danger" name="b1">

        <p class="mt-2">
            <a href="index.php" class="text-decoration-none">
                Already  have an Account?
            </a>
        </p>
    </div>
                </form>
        </div>
</body>
</html