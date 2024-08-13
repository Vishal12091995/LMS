<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password</title>
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
</head>

<body>
    <div class="main-login">
        <div
            class="container d-flex justify-content-center align-items-center vh-100">
            <div class="row">
                <div class="col-md-12 login-form text center ms-auto">
                    <div class="card mb-3" style="max-width: 980px">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img
                                    src="assets/images/libraray_login-image.jpeg"
                                    class="img-fluid rounded-start"
                                    alt="..." />
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h1
                                        class="card-title text-uppercase text-center fw-bold fs-1">
                                        Library
                                    </h1>
                                    <p>Reset Password </p>
                                    <form action="index.html">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">New Password</label>
                                            <input
                                                type="password"
                                                class="form-control"
                                                id="exampleInputEmail1"
                                                aria-describedby="emailHelp" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                                            <input
                                                type="password"
                                                class="form-control"
                                                id="exampleInputEmail2"
                                                aria-describedby="emailHelp" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputcode" class="form-label">Enter Password Code</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                id="exampleInputcode"
                                                aria-describedby="emailHelp" />
                                            <button type="submit" class="btn btn-primary my-2">
                                                Submit
                                            </button>
                                    </form>
                                    <div>
                                        <a href="/index.html" class="card-link my-3 py-3">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>