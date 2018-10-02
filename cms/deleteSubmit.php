<?php

require('./dbconnection.php');

if (isset($_GET['dropdown'])) {
    if ($_GET['dropdown'] == 0) {
        header('Location: ./delete.php');
    } else {
        // If any option selected get its id from the list and assign it to $id
        $id = $_GET['dropdown'];
        $sqlRetProject = 'DELETE FROM `projects` WHERE `id` = :id';
        $stmtRetProject = $db->prepare($sqlRetProject);
        $stmtRetProject->bindParam(':id', $id);
        if ($stmtRetProject->execute()) {
            header('Location: ./admin.php');
            exit();
        } else {
            echo 'Something went wrong !';
        }
    }
}

?>