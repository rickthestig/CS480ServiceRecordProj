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
                <div class="align-content-center">
                    <table class="table table-responsive">
                        <?php
                        $sqlbrowse = $conn->prepare("SELECT `Name`,`Blurb`,`Location`,`Rating`,`MaxUserCount`,`ServiceID` FROM `service`");
                        $sqlbrowse->execute();
                        $result = $sqlbrowse->get_result();
                        $sqlbrowse->close();

                        echo "<thead class='thead-dark'>
                                <tr>
                                    <th>Name</th>
                                    <th>Short Description</th>
                                    <th>Location</th>
                                    <th>Rating</th>
                                    <th>Max User Count</th>
                                </tr>
                            </thead>
                            <tbody>";

                        while ($row = $result->fetch_assoc()) {
                            $ID = $row["ServiceID"];
                            echo "<tr>
                                    <td>" . $row["Name"] . "</td>
                                    <td>" . $row["Blurb"] . "</td>
                                    <td>" . $row["Location"] . "</td>
                                    <td>" . $row["Rating"] . "</td>
                                    <td>" . $row["MaxUserCount"] . "</td>
                                    <td>
                                        <form action=\"ServicePage.php\" method=\"post\">
                                        <input type=\"text\" name=\"val\" value=\"$ID\" readonly=\"readonly\" style=\"display: none\">
                                        <input type=\"submit\" value=\"Visit Page\" class=\"btn btn-primary\">
                                        </form>
                                    </td>
                                </tr>";
                        }
                        echo "</tbody>";

                        $conn->close();
                        ?>
                        
                    </table>
                </div>
            </div>
    </body>
</html>