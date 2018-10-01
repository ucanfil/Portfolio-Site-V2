<?php

require('./dbconnection.php');

$sqlRet = 'SELECT `id`, `p_title` FROM `projects`';
$stmtRet = $db->query($sqlRet);
$stmtRet->execute();
$projects = $stmtRet->fetchAll();

if (isset($_GET['dropdown'])) {
    $id = $_GET['dropdown'];

    $sqlRetProject = 'SELECT * FROM `projects` WHERE `id`=' . $id;
    $stmtRetProject = $db->query($sqlRetProject);
    $stmtRetProject->execute();
    $project = $stmtRetProject->fetch();

    var_dump($project);
} else {
    $id = null; //experimental
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
    <main class="container edit-page">
        <form class="project-selection" action="edit.php" method="GET">
            <label for="dropdown">Choose Project to Edit: </label>
            <select name="dropdown" id="id">
                <option id="0">PROJECTS</option>
                <?php
                foreach($projects as $project) { ?>
                    <option value="<?php echo $project['id'] ?>"><?php echo $project['p_title'] ?></option>
                <?php } ?>
            </select>
            <input class="select-button" type="submit" value="Select">
        </form>
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
            <input class="submit-button" type="submit" value="Edit">
        </form>
    </main>
</body>