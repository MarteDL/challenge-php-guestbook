<?php

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
set_error_handler("var_dump");


if (!isset ($_COOKIE['numberOfPostsPerPage'])){
    setcookie('numberOfPostsPerPage', '12');
}

if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
}
else {
    $currentPage = 1;
}

if (isset($_POST['numberOfPostsPerPage'])){
    setcookie('numberOfPostsPerPage', $_POST['numberOfPostsPerPage']);
    $numberOfPosts = $_POST['numberOfPostsPerPage'];
}
else if (!isset($_POST['numberOfPostsPerPage']) && isset($_COOKIE['numberOfPostsPerPage'])) {
    $numberOfPosts = $_COOKIE['numberOfPostsPerPage'];
}
else {
    $numberOfPosts = 12;
}

$numberOfPages = ceil(count($myMessages->getPosts()) / $numberOfPosts);

?>

<main class="container py-3 rounded">
    <form method="post" action="">
        <div class="form-group mx-4 d-flex justify-content-end">
            <label class="mr-2 my-auto" for="numberOfPosts">Messages per page: </label><input class="rounded inputField"
                                                                                              type="number"
                                                                                              id="numberOfPostsPerPage"
                                                                                              name="numberOfPostsPerPage"
                                                                                              value="<?php echo $_POST['numberOfPostsPerPage'] ?? $_COOKIE['numberOfPostsPerPage'] ?>"
                                                                                              min="3"
                                                                                              max="<?php echo count($myMessages->getPosts()) ?>">
        </div>
    </form>
    <?php if (!empty($_COOKIE['popUpMessage'])) : ?>
        <div class="row d-flex justify-content-center">
            <div class="card col-5 p-3 m-3">
                <img class="card-img-top" src="img/gandalf.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-center">You scoundrel!</h5>
                    <p class="card-text text-center"><?php echo $_COOKIE['popUpMessage'] ?></p>
                    <p class="card-text text-center"><small class="text-muted">Gandalf The Disgruntled</small></p>
                </div>
            </div>
        </div>
        <?php
        setcookie("popUpMessage", "", time() - 3600);
    endif;
    ?>
    <!--    posts part-->
    <?php for ($i = 0; $i < $numberOfPosts; $i++) {
        if ($i % 3 === 0 && ($i === $numberOfPosts - 1)): ?>
        <div class="card-deck mx-2">
            <div class="card p-3 m-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $myMessages->getPosts()[$i]->getTitle() ?></h5>
                    <p class="card-text"><?php echo $myMessages->getPosts()[$i]->getMessage() ?></p>
                    <p class="card-text text-muted mb-0"><?php echo $myMessages->getPosts()[$i]->getAuthor() ?>,</p>
                    <p class="card-text"><small class="text-muted"><?php echo $myMessages->getPosts()[$i]->getDate() ?></small>
                    </p>
                </div>
            </div>
        </div>
        <?php elseif ($i === 0 || $i % 3 === 0) : ?>
            <div class="card-deck mx-2">
            <div class="card p-3 m-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $myMessages->getPosts()[$i]->getTitle() ?></h5>
                    <p class="card-text"><?php echo $myMessages->getPosts()[$i]->getMessage() ?></p>
                    <p class="card-text text-muted mb-0"><?php echo $myMessages->getPosts()[$i]->getAuthor() ?>,</p>
                    <p class="card-text"><small class="text-muted"><?php echo $myMessages->getPosts()[$i]->getDate() ?></small>
                    </p>
                </div>
            </div>
        <?php elseif ($i % 3 === 2 || ($i === $numberOfPosts - 1)): ?>
            <div class="card p-3 m-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $myMessages->getPosts()[$i]->getTitle() ?></h5>
                    <p class="card-text"><?php echo $myMessages->getPosts()[$i]->getMessage() ?></p>
                    <p class="card-text text-muted mb-0"><?php echo $myMessages->getPosts()[$i]->getAuthor() ?>,</p>
                    <p class="card-text"><small class="text-muted"><?php echo $myMessages->getPosts()[$i]->getDate() ?></small>
                    </p>
                </div>
            </div>
            </div>
        <?php else: ?>
            <div class="card p-3 m-3">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $myMessages->getPosts()[$i]->getTitle() ?></h5>
                    <p class="card-text"><?php echo $myMessages->getPosts()[$i]->getMessage() ?></p>
                    <p class="card-text text-muted mb-0"><?php echo $myMessages->getPosts()[$i]->getAuthor() ?>,</p>
                    <p class="card-text"><small class="text-muted"><?php echo $myMessages->getPosts()[$i]->getDate() ?></small>
                    </p>
                </div>
            </div>
        <?php endif; } ?>

    <!--    navbar bottom of the page to go to next or prev posts page-->
    <div class="row mt-5 d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if (isset($_GET['page']) && $_GET['page'] > 1) : ?>
                <li class="page-item">
                    <a class="text-warning page-link" href="?page=<?php echo ($currentPage-1); ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php endif;
                for ($i=1; $i<$numberOfPages+1; $i++):?>
                <li class="page-item"><a class="text-warning page-link" href="?page=<?php echo $i; ?>"><?php echo $i ?></a></li>
                <?php endfor;
                if (!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page'] < (int)$numberOfPages)): ?>
                <li class="page-item">
                    <a class="text-warning page-link" href="?page=<?php echo ($currentPage+1); ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
                <?php endif ?>
            </ul>
        </nav>
    </div>

    <!-- Go to top button -->
    <a href="#jumbotron"><i class="fas fa-arrow-up btn btn-light btn-lg text-warning float-right m-3"
                            id="gotopbtn"></i></a>

</main>
