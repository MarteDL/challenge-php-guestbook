<?php

declare(strict_types=1);


?>

<main class="container py-3 rounded">
    <form method="post" action="">
        <div class="form-group d-flex justify-content-end">
            <label class="mr-2 my-auto" for="numberOfPosts">Messages per page: </label><input class="rounded inputField"
                                                                                              type="number"
                                                                                              id="numberOfPosts"
                                                                                              name="numberOfPosts"
                                                                                              value="<?php echo $_POST['numberOfPosts'] ?? 20 ?>"
                                                                                              min="4"
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
    <?php for ($i = 0; $i < $_POST['numberOfPosts']; $i++) {
        if ($i % 3 === 0 && ($i === $_POST['numberOfPosts'] - 1)): ?>
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
        <?php elseif ($i % 3 === 2 || ($i === $_POST['numberOfPosts'] - 1)): ?>
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
                <li class="page-item">
                    <a class="text-warning page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="text-warning page-link" href="#">1</a></li>
                <li class="page-item"><a class="text-warning page-link" href="#">2</a></li>
                <li class="page-item"><a class="text-warning page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="text-warning page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Go to top button -->
    <a href="#jumbotron"><i class="fas fa-arrow-up btn btn-light btn-lg text-warning float-right m-3"
                            id="gotopbtn"></i></a>

</main>
