<?php
include './env.php';
$query = "SELECT * FROM posts";
$result = mysqli_query($conn, $query);
$posts = mysqli_fetch_all($result, 1);




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
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">Sl. No.</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Author</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($posts as $key => $post) {
          ?>
            <tr>
              <th scope='row'><?= ++$key ?></th>
              <td><?= $post['title'] ?></td>
              <td><?= strlen($post['description']) > 20 ? substr($post['description'], 0, 20) . "..." : $post['description'] ?></td>
              <td><?= $post['author'] ?></td>
              <td>
                <div class="btn-group-sm">
                  <a href="./view.php?id=<?= $post['id'] ?>" class="btn btn-info">View</a>
                  <a href="./edit.php?id=<?= $post['id'] ?>" class="btn btn-warning">Edit</a>
                  <a href="./controllers/deleteController.php?id=<?= $post['id'] ?>" class="btn btn-danger">Delete</a>
                </div>
              </td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>