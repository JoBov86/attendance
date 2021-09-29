<?php 
    $title = "Success";
    require_once "includes/header.php";
    require_once "db/conn.php";
    // require_once "sendEmail.php";

       //get attendee by id
if (isset($_POST["submit"])) {
    $fname = $_POST["firstName"];
    $lname = $_POST["lastName"];
    $dob = $_POST["dateOfBirth"];
    $email = $_POST["email"];
    $contact = $_POST["contactNum"];
    $speciality = $_POST["speciality"];

    $original_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = "uploads/";
    if ($ext == "jpg" || $ext == "jpeg" || $ext == "pdf" || $ext == "png" || $ext == "psd") {
        $destination = "$target_dir$contact.$ext";

    } else {
        $destination = "uploads/blank.png";
    }
    move_uploaded_file($original_file, $destination);

    $isSuccess = $crud->insertAttendee($fname, $lname, $dob, $email, $contact, $speciality, $destination);
    $specialityName = $crud->getSpecialtyById($speciality);

    // if ($isSuccess) {
    //      // echo "success";
    //      SendEmail::sendMail($email, "Welcome to IT conference 2021", "You have succesfully registered for this year\'s IT conference");
    //      include 'includes/successMessage.php';
    // } else {
    //     // echo "error";
    //     include 'includes/errorMessage.php';
    // }
}
?>
    <div class="card" style="width: 20rem; margin-bottom: 5em;">
    <img src="<?php echo $destination?>" style="width: 19rem; height: 30rem; object-fit: cover" />

        <div class="card-body">
            <h5 class="card-title">
                <?php echo $_POST["firstName"]. " " .$_POST["lastName"];?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $specialityName["name"]?>
            </h6>
       
            <p class="card-text">D.O.B: <?php echo $_POST["dateOfBirth"];?><br>Email: <?php echo $_POST["email"];?><br>Phone: <?php echo $_POST["contactNum"];?></p>

      
        </div>
    </div>
    <br/>
<?php require_once "includes/footer.php"?>

