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
            <div class="container-sm align-content-center my-3">
                <?php
                $servID = isset($_POST['val']) ? $_POST['val'] : $_SESSION['val'];
                $sql = "SELECT Name, Description, Organizer, Location, Rating, MaxUserCount, StartDate, StartTime, EndDate, EndTime FROM `service` WHERE ServiceID LIKE '%$servID%'";
                $result = mysqli_query($conn, $sql);
                $user_data = mysqli_fetch_assoc($result);
                $sql2 = "SELECT COUNT(`UserID`) FROM `userprojects` WHERE `ServiceID` = $servID";
                $result = mysqli_query($conn, $sql2);
                $signedup = mysqli_fetch_assoc($result);
                $signedup_count = $signedup['COUNT(`UserID`)'];
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <?php if($servID == 1){
                        echo "<img src=\"https://pbs.twimg.com/profile_images/458982599361175552/Q849K4nl_400x400.jpeg\" class=\"img-thumbnail\" alt=\"DCHS Logo\" width=\"500\" height=\"500\">";
                        }
                        if($servID == 2){
                        echo "<img src=\"https://cdn.pixabay.com/photo/2015/10/30/10/43/help-1013700_1280.jpg\" class=\"img-thumbnail\" alt=\"Help Your Community\" width=\"500\" height=\"500\">";
                        }else {
                            echo "<img src=\"https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.pixelstalk.net%2Fwp-content%2Fuploads%2F2016%2F10%2FBlank-Road-Photo.jpg&f=1&nofb=1&ipt=7a9d46270f9d094a6992251912b37f352df95584e2f1e15f8492638863e85a66&ipo=images\" class=\"img-thumbnail\" alt=\"Help Your Community\" width=\"500\" height=\"500\">";
                        }?>
                    </div>
                    <div class="col-md-6">
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
                            <textarea class="form-control" id="desc" placeholder="<?php echo $user_data['Description']; ?>" disabled></textarea>
                        </div>
                        <label for="slots" class="col-sm-3 col-form-label">Filled Slots</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="slots" Value="<?php echo $signedup_count . "/" . $user_data['MaxUserCount']; ?>" disabled> 
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
                        <a href="ContactOrganizers.php">
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
                            $_SESSION['val'] = $servID;
                            if($_SERVER["REQUEST_METHOD"] === "POST") {                            
                                if(isset($_POST['signup'])) {
                                    $sql = "INSERT INTO userprojects (UserID, ServiceID) VALUES ($id, $servID)";
                                    $result = $conn->query($sql);
                                    echo "<script>window.location.href = 'ServicePage.php'</script>";
                                }

                                if(isset($_POST['leave'])) {
                                    $sql = "DELETE FROM userprojects WHERE UserID = $id AND ServiceID = $servID";
                                    $result = $conn->query($sql);
                                    echo "<script>window.location.href = 'ServicePage.php'</script>";
                                }

                            }
                        ?>
                    </div>
                </div>
            </div>
    </body>
</html>
