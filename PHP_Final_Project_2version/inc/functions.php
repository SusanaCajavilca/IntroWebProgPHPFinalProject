<?php

//connect to db
require 'database.php';  //validate is already inside the include folder, so we don't have to add TH ./

// in this file I am storing my functions for my website

// functions for the table phppeople1 - Students DataBase
// in the name of the function there is a 'CS'

// function to insert record of a Computer Student - (Content)
function insertDataCS($post, $conexion)
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $college = $_POST['college'];
    $city = $_POST['city'];
    $programLanguages = $_POST['programLanguages'];
    $operatingSystems = $_POST['operatingSystems'];
    $check = true; // working as a flag or lock

    //1st validation : first lets check that no field is empty
    if (empty($fname)) {
        echo  '<p>&nbsp;</p>';
        echo "<p>First name is needed</p>";
        $check = false;
    }
    if (empty($lname)) {
        echo  '<p>&nbsp;</p>';
        echo "<p>Last name is needed</p>";
        $check = false;
    }
    if (empty($email)) {
        echo  '<p>&nbsp;</p>';
        echo "<p>Email is needed</p>";
        $check = false;
    }
    if (empty($phoneNumber)) {
        echo  '<p>&nbsp;</p>';
        echo "<p>Phone number is needed</p>";
        $check = false;
    }
    if (empty($college)) {
        echo  '<p>&nbsp;</p>';
        echo "<p>College is needed</p>";
        $check = false;
    }
    if (empty($city)) {
        echo  '<p>&nbsp;</p>';
        echo "<p>City is needed</p>";
        $check = false;
    }
    if (empty($programLanguages)) {
        echo  '<p>&nbsp;</p>';
        echo "<p>Program Languages are needed</p>";
        $check = false;
    }
    if (empty($operatingSystems)) {
        echo  '<p>&nbsp;</p>';
        echo "<p>Operating Systems are needed</p>";
        $check = false;
    }

    //2nd validation : now lets check that each field has the required data
    if (!preg_match("/^[A-Za-z\s]+$/", $fname)) {
        echo '<p>&nbsp;</p>';
        echo "<p>Only alphabets and whitespace are allowed in the first name</p>";
        $check = false;
    }

    if (!preg_match("/^[A-Za-z\s]+$/", $lname)) {
        echo  '<p>&nbsp;</p>';
        echo "<p>Only alphabets and whitespace are allowed in the last name</p>";
        $check = false;
    }

    $pattern = "/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}/";
    if (!preg_match($pattern, $email)) {
        echo  '<p>&nbsp;</p>';
        echo "<p>Email is not valid</p>";
        $check = false;
    }

    $pattern2 = "/^705\d{7}$/";
    if (!preg_match($pattern2, $phoneNumber)) {
        echo  '<p>&nbsp;</p>';
        echo "<p>Phone number is not valid, it must start with 705 and have a lenght of 10 digits</p>";
        $check = false;
    }

    if (!preg_match("/^[A-Za-z\s]+$/", $college)) {
        echo  '<p>&nbsp;</p>';
        echo "<p>Only alphabets and whitespace are allowed in the college</p>";
        $check = false;
    }

    if (!preg_match("/^[A-Za-z\s]+$/", $city)) {
        echo  '<p>&nbsp;</p>';
        echo "<p>Only alphabets and whitespace are allowed in the city</p>";
        $check = false;
    }

    if (!preg_match("/^[a-zA-Z#,0-9\s]+$/", $programLanguages)) {
        echo  '<p>&nbsp;</p>';
        echo "<p>Only alphabets,whitespace, and # are allowed in Program Languages</p>";
        $check = false;
    }

    if (!preg_match("/^[A-Za-z,\s]+$/", $operatingSystems)) {
        echo  '<p>&nbsp;</p>';
        echo "<p>Only alphabets and whitespace are allowed in Operating Systems</p>";
        $check = false;
    }

    if ($check) {
        try {
            $query1 = "INSERT INTO phppeople1 (fname,lname, email, phoneNumber,college,city,programLanguages,operatingSystems) VALUES ('$fname','$lname','$email','$phoneNumber','$college','$city','$programLanguages','$operatingSystems');";
            $conexion->exec($query1);
            header("Location: ./editcontent.php?msg1=insert");
        } catch (PDOException $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p>Could not add the record. Read the message above, go below and try again</p>";
    }
}

