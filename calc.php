<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Handle not logged in user
    echo "Error: User not logged in.";
    exit();
}


include('config.php'); //database connection file

// Fetch user ID from session
$customerId = $_SESSION['user_id'];

// Retrieve form data
$deviceName = $_POST['device_name'];
$powerConsumption = $_POST['power_consumption'];
$hoursUsed = $_POST['hours_used'];

// Perform calculation
$calculationResult = $powerConsumption * $hoursUsed;

// execute SQL statement to insert into the database
$insertQuery = "INSERT INTO SavedCalculations (customer_id, calculation_data) VALUES (?, ?)";
$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("is", $customerId, $calculationResult);
$result = $stmt->execute();

if ($result) {
    echo "Calculation saved successfully!";
} else {
    echo "Error: Failed to save calculation.";
}

// Close database connection
$stmt->close();
$conn->close();
?>
