<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill Calculator</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f0f0f0; }
        .container { max-width: 400px; margin: 0 auto; background-color: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #007bff; text-align: center; border-bottom: 2px solid #ccc; padding-bottom: 10px; margin-bottom: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type="submit"] { background-color: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; width: 100%; }
        .result { margin-top: 20px; padding: 15px; border: 1px solid #007bff; background-color: #e6f7ff; border-radius: 4px; }
        .result h2 { color: #dc3545; margin-top: 0; }
    </style>
</head>
<body>

<?php
$consumer_name = "";
$units_used = 0;
$total_bill = 0;
$result_display = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $consumer_name = htmlspecialchars($_POST['consumer_name'] ?? '');
    $units_used = (int)($_POST['units_used'] ?? 0);

    $rate_tier1 = 5.00;    
    $rate_tier2 = 7.50;    
    $rate_tier3 = 10.00;   
    
    if ($units_used <= 0) {
        $result_display = "Please enter a valid number of units consumed.";
    } elseif ($units_used <= 100) {

        $total_bill = $units_used * $rate_tier1;
        
    } elseif ($units_used <= 200) {
        
        $cost_tier1 = 100 * $rate_tier1;
        
        $remaining_units = $units_used - 100;
        $cost_tier2 = $remaining_units * $rate_tier2;
        
        $total_bill = $cost_tier1 + $cost_tier2;
        
    } else {
        
        $cost_tier1 = 100 * $rate_tier1;
        
        $cost_tier2 = 100 * $rate_tier2;
        
        $remaining_units = $units_used - 200;
        $cost_tier3 = $remaining_units * $rate_tier3;
        
        $total_bill = $cost_tier1 + $cost_tier2 + $cost_tier3;
    }
    
    $total_bill_formatted = number_format((float)$total_bill, 2);

    if ($units_used > 0) {
        $result_display = "<div class='result'>";
        $result_display .= "<h2>Bill Details</h2>";
        $result_display .= "<p><strong>Consumer:</strong> " . $consumer_name . "</p>";
        $result_display .= "<p><strong>Units Used:</strong> " . $units_used . " units</p>";
        $result_display .= "<p><strong>Total Amount Due:</strong> <span style='font-size: 1.2em; color: #dc3545;'>Rs. " . $total_bill_formatted . "</span></p>";
        $result_display .= "</div>";
    }
}
?>

<div class="container">
    <h1>Electricity Bill Calculator</h1>
    
    <div style="margin-bottom: 20px; padding: 10px; border: 1px dashed #ffa07a; border-radius: 4px; font-size: 0.9em;">
        <strong>Tariff:</strong><br>
        1 - 100 units: Rs. 5.00/unit<br>
        101 - 200 units: Rs. 7.50/unit<br>
        201+ units: Rs. 10.00/unit
    </div>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        
        <label for="consumer_name">Consumer Name</label>
        <input type="text" id="consumer_name" name="consumer_name" required 
               value="<?php echo htmlspecialchars($consumer_name); ?>" placeholder="Enter name">

        <label for="units_used">Units Consumed</label>
        <input type="number" id="units_used" name="units_used" required min="0" 
               value="<?php echo htmlspecialchars($units_used); ?>" placeholder="Enter total units">

        <input type="submit" value="Calculate Bill">
    </form>
    
    <?php echo $result_display; ?>

</div>
</body>
</html>