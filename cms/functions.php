<?php
require('dbconnection.php');

// Populating Dropdown
function fetchProjects($db) {
    $sql = 'SELECT `id`, `p_title` FROM `projects`';
    $stmt = $db->query($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

function addProject($db) {
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

function populateDropdown($projects) {
    $html = '';
    foreach ($projects as $project) {
        $html .= '<option value="' . $project['id'] . '">' . $project['p_title'] . '</option>';
    }
    return $html;
}

?>