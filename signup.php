<?php
    require "functions.php";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = addslashes($_POST['username']);
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);
        $date = date('Y-m-d');

        $query = "insert into users (username, email, password, date, image) values ('$username', '$email', '$password', '$date', '$image')";

        $result = mysqli_query($con, $query);

        header("Location: login.php");
        die;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            height: 100vh;
        }
        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 40px;
        }

        form > input {
            width: 80%;
            padding: 20px;
        }
        button {
            padding: 15px 20px;
        }
    </style>
</head>
<body>
    <?php require_once "header.php"?>

    <div style="width: 100%; text-align: center;">
        <h1 style="color: black;">Sign Up</h1>
    </div>

    <form method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="password" placeholder="Password">
        <button>Sign Up</button>
    </form>

    <?php require_once "footer.php"?>
</body>
</html>