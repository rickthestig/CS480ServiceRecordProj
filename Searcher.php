<?php
    $input = $_GET['q'];
    $filter = $_GET['f'];
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

    
    $sqlbrowse = $conn->prepare("SELECT `Name`,`Blurb`,`Location`,`Rating`,`MaxUserCount`,`ServiceID` FROM `service` WHERE $filter LIKE '$input%'");
    /* $sqlbook->bindParam("s","%" . $search . "%"); */
    $sqlbrowse->execute();
    $result = $sqlbrowse->get_result();
    if ($result->num_rows > 0) {
        echo "<div class=\"container\">
                <div class=\"align-content-center\">
                <table class=\"table table-responsive\">
                    <thead class= 'thead-dark'>
                        <tr>
                            <th>Name</th>
                            <th>Short Description</th>
                            <th>Location</th>
                            <th>Rating</th>
                            <th>Max User Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["Name"] . "</td>
                    <td>" . $row["Blurb"] . "</td>
                    <td>" . $row["Location"] . "</td>
                    <td>" . $row["Rating"] . "</td>
                    <td>" . $row["MaxUserCount"] . "</td>
                    <td>
                        <form action=\"ServicePage.php\" method=\"post\">
                            <input type=\"hidden\" name=\"val\" value=\"" . $row['ServiceID'] . "\" readonly=\"readonly\">
                            <input type=\"submit\" value=\"Submit\" class=\"btn btn-primary\">
                        </form>
                    </td>
                  </tr>";
        }
    
        echo "</tbody></table></div></div>";
            /* I FORGOT TO ADD THE END FORM TAG, I AM GOING TO PUNCH A WALL */
            /* the chance this acutally works is basically none, good luck my small amount of remaining sanity */
            /* I HATE ARRAYS */
            
        }

        $sqlbrowse->close();
        $conn->close();
    

?>