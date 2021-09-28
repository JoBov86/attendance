<?php 
require_once "includes/auth_check.php";
require_once 'db/conn.php';

if (!isset($_GET['id'])) {
    // echo "error";
    include 'includes/errorMessage.php';
    header("Location: viewRecords.php");

} else {
    $id = $_GET['id'];
    $result = $crud->deleteAttendee($id);

    if ($result) {
        header("Location: viewRecords.php");
    } else {
        // echo "error";
        include 'includes/errorMessage.php';
    }
}
?>