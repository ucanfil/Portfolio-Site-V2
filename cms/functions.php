<?php
require('./dbconnection.php');

// Populating Dropdown
function fetchProjects($db) {
    $sql = 'SELECT `id`, `p_title` FROM `projects`';
    $stmt = $db->query($sql);
    $stmt->execute();
    $projects = $stmt->fetchAll();
    return $projects;
}

?>