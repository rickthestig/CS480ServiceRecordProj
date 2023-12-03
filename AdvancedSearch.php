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
        <title>Advanced Search</title>
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
            echo "Connected successfully with user <b>" . $id . "</b>";
        ?>
        <script>
            function searchQuery(str, id) {
                var val =document.getElementById(id).value;
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    document.getElementById("mrplaceholder").innerHTML = this.responseText;
                }
                xhttp.open("GET", "Searcher.php?q="+str);/* add value of selected filter */
                xhttp.send();
                }

                function showSearch() {
                    var selectValue = document.getElementById("filter");
                    var selected = selectValue.value;

                    if (selected === "name") {
                        document.getElementById("nameSearch").style.display = "flex";
                        document.getElementById("locationSearch").style.display = "none";
                        document.getElementById("ratingSearch").style.display = "none";
                        document.getElementById("dateSearch").style.display = "none";
                        console.log("name");
                    } else if (selected === "location") {
                        document.getElementById("locationSearch").style.display = "flex";
                        document.getElementById("nameSearch").style.display = "none";
                        document.getElementById("ratingSearch").style.display = "none";
                        document.getElementById("dateSearch").style.display = "none";
                        console.log("location");
                    } else if (selected === "rating") {
                        document.getElementById("ratingSearch").style.display = "flex";
                        document.getElementById("locationSearch").style.display = "none";
                        document.getElementById("nameSearch").style.display = "none";
                        document.getElementById("dateSearch").style.display = "none";
                        console.log("rating");
                    }else if (selected === "date") {
                        document.getElementById("nameSearch").style.display = "none";
                        document.getElementById("locationSearch").style.display = "none";
                        document.getElementById("ratingSearch").style.display = "none";
                        document.getElementById("dateSearch").style.display = "flex";
                        console.log("date");
                    }else {
                        document.getElementById("nameSearch").style.display = "none";
                        document.getElementById("locationSearch").style.display = "none";
                        document.getElementById("ratingSearch").style.display = "none";
                        document.getElementById("dateSearch").style.display = "none";
                        console.log("None");
                    }
                }
        </script>
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
        <div class="mt-3">
            <h1 class="text-center">Advanced Search</h1>
            <form class="row g-3 justify-content-center p-5">
                <select class="select col-md-1" id="filter" name="filter" onchange="showSearch()">
                    <option value="name" selected>Name</option>
                    <option value="location">Location</option>
                    <option value="rating">Rating</option>
                    <option value="date">Date in yyyy-mm-dd (with dashes)</option>
                </select>

                
                <div class="form-group col-md-1">
                    <input class="form-check-input" type="checkbox" value="full" id="notFull">
                    <label class="form-check-label" for="notFull">Not Full</label>
                </div>
                <div class="input-group" id="nameSearch" name="nameSearch">
                    <input id="nameInput" type="search" class="form-control rounded" placeholder="Advanced search" aria-label="Search1" aria-describedby="search-addon1" onkeyup="searchQuery(this.value, 'filter')"/> <!-- I need to add functionality for this to get the selected value-->
                </div>
                <div class="input-group" id="locationSearch" name="locationSearch" style="display: none;">
                    <input id="locationInput" type="search" class="form-control rounded" placeholder="Location search" aria-label="Search2" aria-describedby="search-addon2" onkeyup="searchQuery(this.value, 'filter')"/> <!-- I need to add functionality for this to get the selected value-->
                </div>
                <div class="input-group" id="ratingSearch" name="ratingSearch" style="display: none;">
                    <label for="customRange2" class="form-label">Rating 1-5:</label>
                    <input type="range" class="form-range" min="0" max="5" id="customRange2" aria-label="Search3" aria-describedby="search-addon3">
                </div>
                <div class="input-group" id="dateSearch" name="dateSearch" style="display: none;">
                    <input id="dateInput" type="search" class="form-control rounded" placeholder="yyy-mm-dd (with dashes)" aria-label="Search4" aria-describedby="search-addon4" onkeyup="searchQuery(this.value, 'filter')"/> <!-- I need to add functionality for this to get the selected value-->
                </div>
                <div class="d-flex align-items-center justify-content-center">
                    <button type="button" class="btn btn-outline-primary">Search</button>
                </div>
            </form>
        </div>
        <div class="align-content-center">
            <table class="table">
                <div id="mrplaceholder"></div>
            </table>
        </div>
    </body>
</html>