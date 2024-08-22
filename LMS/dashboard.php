<?php
include("config/config.php");
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
    <link rel="stylesheet" href="assets/css//dataTables.bootstrap5.css">
</head>
<body>
    <!-- Top Nav Bar -->
    <?php
    include('includes/header.php');
    ?>
    <!-- Nav Bar end -->
    <!-- side bar start -->
    <div
    class="offcanvas offcanvas-start bg-dark text-white sidebar-nav"
    tabindex="-1"
    id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h1><i class="fa-brands fa-searchengin"></i>DashBoard</h1>
    </div>
    <hr class="my-0" />
    <div class="offcanvas-body">
        <ul class="navbar-nav fs-5">
            <li class="nav-item">
                <div class="text-secondary text-uppercase fw-bold">Inventory</div>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link"
                    data-bs-toggle="collapse"
                    href="#collapseInventory"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapseInventory">
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link sidebar_link"
                    data-bs-toggle="collapse"
                    href="#collapseBooks"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapseBooks">
                    <i class="fa-solid fa-book-open mx-1"></i>Books Management
                    <span class="right-icon float-end"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
                <div class="collapse" id="collapseBooks">
                    <ul class="navbar-nav ps-3 ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="books/add_books.php"><i class="fa-solid fa-plus mx-2"></i>Add New</a>
                        </li>
                        <li class="nav-link">
                            <a class="nav-link active" aria-current="page" href="books/managebooks.php"><i class="fa-solid fa-plus mx-2"></i>Manage Books</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link sidebar_link"
                    data-bs-toggle="collapse"
                    href="#collapseStudents"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapseStudents">
                    <i class="fa-solid fa-book-open mx-1"></i>Students Management
                    <span class="right-icon float-end"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
                <div class="collapse" id="collapseStudents">
                    <ul class="navbar-nav ps-3">
                        <li class="nav-link">
                            <a class="nav-link active" aria-current="page" href="students/add_student.php"><i class="fa-solid fa-plus mx-2"></i>Add New Student</a>
                        </li>
                        <li class="nav-link">
                            <a class="nav-link active" aria-current="page" href="students/managestudent.php"><i class="fa-solid fa-plus mx-2"></i>Manage All</a>
                        </li>
                    </ul>
                </div>
            </li>
            <hr />
            <li class="nav-item">
                <div class="text-secondary text-uppercase fw-bold">Business</div>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link"
                    data-bs-toggle="collapse"
                    href="#collapseBusiness"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapseInventory">
                </a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link sidebar_link"
                    data-bs-toggle="collapse"
                    href="#collapseBooksLoan"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapseBooks">
                    <i class="fa-solid fa-book-open mx-1"></i>Books Loan
                    <span class="right-icon float-end"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
                <div class="collapse" id="collapseBooksLoan">
                    <ul class="navbar-nav ps-3">
                        <li class="nav-link">
                            <i class="fa-solid fa-plus mx-2"></i>Add New
                        </li>
                        <li class="nav-link">
                            <i class="fa-solid fa-bars mx-2"></i>Manage All
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link sidebar_link"
                    data-bs-toggle="collapse"
                    href="#collapseSubs"
                    role="button"
                    aria-expanded="false"
                    aria-controls="collapseStudents">
                    <i class="fa-solid fa-book-open mx-1"></i>Subscription
                    <span class="right-icon float-end"><i class="fa-solid fa-chevron-down"></i></span>
                </a>
                <div class="collapse" id="collapseSubs">
                    <ul class="navbar-nav ps-3">
                        <li class="nav-link">
                            <i class="fa-solid fa-plus mx-2"></i>Add New
                        </li>
                        <li class="nav-link">
                            <i class="fa-solid fa-bars mx-2"></i>Manage All
                        </li>
                    </ul>
                </div>
            </li>
            <hr />
            <li class="nav-item">
                <a class="nav-link" role="button">
                    <i class="fa-solid fa-book-open mx-1"></i>Logout
                </a>
            </li>
        </ul>
    </div>
</div> 
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
                <h1>125</h1>
                <a href="#" class="card-link" style="text-decoration: none"
                  >View More</a
                >
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem">
              <div class="card-body text-center">
                <h5 class="card-title text-muted">Total Students</h5>
                <h1>84</h1>
                <a href="#" class="card-link" style="text-decoration: none"
                  >View More</a
                >
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem">
              <div class="card-body text-center">
                <h5 class="card-title text-muted">Total Revenue</h5>
                <h1>Rs. 1,25,000</h1>
                <a href="#" class="card-link" style="text-decoration: none"
                  >View More</a
                >
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card" style="width: 18rem">
              <div class="card-body text-center">
                <h5 class="card-title text-muted">Total Books Loan</h5>
                <h1>32</h1>
                <a href="#" class="card-link" style="text-decoration: none"
                  >View More</a
                >
              </div>
            </div>
          </div>
        </div>
        <!-- cards row end  -->
        <!-- tabs row start  -->
        <div class="row">
          <div class="col-md-12 mt-4">
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
                  aria-selected="true"
                >
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
                  aria-selected="false"
                >
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
                  aria-selected="false"
                >
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
                tabindex="0"
              >
                <table class="table table-border">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Vishal</td>
                      <td>gupta</td>
                      <td><span class="badge text-bg-success">Handel</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div
                class="tab-pane fade"
                id="recent_loan-pane"
                role="tabpanel"
                aria-labelledby="recent_loan"
                tabindex="0"
              >
                <table class="table table-border">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Book Name</th>
                      <th scope="col">Student Name</th>
                      <th scope="col">Loan date</th>
                      <th scope="col">Due date</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>India Art and Culture</td>
                      <td>Jai Sri ram</td>
                      <td>26.05.2023</td>
                      <td>20.0602023</td>
                      <td><span class="badge text-bg-success">Active</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div
                class="tab-pane fade"
                id="recent_subscription-pane"
                role="tabpanel"
                aria-labelledby="recent_subscription"
                tabindex="0"
              >
                <table class="table table-border">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Student Name</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Start Date</th>
                      <th scope="col">End Date</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Jai Kaushik</td>
                      <td>Rs. 400</td>
                      <td>26.05.2023</td>
                      <td>30.06.2023</td>
                      <td><span class="badge text-bg-success">Active</span></td>
                    </tr>
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
      crossorigin="anonymous"
    ></script>
    <?php include('includes/footer.php'); ?>
  </body>