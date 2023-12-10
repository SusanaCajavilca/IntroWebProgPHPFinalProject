<?php
// file responsible for saving our user information
require './inc/database.php';
// adding variables
$first_nameAD = $_POST['first_nameAD'];
$last_nameAD = $_POST['last_nameAD'];
$emailAD = $_POST['emailAD'];
$usernameAD = $_POST['usernameAD'];
$passwordAD = $_POST['passwordAD'];
$confirm = $_POST['confirm'];
$nameImageAD = $_POST['nameImageAD'];


//next validate inputs
$isok = true;
require './templates/header.php';
$title = "Final Project | Save-User Page | Introduction to Web Programming using PHP";
$description = "This is the Final Project for Introduction to Web Programming using PHP Course - Save-User Page";
// This page tells you if you successfully registered a User

//1st validation : first lets check that no field is empty
if(empty($first_nameAD)){
    echo  '<p>&nbsp;</p>';
    echo "<p>First name is needed</p>";
    $isok = false;
}
if(empty($last_nameAD)){
    echo  '<p>&nbsp;</p>';
    echo "<p>Last name is needed</p>";
    $isok = false;
}
if(empty($emailAD)){
    echo  '<p>&nbsp;</p>';
    echo "<p>Email is needed</p>";
    $isok = false;
}
if(empty($usernameAD)){
    echo  '<p>&nbsp;</p>';
    echo "<p>Username is needed</p>";
    $isok = false;
}
if(empty($passwordAD )){
    echo  '<p>&nbsp;</p>';
    echo "<p>Password is needed</p>";
    $isok = false;
}
if(empty($confirm )){
    echo  '<p>&nbsp;</p>';
    echo "<p>Confirm password is needed</p>";
    $isok = false;
}

// The 4 lines below had to be deleted in order to make this work, I left them as comments. Do not activate them!!!
//if(empty($nameImageAD )){
//    echo  '<p>&nbsp;</p>';
//    echo "<p>fileImageAD is needed</p>";
//    $isok = false;
//}

//2nd validation : now lets check that each field has the required data
if(!preg_match("/^[A-Za-z\s]+$/", $first_nameAD)){
    echo  '<p>&nbsp;</p>';
    echo "<p>Only alphabets and whitespace are allowed in the first name</p>";
    $isok = false;
}

if(!preg_match("/^[A-Za-z\s]+$/", $last_nameAD)){
    echo  '<p>&nbsp;</p>';
    echo "<p>Only alphabets and whitespace are allowed in the last name</p>";
    $isok = false;
}

$pattern ="/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}/";
if(!preg_match($pattern, $emailAD)){
    echo  '<p>&nbsp;</p>';
    echo "<p>Email is not valid</p>";
    $isok = false;
}

if(!preg_match("/^[A-Za-z0-9]+$/", $usernameAD)){
    echo  '<p>&nbsp;</p>';
    echo "<p>Only alphabets and numbers are allowed as a username</p>";
    $isok = false;
}
//3rd validation : now lets check that password is equal than confirm

if($passwordAD!=$confirm){
    echo  '<p>&nbsp;</p>';
    echo "<p>Password is invalid, or it does not match with the confirmation</p>";
    $isok = false;
}

//4th validation : now lets check that the email is not already registered
$sql2 = "SELECT * FROM phpadmins1 WHERE emailAD = '$emailAD'";
$searchEmail = $conexion->query($sql2);

if ($searchEmail  !== false) {
    $numRows = $searchEmail ->rowCount();

    if ($numRows > 0) {
        echo  '<p>&nbsp;</p>';
        echo "<p>Email is already registered.</p>";
        $isok = false;
    }
}
//echo $searchEmail->num_rows;
echo '<main class="save">';
//next , to decide if we are saving the admin, and if we are saving it , we then have to make sure that we are hashing the password
if($isok){
    $passwordAD= hash('sha512', $passwordAD); //hashing passwords
    //setting up our sql query
    $sql = "INSERT INTO phpadmins1 (first_nameAD,last_nameAD,emailAD,usernameAD,passwordAD,nameImageAD) VALUES ('$first_nameAD','$last_nameAD','$emailAD','$usernameAD','$passwordAD','$nameImageAD');";
    $conexion->exec($sql);
    // I decide to separate the process of saving the file

    // so instead of using INSERT INTO, I will use the UPDATE QUERY and use the email in the WHERE CONDITION
    $countfiles = count($_FILES['nameImageAD']['name']);
    //prepared statement
    $query = "UPDATE phpadmins1 SET nameImageAD = ?, fileImageAD= ? WHERE emailAD = '$emailAD' ";
    $statement = $conexion->prepare($query);
    // It will only save one image, but still
    // I decided to use a loop because it is a good practice, and leaves possibilities open
    for ($i=0; $i<$countfiles; $i++){
        //filesname code
        $filename = $_FILES['nameImageAD']['name'][$i];
        //location: the uploads folder
        $target_file ='./uploads/'.$filename;
        // file extension code
        $file_extension = pathinfo($target_file,PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        //validating image extension: only three types: png, jpeg, and jpg
        $valid_extension = array("png","jpeg","jpg"); // this array store the valid formats of images

        if(in_array($file_extension,$valid_extension)){
            //uploading the file, because it is only one image file
            if(move_uploaded_file($_FILES['nameImageAD']['tmp_name'][$i],$target_file)){
                //finally executing the query
                $statement->execute(array($filename,$target_file));
            }
        }
    }
    echo '<section class="success-row">';
    echo '<div>';
    echo  '<p>&nbsp;</p>';
    echo '<h3>User saved</h3>';  // if user was successfully saved
    echo '</div>';
    echo '</section>';
    // disconnect
    $conexion = null;

    echo '<section class="row success-back-row">';
    echo    '<div>';
    echo        '<p>&nbsp;</p>';
    echo        '<p>All setup, click the button below to head to the home page to sign up</p>';
    echo        '<p>&nbsp; </p>';
    echo        '<a href="index.php" class="error-button">Home Page</a>';
    echo        '<p>&nbsp; </p>';
    echo    '</div>';
    echo '</section>';
}
else{
    echo '<section class="row success-back-row">';
    echo    '<div>';
    echo        '<p>&nbsp; </p>';
    echo        '<h3>Nothing saved</h3>';  // if user was not successfully saved
    echo        '<p>&nbsp; </p>';
    echo        '<p>User could not be saved. Read the message(s) above, go back to the Home Page, and try again</p>';
    echo        '<p> &nbsp;</p>';
    echo        '<a href="index.php" class="error-button">Home Page</a>';
    echo        '<p>&nbsp;</p>';
    echo    '</div>';
    echo '</section>';

}
echo '</main>';

?>


<?php
require './templates/footer.php';
?>