<?php
    $input = $_GET['q'];
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
    $sqlbrowse = $conn->prepare("SELECT `Name`,`Blurb`,`Location`,`Rating`,`MaxUserCount` FROM `service` WHERE Name LIKE '%$input%'");
    /* $sqlbook->bindParam("s","%" . $search . "%"); */
    $sqlbrowse->execute();
    $result = $sqlbrowse->get_result();
    $sqlbrowse->close();
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
        }
    $sqlID = $conn->prepare("SELECT 'ServiceID' FROM `service` WHERE Name LIKE '%$input%'");
    /* $sqlbook->bindParam("s","%" . $search . "%"); */
    $sqlID->execute();
    $result = $sqlID->get_result();
    $sqlID->close();
    $conn->close();
    $ID = $result->fetch_assoc();
    echo "<form action=\"\" method=\"\">";
    echo "<input type=\"text\" id=\"val\" value=\"$ID\" disabled>";
    echo "<input type=\"submit\">";
    /* the chance this acutally works is basically none, good luck my small amount of remaining sanity */
    /* pain */
?>