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
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>India Art and Culture</td>
                                            <td>Prakashan</td>
                                            <td>Jai Sri Ram</td>
                                            <td>0602023</td>
                                            <td>
                                                <span class="badge text-bg-success ms-1">Edit</span>
                                                <span class="badge text-bg-danger ms-1">Delete</span>
                                            </td>
                                        </tr>
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
