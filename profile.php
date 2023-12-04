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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - EnergySaver</title>
    <style>
        /* Reset default margin and padding */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Header styles */
        header {
            text-align: center;
            padding: 20px;
        }

        .center-image img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        h1 {
            margin-top: 0;
        }

        /* Main content styles */
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h2 {
            margin-top: 30px;
        }

        .comment-form textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
            resize: vertical;
        }

        .comment-form input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .comments-section p {
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
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
    <header>
        <?php include 'navbar.php'; ?>
        <div class="center-image">
            <img src="img/profile.jpeg" alt="Profile Picture">
        </div>
        <h1>Welcome ! </h1>
    </header>

    <div class="container">
        <h2>Upload energy reports here</h2>
        <!-- Include your energy upload section -->
        <?php include 'pdf_upload.php';?>
        <?php include 'energy.php';?>
        <?php include 'pdf_upload.php';?>

        <div class="comment-form">
            <h2>Leave a Comment</h2>
            <form action="submit_comment.php" method="post">
                <textarea name="comment" placeholder="Write your comment here" required></textarea>
                <input type="submit" value="Post Comment">
            </form>
        </div>

     
    </body>
    </html>


   


