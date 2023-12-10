<?php

// now we will add the value to the title variable and the description variable
$title = "Final Project | Edit User Page | Introduction to Web Programming using PHP";
$description = "This is the Final Project for Introduction to Web Programming using PHP Course - Edit User";
// only if it is mandatory you use require
require './inc/database.php';
require './inc/functions.php';
require './templates/header.php';
// this page is for editing a user (content of the website)
if (isset($_GET['edit2Id']) && !empty($_GET['edit2Id'])) {
    $edit2Id = $_GET['edit2Id'];

    $sql7 = "SELECT * FROM phpadmins1 WHERE user_idAD = '$edit2Id'";
    $row = $conexion->query($sql7);
    $user = $row->fetch(PDO::FETCH_ASSOC);

}

// update the record
if (isset($_POST['update'])) {
    updateRecordU($_POST, $conexion);
}



?>

<main class="container">
    <section class="register">
        <h2>Edit User data</h2>
    </section>
    <!-- The form will have 7 fields: all required -->
    <!-- 1 -first_nameAD - TextBox -->
    <!-- 2 -last_nameAD - TextBox  -->
    <!-- 3 -emailAD - Type email, must be unique  -->
    <!-- 4 -usernameAD - TextBox  -->
    <!-- 5 -passwordAD - TextBox -->
    <!-- 6 -confirm - TextBox -->
    <!-- 7 -fileImageAD - File -->
    <section class="form-row row justify-content-center">
        <form method="post" action="edit2.php" class="form-horizontal col-md-6 col-md-offset-3" enctype='multipart/form-data'>
            <!-- 1 -first_nameAD - TextBox -->
            <div class="form-group">
                <label for="input1" class="col-sm-6 control-label">Enter your first name</label>
                <div class="col-sm-10">
                    <input type="text" name="ufirst_nameAD" value="<?php echo $user['first_nameAD']; ?>" class="form-control" id="input1" required>
                </div>
            </div>
            <!-- 2 -last_nameAD - TextBox  -->
            <div class="form-group">
                <label for="input2" class="col-sm-6 control-label">Enter your last name</label>
                <div class="col-sm-10">
                    <input type="text" name="ulast_nameAD" value="<?php echo $user['last_nameAD']; ?>" class="form-control" id="input2" required>
                </div>
            </div>
            <!-- 3 -Email - TextBox, type email  -->
            <div class="form-group">
                <label for="input3" class="col-sm-6 control-label">Enter your email</label>
                <div class="col-sm-10">
                    <input type="email" name="uemailAD" value="<?php echo $user['emailAD']; ?>" class="form-control" id="input3" required>
                </div>
            </div>
            <!-- 4 -usernameAD - TextBox  -->
            <div class="form-group">
                <label for="input4" class="col-sm-6 control-label">Enter your username</label>
                <div class="col-sm-10">
                    <input type="text" name="uusernameAD" value="<?php echo $user['usernameAD']; ?>" class="form-control" id="input4" required>
                </div>
            </div>
            <!-- 5 -passwordAD - TextBox -->
            <div class="form-group">
                <label for="input5" class="col-sm-6 control-label">Enter your password</label>
                <div class="col-sm-10">
                    <input type="password" name="upasswordAD" value="<?php echo $user['passwordAD']; ?>" class="form-control" id="input5" required>
                </div>
            </div>
            <!-- 6 -confirm - TextBox -->
            <div class="form-group">
                <label for="input6" class="col-sm-6 control-label">Confirm your password</label>
                <div class="col-sm-10">
                    <input type="password" name="uconfirm" value="" class="form-control" id="input6" required>
                </div>
            </div>
            <!-- 7 -fileImageAD - File -->
            <div class="form-group">
                <label for="input7" class="col-sm-6 control-label">Enter your image file</label>
                <div class="col-sm-10">
                    <input type='file' name="unameImageAD[]" value="<?php echo $user['nameImageAD']; ?>" multiple class="form-control" id="input7" required>
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="user_idAD" value="<?php echo $user['user_idAD']; ?>">
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