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

        $id = filter_input(INPUT_GET, "id");

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("<p>Connection failed!</p>\n\t</body>\n</html>");
        }

        $sql = "DELETE FROM countries WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Record successfully deleted</p>";
            header("Location: index.php");
            $conn->close();
        } else {
            echo "<p>Error deleting record!</p>\n\t</body>\n</html>";
        }

        $conn->close();
        ?>
    </body>
</html>
