<?php
// the easy-shortest part of the application I think
require './templates/header.php';
//access existing session
session_start();
//remove session variables
session_unset();
//kill the session
session_destroy();
//redirect to index page
header('location:index.php');
require './templates/footer.php';  // and that's it
?>