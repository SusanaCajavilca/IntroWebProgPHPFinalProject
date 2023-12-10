<?php
// now we will add the value to the title variable and the description variable
$title = "Final Project | Edit Users Page | Introduction to Web Programming using PHP";
$description = "This is the Final Project for Introduction to Web Programming using PHP Course - Edit Registered User Page Page";
require './templates/header.php';  // only if it is mandatory you use require
require './inc/database.php';
require './inc/functions.php';

// this page is to see the list of users and the buttons of add; edit and delete for each record
// please, be careful when clicking the edit or delete buttons, if you do it fast, it won't work
if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])){
    $deleteId = $_GET['deleteId'];
    deleteRecordU($deleteId, $conexion);
}

?>
<section class="masthead4">
        <div>
            <!-- Here goes the Masthead Image and Title  -->
            <h1>EDIT USERS RECORDS</h1>
        </div>
</section>
<main class="container">
        <?php

        //creating an alert according to the situation: 3 situations: add, update or delete user
        if (isset($_GET['msg1']) == "insert"){ // green color
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'> 
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                 <h3>User record added!</h3>
                 </div>
                ";
        }
        if (isset($_GET['msg2'])=="update"){ // blue color
            echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                 <h3>User record updated!</h3>
                 </div>
                ";
        }
        if (isset($_GET['msg3'])=="delete"){  // red color
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                 <h3>User record deleted!</h3>
                 </div>
                ";
        }


        ?>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <h2 class="title">List of Users
            <a href="add2.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
        </h2>
        <div class="row">
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Image Name</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                <?php
                // adding our code here, requiring the database connection
                require './inc/database.php';


                $sql5 = "SELECT * FROM phpadmins1";
                //running the query and store and display the results from the phpadmins1 table
                $result = $conexion->query($sql5);

                foreach ($result as $row)
                {
                    ?>

                    <tr>
                        <td><?php echo $row['user_idAD']; ?></td>
                        <td><?php echo $row['first_nameAD']." ".$row['last_nameAD']; ?></td>
                        <td><?php echo $row['emailAD']; ?></td>
                        <td><?php echo $row['usernameAD']; ?></td>
                        <td><?php echo $row['nameImageAD']; ?></td>
                        <!-- Here goes the image, but it is going to be very small, so it can fit into the row, please take into consideration   -->
                        <td><div class="smallimage"><img src="<?=$row['fileImageAD']; ?>" title="<?=$row['nameImageAD'] ?>" class="img-fluid"></div></td>
                        <td>
                            <button class="btn btn-primary">
                                <a href="edit2.php?edit2Id=<?php echo $row['user_idAD']; ?>">
                                    <i class="fa fa-pencil text-white"></i>
                                    <!-- Edit button -->
                                </a>
                            </button>
                            <button class="btn btn-danger">
                                <a href="editregisteredusers.php?deleteId=<?php echo $row['user_idAD']; ?>" onclick="confirm('Are you really sure you want to delete this?')">
                                    <i class="fa fa-trash text-white"></i>
                                    <!-- Delete button -->
                                </a>
                            </button>
                        </td>
                    </tr>
                    <?php
                }

                ?>
            </table>
            <p>&nbsp;</p>
            <!-- There is also the option of Log Out  -->
            <div class="d-flex justify-content-center">
                <a class="btn btn-warning" href="logout.php">Logout</a>
            </div>
            <p>&nbsp;</p>
            <?php
            $conexion= null; //closing connection
            ?>
        </div>
    </main>
<?php
require './templates/footer.php';
?>