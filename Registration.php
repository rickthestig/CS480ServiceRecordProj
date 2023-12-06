<?php
session_start();
?>
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
        ?>
    </head>
    <body>
          <div class="mt-3">
            <h1 class="text-center">Service Account Registration Page</h1>
          </div>
          <!-- input first and last name -->
        <form name="regForm" id="regForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <div class="container-sm">
        <div class="mt-3">
            <div class="input-group">
            <span class="input-group-text">First and last name</span>
            <input type="text" aria-label="First name" class="form-control" name="inputFirst" id="inputFirst" required>
            <input type="text" aria-label="Last name" class="form-control" name="inputLast" id="inputLast" required>
          </div>
        </div>
        <div class="container-sm align-content-center">
            <!--  -->

            <div class="row">
                <div class="col">
            <div class="my-3">
                <label for="inputEmail" class="form-label">Email address</label>
                <input type="email" name="inputEmail" class="form-control" id="inputEmail" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" name="inputPassword" class="form-control" id="inputPassword" required>
            </div>
            <div class="my-3">
                <label for="inputState" class="form-label">User's State</label>
                <select id="inputState" name="inputState" class="form-select" required>
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
            <!-- <div class="col my-3">
                <div class="d-inline-block">
                    <label class="form-label" for="inputFile">Upload Profile Picture</label>
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" accept="image/*" onchange="loadFile(event)">
                </div>
                <img src="..." class="img-thumbnail-my-1" alt="preview of uploaded image" id="imagePreview">
            </div> -->
            </div>
            </div>
                <input type="submit" class="btn btn-primary" name="submitButton" id="submitButton" value="Create Account">
                <a href="signin.php">Back to Sign in</a>
        </form>
        <?php
            
            $firstName = isset($_POST['inputFirst']) ? $_POST['inputFirst'] : "";
            $lastName = isset($_POST['inputLast']) ? $_POST['inputLast'] : "";
            $username = isset($_POST['inputEmail']) ? $_POST['inputEmail'] : "";
            $password = isset($_POST['inputPassword']) ? $_POST['inputPassword'] : "";
            $state = isset($_POST['inputState']) ? $_POST['inputState'] : "";

            if(isset($_POST["submitButton"])) {
                $sql = "INSERT INTO user (Username, Password, FirstName, LastName, State) VALUES ('$username', '$password', '$firstName', '$lastName', '$state')";
                if ($conn->query($sql) === TRUE) {
                    echo "User registered successfully";
                    echo "<script>window.location.href = 'signin.php'</script>";
                } else {
                    echo "<script>window.location.href = 'registration.php'</script>";
                }
            }
            $conn->close();
        ?>
    </body>
</html>