<?php

require('./dbconnection.php');

// Populating Dropdown
$sqlRet = 'SELECT `id`, `p_title` FROM `projects`';
$stmtRet = $db->query($sqlRet);
$stmtRet->execute();
$projects = $stmtRet->fetchAll();

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
        <form class="project-selection" action="deleteSubmit.php" method="GET">
            <label for="dropdown">Choose Project to Edit: </label>
            <select name="dropdown" id="id">
                <option value="0">PROJECTS</option>
                <?php
                foreach($projects as $project) { ?>
                    <option value="<?php echo $project['id'] ?>"><?php echo $project['p_title'] ?></option>
                <?php } ?>
            </select>
            <input class="delete-button" type="submit" value="Delete">
        </form>
    </main>
</body>