<?php
$title = 'Page not found 404';
$description = 'This page will handle any missing page';
// for demonstrative purposes I created a fake alternative in the navigation menu called "The Secret",
// if you click on it, it wil direct you to this page

require './templates/header.php';
?>
    <section class="errormasthead">
        <div>
            <h1>Page Not Found</h1>
        </div>
    </section>
    <main class="errormessage">
        <div>
            <p>&nbsp;</p>
            <h2>&nbsp;&nbsp;... something happened</h2>
            <p>&nbsp;</p>
            <p>&nbsp;You were looking for a page that doesn't exist anymore. Relax, take it easy, and click the button below to return to the Homepage</p>
            <p>&nbsp;</p>
            <a href="index.php" class="error-button">Go Back</a>
            <p>&nbsp;</p>
        </div>
    </main>
<?php
require './templates/footer.php';
?>