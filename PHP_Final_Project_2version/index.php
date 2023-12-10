<?php
  // now we will add the value to the title variable and the description variable
  $title = "Final Project | Home Page | Introduction to Web Programming using PHP";
  $description = "This is the Final Project for Introduction to Web Programming using PHP Course - Home Page";
  require './templates/header.php';  // only if it is mandatory you use require
?>
<!-- There is only one way to Log In, and it is through the form located on the header -->
<!-- This website has three public pages  -->
    <!-- Index, where it explains the purpose and the structure of the website-->
    <!-- ViewContent, where you can only see the content of the Computer Students -Table phppeople1-->
    <!-- Register, where you can register as a User -Table phpadmins1- and have the rights to add/update/delete Users and/or Computer Students  -->
<!-- This website has two main private pages  -->
    <!-- EditContent, where we can add/update/delete Computer Students -->
        <!-- Pages related: Add1, Edit1 -->
    <!-- EditRegisteredUsers, where we can add/update/delete Users  -->
        <!-- Pages related: Add2, Edit2 -->
<!-- This website has a transitive page called Transition  -->
    <!-- Transition works as a bridge and has three options: to go to edit Users, Computer Students, and Log out  -->
<!-- This website has a 404 page, just to apply lesson code  -->
<!-- This website has a Log-out Page, that destroys session and redirects you to Index page -->
<!-- This website has a Save-User Page, that tells you if you saved successfully a User or not -->
<!-- There is only one way to Log In, and it is through the form located on the header -->
<section class="masthead">
    <div>
        <!-- Here goes the Masthead Image and Title  -->
        <h1>WELCOME TO THE <span class="blue">SIMCOE</span> COMPUTER STUDENTS NETWORKING</h1>
    </div>
</section>
<main class="explaining">
    <section>
        <!-- A short introduction and explanation of our website  -->
        <h2>INTRODUCTION</h2>
        <p>The purpose of this mini website is to create, show, update and share the networking of <span class="blue">Computer Science</span> students that are part of the <span class="blue">Simcoe</span> County Community. <span class="blue">Computer Science</span> students are part of a family that gets bigger every day in the world. If you are a <span class="blue">Computer Science</span> or have acquaintances related to that field, then this website is for you. You can easily register and start to add and/or update records of computer students in <span class="blue">Simcoe</span> County. <span class="rule">The only rule is that every registered user must have a unique email entered in our database.</span></p>
        <p>Here is a brief explanation of our web pages</p>
        <!-- A small table that explains the functions of our pages using bootstrap  -->
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                <tr>
                    <th scope="col">Page Name</th>
                    <th scope="col">Access</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <!-- public page -->
                    <th scope="row">Home</th>
                    <td>Public</td>
                    <td>Welcoming Page, general instructions</td>
                </tr>
                <tr>
                    <!-- public page -->
                    <th scope="row">View Content Page</th>
                    <td>Public</td>
                    <td>Here you can only see the data of Computers Science students database</td>
                </tr>
                <tr>
                    <!-- public page -->
                    <th scope="row">Register Page</th>
                    <td>Public</td>
                    <td>Here you can register as an authorized user that can later enter data of Computer Science students</td>
                </tr>
                <tr>
                    <!-- private page -->
                    <th scope="row">Edit Content Page</th>
                    <td>Private</td>
                    <td>Here you can see and edit data of Computer Science students database</td>
                </tr>
                <tr>
                    <!-- private page -->
                    <th scope="row">Edit Registered Users</th>
                    <td>Private</td>
                    <td>Here you can see and edit data of registered user database</td>
                </tr>

                </tbody>
            </table>
        </div>
    </section>
</main>
<?php
require './templates/footer.php';
?>