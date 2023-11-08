<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <title>Service Project Signin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $db_name = "service_project_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $db_name);

            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }
            echo "Connected successfully";
        ?>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <span class="navbar-brand">Service Project</span>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                </ul>
                <div class="container-sm align-content-center">
                    <form class="d-flex container-fluid justify-content-start" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">
                            <img src="https://static.thenounproject.com/png/5103870-200.png" width="20" height="20">
                        </button>
                        <button class="btn btn-sm btn-outline-secondary" type="button">Advanced</button>
                    </form>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="profile" data-bs-toggle="dropdown" aria-expanded="false"></button>
                        <ul class="dropdown-menu" aria-labelledby="profile">
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Sign Out</a></li>
                        </ul>
                    </div>
                    <img class="d-inline-block" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1200px-Circle-icons-profile.svg.png"
                    width="30" height=30>
                </div>
            </div>
        </nav>
        <form class="container-sm align-content-center" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email address</label>
                <input type="email" class="form-control" id="emailInput" name="emailInput" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input class="form-control" id="passwordInput" name="passwordInput" type="password" required>
            </div>
            <div>
                <a href="ForgotPassword.html">
                    <p class="text-muted">Forgot Password?</p>
                </a>
            </div>
            <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-primary" name="submitButton" id="submitButton" value="Sign in">
            </div>
            <div class="d-flex justify-content-center p-3">
                <a href="Registration.php">
                    <h6>Create Account</h2>
                </a>
            </div>
        </form>
        <?php
            $username = isset($_POST["emailInput"]) ? $_POST["emailInput"] : "";
            $password = isset($_POST["passwordInput"]) ? $_POST["passwordInput"] : "";

            if(isset($_POST["submitButton"])) {
                $sql = "SELECT UserID FROM user WHERE username = $username AND password = $password";
                $result = $conn->query($sql);
                    if ($result === TRUE) {
                        $_SESSION["UserID"] = $result;
                        echo "User signed in successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
            }
        ?>
    </body>
</html>