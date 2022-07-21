<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Learning PHP, MySQL & JavaScript</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            a
            {
                color: blue;
            }
            table, td, th
            { 
                border: lightgrey solid thin;
            }
            td, th
            {
                padding: 2px;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <h1>Countries of the World</h1>
        <?php
        require_once "login.php";

        $id = filter_input(INPUT_GET, "id");

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("<p>Connection failed!</p></body></html>");
        }

        $sql = "SELECT * FROM countries WHERE id=" . $id;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $country = $row["country"];
        $capital = $row["capital"];
        $population = $row["population"];

        echo "<form id=\"updateform\" action=\"updaterecord.php\" method=\"post\">\n"
        . "\t\t\t<input type=\"hidden\" name=\"id\" value=\"$id\">\n"
        . "\t\t\t<table>\n"
        . "\t\t\t\t<tr>\n"
        . "\t\t\t\t\t<td>Country:</td>\n"
        . "\t\t\t\t\t<td><input type=\"text\" name=\"country\" value=\"$country\"></td>\n"
        . "\t\t\t\t</tr>\n"
        . "\t\t\t\t<tr>\n"
        . "\t\t\t\t\t<td>Capital:</td>\n"
        . "\t\t\t\t\t<td><input type=\"text\" name=\"capital\" value=\"$capital\"></td>\n"
        . "\t\t\t\t</tr>\n"
        . "\t\t\t\t<tr>\n"
        . "\t\t\t\t\t<td>Population:</td>\n"
        . "\t\t\t\t\t<td><input type=\"text\" name=\"population\" value=\"$population\"></td>\n"
        . "\t\t\t\t</tr>\n"
        . "\t\t\t\t<tr>\n"
        . "\t\t\t\t\t<td>&nbsp;</td>\n"
        . "\t\t\t\t\t<td><a href=\"#\" onclick=\"document.getElementById('updateform').submit();\">Update</a></td>\n"
        . "\t\t\t\t</tr>\n"
        . "\t\t\t</table>\n"
        . "\t\t</form>\n";
        
        $conn->close();
        ?>
        <p><a href="index.php">Back</a></p>
    </body>
</html>
