<?php session_start();

?>
<!DOCTYPE php>
<php lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Libraray| Edit-Student</title>
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
                    <h1 class="fw-bold text-uppercase">Edit Student</h1>
                </div>
                <!-- tabs row start  -->

                <div class="row">
                    <div class="col-md-12 mt-4"></div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Fill The Details of the Student</div>
                            <div class="card-body">
                                <form action="../models/loan/edit_loan.php" method="POST">
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" name="eid" value="<?php echo $_GET['eid']?>">
                                        <label for="exampleInputbook" class="form-label">Select Book</label>
                                        <select class="form-control" name="book_id" id="exampleInputbook">
                                            <option value="">Please Select Book</option>
                                            <?php
                                            include('../config/config.php');
                                            $sql = "SELECT id,title FROM `books`";
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
                                        <label for="exampleInputpisbnname" class="form-label">Select Student</label>
                                        <select class="form-control" name="stud_id" id="exampleInputpisbnname">
                                            <option value="">Please Select Student</option>
                                            <?php
                                            include('../config/config.php');
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
                                        <label for="exampleInputloandate" class="form-label">Loan Date</label>
                                        <input
                                            type="date"
                                            name="loan_date"
                                            class="form-control"
                                            id="exampleInputloandate" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputduedate" class="form-label">Return/ Due date</label>
                                        <input
                                            type="date"
                                            name="due_date"
                                            class="form-control"
                                            id="exampleInputduedate" />
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" name="edit_loan" class="btn btn-success">Save</button>
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