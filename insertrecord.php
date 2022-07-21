<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Learning PHP, MySQL & JavaScript</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Countries of the World</h1>
        <?php
        require_once "login.php";

        $country = filter_input(INPUT_POST, "country");
        $capital = filter_input(INPUT_POST, "capital");
        $population = filter_input(INPUT_POST, "population");

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("<p>Connection failed!</p>\n\t</body>\n</html>");
        }

        $sql = "INSERT INTO countries (country, capital, population)
            VALUES (\"$country\", \"$capital\", $population)";
        
        if ($conn->query($sql) === TRUE) {
            echo "<p>Record successfully inserted</p>";
            header("Location: index.php");
            $conn->close();
        } else {
            echo "<p>Error inserting record</p>>";
        }

        $conn->close();
        ?>
    </body>
</html>
