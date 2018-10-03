<?php
require('dbconnection.php');

/**
 * Fetches data from database
 *
 * Sends a query to database, executes, fetches all data.
 *
 * @param PDO $db
 * @return array which consist of field values of project's table
 */
function fetchProjects(PDO $db) : array {
    $sql = 'SELECT `id`, `p_title` FROM `projects`';
    $stmt = $db->query($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * Adds new project to database
 *
 * Assigns global POST variables to variables, sends an insert query to database,
 * If execute is successful redirects user to admin page with a success message.
 *
 * @param PDO $db
 * @return void
 */
function addProject(PDO $db) {
    $p_title = $_POST['p_title'];
    $p_content = $_POST['p_content'];
    $code_url = $_POST['code_url'];
    $see_url = $_POST['deployed_url'];
    $bg_image_url = $_POST['image_url'];
    $sqlEdit = 'INSERT INTO `projects` (`p_title`, `p_content`, `code_url`, `see_url`, `bg_image_url`)
                VALUES (:p_title, :p_content, :code_url, :see_url, :bg_image_url)';
    $stmtEdit = $db->prepare($sqlEdit);
    $stmtEdit->bindParam(':p_title', $p_title);
    $stmtEdit->bindParam(':p_content', $p_content);
    $stmtEdit->bindParam(':code_url', $code_url);
    $stmtEdit->bindParam(':see_url', $see_url);
    $stmtEdit->bindParam(':bg_image_url', $bg_image_url);

    if ($stmtEdit->execute()) {
        header('Location: admin.php?success=01');
        exit();
    } else {
        echo 'Something went wrong !';
    }
}

/**
 * Populates option elements
 *
 * Takes an array which is fetched data from database, as an argument, loops over them,
 * populates option elements with values from the array.
 *
 * @param array $projects
 * @return string
 */
function populateDropdown(array $projects) : string {
    $html = '';
    foreach ($projects as $project) {
        $html .= '<option value="' . $project['id'] . '">' . $project['p_title'] . '</option>';
    }
    return $html;
}

/**
 * Populates list elements
 *
 * Takes an array which is fetched data from database, as an argument, loops over them,
 * populates list elements with values from the array.
 *
 * @param array $projects
 * @return string
 */
function populateProject(array $projects) : string {
    $html = '';
    foreach ($projects as $project) {
        $html .= '<li class="project project' . $project['id'] . '"
                    style="background-image: url(\'' . $project['bg_image_url'] . '\')">
                        <div class="hidden-project-info">
                            <h3>' . $project['p_title'] . '</h3>
                            <p>' . $project['p_content'] . '</p>
                            <div class="code-nav-buttons">
                                <a href="' . $project['code_url'] . '" target="_blank">CODE</a>
                                <a href="' . $project['see_url'] . '" target="_blank">SEE ?</a>
                            </div>
                        </div>
                    </li>';
    }
    return $html;
}
?>