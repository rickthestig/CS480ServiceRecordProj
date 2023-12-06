<?php
session_start();
if(isset($_SESSION['UserID'])) {
    $id = $_SESSION['UserID'];
}else {
    echo '<script>window.location.href = "Signin.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact Organizers</title>
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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <span class="navbar-brand p-1"> CompassionConnect</span>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active"><a href="BrowseServiceProjs.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="AdvancedSearch.php" class="nav-link">Search</a><li>
                </ul>
                </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="justify-content-end collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-lg-end" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="Settings.php">Settings</a></li>
                            <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
                        </ul>
                        </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-end">
                    <?php
                        $sql = "SELECT FirstName FROM User WHERE UserID = '$id'";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                    ?>
                    <h5 class="p-1"><?php echo $row['FirstName']?></h5>
                </div>
            </div>
        </nav>
        <div class="container">
    <form class="row g-3 justify-content-center p-5" method="post" action="">
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" id="body" name="body" rows="3"></textarea>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3" name="submit">Send</button>
        </div>
    </form>
</div>

<?php
if(isset($_POST["submit"])) {
    $result = "erekg13@gmail.com"; // Replace this with your actual recipient email

    if(!empty($_POST["body"]) && !empty($_POST["subject"])) {
        $body = $_POST["body"];
        $subj = "A message from " . $id . ": " . $_POST["subject"]; // Include username in the subject

        // Additional headers if needed (for HTML email, etc.)
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: Contact from CompassionConnect <' . $id . '>' . "\r\n" . 'Reply-To: ' . $id . "\r\n" . 'X-Mailer: PHP/' . phpversion() . "\r\n";
        // To send an email
        if(mail($result, $subj, $body, $headers)) {
            echo '<script>alert("Email sent successfully!")</script>';
        } else {
            echo '<script>alert("Error: Email could not be sent.")</script>';
        }
    } else {
        echo '<script>alert("Please fill out all fields.")</script>';
    }
}
?>

    </body>
</html>