<?php
  // now we will add the value to the title variable and the description variable
  $title = "Final Project | About-Content Page | Introduction to Web Programming using PHP";
  $description = "This is the Final Project for Introduction to Web Programming using PHP Course - View Content Page ";
  require './templates/header.php';  // linking header
?>
<!-- In this page you only can see the list of computer students, only see, nothing else  -->
<section class="masthead2">
    <div>
        <!-- Here goes the Masthead Image and Title  -->
        <h1>COMPUTER SCIENCE STUDENTS DATABASE</h1>
    </div>
</section>
<main class="container">
    <div class="row">
        <table class="table">
            <tr>
                <!-- Here goes all the columns from the phppeople1 table  -->
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>College</th>
                <th>City</th>
                <th>Program Languages</th>
                <th>Operating Systems</th>
            </tr>
            <?php
            // adding code here to display the records from phppeople1 table
            require './inc/database.php';

            $sql1 = "SELECT * FROM phppeople1";
            //run the query and store the results
            $result = $conexion->query($sql1);

            foreach ($result as $row)
            {
                ?>

                <tr>
                    <!-- Here goes all the values of the columns from the phppeople1 table  -->
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['fname']." ".$row['lname']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phoneNumber']; ?></td>
                    <td><?php echo $row['college']; ?></td>
                    <td><?php echo $row['city']; ?></td>
                    <td><?php echo $row['programLanguages']; ?></td>
                    <td><?php echo $row['operatingSystems']; ?></td>
                </tr>
                <?php
            }

            ?>
        </table>
        <?php
        $conexion= null; //closing connection
        ?>
    </div>
</main>
<?php
require './templates/footer.php';  // linking footer
?>
