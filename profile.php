<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <div class="content-user-info">
        <a href="index.php" class="back"><i class="fa-solid fa-arrow-left"></i></a>
        <div class="profile-photo">
            <div id="image-container">
                <img id="uploaded-image" src="assets/images/logo/icoo111.png" alt="" />
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
                            <input type="text" name="username" class="textInput">
                        </td>
                        <td>
                            <button type="button">Update</button>
                        </td>
                    </tr>
                    <tr class="data-info">
                        <td>
                            <label for="">Email :</label>
                        </td>
                        <td>
                            <input type="email" name="email" class="textInput">
                        </td>
                        <td>
                            <button type="button">Update</button>
                        </td>
                    </tr>
                    <tr class="data-info">
                        <td>
                            <label for="">Password :</label>
                        </td>
                        <td>
                            <input type="password" name="password" class="textInput" id="passwordField" onclick="togglePasswordVisibility()">
                        </td>
                        <td>
                            <button type="button">Update</button>
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
                            <input type="tel" name="phone" class="textInput">
                        </td>
                        <td>
                            <button type="button">Update</button>
                        </td>
                    </tr>
                </tbody>
            </table>


            <form method="post" action="">
                <button type="submit" name="logout" class="Btn" style="float: right; margin-right: 50px;" onclick="clearSessionStorage()">
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