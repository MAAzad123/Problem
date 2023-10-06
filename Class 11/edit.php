<?php
session_start();
include './env.php';
$postId = $_GET['id'];
$query = "SELECT * FROM posts WHERE id = '$postId'";
$result = mysqli_query($conn, $query);
$post = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home (All Blog)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="create.php">Add New Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="list.php">Blog List</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <form action= "./controllers/updateController.php?id = <? $post['id'] ?>" method= "POST">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input value="<?= $post['title'] ?>" name="title" type="text" class="form-control" placeholder="Enter Your Post Title">
                            <p class="text-danger">
                                <?php

                                echo isset($_SESSION['title_error']) ? $_SESSION['title_error'] : "";

                                ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Author Name</label>
                            <input value="<?= $post['author'] ?>" name="author" type="text" class="form-control" placeholder="Enter Your Author Name">
                            <p class="text-danger">
                                <?php
                                echo isset($_SESSION['author_error']) ? $_SESSION['author_error'] : "";
                                ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" type="text" class="form-control" placeholder="Enter Your Post Description"><?= $post['description'] ?></textarea>
                            <p class="text-danger">
                                <?php
                                echo isset($_SESSION['description_error']) ? $_SESSION['description_error'] : "";
                                ?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Update Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
    session_unset();
?>