<?php
session_start();
if (!$_SESSION['logged_in']) {
    header('Location: login.php');
    exit();
}

require('dbconnection.php');

if (isset($_GET['dropdown'])) {
    // If any option selected get its id from the list and assign it to $id
    $id = $_GET['dropdown'];
    $sqlRetProject = 'SELECT `p_title`, `p_content`, `code_url`, `see_url`, `bg_image_url` FROM `projects` WHERE `id`= :id';
    $stmtRetProject = $db->prepare($sqlRetProject);
    $stmtRetProject->bindParam(':id', $id);
    $stmtRetProject->execute();
    $project = $stmtRetProject->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Project</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style_cms.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
</head>
<body>
    <main class="container edit-page">
        <form action="editSubmit.php" method="POST">
            <ul class="project-content-list">
                <li>
                    <input type="hidden" name="hidden" value="<?php echo $id; ?>">
                </li>
                <li>
                    <label for="p_title">Project Title: </label>
                    <input type="text" name="p_title" value="<?php echo $project['p_title']; ?>">
                </li>
                <li>
                    <label for="p_content">Project Content: </label>
                    <textarea type="text" name="p_content"><?php echo $project['p_content']; ?></textarea>
                </li>
                <li>
                    <label for="code_url">Source Code Url: </label>
                    <input type="text" name="code_url" value="<?php echo $project['code_url']; ?>">
                </li>
                <li>
                    <label for="deployed_url">Deployed Url: </label>
                    <input type="text" name="deployed_url" value="<?php echo $project['see_url']; ?>">
                </li>
                <li>
                    <label for="image_url">Image Url: </label>
                    <input type="text" name="image_url" value="<?php echo $project['bg_image_url']; ?>">
                </li>
            </ul>
            <input class="submit-button" type="submit" value="Edit">
        </form>
    </main>
</body>