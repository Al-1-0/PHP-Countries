<!DOCTYPE html>
<html lang="en">
    <head>
        <title>PHP Countries</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <style>
            a
            {
                color: white;
                text-decoration: none;
            }
            a:hover 
            {
                text-decoration: none;
                color: blue;
            }
            table, td, th
            { 
                border: lightgray solid thin;
                margin-left: auto;
                margin-right: auto;
            }
            td, th
            {
                padding: 2px;
                text-align: center;
                font-size: 16px;

            }
        </style>
    </head>
    <body>
        <h1>PHP <br>Countries<br>App</h1>
        <?php
        require_once "login.php";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("<p>Connection failed!</p></body></html>");
        }

        $sql = "SELECT * FROM countries";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>\n"
            . "\t\t\t<tr>\n"
            . "\t\t\t\t<th>ID</th>\n"
            . "\t\t\t\t<th>Country</th>\n"
            . "\t\t\t\t<th>Capital</th>\n"
            . "\t\t\t\t<th>Population</th>\n"
            . "\t\t\t\t<th>&nbsp;</th>\n"
            . "\t\t\t\t<th>&nbsp;</th>\n"
            . "\t\t\t</tr>\n";
            while ($row = $result->fetch_assoc()) {
                echo "\t\t\t<tr>\n"
                . "\t\t\t\t<td>" . $row["id"] . "</td>\n"
                . "\t\t\t\t<td>" . $row["country"] . "</td>\n"
                . "\t\t\t\t<td>" . $row["capital"] . "</td>\n"
                . "\t\t\t\t<td>" . $row["population"] . "</td>\n"
                . "\t\t\t\t<td><a href=\"updateform.php?id=" . $row["id"] . "\">Update</a></td>\n"
                . "\t\t\t\t<td><a href=\"deleterecord.php?id=" . $row["id"] . "\">Delete</a></td>\n"
                . "\t\t\t</tr>\n";
            }
            echo "\t\t</table>\n";
        } else {
            echo "<p>No results returned!</p>\n";
        }
        
        $conn->close();
        ?>
        <p><a href="insertform.php">Insert New Country</a></p>
    </body>
</html>
