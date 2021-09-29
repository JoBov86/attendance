<?php 
$title = "View Record";
    require_once "includes/header.php";
    require_once "includes/auth_check.php";
    require_once "db/conn.php"; 

//get attendee by id
if (!isset($_GET["id"])) {
    echo "<h1 class='text-danger'>Please check details and try again</h1>";
} else {
    $id = $_GET["id"];
    $result = $crud->getAttendeeDetails($id);
    ?>
<div class="card" style="width: 20rem; margin-bottom: 5em;">
<img src="<?php echo empty($result['avatar_path']) ? "uploads/blank.png" : $result['avatar_path'] ?>" style="width: 19rem; height: 30rem; object-fit: cover;"  />

        <div class="card-body">
            <h5 class="card-title">
                <?php echo $result["firstName"]. " " .$result["lastName"]?>
            </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $result["name"]?>
            </h6>
       
            <p class="card-text">D.O.B: <?php echo $result["dateOfBirth"]?><br>Email: <?php echo $result["email"]?><br>Phone: <?php echo $result["contactNum"]?></p>
        </div>
        <a href="viewRecords.php" class="btn btn-info">Back to List</a>
            <a href="edit.php?id=<?php echo $result['attendee_id']?>" class="btn btn-warning">Edit</a>
            <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $result['attendee_id']?>" class="btn btn-danger">Delete</a>
    </div>
    <br/>
   
    <?php
}
?>


    <?php require_once "includes/footer.php"?>
