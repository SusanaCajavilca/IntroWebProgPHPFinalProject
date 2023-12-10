<?php
// now we will add the value to the title variable and the description variable
$title = "Final Project | Add Content Page | Introduction to Web Programming using PHP";
$description = "This is the Final Project for Introduction to Web Programming using PHP Course - Add Student";
require './templates/header.php';  // only if it is mandatory you use require
require './inc/database.php';
require './inc/functions.php';
// this page is for adding a computer student (content of the website)
if (isset($_POST['submit'])){
    insertDataCS($_POST, $conexion);
}
?>
    <main class="container">
        <section class="register">
            <h2>Enter student data</h2>
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
            <form method="POST" action="add1.php" class="form-horizontal col-md-6 col-md-offset-3">
                <!-- 1 -fname - TextBox -->
                <div class="form-group">
                    <label for="input8" class="col-sm-6 control-label">Enter first name</label>
                    <div class="col-sm-10">
                        <input type="text" name="fname" class="form-control" id="input8" required>
                    </div>
                </div>
                <!-- 2 -lname - TextBox  -->
                <div class="form-group">
                    <label for="input9" class="col-sm-6 control-label">Enter last name</label>
                    <div class="col-sm-10">
                        <input type="text" name="lname" class="form-control" id="input9" required>
                    </div>
                </div>
                <!-- 3 -email - Type email,  -->
                <div class="form-group">
                    <label for="input10" class="col-sm-6 control-label">Enter email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="input10" required>
                    </div>
                </div>
                <!-- 4 -phoneNumber - Number -->
                <div class="form-group">
                    <label for="input11" class="col-sm-6 control-label">Enter phone number</label>
                    <div class="col-sm-10">
                        <input type="tel" name="phoneNumber" class="form-control" id="input11" required>
                    </div>
                </div>
                <!-- 5 -college  - TextBox-->
                <div class="form-group">
                    <label for="input12" class="col-sm-6 control-label">Enter college</label>
                    <div class="col-sm-10">
                        <input type="text" name="college" class="form-control" id="input12" required>
                    </div>
                </div>
                <!-- 6 -city - TextBox -->
                <div class="form-group">
                    <label for="input13" class="col-sm-6 control-label">Enter city</label>
                    <div class="col-sm-10">
                        <input type="text" name="city" class="form-control" id="input13" required>
                    </div>
                </div>
                <!-- 7 -programLanguages - TextBox -->
                <div class="form-group">
                    <label for="input14" class="col-sm-6 control-label">Enter Program Languages</label>
                    <div class="col-sm-10">
                        <input type="text" name="programLanguages" class="form-control" id="input14" required>
                    </div>
                </div>
                <!-- 8 -operatingSystems - - TextBox -->
                <div class="form-group">
                    <label for="input15" class="col-sm-6 control-label">Enter Operating Systems</label>
                    <div class="col-sm-10">
                        <input type="text" name="operatingSystems" class="form-control" id="input15" required>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-info col-md-2 col-md-offset-10"  value="Submit">
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