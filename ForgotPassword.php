<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forgot Password</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
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
                        <a href="BrowseServiceProjs.html" class="nav-link">Home</a>
                    </li>
                </ul>
                <div class="container-sm align-content-center">
                    <form class="d-flex container-fluid justify-content-start" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <a href="BrowseServiceProjs.html">
                        <button class="btn btn-outline-success" type="button">
                            <img src="https://static.thenounproject.com/png/5103870-200.png" width="20" height="20">
                        </button>
                        </a>
                        <a href="AdvancedSearch.html">
                        <button class="btn btn-sm btn-outline-secondary" type="button">Advanced</button>
                        </a>
                    </form>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="Settings.html">
                        <h3>^</h3>
                    </a>
                    <a href="SignIn.html">
                        <img class="d-inline-block" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1200px-Circle-icons-profile.svg.png"
                        width="30" height=30>
                    </a>
                </div>
            </div>
        </nav>
        <div class="mt-3">
            <h1 class="text-center">Forgot Password</h1>
        <form class="row g-3 justify-content-center p-5">
            <div class="col-auto">
              <label for="emailtext" class="visually-hidden">Email</label>
              <input type="text" readonly class="form-control-plaintext" id="emailtext" value="Enter Account Email:">
            </div>
            <div class="col-auto">
              <input type="password" class="form-control" id="emailInput" placeholder="email@example.com">
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Forgot Password</button>
            </div>
            <?php
                /* $sqladm = $conn->prepare("SELECT AdminEmail from SharedDB Limit 1"); */
                //change to actual sql query *******
                /* $sqlbook->bindParam("s","%" . $search . "%"); */
/*                 $sqladm->execute();
                $result = $sqladm->get_result();
                $sqladm->close(); */
                $result = "erekg13@gmail.com";
                //perhaps we change this later
                if(!empty($_POST["emailInput"])){
                    $selected = $_POST["emailInput"];
                }
                $msg = "User " . "$selected" . " has forgotten their password.  Please reset it for them and email them.";
                $mail("$result","password reset",$msg);
            ?>
          </form>
          <h4 class="text-center">If your email exists in the system, you will be emailed with a password reset link shortly!</h4>
    </body>
</html>
