
<!DOCTYPE html>
<html>
<head>
    <title>Energy Consumption Calculator</title>
   
    <style>
      body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h1 {
    color: #333;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.center-image {
    text-align: center;
  }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="center-image">
    <img src="img/calc.png" alt="Logo" width="400" height="400">
</div>

    <h1>Energy Consumption Calculator</h1>
    <h4>Calculating energy usage in watt-hours is essential for understanding and managing your electricity consumption. To determine this, start by identifying the power rating of the electrical appliance in watts (W). This information is often labeled on the appliance or found in its manual.

Once you have the power rating, multiply it by the number of hours the appliance operates. For instance, if an appliance has a power rating of 100 watts and operates for 5 hours, the energy usage would be 100 watts * 5 hours = 500 watt-hours (Wh).

For multiple appliances or devices, repeat this calculation for each and then sum up their individual watt-hour consumptions to get the total energy usage. This method allows users to gauge how much electricity their devices consume over specific periods, aiding in better energy management and informed decision-making for efficiency improvements</h4>
    <h3> Calculation in watt hours </h3>

    <!-- Calculator Form -->
    <form id="calculationForm">
        <label for="device_name">Device Name:</label>
        <input type="text" id="device_name" name="device_name" required />

        <label for="power_consumption">Power Consumption (Watt):</label>
        <input type="text" id="power_consumption" name="power_consumption" required />

        <label for="hours_used">Hours Used per Day:</label>
        <input type="text" id="hours_used" name="hours_used" required />

        <input type="submit" value="Calculate" />
    </form>

    <!-- Display Calculation Result -->
    <div id="calculationResult">
        <h2>Calculation Result:</h2>
        <p id="resultValue"></p>
    </div>

    <script>
    document.getElementById("calculationForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent default form submission

        var form = this;
        var formData = new FormData(form);

        // Send form data to PHP script using AJAX
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Display the result to the user
                    document.getElementById("calculationResult").innerHTML = "<h2>Calculation Result:</h2><p>" + xhr.responseText + "</p>";
                } else {
                    console.error("Error:", xhr.statusText);
                }
            }
        };

        xhr.open("POST", "calc.php", true); // Use separate PHP processing script
        xhr.send(formData);
    });
</script>


   
</body>
</html>

