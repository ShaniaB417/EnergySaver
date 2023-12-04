<!DOCTYPE html>
<html>
<head>
    <title>View Energy Types</title>
    <style> body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

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
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }

        .center-image {
    text-align: center;
    margin: 20px;
  }

</style>
<?php include 'navbar.php'; ?>
    <h1>Energy Types</h1>

   
    <div class="center-image">
    <img src="img/EnergyTypes.jpg" alt="Logo" width="650" height="450">

</div>

    <?php
    // Include your database connection file here
    include('config.php');


    // Retrieve energy types from the database
    $query = "SELECT * FROM energy_types";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li><strong>" . $row['energy_name'] . "</strong>: " . $row['description'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No energy types found.";
    }
    ?>


</body>
</html>

