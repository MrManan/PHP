<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <a href="input.php" class="text-decoration-none text-white"> <button type="submit" class="btn btn-primary m-5">Add Data</button></a>
        <div class="row">
            <div class="col-md-12">

                <div class="table">
                    <table class="table table-striped table-hover">
                        <thead class="bg-warning text-white text-center">
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Number</th>
                                <th scope="col">Password</th>
                                <th scope="col">Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT* from `tabledata` ";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $username = $row['username'];
                                    $email = $row['email'];
                                    $number = $row['number'];
                                    $password = $row['password'];

                                    echo '<tr>
                        <th scope="row">' . $id . '</th>
                        <td class="text-center">' . $username . '</td>
                        <td class="text-center">' . $email . '</td>
                        <td class="text-center">' . $number . '</td>
                        <td class="text-center">' . $password . '</td>
                        <td class="text-center">
                        <a href="update.php? updateid=' . $id . '" class="text-decoration-none "> <button type="update" class="btn btn-warning text-white ">Update</button></a>
                        <a href="delete.php? deleteid=' . $id . '" class="text-decoration-none text-white"> <button type="delete" class="btn btn-danger ">Delete</button></a>
                        </td>
                    </tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>