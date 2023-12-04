<?php

include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['energy_type'])) {
        $energyType = $_POST['energy_type'];


        // Insert selected energy type into the database
        $query = "INSERT INTO energy_types (energy_name) VALUES (?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $energyType);
        $stmt->execute();

        // Redirect after insertion
        header("Location: view_energy_types.php");
        exit();
    } else {
      
        echo "Please select an energy type.";
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Create Energy Type</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

    <h1>Create New Energy Type</h1>

    <form action="view_energy_types.php" method="post">
        <label for="energy_type">Select Energy Type:</label>
        <select id="energy_type" name="energy_type" required>
            <option value="">Select an Energy Type</option>
            <option value="Solar">Solar</option>
            <option value="Wind">Wind</option>
            <option value="Hydroelectric">Hydroelectric</option>
            <!-- Add more energy types as needed -->
        </select><br><br>
        <input type="submit" value="Create">
    </form>
   
</body>
</html>
