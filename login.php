<?php
session_start();

// Check if user is already logged in, redirect to dashboard if true
if (isset($_SESSION['user_id'])) {
    header("Location: profile.php");
    exit();
}

// Database connection
// Include your database connection file here
include('config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submittedUsername = $_POST['username'];
    $submittedPassword = $_POST['password'];

    // Prepare and execute the statement to check user credentials
    $query = "SELECT customer_id, username, password FROM Customers WHERE username=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $submittedUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    // If the user credentials are valid, set session variables and redirect
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($submittedPassword, $row['password'])) {
            $_SESSION['user_id'] = $row['customer_id'];
            $_SESSION['username'] = $row['username'];
            header("Location: profile.php");
            exit();
        } else {
            $error = "Invalid username or password";
        }
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - EnergySaver</title>
    <link rel="stylesheet" type="text/css" href="css/style.css ">
    <!-- Include CSS stylesheets -->
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

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
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
            text-align: center;
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
    <h1>Login to EnergySaver</h1>

    <!-- Display error message if any -->
    <?php if (isset($error)) : ?>
        <div><?php echo $error; ?></div>
    <?php endif; ?>

    <!-- Login Form -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>

    <!-- Link to signup page -->
    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>



</body>
</html>



