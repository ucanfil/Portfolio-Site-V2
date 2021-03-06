<?php
session_start();
if (!$_SESSION['logged_in']) {
    header('Location: login.php');
    exit();
}

require('dbconnection.php');
require('functions.php');
require('nonDbFunctions.php');


if (empty($_POST['p_title']) || empty($_POST['p_content']) || empty($_POST['code_url']) || empty($_POST['deployed_url']) || empty($_POST['image_url'])) {
    header('Location: select.php?error=01');
} elseif (isKeyExist(['hidden', 'p_title', 'p_content', 'code_url', 'deployed_url', 'image_url'], $_POST)) {
    $p_title = $_POST['p_title'];
    $p_content = $_POST['p_content'];
    $code_url = $_POST['code_url'];
    $see_url = $_POST['deployed_url'];
    $bg_image_url = $_POST['image_url'];
    $id = $_POST['hidden']; //Retrieving $id from edit.php form
    $sqlEdit = 'UPDATE `projects` SET `p_title` = :p_title, `p_content` = :p_content, `code_url` = :code_url,
                        `see_url` = :see_url, `bg_image_url` = :bg_image_url
                WHERE `id` = :id';
    $stmtEdit = $db->prepare($sqlEdit);
    $stmtEdit->bindParam(':id', $id);
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
?>