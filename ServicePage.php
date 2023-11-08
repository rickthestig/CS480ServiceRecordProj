<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Service Details Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script type=”text/javascript” src=”https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js”></script>
        <link href=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css” rel=”stylesheet”>
        <script src=”https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js”> </script>
        <script>
            $(document).ready(function () {
                $('#time1').datetimepicker({
                    format: 'yyyy-mm-dd'
                });
                $('#time2').datetimepicker({
                    format: 'yyyy-mm-dd'
                });
                $('#signup').click(function(){
                    $('#signup').hide();
                });
            });
        </script>
    
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
            <div class="container-sm align-content-center my-3">

                <div class="row">
                    <div class="col">
                        <img src="https://www.cityofmadison.com/sites/default/files/events/images/dchs.jpg" class="img-thumbnail" alt="...">
                    </div>
                    <div class="col">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Dane County Humane Society Volunteering" disabled>
                        </div>
                        <label for="organizer" class="col-sm-2 col-form-label">Organizer</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="organizer" placeholder="Mr. A. Nimal" disabled>
                        </div>
                        <label for="desc" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="desc" placeholder="This is a longer description than the blurb on the homepage" disabled></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <label for="slots" class="col-sm-3 col-form-label">Filled Slots</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="slots" placeholder="5/10" disabled>
                        </div>
                        <label for="loc" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="loc" placeholder="5132 Voges Rd, Madison, WI 53718 (map will go here eventually)" disabled>
                        </div>
                        <label for="rate" class="col-sm-2 col-form-label">Rating</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="rate" placeholder="Rating will go here" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group col">
                    <div class="col-md-2">
                        <label for="startTime">Start Time:</label>
                        <input class="form-control" type="text" id="time1" placeholder="10/18/2023 10:00">  
                    </div>
                    <div class="col-md-2">
                        <label for="startTime">End Time:</label>
                        <input class="form-control" type="text" id="time2" placeholder="10/18/2023 17:00">  
                    </div>
                </div>
                <div class="row justify-content-center p-5">
                    <div class="col-auto">
                        <a href="ContactOrganizers.html">
                            <button class="btn btn-primary mb-3 p-3">Contact Organizers</button>
                        </a>
                    </div>
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary mb-3 p-3" id="signup">Sign Up</button>
                        <button class="btn btn-outline-danger mb-3 p-3" id="leave">Leave Service</button>
                    </div>
                </div>
            </div>
    </body>
</html>
