<?php



?>

<footer class="blog-footer container mt-5">
    <!--    the form to submit a message-->
    <div class="row pb-5 mx-3 border-bottom justify-content-center">
        <div class="col-6">
            <h3 class="text-center my-5">Leave a message yourself</h3>
            <form method="post" id="postForm">
                <div class="form-row">
                    <div class="form-group col">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="form-group col">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title">
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea form="postForm" class="form-control" id="message" name="message"
                              placeholder="Type your message here"
                              rows="5"></textarea>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-warning" name="submit">Send</button>
                </div>
            </form>
        </div>
    </div>

    <!-- basic footer -->
    <div class="footer pt-5">

        <!-- copyright -->
        <p class="text-center">Copyright @2021 | Designed by <a
                    href="https://github.com/MarteDL">MarteDL</a>
        </p>

        <!-- social media links -->
        <div id="icon" class="d-flex justify-content-center pb-4">
            <a href="https://github.com/MarteDL" target="_blank"><img src="img/github.svg"
                                                                                     alt="Github icon"/></a>
            <a href="https://www.facebook.com/marte.deleeuw/" target="_blank"><img src="img/facebook.svg"
                                                                                      alt="Facebook icon"/></a>
            <a href="https://www.linkedin.com/in/marte-de-leeuw-bb4337102/" target="_blank"><img src="img/linkedin.svg"
                                                                          alt="Linkedin icon"/></a>
            <a href="https://www.instagram.com" target="_blank"><img src="img/instagram.svg"
                                                                     alt="Instagram icon"/></a>
        </div>
    </div>
</footer>
