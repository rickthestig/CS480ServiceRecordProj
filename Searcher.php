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

    
    $sqlbrowse = $conn->prepare("SELECT `Name`,`Blurb`,`Location`,`Rating`,`MaxUserCount` FROM `service` WHERE $filter LIKE '$input%'");
    /* $sqlbook->bindParam("s","%" . $search . "%"); */
    $sqlbrowse->execute();
    $result = $sqlbrowse->get_result();
    if($result->num_rows > 0) {
        echo 
        "<div class=\"align-content-center\">
            <table class=\"table\">
                <tr>
                    <th>Name</th>
                    <th>Short Description</th>
                    <th>Location</th>
                    <th>Rating</th>
                    <th>Max User Count</th>
                </tr>
            </table>
        </div>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Blurb"] . "</td><td>" . $row["Location"] . "<tr><td>" . $row["Rating"] . "</td><td>" . $row["MaxUserCount"];
            echo "</td></tr>\n";
            $sqlID = $conn->prepare("SELECT ServiceID FROM `service` WHERE Name LIKE '". $row['Name'] . "%'");
            /* THIS STUPID THING MADE ME SEETHE FOR 2 and a half hours because i quoted the STUPID SERVICE ID, I AM SEETHING AND MALDING, but at least it works now */
            /* $sqlbook->bindParam("s","%" . $search . "%"); */
            $sqlID->execute();
            $result = $sqlID->get_result();
            $ID = $result->fetch_assoc();
            $ID = $ID["ServiceID"];
            echo "<form action=\"ServicePage.php\" method=\"post\">";
            echo "<input type=\"text\" name=\"val\" value=\"$ID\" readonly=\"readonly\">";
            echo "<input type=\"submit\" value=\"Submit\">";
            echo "</form>";
            /* I FORGOT TO ADD THE END FORM TAG, I AM GOING TO PUNCH A WALL */
            /* the chance this acutally works is basically none, good luck my small amount of remaining sanity */
            /* I HATE ARRAYS */
            
        }

        $sqlbrowse->close();
        $sqlID->close();
        $conn->close();
    }
    

?>