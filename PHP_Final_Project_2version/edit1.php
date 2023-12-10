<?php

// now we will add the value to the title variable and the description variable
$title = "Final Project | Edit Content Page | Introduction to Web Programming using PHP";
$description = "This is the Final Project for Introduction to Web Programming using PHP Course - Edit Student";
 // only if it is mandatory you use require
require './inc/database.php';
require './inc/functions.php';
require './templates/header.php';
// this page is for editing a computer student (content of the website)
if (isset($_GET['edit1Id']) && !empty($_GET['edit1Id'])) {
    $editId = $_GET['edit1Id'];
    //$student = displayRecordByIdCS($editId); // did not work, do not activate this code
    $sql1 = "SELECT * FROM phppeople1 WHERE ID = '$editId '";
    $row = $conexion->query($sql1);
    $student = $row->fetch(PDO::FETCH_ASSOC);

}

// update the record
if (isset($_POST['update'])) {
    updateRecordCS($_POST, $conexion);
}



?>
<main class="container">
        <section class="register">
            <h2>Edit student data</h2>
        </section>
        <!-- The form will have 8 fields: all required -->
        <!-- 1 -fname - TextBox -->
        <!-- 2 -lname - TextBox  -->
        <!-- 3 -email - Type email,  -->
        <!-- 4 -phoneNumber - Number -->
        <!-- 5 -college - TextBox -->
        <!-- 6 -city - TextBox -->
        <!-- 7 -programLanguages - TextBox -->
        <!-- 8 -operatingSystems - TextBox -->
        <section class="form-row row justify-content-center">
            <form method="POST" action="edit1.php" class="form-horizontal col-md-6 col-md-offset-3">
                <!-- 1 -fname - TextBox -->
                <div class="form-group">
                    <label for="input8" class="col-sm-6 control-label">Edit first name</label>
                    <div class="col-sm-10">
                        <input type="text" name="ufname" value="<?php echo $student['fname']; ?>" class="form-control" id="input8" required>
                    </div>
                </div>
                <!-- 2 -lname - TextBox  -->
                <div class="form-group">
                    <label for="input9" class="col-sm-6 control-label">Edit last name</label>
                    <div class="col-sm-10">
                        <input type="text" name="ulname" value="<?php echo $student['lname']; ?>" class="form-control" id="input9" required>
                    </div>
                </div>
                <!-- 3 -email - Type email,  -->
                <div class="form-group">
                    <label for="input10" class="col-sm-6 control-label">Edit email</label>
                    <div class="col-sm-10">
                        <input type="email" name="uemail" value="<?php echo $student['email']; ?>" class="form-control" id="input10" required>
                    </div>
                </div>
                <!-- 4 -phoneNumber - Number -->
                <div class="form-group">
                    <label for="input11" class="col-sm-6 control-label">Edit phone number</label>
                    <div class="col-sm-10">
                        <input type="tel" name="uphoneNumber" value="<?php echo $student['phoneNumber']; ?>" class="form-control" id="input11" required>
                    </div>
                </div>
                <!-- 5 -college  - TextBox-->
                <div class="form-group">
                    <label for="input12" class="col-sm-6 control-label">Edit college</label>
                    <div class="col-sm-10">
                        <input type="text" name="ucollege" value="<?php echo $student['college']; ?>" class="form-control" id="input12" required>
                    </div>
                </div>
                <!-- 6 -city - TextBox -->
                <div class="form-group">
                    <label for="input13" class="col-sm-6 control-label">Edit city</label>
                    <div class="col-sm-10">
                        <input type="text" name="ucity" value="<?php echo $student['city']; ?>" class="form-control" id="input13" required>
                    </div>
                </div>
                <!-- 7 -programLanguages - TextBox -->
                <div class="form-group">
                    <label for="input14" class="col-sm-6 control-label">Edit Program Languages</label>
                    <div class="col-sm-10">
                        <input type="text" name="uprogramLanguages" value="<?php echo $student['programLanguages']; ?>" class="form-control" id="input14" required>
                    </div>
                </div>
                <!-- 8 -operatingSystems - - TextBox -->
                <div class="form-group">
                    <label for="input15" class="col-sm-6 control-label">Edit Operating Systems</label>
                    <div class="col-sm-10">
                        <input type="text" name="uoperatingSystems" value="<?php echo $student['operatingSystems']; ?>" class="form-control" id="input15" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="ID" value="<?php echo $student['ID']; ?>">
                    <input type="submit" name="update" class="btn btn-info col-md-2 col-md-offset-10" value="Update">
                    <p>&nbsp;</p>
                </div>
            </form>
            <div class="form-group submit-message">

            </div>
        </section>
    </main>

<?php
require './templates/footer.php'; // linking the footer
?>