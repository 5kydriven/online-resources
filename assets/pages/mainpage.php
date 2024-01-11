<?php
   include '../php/connect.php';

   $query = mysqli_query($conn, "SELECT * FROM `user`");

  

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.0.1/remixicon.min.css" />
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
   <div class="container">
        <div class="table-container pt-5 table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <!-- <th>Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                      while($row = $query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['gender']; ?></td>
                        <!-- <td class="d-flex justify-content-evenly">
                            <button class="btn btn-success edit-button" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $row['id']; ?>"><i class="ri-edit-line"></i></button>
                            <button class="btn btn-danger "><i class="ri-delete-bin-6-line"></i></button>
                        </td> -->

                    </tr>
                    
                    <?php } ?>
                </tbody>
           </table>
        </div>
   </div>
   <!-- Modal -->
   <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="" class="d-flex flex-column gap-3">
                              <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping1">Name:</span>
                                <input type="text" class="form-control " aria-label="Username" aria-describedby="addon-wrapping1" value="<?= $row['name']; ?>">
                              </div>
                              <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping2">Email:</span>
                                <input type="text" class="form-control" aria-label="email" aria-describedby="addon-wrapping2">
                              </div>
                              <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping3">Gender:</span>
                                <input type="text" class="form-control" aria-label="email" aria-describedby="addon-wrapping3">
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div> -->
   <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
      $(document).ready(function() {
        $('.edit-btn').on('click', function() {
          // Get the user ID from the data-id attribute
          var userId = $(this).data('id');

          // Ajax request to fetch user details based on the user ID
          $.ajax({
            url: 'get_user_details.php', // replace with your server-side script to fetch user details
            method: 'GET',
            data: { id: userId },
            dataType: 'json',
            success: function(response) {
              // Populate modal fields with retrieved user details
              $('#exampleModalLabel').html('Edit User: ' + response.name);
              $('#addon-wrapping1').val(response.name);
              $('#addon-wrapping2').val(response.email);
              $('#addon-wrapping3').val(response.gender);
              $('#exampleModal').modal('show');
            },
            error: function() {
              alert('Error fetching user details.');
            }
          });
        });
      });
    </script> -->
      
  </body>
</html>
