<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../src/css/style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Sign in</title>
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
            <li class="nav-item">
              <a class="nav-link "  href="../../index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="signin.php">Sign in</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
   <div class="container d-grid sign-con">
        <div class="form-container">
            <form action="../php/signup.php" method="post" class="d-flex flex-column s-form">
                <h2 class="text-center mb-3">Sign up</h2>
                <?php if (isset($_GET['error'])) {?>
                  <strong class="error"><?php echo $_GET['error']; ?></strong>
                <?php } ?>
                <input type="text" placeholder="name" name="name" required>
                <input type="email" placeholder="Enter email" name="email" required>
                <input type="password" placeholder="Enter password" name="password" required>
                <input type="text" placeholder="gender" name="gender" required>
                <button class="btn btn-success mt-3" name="signup">Sign up</button>
                <label for="">have an account? <a href="signin.php">Sign in</a></label>
            </form>
        </div>
   </div>
  </body>
</html>