// the 17 lines below were a function that did not work, I left them as comments. Do no activate!!!
//function displayRecordByIdCS($ID) { // does not work, don't know why
//    $query2 = "SELECT * FROM phppeople1 WHERE ID = '$ID'";
//
//    try {
//        $result = $this->conexion->query($query2);
//
//        $row = $result->fetch(PDO::FETCH_ASSOC);
//
//        if ($row) {
//            return $row;
//        } else {
//            echo "<p>No record found</p>";
//        }
//    } catch (PDOException $e) {
//        echo "<p>Error: " . $e->getMessage() . "</p>";
//    }
//} // this did not work

// function to update a record of a Computer Student - (Content)
function updateRecordCS($postData, $conexion) {
    $fname = $_POST['ufname'];
    $lname = $_POST['ulname'];
    $email = $_POST['uemail'];
    $phoneNumber = $_POST['uphoneNumber'];
    $college = $_POST['ucollege'];
    $city = $_POST['ucity'];
    $programLanguages = $_POST['uprogramLanguages'];
    $operatingSystems = $_POST['uoperatingSystems'];
    $ID = $_POST['ID'];

    $check1 = true; // another value that works as a key or flag

    //1st validation : first lets check that no field is empty
    if(empty($fname)){
        echo  '<p>&nbsp;</p>';
        echo "<p>First name is needed</p>";
        $check1 = false;
    }
    if(empty($lname)){
        echo  '<p>&nbsp;</p>';
        echo "<p>Last name is needed</p>";
        $check1 = false;
    }
    if(empty($email)){
        echo  '<p>&nbsp;</p>';
        echo "<p>Email is needed</p>";
        $check1= false;
    }
    if(empty($phoneNumber)){
        echo  '<p>&nbsp;</p>';
        echo "<p>Phone number is needed</p>";
        $check1 = false;
    }
    if(empty($college)){
        echo  '<p>&nbsp;</p>';
        echo "<p>College is needed</p>";
        $check1 = false;
    }
    if(empty($city )){
        echo  '<p>&nbsp;</p>';
        echo "<p>City is needed</p>";
        $check1= false;
    }
    if(empty($programLanguages)){
        echo  '<p>&nbsp;</p>';
        echo "<p>Program Languages are needed</p>";
        $check1= false;
    }
    if(empty($operatingSystems)){
        echo  '<p>&nbsp;</p>';
        echo "<p>Operating Systems are needed</p>";
        $check1=false;
    }

    //2nd validation : now lets check that each field has the required data
    if(!preg_match("/^[A-Za-z\s]+$/", $fname)){
        echo  '<p>&nbsp;</p>';
        echo "<p>Only alphabets and whitespace are allowed in the first name</p>";
        $check1 = false;
    }

    if(!preg_match("/^[A-Za-z\s]+$/", $lname)){
        echo  '<p>&nbsp;</p>';
        echo "<p>Only alphabets and whitespace are allowed in the last name</p>";
        $check1= false;
    }

    $pattern ="/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}/";
    if(!preg_match($pattern, $email)){
        echo  '<p>&nbsp;</p>';
        echo "<p>Email is not valid</p>";
        $check1 = false;
    }

    $pattern2 ="/^705\d{7}$/";
    if(!preg_match($pattern2, $phoneNumber)){
        echo  '<p>&nbsp;</p>';
        echo "<p>Phone number is not valid, it must start with 705 and have a lenght of 10 digits</p>";
        $check1 = false;
    }

    if(!preg_match("/^[A-Za-z\s]+$/", $college)){
        echo  '<p>&nbsp;</p>';
        echo "<p>Only alphabets and whitespace are allowed in the college</p>";
        $check1 = false;
    }

    if(!preg_match("/^[A-Za-z\s]+$/", $city)){
        echo  '<p>&nbsp;</p>';
        echo "<p>Only alphabets and whitespace are allowed in the city</p>";
        $check1 = false;
    }

    if(!preg_match("/^[a-zA-Z#,0-9\s]+$/", $programLanguages)){
        echo  '<p>&nbsp;</p>';
        echo "<p>Only alphabets,whitespace, and # are allowed in Program Languages</p>";
        $check1 = false;
    }

    if(!preg_match("/^[A-Za-z,\s]+$/", $operatingSystems)){
        echo  '<p>&nbsp;</p>';
        echo "<p>Only alphabets and whitespace are allowed in Operating Systems</p>";
        $check1 = false;
    }

    if($check1){

        if (!empty($ID) && !empty($postData)) {
            $query3 = "UPDATE phppeople1 SET fname='$fname',lname='$lname', email='$email',phoneNumber='$phoneNumber',college='$college',city='$city',programLanguages='$programLanguages',operatingSystems='$operatingSystems' WHERE ID ='$ID'";

            try {
                $rowCount = $conexion->exec($query3);

                if ($rowCount > 0) {
                    header("location:./editcontent.php?msg2=update");
                } else {
                    echo  '<p>&nbsp;</p>';
                    echo "<p>Update failed</p>";
                }
            } catch (PDOException $e) {
                echo "<p>Error: " . $e->getMessage() . "</p>";
            }
        }
    }
    else{
        // in case the update was unsuccessful, it will not work to fill the fields again, we need to log out and enter again
        echo "<p>&nbsp;Update failed. Read the message(s) above, Log out and try again. Don't try to work again here. Please Log out</p>";
        echo "<p>&nbsp;</p>";
        echo "<section class='salida'>";
        echo '<a class="btn btn-warning" href="logout.php">Log out</a>';
        echo "<p>&nbsp;</p>";
        echo "</section>";
    }

}

