<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
set_error_handler("var_dump");

?>

<header>
    <div class="container p-0">
        <div id="jumbotron" class="jumbotron">
            <div class="col-8">
                <h1 class="display-4">My Guestbook</h1>
                <p class="lead">On this page you can leave a message for me. Kind words, compliments and jokes will gain
                    you karma-points.</p>
                <hr class="my-4">
                <a class="btn btn-lg" href="#postForm" role="button">Write a message</a>
            </div>
        </div>
    </div>
</header>
