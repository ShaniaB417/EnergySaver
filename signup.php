<?php
session_start();

// Check if user is already logged in, redirect to dashboard if true
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

// Database connection

include('config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST['new_username'];
    $newPassword = $_POST['new_password'];

    // Validate and sanitize user input

    // Check if the username already exists in the database
    $checkQuery = "SELECT customer_id FROM Customers WHERE username=?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("s", $newUsername);
    $stmt->execute();
    $checkResult = $stmt->get_result();

    if ($checkResult->num_rows == 0) {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $insertQuery = "INSERT INTO Customers (username, password) VALUES (?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ss", $newUsername, $hashedPassword);
        $insertResult = $stmt->execute();

        if ($insertResult) {
            // Redirect to login page or display success message
            header("Location: login.php");
            exit();
        } else {
            $error = "Error creating user";
        }
    } else {
        $error = "Username already exists";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up - EnergySaver</title>

    <style>


header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

nav {
    background-color: #f4f4f4;
    padding: 10px 0;
    text-align: center;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

nav ul li {
    display: inline-block;
    margin-right: 20px;
}

main {
    padding: 20px;
    text-align: center;
}

section {
    margin-bottom: 30px;
}


body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center; /* Center text content */
        }

        main {
    padding: 20px;
    text-align: center;
}

section {
    margin-bottom: 30px;
}



input[type="text"]#username {
            width: 200px; 
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center; /* Center text content */
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            width: 300px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            margin: auto; /* Center the form */
        }


    </style>
</head>
<body>
<?php include 'navbar.php'; ?>
    <h1>Sign Up to EnergySaver</h1>

    <!-- Display error message if any -->
    <?php if (isset($error)) : ?>
        <div><?php echo $error; ?></div>
    <?php endif; ?>

    <!-- Signup Form -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="new_username">Username:</label>
        <input type="text" id="new_username" name="new_username" required><br><br>

        <label for="new_password">Password:</label>
        <input type="password" id="new_password" name="new_password" required><br><br>

        <input type="submit" value="Sign Up">
    </form>

    <!-- Link to login page -->
    <p>Already have an account? <a href="login.php">Login</a></p>

  

</body>
</html>

