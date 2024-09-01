<?php
include('../config/config.php');
session_start(); // Start the session at the top of the script

// Function to get subscriptions
function get_subscriptions($conn)
{
  $sql = "SELECT * FROM `subscription_plan`";
  $result = mysqli_query($conn, $sql);

  if ($result === false) {
    error_log("Database query failed: " . mysqli_error($conn));
    return false;
  }
  return $result;
}

// Function to get a specific subscription for editing
function get_edit_subscriptions($conn, $e_id)
{
  $sql = "SELECT * FROM `subscription_plan` WHERE id = $e_id";
  $result = mysqli_query($conn, $sql);

  if ($result === false) {
    error_log("Database query failed: " . mysqli_error($conn));
    return false;
  }
  return mysqli_fetch_assoc($result);
}

// Initialize the plan variable with default values
$plan = ['title' => "", 'amount' => "", 'id' => ""];

if (isset($_GET['action']) && $_GET['action'] == 'edit_subs' && isset($_GET['id']) && $_GET['id'] > 0) {
  $e_id = $_GET['id'];
  $plan = get_edit_subscriptions($conn, $e_id);
}else{
  $plan = ['title' => "", 'amount' => "", 'id' => "", 'duration'=>""];
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
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">Subscription Plans</div>
              <div class="card-body">
                <table id="example" class="table table-striped">
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
                    <?php
                    $subs = get_subscriptions($conn);
                    if (!$subs) {
                      $_SESSION['error'] = "Error: " . $conn->error;
                    } elseif (mysqli_num_rows($subs) > 0) {
                      $index = 1;
                      while ($row = $subs->fetch_assoc()) {
                    ?>
                        <tr>
                          <td><?php echo $index++; ?></td>
                          <td><?php echo htmlspecialchars($row['title']); ?></td>
                          <td><?php echo htmlspecialchars($row['amount']); ?></td>
                          <td><?php echo htmlspecialchars($row['duration']); ?> Month</td>
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
                            <a href="manage_subscription.php?action=edit_subs&id=<?php echo $row['id']; ?>"
                              class="btn btn-primary btn-sm">Edit</a>
                            <a href="../models/loan/delete_subs.php?action=delete_loan&eid=<?php echo $row['id']; ?>"
                              class="btn btn-danger btn-sm"
                              onclick="return confirm('Are you sure you want to delete this Loan?');">
                              Delete
                            </a>
                            <?php
                            echo ($row['status'] == 0)
                              ? '<a href="../models/subscription/update_subs_status.php?action=update_subs_status&id=' . $row['id'] . '&status=1" class="btn btn-success btn-sm">Active</a>'
                              : '<a href="../models/subscription/update_subs_status.php?action=update_subs_status&id=' . $row['id'] . '&status=0" class="btn btn-warning btn-sm">InActive</a>';
                            ?>
                          </td>
                        </tr>
                    <?php
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Subscription Form starts -->
      <div class="col-md-5 mx-1">
        <span class="container-fluid">
          <div class="col-md-12 mt-6">
            <h1 class="fw-bold text-uppercase">Add Subscription</h1>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">Fill The Subscription details</div>
                  <div class="card-body">
                    <form action="../models/subscription/add_subscription.php" method="POST">
                      <div class="mb-3">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $plan['id']; ?>">
                        <label for="Subscription_title_id" class="form-label">Title</label>
                        <input type="text" class="form-control" id="subscription_title_id" name="subs_title" value="<?php echo htmlspecialchars($plan['title']); ?>" aria-describedby="emailHelp" />
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputpsubsamount" class="form-label">Amount</label>
                        <input type="number" name="subs_amount" class="form-control" id="exampleInputpsubsamount" value="<?php echo htmlspecialchars($plan['amount']); ?>" />
                      </div>
                      <div class="mb-3">
                        <label for="exampleInputpselectsubscription" class="form-label">Select Subscription Duration</label>
                        <select class="form-control" name="subs_duration">
                          <?php for ($i = 1; $i < 13; $i++) { ?>
                            <option value="<?php echo $i; ?>" <?php echo ($plan['duration'] == $i) ? 'selected' : ''; ?>><?php echo $i; ?> Month</option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <button type="submit" name="add_subscription" class="btn btn-success">Save Subscription</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </span>
      </div>
      <!-- Subscription form ends -->
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