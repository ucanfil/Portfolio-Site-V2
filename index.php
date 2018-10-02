<?php
require('./cms/dbconnection.php');

$sql = 'SELECT `id`, `p_title`, `p_content`, `code_url`, `see_url`, `bg_image_url`
FROM `projects` ORDER BY `id` DESC';
$stmt = $db->query($sql);
if ($stmt->execute()) {
    $projects = $stmt->fetchAll();
} else {
    echo 'Something went wrong';
}

$sql2 = 'SELECT `content` FROM `about_me`';
$stmt2 = $db->query($sql2);
if ($stmt2->execute()) {
    $about_me = $stmt2->fetch();
} else {
    echo 'Something went wrong';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Burak Tilek | Web Developer</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Shadows+Into+Light" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar-top">
            <a href="/"><img src="./img/Logo.png" alt="business-logo" class="logo"></a>
            <ul class="top-nav">
                <li><a href="/">Home</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                <li><a href="#about-me">About Me</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <section class="intro">
            <h1>Not your average web-developer.</h1>
        </section>
        <a href="#portfolio" class="scroll-down-button"><i class="fas fa-angle-down"></i></a>
    </header>
    <main>
        <section class="portfolio">
            <div class="headings" id="portfolio">
                <h2>Portfolio</h2>
                <div class="heading-detail">Some of My Work</div>
            </div>
            <ul class="projects">
                <?php
                foreach ($projects as $project) { ?>
                    <li class="project project<?php echo $project['id']; ?>"
                    style="background-image: url('<?php echo $project['bg_image_url']; ?>')">
                        <div class="hidden-project-info">
                            <h3><?php echo $project['p_title']; ?></h3>
                            <p><?php echo $project['p_content']; ?></p>
                            <div class="code-nav-buttons">
                                <a href="<?php echo $project['code_url']; ?>" target="_blank">CODE</a>
                                <a href="<?php echo $project['see_url']; ?>" target="_blank">SEE ?</a>
                            </div>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
        </section>
        <section class="about-me">
            <div class="headings" id="about-me">
                <h2>About Me</h2>
                <div class="heading-detail">My Journey</div>
            </div>
            <p><?php echo $about_me['content']; ?></p>
        </section>
    </main>
    <footer>
        <div class="headings" id="contact">
            <h2>Contact</h2>
            <div class="heading-detail heading-detail-contact">Reach Out!</div>
        </div>
        <nav class="navbar-bottom">
            <p><i class="far fa-copyright"></i> 2018 Burak Tilek, all rights reserved</p>
            <ul class="bottom-nav">
                <li><a href="https://twitter.com/tilekburak" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
                <li><a href="https://www.linkedin.com/in/burak-tilek/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="https://github.com/ucanfil/" target="_blank"><i class="fab fa-github-square"></i></a></li>
                <li><a href="https://www.codewars.com/users/ucanfil" target="_blank"><i class="fas fa-code"></i></a></li>
            </ul>
        </nav>
    </footer>
</body>
<script src="js/app-IE10.js"></script>
<!--[!IE 10]--><script src="js/app.js"></script><!--<![endif]-->
</html>