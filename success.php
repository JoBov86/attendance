<?php 
    $title = "Success";
    require_once "includes/header.php";
    require_once "db/conn.php";

       //get attendee by id
if (isset($_POST["submit"])) {
    $fname = $_POST["firstName"];
    $lname = $_POST["lastName"];
    $dob = $_POST["dateOfBirth"];
    $email = $_POST["email"];
    $contact = $_POST["contactNum"];
    $speciality = $_POST["speciality"];

    $isSuccess = $crud->insertAttendee($fname, $lname, $dob, $email, $contact, $speciality);

    if ($isSuccess) {
         // echo "success";
         include 'includes/successMessage.php';
    } else {
        // echo "error";
        include 'includes/errorMessage.php';
    }
}
?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST["firstName"]. " " .$_POST["lastName"];?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $_POST["speciality"]?>
            </h6>
       
            <p class="card-text">D.O.B: <?php echo $_POST["dateOfBirth"];?><br>Email: <?php echo $_POST["email"];?><br>Phone: <?php echo $_POST["contactNum"];?></p>

      
        </div>
    </div>
<?php require_once "includes/footer.php"?>
