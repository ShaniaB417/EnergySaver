<?php
include('navbar.php');
// Define an array of questions and answers
$energyFAQ = array(
    "What types of energy services do you offer?" => "We provide a range of energy services including electricity, natural gas, and renewable energy options sourced from solar and wind.",
    
    "How can I switch my current energy provider to your services?" => "Switching to our services is easy! Simply fill out our online form or give us a call, and our team will guide you through the seamless transition process.",
    
    "Are your energy sources environmentally friendly?" => "Yes, we prioritize sustainability. Our renewable energy plans are sourced from clean sources like solar and wind, reducing our carbon footprint.",
    
    "What benefits do your energy plans offer compared to others?" => "Our plans offer competitive pricing, personalized options, and a commitment to environmental sustainability, ensuring value and eco-conscious choices for our customers.",

);

// Display the FAQ on the webpage

echo "<h1>EnergySaver FAQs</h1>";

echo '<div style="text-align: center;">';
echo '<img src="img/QandA.png" alt="Logo" width="400" height="400">';
echo '</div>';

echo "<ul>";
foreach ($energyFAQ as $question => $answer) {
    echo "<li><strong>$question</strong><br>$answer</li><br>";
}
echo "</ul>";

?>

