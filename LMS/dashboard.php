<?php
session_start();
include("config/config.php");
$base_path = "/LMS/";
if (!isset($_SESSION['user_name'])) {
  // If the session does not exist, redirect to login page or show an error
  $_SESSION['error'] = "You must be logged in to access this page!";
  header('Location: index.php'); // Redirect to the login page
  exit(); // Stop executing the rest of the page
}
?>
<!DOCTYPE php>
<php lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboards</title>
    <link
      href="./assets/css/bootstrap.min.css"
      rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap5.css">
  </head>

  <body>
    <!-- Top Nav Bar -->
    <?php
    include('includes/header.php');
    
    ?>

    <!-- Nav Bar end -->
    <!-- side bar start -->
    <?php include('includes/sidebar.php'); ?>
    <!-- side bar end  -->
    <!-- main content start  -->
    <div class="main">
      <div class="container-fluid">
        <!-- cards row start -->
        <div class="row">
          <div class="col-md-12 mt-5">
            <h4 class="text-uppercase fw-bold fs-2">DashBoard</h4>
            <p>Statistics of the system</p>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem">
              <div class="card-body text-center">
                <h5 class="card-title text-muted">Total Books</h5>
                <?php
                $books_query = "SELECT COUNT(title) as total_book_number FROM `books`";
                $result_book = mysqli_query($conn, $books_query);

                if ($result_book && mysqli_num_rows($result_book) > 0) {
                  $row = mysqli_fetch_assoc($result_book);
                ?>
                  <h1><?php echo $row['total_book_number']; ?></h1>
                <?php
                } else {
                  echo "<h1>No books found</h1>";
                }
                ?>
                <a href="<?php $base_path ?>books/managebooks.php" class="card-link" style="text-decoration: none">View More</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem">
              <div class="card-body text-center">
                <h5 class="card-title text-muted">Total Students</h5>
                <?php
                $sql_total_students_query = "SELECT COUNT(name)as student_count from `students`";
                $result_student_number = mysqli_query($conn, $sql_total_students_query);

                if ($result_student_number && mysqli_num_rows($result_student_number))
                  $row_stud_num = mysqli_fetch_assoc($result_student_number);

                ?>
                <h1><?php echo $row_stud_num['student_count']; ?></h1>
                <a href="<?php $base_path ?>students/managestudent.php" class="card-link" style="text-decoration: none">View More</a>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem">
              <div class="card-body text-center">
                <h5 class="card-title text-muted">Total Revenue</h5>
                <?php
                $sql_total_revenue = "SELECT SUM(amount) AS revenue_amount FROM `subscription_plan` order By id DESC";

                $result_revenue = mysqli_query($conn, $sql_total_revenue);
                if ($result_revenue && mysqli_num_rows($result_revenue) > 0) {
                  $result_revenue_number = mysqli_fetch_row($result_revenue); ?>
                  <h1>Rs. <?php echo $result_revenue_number[0] ?></h1>
                <?php } else { ?>
                  <h1>Rs. 0</h1>
                <?php } ?>
                <a href="<?php $base_path ?>subscription/manage_subscription.php" class="card-link" style="text-decoration: none">View More</a>
              </div>

            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem">
              <div class="card-body text-center">
                <h5 class="card-title text-muted">Total Books Loan</h5>
                <?php
                $sql_total_revenue = "SELECT COUNT(id) AS total_book_loan FROM `book_loans` Order By id DESC";

                $result_loan_num = mysqli_query($conn, $sql_total_revenue);
                if ($result_loan_num && mysqli_num_rows($result_loan_num) > 0) {
                  $result_loan_number = mysqli_fetch_row($result_loan_num); ?>
                  <h1> <?php echo $result_loan_number[0] ?></h1>
                <?php } else { ?>
                  <h1> 0</h1>
                <?php } ?>

                <a href="<?php $base_path ?>loans/manage_loan.php" class="card-link" style="text-decoration: none">View More</a>
              </div>
            </div>
          </div>
        </div>
        <!-- cards row end  -->
        <!-- tabs row start  -->
        <div class="row">
          <div class="col-md-12 mt-4" id="#example">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link active"
                  id="new_student"
                  data-bs-toggle="tab"
                  data-bs-target="#new_student-pane"
                  type="button"
                  role="tab"
                  aria-controls="new_student-pane"
                  aria-selected="true">
                  New Students
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="recent_loan"
                  data-bs-toggle="tab"
                  data-bs-target="#recent_loan-pane"
                  type="button"
                  role="tab"
                  aria-controls="recent_loan-pane"
                  aria-selected="false">
                  Recent Loans
                </button>
              </li>
              <li class="nav-item" role="presentation">
                <button
                  class="nav-link"
                  id="recent_subscription"
                  data-bs-toggle="tab"
                  data-bs-target="#recent_subscription-pane"
                  type="button"
                  role="tab"
                  aria-controls="recent_subscription-pane"
                  aria-selected="false">
                  Recent Subscriptions
                </button>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div
                class="tab-pane fade show active"
                id="new_student-pane"
                role="tabpanel"
                aria-labelledby="new_student"
                tabindex="0">
                <div class="col-md-12">
                  <div class="card-body">
                    <div>
                      <table id="example" class="table table-striped">
                        <thead class="table-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created At</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          // Query to select all Student from the database
                          $sql = "SELECT id, name, phone_no, email, address,status,DATE(created_at) as created_at FROM `students` order by id DESC";
                          $result = mysqli_query($conn, $sql);

                          if (mysqli_num_rows($result) > 0) {
                            $index = 1;
                            // Fetch each row and display it in the table
                            while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                              <tr>
                                <td><?php echo $index;
                                    $index += 1 ?></td>
                                <td><?php echo htmlspecialchars($row['name']); ?></td>
                                <td><?php echo htmlspecialchars($row['phone_no']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['address']); ?></td>
                                <td>
                                  <?php
                                  if ($row['status'] == 1) {
                                    echo '<span class="badge text-bg-success">Active</span>';
                                  } else {
                                    echo '<span class="badge text-bg-danger">Inactive</span>';
                                  }
                                  ?>
                                </td>
                                <td><?php echo htmlspecialchars($row['created_at']); ?></td>

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
              <div
                class="tab-pane fade"
                id="recent_loan-pane"
                role="tabpanel"
                aria-labelledby="recent_loan"
                tabindex="0">
                <table id="example" class="table table-striped">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Student Name</th>
                      <th scope="col">Book Name</th>
                      <th scope="col">Issued On</th>
                      <th scope="col">Return Date</th>
                      <th scope="col">Is Return</th>
                      <th scope="col">Created At</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "
      SELECT l.*, b.title as book_title, s.name as student_name 
      FROM `book_loans` as l
      INNER JOIN `books` as b ON b.id = l.book_id
      INNER JOIN `students` as s ON s.id = l.student_id
      ORDER BY l.id DESC
      ";
                    // Execute the query
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                      $index = 1;
                      // Fetch each row and display it in the table
                      while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                          <td><?php echo $index;
                              $index += 1; ?></td>
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
                        </tr>
                    <?php }
                    } ?>
                  </tbody>
                </table>
              </div>

              <div
                class="tab-pane fade"
                id="recent_subscription-pane"
                role="tabpanel"
                aria-labelledby="recent_subscription"
                tabindex="0">
                <table id="example" class="table table-striped ">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Student Name</th>
                      <th scope="col">Plan</th>
                      <th scope="col">Start Date</th>
                      <th scope="col">End Date</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT l.*,s.name as s_name,sp.title as plan_title from `subscription`as l INNER JOIN students as s ON s.id = l.student_id INNER JOIN `subscription_plan` as sp ON sp.id = l.plan_id ORDER BY l.id DESC";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                      $index = 1;
                      while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                          <td scope="col"><?php echo $index;
                                          $index++ ?></td>
                          <td scope="col"><?php echo $row['s_name']; ?></td>
                          <td scope="col"><?php echo $row['plan_title']; ?></td>
                          <td scope="col"><?php echo $row['start_date']; ?></td>
                          <td scope="col"><?php echo $row['end_date']; ?></td>
                          <td><?php
                              if ($row['status'] == 1) { ?>
                              <a href="#" class="badge text-bg-success text-decoration-none">Active</a>
                            <?php } else { ?>
                              <a href="#" class="badge text-bg-danger">Expired</a>
                            <?php } ?>
                          </td
                            </tr>
                      <?php  }
                    } ?>
                  </tbody>
                </table>
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
    <script>
      $(document).ready(function() {
        $('#example').DataTable();
      });
    </script>
    <?php include('includes/footer.php') ?>
  </body>