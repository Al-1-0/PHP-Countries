<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Learning PHP, MySQL & JavaScript</title>
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
        <h1>Countries of the World</h1>
        <form id="insertform" action="insertrecord.php" method="post">
            <table>
                <tr>
                    <td>Country:</td>
                    <td><input type="text" name="country" value="United Kingdom"></td>
                </tr>
                <tr>
                    <td>Capital:</td>
                    <td><input type="text" name="capital" value="London"></td>
                </tr>
                <tr>
                    <td>Population:</td>
                    <td><input type="text" name="population" value="67858826"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><a href="#" onclick="document.getElementById('insertform').submit();">Insert</a></td>
                </tr>
            </table>
        </form>
        <p><a href="index.php">Back</a></p>
    </body>
</html>
