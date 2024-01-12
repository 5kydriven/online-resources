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
      href="../lib/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../src/css/style.css" />
    <script src="../lib/js/bootstrap.min.js"></script>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                      while($row = $query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td class="user_id"><?= $row['id']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['gender']; ?></td>
                        <td class="d-flex justify-content-evenly">
                            <button class="btn btn-success edit-button" type="button"  data-bs-toggle="modal" data-bs-target="#editModal"><i class="ri-edit-line"></i></button>
                            <button class="btn btn-danger delete_btn"><i class="ri-delete-bin-6-line"></i></button>
                        </td>

                    </tr>
                    
                    <?php } ?>
                </tbody>
           </table>
        </div>
   </div>
   <!-- Modal -->
   <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="../php/update.php" method="post" class="">
                            <div class="modal-body d-flex flex-column gap-3">
                              <div class="input-group flex-nowrap">                                
                                <input type="hidden" class="form-control" id="user_id" name="id">
                              </div>
                              <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping1">Name:</span>
                                <input type="text" class="form-control" id="name" name="name" aria-label="Username" aria-describedby="addon-wrapping1">
                              </div>
                              <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping2">Email:</span>
                                <input type="text" class="form-control" id="email" name="email" aria-label="email" aria-describedby="addon-wrapping2">
                              </div>
                              <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping3">Gender:</span>
                                <input type="text" class="form-control" id="gender" name="gender" aria-label="email" aria-describedby="addon-wrapping3">
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="update_data" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
   <script src="../lib/js/jquery.min.js"></script>
    <script>
      // edit data
      $(document).ready(function() {
        $('.edit-button').click(function(e) {
          e.preventDefault();
          // Get the user ID from the data-id attribute
          var userId = $(this).closest('tr').find('.user_id').text();

          // Ajax request to fetch user details based on the user ID
          $.ajax({
            method: 'POST',
            url: '../php/update.php', // replace with your server-side script to fetch user details
            data: { 
              'click_edit_button': true,
              'user_id': userId
            },           
            success: function(response) {
              // console.log(response);
              // Populate modal fields with retrieved user details
              
              $.each(response, function (key, value) {
                  $('#user_id').val(value['id']);
                  $('#name').val(value['name']);
                  $('#email').val(value['email']);
                  $('#gender').val(value['gender']);
                });

              $('#editModal').modal('show');
            }
          });
        });
      });

      $(document).ready(function () {
        $('.delete_btn').click(function (e) {
          e.preventDefault();
          
          var user_id = $(this).closest('tr').find('.user_id').text();
          $.ajax({
            method: 'POST',
            url: '../php/delete.php',
            data: {
              'click_delete_button': true,
              'user_id': user_id,
            },
            success: function (response) {
              console.log(response)
              window.location.reload();
            }
          });
        });
      });
    </script>
      
  </body>
</html>
