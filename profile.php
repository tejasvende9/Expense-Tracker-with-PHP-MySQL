<?php include 'session-check.php';
$folder ="photo/";
$msg="";
if(isset($_POST["b1"]))
{
    $nm =$_POST['nm'];
    $que =$_POST['que'];
    $ans =$_POST['ans'];
    $mob =$_POST['mob'];

    if($_FILES["profile"]["name"])
    {
        $filename = basename($_FILES["profile"]["name"]);
        $path = $folder.$filename;
        if(move_uploaded_file($_FILES["profile"]["tmp_name"],$path))
        {
$qUP="UPDATE userdetails SET unm ='$nm',uque='$que',uans ='$ans',uphoto='$path',
umb= '$mob' WHERE uid = $id";

        }
        else
        {
            $msg ="Failed To upload Photo";
        }
    }

    else
    {   
        $qUP="UPDATE userdetails SET unm ='$nm',uque='$que',uans ='$ans',
umb= '$mob' WHERE uid = $id";  
        

    }

            if(mysqli_query($cn,$qUP))
            {
                echo "<script>
                alert('Profile Updated');
                window.location.href='profile.php';
                  </script>";
            }
            else
            {
                $msg ="Failed To Update Profile";
            }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker | Profile</title>
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
                    Update Profile 
                   <p class="text-danger tect-center">

                       <?php echo  $msg;?>
                   </p>
                </h3>

                <hr>


                <form action="profile.php" method="post" enctype="multipart/form-data">

    
                <label>Name </label>
    <input type="text" name="nm" placeholder="eg. ajinkya"
    class="form-control mb-3" required value="<?php echo $dataU['unm']?>">

    <label>Email </label>
    <input type="email" name="em" placeholder="eg. ram@gmail.com"
    class="form-control mb-3" required readonly value="<?php echo $dataU['uemail'];?>">

   
    <label>Select Question </label>
    <select name="que" class="form-control" required>
        <option selected diasbled>--Select Security question --</option>
     <option value="What is your Hobby" <?php if($dataU['uque']=="What is your Hobby") { echo 'selected';}?> >
        What is your Hobby?
    </option>
        <option value="What is your School Name" <?php if($dataU['uque']=="What is your School Name") { echo 'selected';}?> >
            What is your School Name?
        </option>
        <option value="What is your Favourite food" <?php if($dataU['uque']=="What is your Favourite food") { echo 'selected';}?> >
            What is your Favourite Food?
        </option>

    </select>

    <label>Answer </label>
    <input type="password" name="ans" placeholder="Answer"
    class="form-control mb-3" required value="<?php echo $dataU['uans']?>">

    <label>Mobile </label>
    <input type="text" name="mob" placeholder="9865789545"
    class="form-control mb-3" required value="<?php echo $dataU['umb']?>">

    <label>Profile Photo </label>
    <input type="file" name="profile"    class="form-control mb-3" >


    <div class="text-center mt-4">
        <input type="submit" value="Update Profile"
        class="btn btn-sm btn-danger" name="b1">

        
    </div>
                </form>
        </div>
</body>
</html>