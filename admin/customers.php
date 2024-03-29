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
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ahmad Doughman</td>
                        <td>ahmad@gmail.com</td>
                        <td>1234567890</td>
                        <td>14-6-2000</td>
                        <td>Male</td>
                        <td>71-653043</td>
                        <td>best website</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>