<?php

require('./dbconnection.php');

if (isset($_POST['p_title'], $_POST['p_content'], $_POST['code_url'], $_POST['deployed_url'], $_POST['image_url'])) {
    $p_title = $_POST['p_title'];
    $p_content = $_POST['p_content'];
    $code_url = $_POST['code_url'];
    $see_url = $_POST['deployed_url'];
    $bg_image_url = $_POST['image_url'];

    if (empty($_POST['p_title']) || empty($_POST['p_content']) || empty($_POST['image_url'])) {
        $error = 'All fields must be filled out !';
    } else {
        // Editing the database
        $id = $_POST['hidden']; //Retrieving $id from edit.php form
        $sqlEdit = 'REPLACE INTO `projects` (`id`, `p_title`, `p_content`, `code_url`, `see_url`, `bg_image_url`)
                            VALUES (:id, :p_title, :p_content, :code_url, :see_url, :bg_image_url)';
        $stmtEdit = $db->prepare($sqlEdit);
        $stmtEdit->bindParam(':id', $id);
        $stmtEdit->bindParam(':p_title', $p_title);
        $stmtEdit->bindParam(':p_content', $p_content);
        $stmtEdit->bindParam(':code_url', $code_url);
        $stmtEdit->bindParam(':see_url', $see_url);
        $stmtEdit->bindParam(':bg_image_url', $bg_image_url);

        if ($stmtEdit->execute()) {
            header('Location: ./admin.php');
            exit();
        } else {
            echo 'Something went wrong !';
        }
    }
}
?>