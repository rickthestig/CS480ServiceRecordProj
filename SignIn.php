<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <title>Service Project Signin</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
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
        ?>
    </head>
    <body>
        <form class="container-sm align-content-center py-5" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <div class="mt-3">
                <h1 class="text-center">Sign in</h1>
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email address</label>
                <input type="email" class="form-control" id="username" name="username" placeholder="name@example.com" required>
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input class="form-control" id="password" name="password" type="password" required>
            </div>
            <div>
                <a href="ForgotPassword.php">
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
              $username = isset($_POST["username"]) ? $_POST["username"] : "";
              $password = isset($_POST["password"]) ? $_POST["password"] : "";


              if($_SERVER["REQUEST_METHOD"] == "POST") {
                $sql = "SELECT UserID FROM User WHERE Username = '$username' AND Password = '$password'";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                        $id = $result->fetch_assoc();
                        $id = $id["UserID"];
                        $_SESSION["UserID"] = $id;
                        echo "<script>window.location.href = 'BrowseServiceProjs.php'</script>";
                        exit();         
                    }else {
                        echo "incorrect";
                    }
                }
            ?>
    </body>
</html>