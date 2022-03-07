<?php
include 'connect.php';
$usernameerr = $usernameerr2 = $emailerr = $emailerr2 = $numbererr = $passworderr = $cpassworderr = $match = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if (empty($username)) {
        $usernameerr = "Username is required";
    }
    if (empty($email)) {
        $emailerr = "Email is required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    }
    if (empty($number)) {
        $numbererr = "Phone Number is required";
    }
    if (empty($password)) {
        $passworderr = "Password is required";
    }
    if (empty($cpassword)) {
        $cpassworderr = "Confirm_Password is required";
    }
    if ($password != $cpassword) {
        $match = "Password isn't match";
    }
    $sql = "SELECT* from `tabledata` WHERE (username='$username' AND email='$email')";

    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {

        $row = mysqli_fetch_assoc($res);
        if ($email == isset($row['email'])) {
            $emailerr2 = "Email is already exists";
        }
        if ($username == isset($row['username'])) {
            $usernameerr2 = "Username is already exists";
        }
    } else {

        if (!empty($username && $email && $number && $password) && $password == $cpassword) {
            $sql = "INSERT INTO `tabledata`(`username`, `email`, `number`, `password`) VALUES ('$username','$email','$number','$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("location:index.php");
            }
            if (!$result) {
                die(mysqli_errno($conn));
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-5">
                <form action="" method="POST">
                    <h3 class="bg-warning text-light text-center">Input Your Information</h3>
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="username" class="form-control" id="username" placeholder="User Name" name="username">
                        <span class="text-danger"><?php echo $usernameerr ?></span>
                        <span class="text-danger"><?php echo $usernameerr2 ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email">
                        <span class="text-danger"><?php echo $emailerr ?></span>
                        <span class="text-danger"><?php echo $emailerr2 ?></span>
                    </div>
                    <div class="form-group">
                        <label for="number">Number</label>
                        <input type="number" class="form-control" id="number" placeholder="Number" name="number">
                        <span class="text-danger"><?php echo $numbererr ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" maxlength="5">
                        <span class="text-danger"><?php echo $passworderr ?></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword" placeholder="Password" maxlength="5">
                        <span class="text-danger"><?php echo $cpassworderr ?></span>
                        <span class="text-danger"><?php echo $match ?></span>
                    </div>
                    <button type="submit" class="btn btn-warning btn-block text-light ">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>