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
        <title>Settings</title>
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
            <span class="navbar-brand"> CompassionConnect</span>
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
                    <h5><?php echo $row['FirstName']?></h5>
                </div>
            </div>
        </nav>
        <div class="mt-3">
            <h1 class="text-center">User Settings</h1>
        <form class="row g-3 justify-content-center p-5" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <div class="form-group">
                <label for="emailInput">Change Email address</label>
                <input type="email" class="form-control" name="emailInput" id="emailInput" aria-describedby="emailHelp" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="passwordInput">Change Password</label>
                <input type="password" class="form-control" name="passwordInput" id="passwordInput" placeholder="Password">
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="verifyChange" required>
                <label class="form-check-label" for="verifyChange">Are you sure you want to make these changes?</label>
              </div>
              <button type="submit" class="btn btn-primary">Apply Changes</button>
          </form>
        <?php
            $newEmail = isset($_POST['emailInput']) ? $_POST['emailInput'] : "";
            $newPass = isset($_POST['passwordInput']) ? $_POST['passwordInput'] : "";

            if($_SERVER['REQUEST_METHOD'] === "POST") {
                if($newEmail !== "") {
                    $sql = "UPDATE User SET username = '$newEmail' WHERE UserID = '$id'";
                    $result = $conn->query($sql);
                    echo "<p class='text-center'>Email updated!</p>";
                }
    
                if($newPass !== "") {
                    $sql = "UPDATE User SET password = '$newPass' WHERE UserID = '$id'";
                    $result = $conn->query($sql);
                    echo "<p class='text-center'>Password updated!</p>";
                }
                echo "<script>window.location.href='signout.php'</script>";
            }
        ?>
          <h4 class="text-center">After submitting, you will need to sign in again with the new details!</h4>
    </body>
</html>