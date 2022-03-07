<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM `tabledata` WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$username = $row['username'];
$email = $row['email'];
$number = $row['number'];
$password = $row['password'];
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['password'];

    $sql = "UPDATE `tabledata` set `id`='$id',`username`='$username',`email`='$email',`number`='$number',`password`='$password' where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: index.php");
    }
    if (!$result) {
        die(mysqli_error($conn));
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
            <div class="col-md-6 mt-5">
                <form action="" method="POST">
                    <h3 class="bg-info text-light text-center">Update Your Information</h3>
                    <div class="form-group">
                        <label for="username">User Name</label>
                        <input type="username" class="form-control" id="username" placeholder="User Name" name="username" value=<?php echo $username ?>>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email" value=<?php echo $email ?>>

                    </div>
                    <div class="form-group">
                        <label for="number">Number</label>
                        <input type="number" class="form-control" id="number" placeholder="number" name="number" value=<?php echo $number ?>>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" maxlength="5" value=<?php echo $password ?>>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword" placeholder="Password" maxlength="5">

                        <button type="submit" class="btn btn-info mt-3 btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>