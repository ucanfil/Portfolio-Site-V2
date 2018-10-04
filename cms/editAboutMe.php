<?php

require('dbconnection.php');

if (empty($_POST['content'])) {
    $error = 'All fields must be filled out !';
} elseif (array_key_exists('content', $_POST)) {
    $content = $_POST['content'];
    // Editing the database
    $sqlEdit = 'UPDATE `about_me` SET `content` = :content WHERE `id` = 1';
    $stmtEdit = $db->prepare($sqlEdit);
    $stmtEdit->bindParam(':content', $content);

    if ($stmtEdit->execute()) {
        header('Location: admin.php?success=01');
        exit();
    } else {
        echo 'Something went wrong !';
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
    <main class="container add-page">
        <form action="editAboutMe.php" method="POST">
            <ul class="project-content-list">
                <li>
                    <label for="content">About Me: </label>
                    <textarea type="text" name="content" id="content"></textarea>
                </li>
            </ul>
            <input class="submit-button" type="submit" value="Edit About Me">
        </form>
    </main>
</body>