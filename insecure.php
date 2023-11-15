<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $con = mysqli_connect('localhost', 'root', '', 'lab'); // Updated: Added the database name
    $q = "SELECT * FROM users WHERE email='$email' && password='$pass'";
    $result = mysqli_query($con, $q);
    $rows = mysqli_num_rows($result);
    if ($rows > 0) {
        echo "Logged in successfully.";
    } else {
        echo "Wrong email or password.";
    }
    mysqli_close($con);
}
?>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
            margin-top: 50px; /* Adding space from the top */
        }

        .container {
            width: 50%;
            margin-left: 25%;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <form method="post" action="insecure.php">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Username</span>
                <input type="email" required name="email" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <input type="password" name="pass" required class="form-control" placeholder="Enter Password" aria-label="Password" aria-describedby="basic-addon2">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
            <div class="error-message">
                <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    echo "Wrong email or password."; // Display error message
                }
                ?>
            </div>
        </form>
    </div>
</body>
</html>
