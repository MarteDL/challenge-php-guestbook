<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
set_error_handler("var_dump");

require 'classes/Post.php';
require 'classes/postCollection.php';

$myMessages = new postCollection();

function redirect()
{
    unset($_POST['submit']);
    header($_SERVER['PHP_SELF']);
}

if (isset($_POST['submit'])) {
    setcookie("popUpMessage", "", time() - 3600);
    $post = new Post(htmlspecialchars($_POST['name']), htmlspecialchars($_POST['title']), htmlspecialchars($_POST['message']), date("j F Y, G:i"));
    if ($post->containsBadWords()) {
        setcookie('popUpMessage', 'Do you kiss your mama with that mouth?! Go wash your mouth with soap, you filthy hobbit(ses)');
    } else {
        $myMessages->writeAwayPost($post);
    }
    redirect();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://kit.fontawesome.com/e35225047e.js" crossorigin="anonymous"></script>
    <title>PHP Guestbook</title>
</head>
<body class="d-flex flex-column min-vh-100">
<?php
require_once 'html/header.php';
require_once 'html/main.php';
require_once 'html/footer.php';
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</body>
</html>
