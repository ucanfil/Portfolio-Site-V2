<?php

require('./dbconnection.php');

// If any option selected gets its id from the list and assign it to $id
$id = $_GET['dropdown'];

if ($id != 0) {
    $sqlRetProject = 'SELECT * FROM `projects` WHERE `id`=' . $id;
    $stmtRetProject = $db->query($sqlRetProject);
    $stmtRetProject->execute();
    $project = $stmtRetProject->fetch();
} else {
    header('Location: ./select.php');
    exit();
}

// Check if user edited the project
if (isset($_POST['p_title'], $_POST['p_content'], $_POST['code_url'], $_POST['deployed_url'], $_POST['image_url'])) {
    $p_title = $_POST['p_title'];
    $p_content = $_POST['p_content'];
    $code_url = $_POST['code_url'];
    $deployed_url = $_POST['deployed_url'];
    $image_url = $_POST['image_url'];

    // var_dump($id, $p_title, $p_content, $code_url, $see_url, $bg_image_url);
    echo '<br>';
    if (empty($_POST['p_title']) && empty($_POST['p_content']) && empty($_POST['code_url'])
    && empty($_POST['deployed_url']) && empty($_POST['image_url'])) {
        $error = 'All fields must be filled out !';
    } else {
        // Editing the database
        $sqlEdit = 'REPLACE INTO `projects` VALUES(:id, :p_title, :p_content, :code_url, :see_url, :bg_image_url)';
        $stmtEdit = $db->prepare($sqlEdit);

        // var_dump($id, $p_title, $p_content, $code_url, $see_url, $bg_image_url);

        $stmtEdit->bindParam(':id', $id);
        $stmtEdit->bindParam(':p_title', $p_title);
        $stmtEdit->bindParam(':p_content', $p_content);
        $stmtEdit->bindParam(':code_url', $code_url);
        $stmtEdit->bindParam(':see_url', $see_url);
        $stmtEdit->bindParam(':bg_image_url', $bg_image_url);
        if ($stmtEdit->execute()) {
            echo 'Success';
        } else {
            echo 'Failed';
        }
    }
}
echo $project['p_title'];

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
        <form action="edit.php" method="POST">
            <ul class="project-content-list">
                <li>
                    <label for="p_title">Project Title: </label>
                    <input type="text" name="p_title" placeholder="<?php echo $project['p_title']; ?>">
                </li>
                <li>
                    <label for="p_content">Project Content: </label>
                    <textarea type="text" name="p_content" placeholder="<?php echo $project['p_content']; ?>"></textarea>
                </li>
                <li>
                    <label for="code_url">Source Code Url: </label>
                    <input type="text" name="code_url" placeholder="<?php echo $project['code_url']; ?>">
                </li>
                <li>
                    <label for="deployed_url">Deployed Url: </label>
                    <input type="text" name="deployed_url" placeholder="<?php echo $project['deployed_url']; ?>">
                </li>
                <li>
                    <label for="image_url">Image Url: </label>
                    <input type="text" name="image_url" placeholder="<?php echo $project['image_url']; ?>">
                </li>
            </ul>
            <input class="submit-button" type="submit" value="Edit">
        </form>
    </main>
</body>