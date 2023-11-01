<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <title>Registration Page</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script>
            var loadFile = function(event) {
                var reader = new FileReader();
                reader.onload = function(){
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            };
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
        <!-- navbar -->
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
            <h1 class="text-center">Service Account Registration Page</h1>
          </div>
          <!-- input first and last name -->
        <div class="container-sm">
        <div class="mt-3">
            <div class="input-group">
            <span class="input-group-text">First and last name</span>
            <input type="text" aria-label="First name" class="form-control">
            <input type="text" aria-label="Last name" class="form-control">
          </div>
        </div>
        <div class="container-sm align-content-center">
            <!--  -->
        <div class="row">
            <div class="col">
          <div class="my-3">
            <label for="InputEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="InputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="InputPassword">
          </div>
          <div class="my-3">
            <label for="inputState" class="form-label">User's State</label>
            <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option value="AL">Alabama</option>
                <option value="AK">Alaska</option>
                <option value="AZ">Arizona</option>
                <option value="AR">Arkansas</option>
                <option value="CA">California</option>
                <option value="CO">Colorado</option>
                <option value="CT">Connecticut</option>
                <option value="DE">Delaware</option>
                <option value="DC">District Of Columbia</option>
                <option value="FL">Florida</option>
                <option value="GA">Georgia</option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho</option>
                <option value="IL">Illinois</option>
                <option value="IN">Indiana</option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas</option>
                <option value="KY">Kentucky</option>
                <option value="LA">Louisiana</option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland</option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan</option>
                <option value="MN">Minnesota</option>
                <option value="MS">Mississippi</option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana</option>
                <option value="NE">Nebraska</option>
                <option value="NV">Nevada</option>
                <option value="NH">New Hampshire</option>
                <option value="NJ">New Jersey</option>
                <option value="NM">New Mexico</option>
                <option value="NY">New York</option>
                <option value="NC">North Carolina</option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio</option>
                <option value="OK">Oklahoma</option>
                <option value="OR">Oregon</option>
                <option value="PA">Pennsylvania</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina</option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee</option>
                <option value="TX">Texas</option>
                <option value="UT">Utah</option>
                <option value="VT">Vermont</option>
                <option value="VA">Virginia</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia</option>
                <option value="WI">Wisconsin</option>
                <option value="WY">Wyoming</option>
            </select>
        </div>
        </div>
        <div class="col my-3">
            <div class="d-inline-block">
                <label class="form-label" for="inputFile">Upload Profile Picture</label>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" accept="image/*" onchange="loadFile(event)">
              </div>
              <img src="..." class="img-thumbnail-my-1" alt="preview of uploaded image" id="imagePreview">
        </div>
        </div>
        </div>
            <button type="submit" class="btn btn-primary">Create Account</button>
    </body>
</html>