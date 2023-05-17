<!DOCTYPE html>
<html>
<head>
    <title>Retrieve Data from Database</title>
</head>
<body>
    <?php
    $servername = "localhost";
    $username = "yourusername";
    $password = "yourpassword";
    $dbname = "yourdatabase";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully<br>";

    // Retrieve data from table
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
            echo "Email: " . $row["email"] . "<br><br>";
        }
    } else {
        echo "0 results";
    }

    // Close connection
    mysqli_close($conn);
    ?>
</body>
</html>