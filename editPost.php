<?php 
    require_once 'db/conn.php';

    // get values from pots operation
if (isset($_POST["submit"])) {
    // extract values from the $_POST array
    $id = $_POST["id"];
    $fname = $_POST["firstName"];
    $lname = $_POST["lastName"];
    $dob = $_POST["dateOfBirth"];
    $email = $_POST["email"];
    $contact = $_POST["contactNum"];
    $speciality = $_POST["speciality"];

    // call crud function
    $result = $crud->editAttendee($id, $fname, $lname, $dob, $email, $contact, $speciality);
    
    // redirect to index.php
    if ($result) {
        header("Location: viewRecords.php");
    } else {
        // echo "error";
        include 'includes/errorMessage.php';
    }
} else { 
    // echo "error";
    include 'includes/errorMessage.php';
}
?>