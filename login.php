<?php
    require "functions.php";
    
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = addslashes($_POST['email']);
        $password = addslashes($_POST['password']);

        $query = "select * from users where email = '$email' && password = '$password'";

        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['info'] = $row;
            header("Location: profile.php");
            die;
        } else {
            $error = "Wrong email or password";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <?php require_once "header.php" ?>

    <div style="width: 100%; text-align: center;">
        <h1 style="color: black;">Login</h1>
        <?php
            if(!empty($error)) {
                echo "<div>" . $error . "</div>";
            }
        ?>
    </div>

    <form action="" method="post">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="password" placeholder="Password">
        <button>Login</button>
    </form>

    <?php require_once "footer.php" ?>
</body>

</html>