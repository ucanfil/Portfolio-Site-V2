<?php
session_start();
if (!$_SESSION['logged_in']) {
    header('Location: login.php');
    exit();
}

require('dbconnection.php');
require('functions.php');

if (empty($_POST['p_title']) || empty($_POST['p_content']) || empty($_POST['code_url']) || empty($_POST['deployed_url']) || empty($_POST['image_url'])) {
    $error = 'All fields must be filled out !';
} else {
    addProject($db);
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
    <main class="container add-page">
        <form action="add.php" method="POST">
            <ul class="project-content-list">
                <li>
                    <label for="p_title">Project Title: </label>
                    <input type="text" name="p_title" id="p_title">
                </li>
                <li>
                    <label for="p_content">Project Content: </label>
                    <textarea type="text" name="p_content" id="p_content"></textarea>
                </li>
                <li>
                    <label for="code_url">Source Code Url: </label>
                    <input type="text" name="code_url" id="code_url">
                </li>
                <li>
                    <label for="deployed_url">Deployed Url: </label>
                    <input type="text" name="deployed_url" id="deployed_url">
                </li>
                <li>
                    <label for="image_url">Image Url: </label>
                    <input type="text" name="image_url" id="image_url">
                </li>
            </ul>
            <input class="submit-button" type="submit" value="Add">
        </form>
    </main>
</body>