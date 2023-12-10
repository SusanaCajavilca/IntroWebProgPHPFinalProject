<?php
// now we will add the value to the title variable and the description variable
$title = "Final Project | Transition Page | Introduction to Web Programming using PHP";
$description = "This is the Final Project for Introduction to Web Programming using PHP Course - Transition Page";
require './templates/header.php';  // only if it is mandatory you use require

// this page works as a sort of bridge or transition
// from here you can go to each of the two private pages or log out
// 1- See and edit Users
// 2- See and edit Computer Students
// 3- Log out
session_start();
if(!isset($_SESSION['user_idAD'])){
header('location:index.php');
exit();
}else{
    require './inc/database.php';
    echo "<main>";
    // See and edit Users
    echo "<p>&nbsp;</p>";
    echo "<p>&nbsp;</p>";
    echo '<div class="col-sm-12 col-md-9 col-lg-6 d-col mx-auto">';
    echo "<p>&nbsp;</p>";
    echo "<h2>Here you can see and edit the User Register</h2>";
    echo "<p>&nbsp;</p>";
    echo '<a class="btn btn-info" href="editregisteredusers.php">See users</a>';
    echo "<p>&nbsp;</p>";
    echo '</div>';

    echo "<p>&nbsp;</p>";
    // See and edit Computer Students
    echo '<div class="col-sm-12 col-md-9 col-lg-6 d-col mx-auto">';
    echo "<p>&nbsp;</p>";
    echo "<h2>Here you can see and edit the Students Register</h2>";
    echo "<p>&nbsp;</p>";
    echo '<a class="btn btn-info" href="editcontent.php">See students</a>';
    echo "<p>&nbsp;</p>";
    echo '</div>';

    echo "<p>&nbsp;</p>";
    echo "<p>&nbsp;</p>";
    // Log out
    echo '<div class="d-col justify-content-center">';
    echo "<p>&nbsp;</p>";
    echo '<a class="btn btn-warning" href="logout.php">Log out</a>';
    echo "<p>&nbsp;</p>";
    echo '</div>';
    echo "<p>&nbsp;</p>";
    echo "</main>";
}
?>


<?php
require './templates/footer.php';
?>
