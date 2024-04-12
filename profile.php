<?php include("config/conn-database.php");

$loggedIn = (isset($_SESSION["login-user"]) && $_SESSION["login-user"] === true) ||
            (isset($_SESSION["sign-up-user"]) && $_SESSION["sign-up-user"] === true);

if (!$loggedIn) {
    // Redirect to index.php if user is not logged in
    header('Location: index.php');
    exit();
}

$user_info = $_SESSION["user_info"];

if (isset($_POST["logout-user"])) {
    unset($_SESSION["user_info"]);
    unset($_SESSION["login-user"]);
    unset($_SESSION["sign-up-user"]);
    // session_unset(); 
    // session_destroy(); 
    header("Location: login.php");
    exit();
}

$user_id = $user_info['id'];

$sql = "SELECT * FROM users WHERE id = $user_id"; // Filter by user ID
$result = $conn->query($sql);

if ($result === false) {
    die("Error in SQL query: " . $conn->error);
}
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    // Handle the case when no rows are found
    echo "No users found";
    $conn->close();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        #image-container {
            width: 200px;
            height: 200px;
            overflow: hidden;
            border-radius: 50%;
            border: 2px solid #ddd;
            position: relative;
            margin-bottom: 40px;

        }

        #uploaded-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
        }

        #upload-input {
            display: none;
        }

        #upload-label {
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-left: 40px;
            margin-top: 20px;
        }

        #upload-label:hover {
            background-color: #2980b9;
        }
    </style>

</head>

<body>

    <?php

    echo "<div style='background: grey;  '>";
    include('navbar.php');
    "</div>"

    ?>


    <div class="content-user-info">
        <a href="index.php" class="back"><i class="fa-solid fa-arrow-left"></i></a>
        <div class="profile-photo">
            <div id="image-container">
                <img id="uploaded-image" src="assets/image/icoo111.png" alt="" />
            </div>
            <input type="file" id="upload-input" accept="image/*" onchange="displayImage()" />
            <label for="upload-input" id="upload-label">Upload Image</label>
        </div>

        <div class="user-information">

            <table class="table-info">
                <thead>
                    <tr>
                        <td class="title-Info">User Info</td>
                    </tr>
                </thead>

                <tbody>
                    <tr class="data-info">
                        <td>
                            <label for="">Name : </label>
                        </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $row['name']; ?>" class="textInput">
                        </td>
                        <td>
                            <button type="button" onclick="updateUser('name', document.getElementsByName('username')[0].value)">Update</button>
                        </td>
                    </tr>
                    <tr class="data-info">
                        <td>
                            <label for="">Email :</label>
                        </td>
                        <td>
                            <input type="email" name="email" value="<?php echo $row['email']; ?>" class="textInput">
                        </td>
                        <td>
                            <button type="button" onclick="updateUser('email', document.getElementsByName('email')[0].value)">Update</button>
                        </td>
                    </tr>
                    <tr class="data-info">
                        <td>
                            <label for="">Password :</label>
                        </td>
                        <td>
                            <input type="password" name="password" value="<?php echo $row['password']; ?>" class="textInput" id="passwordField" onclick="togglePasswordVisibility()">
                        </td>
                        <td>
                            <button type="button" onclick="updateUser('password', document.getElementById('passwordField').value)">Update</button>
                        </td>
                    </tr>
                    <script>
                        function togglePasswordVisibility() {
                            var passwordField = document.getElementById("passwordField");
                            if (passwordField.type === "password") {
                                passwordField.type = "text";
                            } else {
                                passwordField.type = "password";
                            }
                        }
                    </script>
                    <tr class="data-info">
                        <td>
                            <label for="">Phone :</label>
                        </td>
                        <td>
                            <input type="tel" name="mobile" value="<?php echo $row['mobile']; ?>" class="textInput">
                        </td>
                        <td>
                            <button type="button" onclick="updateUser('mobile', document.getElementsByName('mobile')[0].value)">Update</button>
                        </td>
                    </tr>
                </tbody>
            </table>


            <form method="post" action="">
                <button type="submit" name="logout-user" class="Btn" style="float: right; margin-right: 50px;" onclick="clearSessionStorage()">
                    <div class="sign">
                        <svg viewBox="0 0 512 512">
                            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                        </svg>
                    </div>
                    <div class="text">Logout</div>
                </button>
            </form>
        </div>
    </div>


    <script src="assets/js/script.js"></script>

    <script>
        function updateUser(field, value) {
            $.ajax({
                type: "POST",
                url: "update_user.php", // Update to the URL of your PHP page
                data: {
                    field: field,
                    value: value
                },
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        alert("Update successful");

                    } else {
                        alert("Update failed. " + response.message);
                    }
                },
                error: function() {
                    alert("Error processing the update request");
                }
            });
        }
    </script>

    <script>
        document
            .getElementById("upload-input")
            .addEventListener("change", displayImage);

        function displayImage() {
            const input = document.getElementById("upload-input");
            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    // const imageDataUrl = event.target.result;
                    const imageDataUrl = event.target.result;
                    sessionStorage.setItem("imageDataUrl", imageDataUrl);
                    updateImageSrc(imageDataUrl);
                };
                reader.onerror = function(error) {
                    console.error("Error reading the file:", error);
                };
                reader.readAsDataURL(file);
            }
        }

        function updateImageSrc(src) {
            const uploadedImage = document.getElementById("uploaded-image");
            uploadedImage.src = src;
        }
        window.onload = function() {
            const storedImageDataUrl = sessionStorage.getItem("imageDataUrl");
            if (storedImageDataUrl) {
                updateImageSrc(storedImageDataUrl);
            }
        };
    </script>
</body>

</html>