<?php
include('../config/config.php');
// session_start(); // Start the session at the top of the script

//function to get loan
function getloans($conn)
{
  // Prepare the SQL query to retrieve loan records along with book and student details
  $sql = "
      SELECT l.*, b.title as book_title, s.name as student_name 
      FROM `book_loans` as l
      INNER JOIN `books` as b ON b.id = l.book_id
      INNER JOIN `students` as s ON s.id = l.student_id
      ORDER BY l.id DESC
  ";

  // Execute the query
  $result = mysqli_query($conn, $sql);

  // Check if the query was successful
  if ($result === false) {
    // If there was an error, log the error message
    error_log("Database query failed: " . mysqli_error($conn));
    return false;
  }

  // Return the result set
  return $result;
}

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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
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
        if (isset($_SESSION['error'])) { ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Hello User</strong> <?php echo $_SESSION['error']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php
          unset($_SESSION['error']);
        }
        ?>
        <h1 class="fw-bold text-uppercase">Manage LOans</h1>
      </div>
      <!-- Tabs row start -->
      <div class="row">
        <div class="col-md-12 mt-4"></div>
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Fill The Details of the Loans</div>
            <div class="card-body">
              <div>
                <table id="example" class="table table-striped">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Student Name</th>
                      <th scope="col">Book Name</th>
                      <th scope="col">Issued On</th>
                      <th scope="col">Return date</th>
                      <th scope="col">Is Return</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $loans =  getLoans($conn);
                    if (!isset($loans)) {
                      $_SESSION['error'] = "Error" . $conn->error;
                    }
                    if (mysqli_num_rows($loans) > 0) {
                      $index = 1;
                      // Fetch each row and display it in the table
                      while ($row = $loans->fetch_assoc()) {
                    ?>
                        <tr>
                          <td><?php echo $index;
                              $index += 1 ?></td>
                          <td><?php echo htmlspecialchars($row['student_name']); ?></td>
                          <td><?php echo htmlspecialchars($row['book_title']); ?></td>
                          <td><?php echo htmlspecialchars($row['loan_date']); ?></td>
                          <td><?php echo htmlspecialchars($row['return_date']); ?></td>
                          <td>
                            <?php
                            if ($row['is_return'] == 0) {
                              echo '<span class="badge text-bg-warning">Active</span>';
                            } else {
                              echo '<span class="badge text-bg-success">Returned</span>';
                            }
                            ?>
                          </td>
                          <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                          <td>
                            <a href="edit_loan.php?action=edit_loan&eid=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="../models/loan/delete_loan.php?action=delete_loan&eid=<?php echo $row['id']; ?>"
                              class="btn btn-danger btn-sm"
                              onclick="return confirm('Are you sure you want to delete this Loan ?');">
                              Delete
                            </a>
                            <?php
                            echo ($row['is_return'] == 0)
                              ? '<a href="../models/loan/update_status.php?action=update_loan_status&id=' . $row['id'] . '&status=1" class="btn btn-success btn-sm">Active</a>'
                              : '';
                            ?>

                          </td>
                        </tr>
                    <?php
                      }
                    } else {
                      echo '<tr><td colspan="8">No Student found.</td></tr>';
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
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>

</body>

</html>