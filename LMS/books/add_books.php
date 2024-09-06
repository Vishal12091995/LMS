<?php 
session_start();
?>
<!DOCTYPE php>
<php lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboards</title>
    <link
      href="../assets/css/bootstrap.min.css"
      rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
  </head>

  <body>
    <!-- Top Nav Bar -->
    <?php
    include('../includes/header.php');
    ?>
    <!-- Nav Bar end -->
    <!-- side bar start -->
    <?php
    include('../includes/sidebar.php');
    ?>
    <!-- side bar end  -->
    <!-- main content start  -->
    <div class="main">
      <div class="container-fluid">
        <div class="col-md-12">
          <?php
          if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Error!</strong> <?php echo $_SESSION['error']; ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php
            unset($_SESSION['error']);
          }
          ?>
          <h1 class="fw-bold text-uppercase">Add Book</h1>
        </div>
        <!-- tabs row start  -->
        <div class="row">
          <div class="col-md-12 mt-4"></div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">Fill The Details of the Book</div>
              <div class="card-body">
                <form action="../models/book.php" method="post">
                  <div class="mb-3">
                    <label for="exampleInputbook" class="form-label">Books Name</label>
                    <input
                      type="Text"
                      class="form-control"
                      id="exampleInputbook"
                      name="title"
                      aria-describedby="emailHelp" />
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputpisbnname" class="form-label">ISBN Name</label>
                    <input
                      type="text"
                      name="isbn"
                      class="form-control"
                      id="exampleInputpisbnname" />
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputauthorname" class="form-label">Author Name</label>
                    <input
                      type="text"
                      name="author"
                      class="form-control"
                      id="exampleInputauthorname" />
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputpublisher" class="form-label">Publisher Year</label>
                    <input
                      type="number"
                      name="publication_year"
                      class="form-control"
                      id="exampleInputpublisher" />
                  </div>
                  <div class="mb-3">
                    <label for="options" class="form-label">Book Category/Course</label>
                    <select class="form-select" name="category_name" aria-label="Default select example">
                      <option selected>Select any option</option>
                      <option value="UPSC">UPSC</option>
                      <option value="SSC">SSC</option>
                      <option value="RAILWAYS">Railways</option>
                      <option value="IIT">ITT-JEE</option>
                      <option value="NEET">NEET</option>
                      <option value="STORY">Story</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <button type="submit" name="publish" class="btn btn-success">Publish</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- tabs row ended  -->
      </div>
    </div>
    <!-- main content end  -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
  </body>