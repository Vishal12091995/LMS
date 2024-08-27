<?php
include('../config/config.php');
session_start(); // Start the session at the top of the script

// function to get subscription
function get_subscriptions($conn)
{
  // Prepare the SQL query to retrieve loan records along with book and student details
  $sql = "
      SELECT * 
      FROM `subscription_plan` 
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
    <div class="container-fluid d-flex ">
      <div class="col-md-7">
        <h1 class="fw-bold text-uppercase">Manage Loans</h1>
        <!-- Tabs row start -->
        <span class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">Subscription Plans</div>
              <div class="card-body">
                <div>
                  <table id="example" class="table table-striped ">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <?php
                        $subs = get_subscriptions($conn);
                        if (!isset($subs)) {
                          $_SESSION['error'] = "Error" . $conn->error;
                        }
                        if (mysqli_num_rows($subs) > 0) {
                          $index = 1;
                          while ($row = $subs->fetch_assoc()) { ?>
                            <td><?php echo $index;
                              $index += 1 ?></td>
                            <td scope="col"><?php echo $row['title']; ?></td>
                            <td scope="col"><?php echo $row['amount']; ?></td>
                            <td scope="col"><?php echo $row['duration']; ?> Month</td>
                            <td>
                            <?php
                            if ($row['status'] == 1) {
                              echo '<span class="badge text-bg-warning">Active</span>';
                            } else {
                              echo '<span class="badge text-bg-success">Inactive</span>';
                            }
                            ?>
                          </td>
                          <td>
                            <a href="edit_loan.php?action=edit_loan&eid=<?php echo $row['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="../models/loan/delete_loan.php?action=delete_loan&eid=<?php echo $row['id']; ?>"
                              class="btn btn-danger btn-sm"
                              onclick="return confirm('Are you sure you want to delete this Loan ?');">
                              Delete
                            </a>
                            <?php
                            echo ($row['status'] == 0)
                              ? '<a href="../models/loan/update_status.php?action=update_loan_status&id=' . $row['id'] . '&status=1" class="btn btn-success btn-sm">Active</a>'
                              : '';
                            ?>

                          </td>
                        <?php
                          }
                        }
                        ?>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </span>
      </div>
      <!-- subscription Form starts  -->
      <div class="col-md-5 mx-1">
        <span class="container-fluid">
          <div class="col-md-12 mt-6">
            <h1 class="fw-bold text-uppercase">Add Subscription</h1>
            <!-- tabs row start  -->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">Fill The Subscription details</div>
                  <div class="card-body">
                    <form action="../models/subscription/add_subscription.php" method="POST">
                      <div class="mb-3">
                        <label for="Subscription_title_id" class="form-label">Title</label>
                        <input
                          type="Text"
                          class="form-control"
                          id="subscription_title_id"
                          name="subs_title"
                          aria-describedby="emailHelp" />
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputpsubsamount" class="form-label">Amount</label>
                        <input
                          type="number"
                          name="subs_amount"
                          class="form-control"
                          id="exampleInputpsubsamount" />
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputpselectsubscription class=" form-label">Select Subscription Duration</label>
                        <select class="form-control" name="subs_duration">
                          <?php for ($i = 1; $i <= 13; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?> Month</option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <button type="submit" name="add_subscription" class="btn btn-success">Add Subscription</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- tabs row ended  -->
        </span>
      </div>
      <!-- subscription form ends  -->

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