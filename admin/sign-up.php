<?php include("../config/conn-database.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="../assets/css/style.css">
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

<body >
    <div class="Signup-form">
        <a href="index.php" class="back"><i class="fa-solid fa-arrow-left"></i></a>
        <h1>Register</h1>
        <form action="" method="POST">

            <div>
                <input type="text" class="box" id="name" name="name" placeholder="Name" required>
            </div>

            <span id="valemail">Please enter email</span>
            <div>
                <input type="email" onkeyup="isValEmail()" class="box" id="email" name="email" placeholder="Email" required>
            </div>

            <span id="valpassword">Please enter password</span>
            <div>
                <input type="password" class="box" onkeyup="isValpassword()" id="password" name="password" placeholder="Password" required>
            </div>

            <div>
                <div><span id="valbirth">Please enter date</span><br></div>
                <label class="d1">Date of birth</label>
                <input type="date" class="box" id="birth" name="birth" required>
            </div>

            <div>
                <div><span id="valgender">Please enter gender</span><br><br></div>
                <label class="d1">Gender: </label>
                <input type="radio" id="male" name="gender" value="Male" required> <label class="d1"> Male </label>
                <input type="radio" id="female" name="gender" value="Female" required> <label class="d1"> Female</label>
            </div>
            <br>
            <span id="valphone">Please enter phone</span>
            <div>
                <input type="text" class="box" id="phone" name="mobile" placeholder="Phone number" required>
            </div>

            <div>
                <input type="submit" value="Sign Up" name="signup" id="submit">
            </div>
        </form>
    </div>

    

    <?php 

    if(isset($_POST["signup"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $birth = date('Y-m-d', strtotime($_POST['birth']));
        $gender =$_POST["gender"];
        $phone = $_POST["mobile"];

        $selectQuery = $conn->prepare("SELECT * FROM admins WHERE email = ?");
        $selectQuery->bind_param("s", $email);
        $selectQuery->execute();
        $result = $selectQuery->get_result();

        if ($result->num_rows > 0) {
            echo '<script>showSweetAlert("Email already Exists. Try again");</script>';
        } else {
            
            $insertQuery = $conn->prepare("INSERT INTO admins (name, email, password, birth, gender, mobile) VALUES (?, ?, ?, ?, ?, ?)");
            $insertQuery->bind_param("sssssi", $name, $email, $password, $birth, $gender, $phone);

            if ($insertQuery->execute()) {
                
                $result = $conn->query("SELECT * FROM admins WHERE id = LAST_INSERT_ID()");
            
                // Store admin information in session
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $_SESSION["sign_up_admin"] = true;
                    $_SESSION["admin_info"] = $row;
            
                    echo '<script>
                        showSweetAlert1("New record inserted successfully", "success");
                        setTimeout(function() {
                            window.location.href = "home.php";
                        }, 2000); 
                      </script>';
                    exit();
                } else {
                    echo '<script>showSweetAlert1("Error retrieving admin information", "error");</script>';
                }
            
                $selectQuery->close();
            } else {
                echo '<script>showSweetAlert1("Error inserting record: ' . $conn->error . '", "error");</script>';
            }

            $insertQuery->close();
        }

        $selectQuery->close();
    }

    $conn->close();
    
    ?>
    

    <script>
        var email = document.getElementById("email");
        var password = document.getElementById("password");
        var birth = document.getElementById("birth");
        var male = document.getElementById("male");
        var female = document.getElementById("female");
        var phone = document.getElementById("phone");

        var valemail = document.getElementById("valemail");
        var valpassword = document.getElementById("valpassword");
        var valbirth = document.getElementById("valbirth");
        var valgender = document.getElementById("valgender");
        var valphone = document.getElementById("valphone");

        var submitButton = document.getElementById("submit");

        submitButton.onclick = function checkInput() {
            // Reset validation messages

            valemail.innerHTML = "";
            valpassword.innerHTML = "";
            valbirth.innerHTML = "";
            valgender.innerHTML = "";
            valphone.innerHTML = "";

            var isValid = true; // Track if all validations pass

            // Validate email
            if (!isValEmail()) {
                isValid = false;
            }

            // Validate password
            if (!isValpassword()) {
                isValid = false;
            }


            if (email.value.trim() === "") {
                valemail.innerHTML = "Please enter the email";
                valemail.style.display = "block";
                isValid = false;
            }

            if (password.value.trim() === "") {
                valpassword.innerHTML = "Please enter the password";
                valpassword.style.display = "block";
                isValid = false;
            }

            if (birth.value.trim() === "") {
                valbirth.innerHTML = "Please enter the Date";
                valbirth.style.display = "block";
                isValid = false;
            }
            if (!male.checked && !female.checked) {
                valgender.innerHTML = "Please select a gender <br><br>";
                valgender.style.display = "block";
                isValid = false;
            }
            if (phone.value.trim() === "") {
                valphone.innerHTML = "Please enter the phone number";
                valphone.style.display = "block";
                isValid = false;
            }

            if (!isValid) {
                return false;
            } else {
                // Hide validation messages and allow form submission
                valemail.style.display = "none";
                valpassword.style.display = "none";
                valbirth.style.display = "none";
                valgender.style.display = "none";
                valphone.style.display = "none";
                return true;
            }

        };


        //validation email
        function isValEmail() {
            valemail.innerHTML = "";

            let regex = /[A-Za-z0-9\._%+\-]+@[A-Za-z0-9\.\-]+\.[com || org]{3,}/ig;

            if ((email.value).match(regex)) {
                valemail.style.display = "none";
                return true;
            } else {
                valemail.innerHTML = "Provide a valid email address";
                valemail.style.display = "block";
                valemail.style.color = "red";
                return false;
            }
        }

        function isValpassword() {
            valpassword.innerHTML = "";

            var Regex1 = new RegExp("[a-z]");
            var Regex2 = new RegExp("[A-Z]");
            var Regex3 = new RegExp("[0-9]");
            var Regex4 = new RegExp("[!@#$%^&*]");
            var Regex5 = new RegExp(".{8,}");


            if (!((password.value).match(Regex1))) {
                valpassword.innerHTML = "at least 1 lowercase alphabetical character";
                valpassword.style.display = "block";
                valpassword.style.color = "red";
                return false;
            }
            if (!((password.value).match(Regex2))) {
                valpassword.innerHTML = "at least 1 Uppercase alphabetical character";
                valpassword.style.display = "block";
                valpassword.style.color = "red";
                return false;
            }
            if (!((password.value).match(Regex3))) {
                valpassword.innerHTML = "at least 1 number";
                valpassword.style.display = "block";
                valpassword.style.color = "red";
                return false;
            }
            if (!((password.value).match(Regex4))) {
                valpassword.innerHTML = "at least one special character";
                valpassword.style.display = "block";
                valpassword.style.color = "red";
                return false;
            }
            if (!((password.value).match(Regex5))) {
                valpassword.innerHTML = "The string must be 8 characters or longer";
                valpassword.style.display = "block";
                valpassword.style.color = "red";
                return false;
            } else {
                valpassword.style.display = "none";
                return true;
            }
        }
    </script>

    
</body>

</html>