<?php
// now we will add the value to the title variable and the description variable
$title = "Final Project | Edit Content Page | Introduction to Web Programming using PHP";
$description = "This is the Final Project for Introduction to Web Programming using PHP Course - Edit Content  Page";
require './templates/header.php';  // only if it is mandatory you use require
require './inc/database.php';
require './inc/functions.php';

// this page is to see the list of computers students and the buttons of add; edit and delete for each record
// please, be careful when clicking the edit or delete buttons, if you do it fast, it won't work
if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])){
    $deleteId = $_GET['deleteId'];
    deleteRecordCS($deleteId, $conexion);
}

?>
<section class="masthead5">
    <div>
        <!-- Here goes the Masthead Image and Title  -->
        <h1>EDIT STUDENTS RECORDS</h1>
    </div>
</section>
<main class="container">
    <?php

     //create an alert according to the situation: 3 situations: add, update or delete computer student
    if (isset($_GET['msg1']) == "insert"){ // green color
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'> 
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                 <h3>Student record added!</h3>
                 </div>
                ";
    }
    if (isset($_GET['msg2'])=="update"){ // blue color
        echo "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                 <h3>Student record updated!</h3>
                 </div>
                ";
    }
    if (isset($_GET['msg3'])=="delete"){  // red color
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                 <h3>Student record deleted!</h3>
                 </div>
                ";
    }

    ?>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <h2 class="title">List of Students
        <a href="add1.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
    </h2>
    <div class="row">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>College</th>
                <th>City</th>
                <th>Program Languages</th>
                <th>Operating Systems</th>
                <th>Action</th>
            </tr>
            <?php
            // adding our code here, requiring the database connection
            require './inc/database.php';
            

            $sql4 = "SELECT * FROM phppeople1";
            //running the query and store and display the results from the phppeople1 table
            $result = $conexion->query($sql4);

            foreach ($result as $row)
            {
                ?>

                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phoneNumber']; ?></td>
                    <td><?php echo $row['college']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['programLanguages']; ?></td>
                    <td><?php echo $row['operatingSystems']; ?></td>
                    <td>
                        <button class="btn btn-primary">
                            <a href="edit1.php?edit1Id=<?php echo $row['ID']; ?>">
                                <i class="fa fa-pencil text-white"></i>
                                <!-- Edit button -->
                            </a>
                        </button>
                        <button class="btn btn-danger">
                            <a href="editcontent.php?deleteId=<?php echo $row['ID']; ?>" onclick="confirm('Are you really sure you want to delete this?')">
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
