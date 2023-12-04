<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerId = $_SESSION['user_id'];
    $commentText = $_POST['comment'];

    $insertQuery = "INSERT INTO comments (customer_id, comment_text) VALUES (?, ?)";
    $stmt = $conn->prepare($insertQuery);

    if ($stmt) {
        $stmt->bind_param("is", $customerId, $commentText);
        $stmt->execute();
        header("Location: comments.php"); // Redirect back to the profile page after posting the comment
        exit();
    } else {
        echo "Error inserting comment";
    }
}
?>