// function to delete a record of a Computer Student - (Content)
function deleteRecordCS($id, $conexion) {
    $query4 = "DELETE FROM phppeople1 WHERE ID = '$id'";

    try {
        $rowCount = $conexion->exec($query4);

        if ($rowCount > 0) {
            header("Location: ./editcontent.php?msg3=delete");
        } else {
            echo "<p>Could not delete the record</p>";
        }
    } catch (PDOException $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}


// functions for the table phpadmins1 - Users DataBase
// in the name of the function there is a 'U'

// function to delete a record of a User
function deleteRecordU($id, $conexion) {
    $query5 = "DELETE FROM phpadmins1 WHERE user_idAD = '$id'";

    try {
        $rowCount = $conexion->exec($query5);

        if ($rowCount > 0) {
            header("Location: ./editregisteredusers.php?msg3=delete");
        } else {
            echo "<p>Could not delete the record</p>";
        }
    } catch (PDOException $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
    }
}

// function to insert record of a User
function insertDataU($post, $conexion)
{
    $first_nameAD = $_POST['first_nameAD'];
    $last_nameAD = $_POST['last_nameAD'];
    $emailAD = $_POST['emailAD'];
    $usernameAD = $_POST['usernameAD'];
    $passwordAD = $_POST['passwordAD'];
    $confirm = $_POST['confirm'];
    $nameImageAD = $_POST['nameImageAD'];

    //next validate inputs
    $isok = true;  // another value that works as a flag or lock

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
 // Besides, I made the data field required, so it will be impossible to leave it empty
//    if(empty($nameImageAD )){
//        echo  '<p>&nbsp;</p>';
//        echo "<p>fileImageAD is needed</p>";
//        $isok = false;
//    }


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
    $sql6 = "SELECT * FROM phpadmins1 WHERE emailAD = '$emailAD'";
    $searchEmail = $conexion->query($sql6);

    if ($searchEmail  !== false) {
        $numRows = $searchEmail ->rowCount();

        if ($numRows > 0) {
            echo  '<p>&nbsp;</p>';
            echo "<p>Email is already registered.</p>";
            $isok = false;
        }
    }

    if ($isok) {
        try {
            $passwordAD= hash('sha512', $passwordAD); // hashing passwords
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


            header("Location: ./editregisteredusers.php?msg1=insert");
        } catch (PDOException $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>";
        }
    } else {
        echo "<p>Could not add the record. Read the message(s) above, go below and try again</p>";
    }
}

// function to update a record of a User
function updateRecordU($postData, $conexion) {

    $first_nameAD = $_POST['ufirst_nameAD'];
    $last_nameAD = $_POST['ulast_nameAD'];
    $emailAD = $_POST['uemailAD'];
    $usernameAD = $_POST['uusernameAD'];
    $passwordAD = $_POST['upasswordAD'];
    $confirm = $_POST['uconfirm'];
    $nameImageAD = $_POST['unameImageAD'];
    $user_idAD = $_POST['user_idAD'];

    //next validate inputs
    $isok = true;  // the last of the flags or keys used

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
// Besides, I made the data field required, so it will be impossible to leave it empty
//    if(empty($nameImageAD )){
//        echo  '<p>&nbsp;</p>';
//        echo "<p>fileImageAD is needed</p>";
//        $isok = false;
//    }

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

//4th validation : now lets check that the email is not already registered or has not been used before
    $sql6 = "SELECT * FROM phpadmins1 WHERE emailAD = '$emailAD'";
    $searchEmail = $conexion->query($sql6);

    if ($searchEmail  !== false) {
        $numRows = $searchEmail ->rowCount();

        if ($numRows > 0) {
            echo  '<p>&nbsp;</p>';
            echo "<p>Email is already registered, or it has been previously used. When updating user, you have to enter a new email. That is the rule</p>";
            $isok = false;
        }
    }

    if($isok){

        if (!empty($user_idAD) && !empty($postData)) {

            $passwordAD= hash('sha512', $passwordAD);
            $query8 = "UPDATE phpadmins1 SET first_nameAD='$first_nameAD',last_nameAD='$last_nameAD', emailAD='$emailAD',usernameAD='$usernameAD',passwordAD='$passwordAD',nameImageAD='$nameImageAD' WHERE user_idAD ='$user_idAD'";

            try {
                $rowCount = $conexion->exec($query8);

                // I decide to separate the process of saving the file

                // so instead of using INSERT INTO, I will use the UPDATE QUERY and use the email in the WHERE CONDITION
                $countfiles = count($_FILES['unameImageAD']['name']);
                //prepared statement
                $query = "UPDATE phpadmins1 SET nameImageAD = ?, fileImageAD= ? WHERE emailAD = '$emailAD' ";
                $statement = $conexion->prepare($query);
                // It will only save one image, but still
                // I decided to use a loop because it is a good practice, and leaves possibilities open
                for ($i=0; $i<$countfiles; $i++){
                    //filesname code
                    $filename = $_FILES['unameImageAD']['name'][$i];
                    //location: the uploads folder
                    $target_file ='./uploads/'.$filename;
                    //validating image extension: only three types: png, jpeg, and jpg
                    $file_extension = pathinfo($target_file,PATHINFO_EXTENSION); // this array store the valid formats of images
                    $file_extension = strtolower($file_extension);
                    //valid image extension
                    $valid_extension = array("png","jpeg","jpg"); // this array store the valid formats of images

                    if(in_array($file_extension,$valid_extension)){
                        //uploading the file, because it is only one image file
                        if(move_uploaded_file($_FILES['unameImageAD']['tmp_name'][$i],$target_file)){
                            // finally executing the query
                            $statement->execute(array($filename,$target_file));
                        }
                    }
                }

                if ($rowCount > 0) {
                    header("location:./editregisteredusers.php?msg2=update");
                } else {
                    echo "<p>Update failed</p>";

                }
            } catch (PDOException $e) {
                echo "<p>Error: " . $e->getMessage() . "</p>";
            }
        }
    }
    else{
        // in case the update was unsuccessful, it will not work to fill the fields again, we need to log out and enter again
        echo "<p>&nbsp;Update failed. Read the message(s) above, Log out and try again. Don't try to work again here. Please Log out</p>";
        echo "<p>&nbsp;</p>";
        echo "<section class='salida'>";
        echo '<a class="btn btn-warning" href="logout.php">Log out</a>';
        echo "<p>&nbsp;</p>";
        echo "</section>";



    }

}

?>