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
        <div class="container-sm align-content-center">
            <table class="table">
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
                </tr>
                <tr>
                    <th><a href="ServicePage.html">Dane County Humane Society Volunteering</a></th>
                    <td>Help animals at the Dane County Humane Society</td>
                    <td>5132 Voges Rd, Madison, WI 53718</td>
                    <td>rating goes here</td>
                    <td>5/10 people have signed up</td>
                </tr>
            </table>
        </div>
    </body>
</html>