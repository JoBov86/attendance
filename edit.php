<?php 
$title = "Edit Record";
require_once "includes/header.php";
require_once "includes/auth_check.php";
require_once "db/conn.php";

$results = $crud->getSpecialties();

if (!isset($_GET['id'])) {
    // echo "error";
    include 'includes/errorMessage.php';
    header("Location: viewRecords.php");
} else {
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);

    ?>
    <h1 class="text-center">Edit Record</h1>

    <form method="post" action="editPost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id'] ?>" />
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name:</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstName'] ?>" id="firstName" name="firstName">
       
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name:</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastName'] ?>" id="lastName" name="lastName">
       
        </div>
        <div class="mb-3">
            <label for="dateOfBirth" class="form-label">DOB:</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dateOfBirth'] ?>" id="dateOfBirth" name="dateOfBirth">
       
        </div>
        <div class="mb-3">
            <label for="speciality" class="form-label">Speciality:</label>
            <select class="form-select form-select-sm" aria-label=".form-select-lg example" id="speciality" name="speciality">
                <?php
                while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <option value="<?php echo $r['speciality_id']?>" <?php if($r['speciality_id'] == $attendee['speciality_id']) echo 'selected'?>>
                        <?php echo $r["name"];?>
                    </option>
                <?php } ?>

            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address:</label>
            <input type="email" class="form-control" value="<?php echo $attendee['email'] ?>" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
            </div>
        </div>
        <div class="mb-3">
            <label for="contactNum" class="form-label">Contact number:</label>
            <input type="text" class="form-control" value="<?php echo $attendee['contactNum'] ?>" id="contactNum" name="contactNum" aria-describedby="contactNumHelp">
            <div id="contactNumHelp" class="form-text">We'll never share your contact number with anyone else.
            </div>
        </div>
        <div class="d-grid gap-2">
        <button type="submit" name="submit" class="btn btn-success">Save Changes</button> 
        <a href="viewRecords.php" class="btn btn-outline-info">Back to List</a>
  
        </div>
   </form> 
    <?php 
}
?>
    <br/>
    <br/>
    <br/>
    <br/>
  

<?php require_once "includes/footer.php"?>
