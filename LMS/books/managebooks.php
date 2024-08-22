<?php
session_start(); // Start the session at the top of the script
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboards</title>
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
</head>

<body>
  <!-- Top Nav Bar -->
  <?php include('../includes/header.php'); ?>
  <!-- Nav Bar end -->

  <!-- Side Bar start -->
  <?php include('../includes/sidebar.php'); ?>
  <!-- Side Bar end -->

  <!-- Main content start -->
  <div class="main">
    <div class="container-fluid">
      <div class="col-md-12">

        <?php
        if (isset($_SESSION['success'])) { ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Hello User</strong> <?php echo $_SESSION['success']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
          unset($_SESSION['success']);
        }
        ?>
        <h1 class="fw-bold text-uppercase">Manage Books</h1>
      </div>
      <!-- Tabs row start -->
      <div class="row">
        <div class="col-md-12 mt-4"></div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Fill The Details of the Book</div>
            <div class="card-body">
              <div>
                <table class="table table-bordered">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Book Name</th>
                      <th scope="col">Publisher Name</th>
                      <th scope="col">Author Name</th>
                      <th scope="col">ISBN No.</th>
                      <th scope="col">Category</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Status</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include('../config/config.php');

                    // Query to select all books from the database
                    $sql = "SELECT id, title, author, publication_year, isbn,category_name, DATE(created_at) as created_at, status FROM `books`";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                      $index = 1;
                      // Fetch each row and display it in the table
                      while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                          <td><?php echo $index;
                              $index += 1 ?></td>
                          <td><?php echo htmlspecialchars($row['title']); ?></td>
                          <td><?php echo htmlspecialchars($row['author']); ?></td>
                          <td><?php echo htmlspecialchars($row['publication_year']); ?></td>
                          <td><?php echo htmlspecialchars($row['isbn']); ?></td>
                          <td><?php echo htmlspecialchars($row['category_name']); ?></td>

                          <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                          <td>
                            <?php
                            if ($row['status'] == 1) {
                              echo '<span class="badge text-bg-success">Active</span>';
                            } else {
                              echo '<span class="badge text-bg-danger">Inactive</span>';
                            }
                            ?>
                          </td>
                          <td>
                            <a href="edit_book.php?action=edit&eid=<?php echo $row['id']?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="../models/delete.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                            <?php
                            echo ($row['status'] == 1)
                              ? '<a href="../models/update_status.php?action=status&id=' . $row['id'] . '&status=0" class="btn btn-secondary btn-sm">Inactive</a>'
                              : '<a href="../models/update_status.php?action=status&id=' . $row['id'] . '&status=1" class="btn btn-primary btn-sm">Active</a>';
                            ?>



                          </td>
                        </tr>
                    <?php
                      }
                    } else {
                      echo '<tr><td colspan="8">No books found.</td></tr>';
                    }
                    ?>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Tabs row ended -->
    </div>
  </div>
  <!-- Main content end -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>