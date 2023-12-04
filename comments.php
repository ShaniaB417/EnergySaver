<?php
session_start();

// Database connection
include('config.php'); // database connection file here

// Check if user is logged in and retrieve user ID
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit();
}

// Set user ID from session
$customerId = $_SESSION['user_id'];
?>





<!DOCTYPE html>
<html>
<head>
    <title>Comments - EnergySaver</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <!-- Include CSS stylesheets -->
    <style>
     * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
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

        .comment-form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .comment-form textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
            resize: vertical;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .comment-form input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .comments-section p {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <!-- Comment Form -->
    <div class="comment-form">
        <h2>Leave a Comment</h2>
        <form action="submit_comment.php" method="post">
            <textarea name="comment" placeholder="Write your comment here" required></textarea>
            <input type="submit" value="Post Comment">
        </form>
    </div>

    <!-- Display comments section -->
    <div class="comments-section">
       
    <h2>Comments</h2>

    <h3>Make comments and notes here </h3>
        <?php
        // Fetch comments for the current user
        $commentsQuery = "SELECT * FROM comments WHERE customer_id = ?";
        $stmt = $conn->prepare($commentsQuery);
        $stmt->bind_param("i", $customerId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<p>" . $row['comment_text'] . "</p>";
                
            }
        } else {
            echo "No comments yet.";
        }
        ?>
    </div>


</body>
</html>

