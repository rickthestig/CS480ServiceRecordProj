<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forgot Password</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
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
        <div class="mt-3">
            <h1 class="text-center">Forgot Password</h1>
            <form class="row g-3 justify-content-center p-5" method="post" action="">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <label for="emailInput" class="visually-hidden">Email</label>
                        <input type="email" class="form-control" id="emailInput" name="emailInput" placeholder="Enter Account Email">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3" name="forgotPassword">Forgot Password</button>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center">
                        <a href="signin.php">Back to Sign in</a>
                    </div>
                </div>
            </form>
        </div>
    <?php
    if(isset($_POST["forgotPassword"])) {
        $result = "erekg13@gmail.com"; // Replace this with your actual recipient email

        if(!empty($_POST["emailInput"])) {
            $selected = $_POST["emailInput"];
            $msg = "User " . $selected . " has forgotten their password. Please reset it for them and email them.";
            
            // Additional headers if needed (for HTML email, etc.)
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // To send an email
            if(mail($result, "Password Reset Request", $msg, $headers)) {
                echo "<h4 class='text-center'>If your email exists in the system, you will be emailed with a password reset link shortly!</h4>";
            } else {
                echo "<h4 class='text-center'>Error: Email could not be sent. Please try again later.</h4>";
            }
        } else {
            echo "<h4 class='text-center'>Please enter your email to reset the password.</h4>";
        }
    }
    ?>
</body>
</html>
