<?php
session_start();
if (!$_SESSION['logged_in']) {
    header('Location: login.php');
    exit();
}

require('dbconnection.php');
require('functions.php');
require('nonDbFunctions.php');

if (isset($_GET['error']) && $_GET['error'] == '01') {
    $error = 'All fields must be filled.';
} elseif (isset($_GET['error']) && $_GET['error'] == '02') {
    $error = 'Please select a project from the list.';
} else {
    unset($error);
}

$projects = fetchProjects($db);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Project</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style_cms.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
</head>
<body>
    <main class="container select-page">
        <h3 class="error"><?php if (isset($error)) {
            echo $error;
        } ?></h3>
        <form class="project-selection" action="edit.php" method="GET">
            <label for="dropdown">Choose Project to Edit: </label>
            <select name="dropdown" id="id">
                <option selected>PROJECTS</option>
                <?php echo populateDropdown($projects); ?>
            </select>
            <input class="select-button" type="submit" value="Select">
        </form>
    </main>
</body>