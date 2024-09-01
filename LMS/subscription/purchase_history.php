<?php
include('../config/config.php');
session_start(); // Start the session at the top of the script
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Purchase History</title>
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


            <div class="col-md-12">
                <!-- create subscription button starts  -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-end my-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Create Subscription
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Purchase</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../models/subscription/add_purchase_history.php" method="POST">
                                    <div class="mb-3">
                                        <label for="exampleInputpisbnname" class="form-label">Select Student</label>
                                        <select class="form-control" name="stud_id" id="exampleInputpisbnname">
                                            <option value="">Please Select Student</option>
                                            <?php
                                            var_dump($_SESSION['error']);
                                            $sql = "SELECT id,name FROM `students`";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputpisplanid" class="form-label">Select Plan</label>
                                        <select class="form-control" name="plan_id" id="exampleInputpisplanid">
                                            <option value="">Please Select Plan</option>
                                            <?php
                                            $sql = "SELECT id,title FROM `subscription_plan`";
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputstartdate" class="form-label">Start Date</label>
                                        <input
                                            type="date"
                                            name="start_date"
                                            class="form-control"
                                            id="exampleInputstartdate" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputenddate" class="form-label">End Date</label>
                                        <input
                                            type="date"
                                            name="end_date"
                                            class="form-control"
                                            id="exampleInputenddate" />
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" name="add_purchase" class="btn btn-success">Save</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
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
                <!-- create subscription button end  -->
                <h1 class="fw-bold text-uppercase">Purchase History</h1>
                <!-- Tabs row start -->
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Purchase History</div>
                            <div class="card-body">
                                <div>
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