<?php

declare(strict_types=1);

?>

<main class="container py-3 rounded">
    <!--    posts part-->
    <?php foreach($myMessages->getLastTwentyPosts() AS $post): ?>
    <div class="card p-3 m-3">
        <div class="card-body">
            <h5 class="card-title"><?php echo $post->getTitle() ?></h5>
            <p class="card-text"><?php echo $post->getMessage() ?></p>
            <p class="card-text float-left"><small class="text-muted"><?php echo $post->getAuthor() ?></small></p>
            <p class="card-text float-right"><small class="text-muted"><?php echo $post->getDate() ?></small></p>
        </div>
    </div>
    <?php endforeach; ?>

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
    <a  href="#jumbotron"><i class="fas fa-arrow-up btn btn-light btn-lg text-warning float-right m-3" id="gotopbtn"></i></a>

</main>
