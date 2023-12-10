<?php
//store the user inputs in variables and hash the password
// validate the user, session id
$usernameAD = $_POST['usernameAD'];
$passwordAD = hash('sha512', $_POST['passwordAD']); //hashing the password

//connect to db
require 'database.php';  //validate is already inside the include folder, so we don't have to add  ./

//set up and run the query
// doing the comparison
$sql3 = "SELECT user_idAD FROM phpadmins1 WHERE usernameAD = '$usernameAD' AND passwordAD ='$passwordAD'";
$result3 = $conexion->query($sql3);
//store the number of results in a variable

$count3 = $result3 ->rowCount();

//check if any matches found
if ($count3==1){
    echo '<p>Logged in Successfully</p>';
    foreach ($result3 as $row) {
        // access the existing session created automatically by the server
        session_start();
        //take the user id from the database and store it in a session variable
        $_SESSION['user_idAD'] = $row['user_idAD'];
        // now redirect the user
        Header('Location:../transition.php'); // takes you to the transition page
    }
}else{
    echo '<p>Login failed, you typed wrong username/password. Go back and do it again</p>';
}

$conexion = null; // closing connection
?>
