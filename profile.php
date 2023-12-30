<?php

require "functions.php";
checkLogin();

if($_SERVER['REQUEST_METHOD'] == "POST" && !empty($_POST['username'])) {
    $username = addslashes($_POST['username']);
    $email = addslashes($_POST['email']);
    $password = addslashes($_POST['password']);
    

    $query = "insert into users (username, email, password, date, image) values ('$username', '$email', '$password', '$date', '$image')";

    $result = mysqli_query($con, $query);

    header("Location: login.php");
    die;
}
print_r($_GET);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #000;
            text-align: center;
        }

        body {
            height: 100vh;
            color: #000;
        }

        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 40px;
        }

        form>input {
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
    <div>
        <?php if (!empty($_GET['action']) && $_GET['action'] == "edit") : ?>
            <h1 style="color: black; text-align: center;">Edit Profile</h1>
    </div>

    <form method="post" enctype="multipart/from-data">
        image: <input type="file" name="image" id="image" required>
        <img src="<?php echo $_SESSION['info']['image']?>" alt="/" width="150px" height="150px">
        <input value="<?php echo $_SESSION['info']['username']?>" type="text" name="email" placeholder="Email">
        <input value="<?php echo $_SESSION['info']['email']?>" type="text" name="username" placeholder="Username">
        <input value="<?php echo $_SESSION['info']['password']?>" type="text" name="password" placeholder="Password">
        <button>Save</button>
    </form>
<?php else : ?>
    <div style="width: 100%; text-align: center;">
        <h1 style="color: black;">User Profile</h1>
    </div>
    <table>
        <tr>
            <th>Profile Picture:</th>
            <td><img src="" alt="/" width="150px" height="150px"></td>
        </tr>
        <tr>
            <th>Username:</th>
            <td><?php echo $_SESSION['info']['username']; ?></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><?php echo $_SESSION['info']['email']; ?></td>
        </tr>
        <a href="profile.php?action=edit">
            <button>Edit Profile</button>
        </a>
    </table>
    <hr>
    <form action="" method="$_POST">

        <textarea name="" id="" cols="30" rows="8"></textarea>
    </form>
<?php endif; ?>
</div>

<?php require_once "footer.php" ?>
</body>

</html>