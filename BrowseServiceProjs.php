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
            echo "Connected successfully";
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
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
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
        <div class="align-content-center">
            <table class="table">
                <?php
                        $sqlbrowse = $conn->prepare("SELECT `Name`,`Blurb`,`Location`,`Rating`,`MaxUserCount` FROM `service`");
                        /* $sqlbook->bindParam("s","%" . $search . "%"); */
                        $sqlbrowse->execute();
                        $result = $sqlbrowse->get_result();
                        $sqlbrowse->close();
                        echo 
                            "<tr>
                                <th>Name</th>
                                <th>Short Description</th>
                                <th>Location</th>
                                <th>Rating</th>
                                <th>Max User Count</th>
                            </tr>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Blurb"] . "</td><td>" . $row["Location"] . "<tr><td>" . $row["Rating"] . "</td><td>" . $row["MaxUserCount"];
                                echo "</td></tr>\n";
                            }
                        $conn->close();
                ?>
                <!-- <tr>
                    <th><a href="ServicePage.html">Dane County Humane Society Volunteering</a></th>
                    <td>Help animals at the Dane County Humane Society</td>
                    <td>5132 Voges Rd, Madison, WI 53718</td>
                    <td>rating goes here</td>
                    <td>5/10 people have signed up</td>
                </tr>
                <tr>
                    <th><a href="ServicePage.html">Dane County Humane Society Volunteering</a></th>
                    <td>Help animals at the Dane County Humane Society</td>
                    <td>5132 Voges Rd, Madison, WI 53718</td>
                    <td>rating goes here</td>
                    <td>5/10 people have signed up</td>
                </tr>
                <tr>
                    <th><a href="ServicePage.html">Dane County Humane Society Volunteering</a></th>
                    <td>Help animals at the Dane County Humane Society</td>
                    <td>5132 Voges Rd, Madison, WI 53718</td>
                    <td>rating goes here</td>
                    <td>5/10 people have signed up</td>
                </tr>
                <tr>
                    <th><a href="ServicePage.html">Dane County Humane Society Volunteering</a></th>
                    <td>Help animals at the Dane County Humane Society</td>
                    <td>5132 Voges Rd, Madison, WI 53718</td>
                    <td>rating goes here</td>
                    <td>5/10 people have signed up</td>
                </tr> -->
            </table>
        </div>
    </body>
</html>