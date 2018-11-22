<?php
session_start();

if (isset($_SESSION['logged_in'])) {
    header('Location: admin.php');
    exit();
} else {
    if (!isset($_POST['username']) && !isset($_POST['password'])) {
        $error = '';
    } else {
        if (empty($_POST['username']) || empty($_POST['password'])) {
            $error = 'All fields must be filled out';
        } else {
            $usernameDb = 'mayden';
            $hashDb = '$2a$10$ndonmD1PbrfaN1GzBOpBEOvCcs5/3LcV0oxduawaAFdRKthU0NJB2';
            $username = $_POST['username'];
            $password = $_POST['password'];
            if (password_verify($password, $hashDb)) {
                $_SESSION['logged_in'] = true;
                header('Location: admin.php?success=02');
            } else {
                $error = 'Username or password is incorrect';
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style_cms.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
</head>
<body>
    <main class="container login-page">
        <h3 class="error"><?php if (isset($error)) { echo $error; }; ?></h3>
        <form action="login.php" method="POST">
            <ul class="project-content-list">
                <li>
                    <label for="username">Username:</label>
                    <input type="text" name="username">
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type="password" name="password">
                </li>
            </ul>
            <input class="submit-button" type="submit" value="Login">
        </form>
    </main>
</body>