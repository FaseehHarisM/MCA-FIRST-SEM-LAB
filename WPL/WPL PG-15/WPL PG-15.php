<!DOCTYPE html>
<html>
<head>
    <title>Registration Form and Validation</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 450px; margin: 0 auto; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #007bff; text-align: center; margin-bottom: 25px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="password"] { 
            width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; 
        }
        input[type="submit"] { background-color: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        .error { color: #dc3545; font-size: 0.9em; margin-left: 10px; }
        .success { color: #28a745; font-weight: bold; text-align: center; padding: 15px; background-color: #d4edda; border-radius: 4px; }
    </style>
</head>
<body>

<?php
$nameErr = $emailErr = $passwordErr = "";
$name = $email = $password = "";
$is_submitted = false;
$form_valid = false;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $is_submitted = true;

    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }

    if (empty($nameErr) && empty($emailErr) && empty($passwordErr)) {
        $form_valid = true;
    }
}
?>

<div class="container">
    <h1>Student Registration Form</h1>

    <?php
    if ($is_submitted && $form_valid) {
        echo "<div class='success'>";
        echo "Registration Successful!<br>";
        echo "Data Submitted: Name: $name, Email: $email";
        echo "</div>";
    } else {
    ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" 
                   value="<?php echo htmlspecialchars($name); ?>">
            <span class="error">* <?php echo $nameErr; ?></span>

            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" 
                   value="<?php echo htmlspecialchars($email); ?>">
            <span class="error">* <?php echo $emailErr; ?></span>

            <label for="password">Password</label>

            <input type="password" id="password" name="password">
            <span class="error">* <?php echo $passwordErr; ?></span>

            <input type="submit" value="Register">
        </form>
    <?php
    }
    ?>
    <p style="text-align: center; margin-top: 20px; font-size: 0.8em; color: #6c757d;">
        * Indicates a required field. Server-side validation performed by PHP.
    </p>
</div>

</body>
</html>