<?php
  include '../php/connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="../lib/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../src/css/style.css" />
    <script src="../lib/js/bootstrap.bundle.min.js"></script>
    <title>Home</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <img
          src="../images/laptop-in-side-view-perspective.png"
          alt=""
          class="icon me-2"
        />
        <a class="navbar-brand" href="#">Online Learning</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- <li class="nav-item">
              <a class="nav-link "  href="../../index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="../../index.html">logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container" id="lesson-container">
        <div class="project__title">
            <h1>Lessons</h1>
            <div class="project__underline"></div>
        </div>
        <div class="project__container">
          <?php 
            $query = mysqli_query($conn, "SELECT * FROM lesson");

            while($row = mysqli_fetch_assoc($query)) {
          ?>
          <div class="card" style="width: 21rem;">
            <img src="../uploads/<?= $row['image'];?>" class="card-img-top" alt="">
            <div class="card-body">
              <h5 class="card-title"><?= $row['title']?></h5>
              <p class="card-text"><?= $row['content']?></p>
              <a href="<?= $row['link']?>" class="btn btn-primary" target="_blank">visit site</a>
            </div>
          </div>  
          <?php } ?>       
        </div>
    </div>
    
  </body>
</html>
