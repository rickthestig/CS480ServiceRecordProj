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
            echo "Connected successfully";
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
        </script>
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
                    <form class="d-flex container-fluid justify-content-start" role="search" action="BrowseServiceProjs.php" method="post">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="simpsearch" name="simpsearch">
                        <a href="BrowseServiceProjs.html">
                        <button class="btn btn-outline-success" type="submit">
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
            <h1 class="text-center">Advanced Search</h1>
            <form class="row g-3 justify-content-center p-5">
                <select class="form-group col-md-1" id='ftype'>
                    <option value="1" selected>Name</option>
                    <option value="2">Location</option>
                    <option value="3">Rating</option>
                    <option value="4">Date in yyyy-mm-dd (with dashes)</option>
                </select>
                
                <div class="form-group col-md-1">
                    <input class="form-check-input" type="checkbox" value="" id="notFull">
                    <label class="form-check-label" for="notFull">Not Full</label>
                </div>
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Advanced search" aria-label="Search" aria-describedby="search-addon" onkeyup="searchQuery(this.value, 'ftype')"/> <!-- I need to add functionality for this to get the selected value-->
                    <button type="button" class="btn btn-outline-primary">search</button>
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