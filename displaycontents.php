<?php
    include("dbconnect.php");

    $sql = "select * from registration";

    $rs = mysqli_query($dbconnect, $sql);
    if(!$rs) {
        die("Database connection failed: " . mysqli_error($dbconnect));
    }

    mysqli_close($dbconnect);

    echo "<table border = \"l\" cellpadding = \"2\">";
    echo "<tr><th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>User Name</th>";
    echo "<th>Password</th></tr>";

    while($row = mysqli_fetch_array($rs)) {
        echo "<tr>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["password"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";


?>