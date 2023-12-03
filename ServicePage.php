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
        <title>Service Details Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script type=”text/javascript” src=”https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js”></script>
        <link href=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css” rel=”stylesheet”>
        <script src=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js”> </script>
    
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
            echo "Connected successfully with user <b>" . $id . "</b>";
        ?>

    </head>
    <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <span class="navbar-brand">Service Project</span>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="BrowseServiceProjs.php" class="nav-link">Home</a>
                    </li>
                </ul>
                <div class="container-sm align-content-center">
                    <form class="d-flex container-fluid justify-content-start" role="search" method="post" action="BrowseServiceProjs.php">
                        <input class="form-control me-2" id="searchInput" name="searchInput" type="search" placeholder="Search" aria-label="Search">
                        <input type="submit" class="btn btn-outline-success" name="searchBtn" id="searchBtn" value="Search" >
                    <a href="AdvancedSearch.php">
                        <input type="button" class="btn btn-sm btn-outline-secondary" name="advancedBtn" id="advancedBtn" value="Advanced">
                        </a>
                    </form>
                    <?php

                        $search = isset($_POST["searchInput"]) ? $_POST["searchInput"] : "";

                        if(isset($_POST["searchBtn"])) {
                            $sql = "SELECT Name FROM Service WHERE Name LIKE '%$search%'";
                            $result = $conn->query($sql);


                            //will have to query this on BrowseServerProjs.php - form redirects them on 'post'
                        }


                    ?>
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
                    <a href="Settings.php">
                        <img class="d-inline-block" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/1200px-Circle-icons-profile.svg.png"
                        width="30" height=30>
                    </a>
                </div>
            </div>
        </nav>
            <div class="container-sm align-content-center my-3">
                <?php
                $servID = isset($_POST['val']) ? $_POST['val'] : "";
                echo "LOOK HERE <b>" . $servID . "</b>";
                $sql = "SELECT Name, Description, Organizer, Location, Rating, MaxUserCount, StartDate, StartTime, EndDate, EndTime FROM `service` WHERE ServiceID LIKE '%$servID%'";
                $result = mysqli_query($conn, $sql);
                $user_data = mysqli_fetch_assoc($result);
                $sql2 = "SELECT COUNT(`UserID`) FROM `userprojects` WHERE `ServiceID` = $servID";
                $result = mysqli_query($conn, $sql2);
                $signedup = mysqli_fetch_assoc($result);
                ?>
                <div class="row">
                    <dv class="col">
                        <img src="https://www.cityofmadison.com/sites/default/files/events/images/dchs.jpg" class="img-thumbnail" alt="...">
                    </div>
                    <div class="col">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" value="<?php echo $user_data['Name']; ?>" disabled>
                        </div>
                        <label for="organizer" class="col-sm-2 col-form-label">Organizer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="organizer" Value="<?php echo $user_data['Organizer']; ?>" disabled>
                        </div>
                        <label for="desc" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="desc" Value="<?php echo $user_data['Description']; ?>" disabled></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <label for="slots" class="col-sm-3 col-form-label">Filled Slots</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="slots" Value="<?php echo $signedup["UserID"] . "/" . $user_data['username']; ?>" disabled> 
                        </div>
                        <label for="loc" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="loc" value="<?php echo $user_data['Location']; ?>" disabled> <!-- Add Map? -->
                        </div>
                        <label for="rate" class="col-sm-2 col-form-label">Rating</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="rate" Value="<?php echo $user_data['Rating']; ?>" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group col">
                    <div class="col-md-2">
                        <label for="date1">Start Date:</label>
                        <input class="form-control" type="text" id="date1" value="<?php echo $user_data['StartDate']; ?>" disabled>  
                        <label for="time1">Start Time:</label>
                        <input class="form-control" type="text" id="time1" value="<?php echo $user_data['StartTime']; ?>" disabled>  
                    </div>
                    <div class="col-md-2">
                        <label for="date2">End Date:</label>
                        <input class="form-control" type="text" id="date2" value="<?php echo $user_data['EndDate']; ?>" disabled>  
                        <label for="time2">End Time:</label>
                        <input class="form-control" type="text" id="time2" value="<?php echo $user_data['EndTime']; ?>" disabled>  
                    </div>
                </div>
                <div class="row justify-content-center p-5">
                    <div class="col-auto">
                        <a href="ContactOrganizers.html">
                            <button class="btn btn-primary mb-3 p-3">Contact Organizers</button> <!-- add functionality here for session -->
                        </a>
                    </div>
                    <div class="col-auto">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                            <?php
                                echo "<input id='val' name='val' value='$servID' type='text' readonly style='display:none;'>";

                                $sql = "SELECT UserID FROM userprojects WHERE ServiceID = $servID AND UserID = $id";
                                $result = $conn->query($sql);

                                if($result->num_rows > 0) {
                                    echo "<input type='submit' class='btn btn-outline-danger mb-3 p-3' name='leave' name='leave' id='leave' value='Leave Service'>";
                                }else {
                                    echo "<input type='submit' class='btn btn-primary mb-3 p-3' name='signup' id='signup' value='Sign Up'>";
                                }
                            ?>
                        </form>
                        <?php
                            if($_SERVER["REQUEST_METHOD"] === "POST") {
                                if(isset($_POST['leave'])) {
                                    $sql = "DELETE FROM userprojects WHERE UserID = $id AND ServiceID = $servID";
                                    $result = $conn->query($sql);
                                }
                            
                                if(isset($_POST['signup'])) {
                                    $sql = "INSERT INTO userprojects (UserID, ServiceID) VALUES ($id, $servID)";
                                    $result = $conn->query($sql);
                                }

                            }
                        ?>
                    </div>
                </div>
            </div>
    </body>
</html>
