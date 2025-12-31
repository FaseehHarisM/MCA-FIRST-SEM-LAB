<!DOCTYPE html>
<html>
<head>
    <title>Array Sorting</title>
</head>
<body>

    <?php

    $students = array(
        "R003" => "Zain",
        "R001" => "Zia",
        "R005" => "Adam",
        "R002" => "Charles",
        "R004" => "Elsa"
    );

    echo "<h2>1. Original Student Array (using print_r)</h2>";
    echo "<pre>"; 
    print_r($students);
    echo "</pre>";

    asort($students);

    echo "<h2>2. Sorted Ascending by Name (using asort)</h2>";
    echo "<pre>";
    print_r($students);
    echo "</pre>";

    arsort($students);

    echo "<h2>3. Sorted Descending by Name (using arsort)</h2>";
    echo "<pre>";
    print_r($students);
    echo "</pre>";
    ?>

</body>
</html>