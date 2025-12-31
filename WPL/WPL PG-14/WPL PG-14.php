<!DOCTYPE html>
<html>
<head>
    <title>Cricket Team Table</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 400px; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; color: #333; }
        h1 { color: #007bff; }
    </style>
</head>
<body>

    <h1>Indian Cricket Players List</h1>

    <?php

    $players = array(
        "Rohit Sharma",
        "Virat Kohli",
        "Jasprit Bumrah",
        "KL Rahul",
        "Hardik Pandya",
        "Ravindra Jadeja",
        "Mohammed Siraj",
        "Shreyas Iyer"
    );

    echo "<table>";
    echo "<thead>";
    echo "<tr><th>S. No.</th><th>Player Name</th></tr>";
    echo "</thead>";
    echo "<tbody>";

    $serial_number = 1;

    foreach ($players as $name) {
        echo "<tr>";

        echo "<td>" . $serial_number . "</td>";

        echo "<td>" . $name . "</td>";
        echo "</tr>";
        $serial_number++;
    }

    echo "</tbody>";
    echo "</table>";
    ?>

    <p style="margin-top: 25px; font-size: 0.9em; color: #666;">
        The PHP array was created and the content was dynamically inserted into the HTML table using the <code>foreach</code> loop and <code>echo</code> statements.
    </p>

</body>
</html>