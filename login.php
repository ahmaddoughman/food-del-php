<?php include("config/conn-database.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showSweetAlert(message) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: message,
            });
        }

        function showSweetAlert1(message, icon) {
            Swal.fire({
                icon: icon,
                title: 'Notification',
                text: message,
            });
        }
    </script>
</head>

<body class="login-background">
    <div class="login-form">
        <a href="index.php" class="back"><i class="fa-solid fa-arrow-left"></i></a>
        <h1>Login</h1>
        <form action="" method="POST">
            <div class="d1"><input type="email" class="box" id="email" name="email" placeholder="Email" required></div>
            <span id="valemail">hh</span>
            <div class="d1"><input type="password" class="box" id="password" name="password" placeholder="Password" required></div>
            <span id="valpassword">hh</span><br>
            <div>
                <input type="submit" value="login" name="login" id="submit">
            </div>
        </form>
        <p>Not a member?<a href="sign-up.php" target="_blank"> Sign-up</a></p>
    </div>

    <?php 
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '{$email}'";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_assoc($result);

        if($result->num_rows > 0){
            if($password == $row['password']){
                $_SESSION['login-user'] = true;
                $_SESSION["id"] = $row["id"];
                $_SESSION["user_info"] = $row; // Store user information in session

                echo '<script>
                    showSweetAlert1("login confirm successfully", "success");
                    setTimeout(function() {
                        window.location.href = "index.php";
                    }, 3000); 
                  </script>';
                exit();
            }
            else {
                echo '<script>showSweetAlert1("password are incorrect: ' . $conn->error . '", "error");</script>';
            }
        }
        else {
            echo '<script>showSweetAlert1("Email are incorrect: ' . $conn->error . '", "error");</script>';
        }
    }
    ?>


    <script>
        var email = document.getElementById("email");
        var password = document.getElementById("password");
        var valemail = document.getElementById("valemail");
        var valpassword = document.getElementById("valpassword");
        var submitButton = document.getElementById("submit");

        submitButton.onclick = function checkInput() {
            // Reset validation messages
            valemail.innerHTML = "";
            valpassword.innerHTML = "";

            if (email.value.trim() === "") {
                valemail.innerHTML = "Please enter the email";
                valemail.style.display = "block";
            }

            if (password.value.trim() === "") {
                valpassword.innerHTML = "Please enter the password";
                valpassword.style.display = "block";
            }

            // Prevent form submission if any field is empty
            if (email.value.trim() === "" || password.value.trim() === "") {
                return false;
            } else {
                // Hide validation messages and allow form submission
                valemail.style.display = "none";
                valpassword.style.display = "none";
                return true;
            }
        };
    </script>
</body>

</html>