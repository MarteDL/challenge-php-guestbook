<?php


?>

<main>
    <!--    the posts divided into 5 carddecks of 4, create them with an foreach loop (inside a fori(4) loop for the deck) so we only have to make the card div once-->
    <div class="container">
        <div class="card-deck mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Date - Author</small></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional
                        content.</p>
                    <p class="card-text"><small class="text-muted">Date - Author</small></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This card has even longer content than the first to show that equal height
                        action.</p>
                    <p class="card-text"><small class="text-muted">Date - Author</small></p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                        additional content. This card has even longer content than the first to show that equal height
                        action.</p>
                    <p class="card-text"><small class="text-muted">Date - Author</small></p>
                </div>
            </div>
        </div>
    </div>


    <!--    navbar bottom of the page to go to next or prev posts page-->
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
</main>
