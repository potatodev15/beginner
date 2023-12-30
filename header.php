<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f7f7eb;
            color: blue ;
            font-family: sans-serif;
        }

        header {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 50px;
            background-color: blue;
        }

        ul {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style-type: none;
            gap: 40px;
        }
        a {
            text-decoration: underline;
            color: #000;
        }
    </style>
</head>
<body>
    <header>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="profile.php">Profile</a>
            </li>
            <?php if(empty($_SESSION['info'])):?>
                <li>
                    <a href="login.php">Login</a>
                </li>
                <li>
                    <a href="signup.php">SignUp</a>
                </li>
            <?php else:?>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            <?php endif;?>
        </ul>
    </header>
</body>
</html>