<?php
include('../config/conn-database.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="container">
        <?php
        include("navbar.php");
        ?>

        <div class="view-Customer">

            <h2 class="Customer-title"> Customer List</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Join-Date</th>
                        <th>Feedback</th>
                    </tr>
                </thead>

                <?php
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo " <tbody>
                                    <tr>
                                        <td>".$row['id']."</td>
                                        <td>".$row['name']."</td>
                                        <td>".$row['email']."</td>
                                        <td>".$row['password']."</td>
                                        <td>".$row['birth']."</td>
                                        <td>".$row['gender']."</td>
                                        <td>".$row['mobile']."</td>
                                        <td>".$row['joindate']."</td>
                                        <td>".$row['feedback']."</td>
                                    </tr>
                                </tbody>";
                    }
                }

                ?>

            </table>
        </div>
    </div>
</body>

</html>