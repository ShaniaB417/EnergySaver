<!DOCTYPE html>
<html>
<head>
    <title>Navigation Styling</title>
    <style>
        nav {
            background-color: #f2f2f2;
            padding: 15px;
            border-bottom: 2px solid #ccc;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        ul li {
            display: inline;
            margin-right: 20px;
        }

        ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        ul li a:hover {
            color: #3c813c;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="QandA.php"> Q and A </a></li>
            <li><a href="calculation.php">Calculator</a></li>
            <li><a href="comments.php">Comments</a></li>
       

            <?php
            session_start();
            if (isset($_SESSION['user_id'])) {
                echo '<li><a href="logout.php">Logout</a></li>';
            } else {
                echo '<li><a href="login.php">Login</a></li>';
            }
            ?>
        </ul>
    </nav>
   
</body>
</html>


