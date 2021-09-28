<?php 
    $title = "Index";
    require_once "includes/header.php";
    require_once "db/conn.php";

    $results = $crud->getSpecialties();
?>
    <h1 class="text-center">Registration for IT conference</h1>

    <form enctype='multipart/form-data' method="post" action="success.php">
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" required>
       
        </div>
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" required>
       
        </div>
        <div class="mb-3">
            <label for="dateOfBirth" class="form-label">DOB:</label>
            <input type="text" class="form-control" id="dateOfBirth" name="dateOfBirth" required>
       
        </div>
        <div class="mb-3">
            <label for="speciality" class="form-label">Speciality:</label>
            <select class="form-select form-select-sm" aria-label=".form-select-lg example" id="speciality" name="speciality" required>
                <?php
                while ($r = $results->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <option value=<?php echo $r["speciality_id"];?>><?php echo $r["name"];?></option>
                <?php } ?>

            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address:</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
            </div>
        </div>
        <div class="mb-3">
            <label for="contactNum" class="form-label">Contact number:</label>
            <input type="text" class="form-control" id="contactNum" name="contactNum" aria-describedby="contactNumHelp" required>
            <div id="contactNumHelp" class="form-text">We'll never share your contact number with anyone else.
            </div>
        </div>
        <div class="custom-file">
            <label for="avatar" class="form-label">Upload image (optional):</label><br/>
            <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
        </div>
        <div class="d-grid gap-2">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button> 
        </div>
   </form> 
    <br/>
    <br/>
    <br/>
    <br/>
  

    <?php require_once "includes/footer.php"?>
