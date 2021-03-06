<?php
session_start();
if (!$_SESSION['logged_in']) {
    header('Location: login.php');
    exit();
}



if ($_GET['success'] == '01') {
    $success = 'Process successful.';
} elseif ($_GET['success'] == '02') {
    $success = 'Login successful.';
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
    <main class="container admin-page">
        <h3 class="success"><?php echo $success; ?></h3>
        <ul>
            <li class="project-nav add"><a href="add.php">Add Project</a></li>
            <li class="project-nav edit"><a href="select.php">Edit Project</a></li>
            <li class="project-nav delete"><a href="delete.php">Delete Project</a></li>
        </ul>
        <div class="about-me-container">
            <a class="edit-about-me" href="editAboutMe.php">Edit About Me</a>
        </div>
        <a class="logout-button" href="logout.php">Logout</a>
    </main>
</body>
</html>