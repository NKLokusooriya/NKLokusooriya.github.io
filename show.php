<!DOCTYPE html>
<html>
<head>
    <title>Galle Fort</title>
</head>
<body>
    <div class="background-image">
    <h1>Contacts</h1>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "wtdatabase";

        $connection = new mysqli($servername, $username, $password, $dbname);
        if ($connection->connect_error) 
        {
            die("Connection failed: " . $connection->connect_error);
        }

        $sql = "SELECT * FROM details";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) 
        {
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Action</th></tr>";
            while($row = $result->fetch_assoc()) 
            {
                echo "<tr>";
                echo "<td>" . $row["Id"] . "</td>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["Email"] . "</td>";
                echo "<td>" . $row["Message"] . "</td>";
                echo "<td><a href='delete.php?Id=" . $row["Id"] . "'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } 
        else 
        {
            echo "No contacts found.";
        }

        $connection->close();
    ?>
</body>
</html>
