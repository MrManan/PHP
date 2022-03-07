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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="icon" href="assets/table-icon-24173 (1).png" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.4/af-2.3.7/date-1.1.2/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.11.4/af-2.3.7/date-1.1.2/datatables.min.js"></script>


</head>

<body>
    <div class="container">
        <a href="input.php" class="text-decoration-none text-white"> <button type="submit" class="btn btn-primary m-5">Add Data</button></a>
        <div class="row">
            <div class="col-md-12">

                <div class="table">
                    <table class="table table-striped table-hover" id="myTable">
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
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>