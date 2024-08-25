<?php
$base_path = "/LMS/"
?>
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
                            <a class="nav-link active" aria-current="page" href="<?php echo $base_path; ?>books/add_books.php"><i class="fa-solid fa-plus mx-2"></i>Add New</a>
                        </li>
                        <li class="nav-link">
                            <a class="nav-link active" aria-current="page" href="<?php echo $base_path; ?>books/managebooks.php"><i class="fa-solid fa-plus mx-2"></i>Manage Books</a>
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
                            <a class="nav-link active" aria-current="page" href="<?php echo $base_path; ?>/students/add_student.php"><i class="fa-solid fa-plus mx-2"></i>Add Student</a>
                        </li>
                        <li class="nav-link">
                            <a class="nav-link active" aria-current="page" href="<?php echo $base_path; ?>/students/managestudent.php"><i class="fa-solid fa-plus mx-2"></i>Manage All</a>
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
                            <a class="nav-link active" aria-current="page" href="<?php echo $base_path; ?>loans/add_loan.php"><i class="fa-solid fa-plus mx-2"></i>Add Loan</a>
                        </li>
                        <li class="nav-link">
                            <a class="nav-link active" aria-current="page" href="<?php echo $base_path; ?>loans/manage_loan.php"><i class="fa-solid fa-plus mx-2"></i>Manage Loan</a>
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