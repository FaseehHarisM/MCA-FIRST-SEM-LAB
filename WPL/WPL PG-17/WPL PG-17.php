<!DOCTYPE html>
<html>
<head>
    <title>Database Data Retrieval</title>
</head>
<body>

    <h1>Database Data Retrieval</h1>
    
    <?php

    $conn = mysqli_connect("localhost", "root", "", "mca");
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected Successfully to database: mca<br><br>";

    $sql = "SELECT fname, pno, email FROM student"; 
    
    $result = mysqli_query($conn, $sql); 

    if (mysqli_num_rows($result) > 0) {
        
        echo "<h2>Retrieved Student Records</h2>";
        
        echo "<table border='1'>";
        echo "<thead><tr><th>Full Name</th><th>Phone Number</th><th>Email</th></tr></thead>"; 
        echo "<tbody>";

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["fname"] . "</td>"; 
            echo "<td>" . $row["pno"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        
    } else {
        echo "<p>0 records found in the table (student).</p>";
    }

    mysqli_close($conn);
    ?>
    
</body>
</html>