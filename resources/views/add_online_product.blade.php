<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="http://127.0.0.1:8000/">ARGAN THERAPIES</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <!--<div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>-->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                       <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li> -->
                        <li><a class="dropdown-item" href="http://127.0.0.1:8000/login">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <a class="nav-link" href="http://127.0.0.1:8000">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Sales
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="http://127.0.0.1:8000/products">Products</a>
                                    <a class="nav-link" href="http://127.0.0.1:8000/services">Services</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            <div class="sb-nav-link-icon"><i class="fas fa-sync-alt"></i></div>            
                            Actions
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="http://127.0.0.1:8000/updateP">Update Product</a>
                                            <a class="nav-link" href="http://127.0.0.1:8000/updateS">Update Service</a>
                                            
                                        </nav>
                                    </div>
                           
                            <a class="nav-link" href="http://127.0.0.1:8000/charts">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="http://127.0.0.1:8000/Clients">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Clients
                            </a>
                            <a class="nav-link" href="http://127.0.0.1:8000/add_online_product">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Online Products
                            </a>
                            <a class="nav-link" href="http://127.0.0.1:8000/Clients">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Reservation
                            </a>
                        </div>
                    </div>
                    
                </nav>
            </div>



            
            <div id="layoutSidenav_content">
            <style>
    body {
      background-color: #f8f9fa;
    }

    .form-container {
      max-width: 1000px;
      margin: 50px auto;
      padding: 30px;
      border: 1px solid #17a2b8;
      background-color: #e9f8fb;
      color: #17a2b8;
      border-radius: 5px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }
  </style>
            <div class="container">
    <div class="form-container">
      <h2 class="text-center mb-4">Add Product</h2>
      <form>
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" placeholder="Enter product title">
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" rows="3" placeholder="Enter product description"></textarea>
        </div>
        <div class="form-group">
          <label for="old-price">Old Price</label>
          <input type="text" class="form-control" id="old-price" placeholder="Enter old price">
        </div>
        <div class="form-group">
          <label for="actual-price">Actual Price</label>
          <input type="text" class="form-control" id="actual-price" placeholder="Enter actual price">
        </div>
        <div class="form-group">
          <label for="image">Image</label>
          <input type="file" class="form-control-file" id="image">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>



        <div class="container">
            <h1>Product List</h1>
            <div class="row">
            <div class="col-md-4">
                <div class="card mb-3">
                <img src="https://th.bing.com/th/id/R.ab432de6064393929012c754dff927fd?rik=9tCmOjWbuW18Uw&riu=http%3a%2f%2fwww.searchhomeremedy.com%2fwp-content%2fuploads%2f2012%2f07%2fHoney1.jpg&ehk=1Rm70p0GBya2vbR7QvlMYgfwL%2f4LuHU9kG7GRd%2f%2bpqU%3d&risl=&pid=ImgRaw&r=0" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Title</h5>
                    <p class="card-text">Product Description</p>
                    <div class="d-flex justify-content-between">
                    <span class="text-muted">Old Price: $99.99</span>
                    <h6 class="text-success">Actual Price: $79.99</h6>
                    </div>
                    <div class="mt-3">
                    <button class="btn btn-danger btn-sm mr-2 delete-btn">Delete</button>
                    <button class="btn btn-primary btn-sm update-btn">Update</button>
                    </div>
                </div>
                </div>
            </div>
            <!-- Add more product cards here -->
            <div class="col-md-4">
                <div class="card mb-3">
                <img src="https://th.bing.com/th/id/R.ab432de6064393929012c754dff927fd?rik=9tCmOjWbuW18Uw&riu=http%3a%2f%2fwww.searchhomeremedy.com%2fwp-content%2fuploads%2f2012%2f07%2fHoney1.jpg&ehk=1Rm70p0GBya2vbR7QvlMYgfwL%2f4LuHU9kG7GRd%2f%2bpqU%3d&risl=&pid=ImgRaw&r=0" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Title</h5>
                    <p class="card-text">Product Description</p>
                    <div class="d-flex justify-content-between">
                    <span class="text-muted">Old Price: $99.99</span>
                    <h6 class="text-success">Actual Price: $79.99</h6>
                    </div>
                    <div class="mt-3">
                    <button class="btn btn-danger btn-sm mr-2 delete-btn">Delete</button>
                    <button class="btn btn-primary btn-sm update-btn">Update</button>
                    </div>
                </div>
                </div>
            </div>
            <!-- Add more product cards here -->
            <div class="col-md-4">
                <div class="card mb-3">
                <img src="https://th.bing.com/th/id/R.ab432de6064393929012c754dff927fd?rik=9tCmOjWbuW18Uw&riu=http%3a%2f%2fwww.searchhomeremedy.com%2fwp-content%2fuploads%2f2012%2f07%2fHoney1.jpg&ehk=1Rm70p0GBya2vbR7QvlMYgfwL%2f4LuHU9kG7GRd%2f%2bpqU%3d&risl=&pid=ImgRaw&r=0" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Title</h5>
                    <p class="card-text">Product Description</p>
                    <div class="d-flex justify-content-between">
                    <span class="text-muted">Old Price: $99.99</span>
                    <h6 class="text-success">Actual Price: $79.99</h6>
                    </div>
                    <div class="mt-3">
                    <button class="btn btn-danger btn-sm mr-2 delete-btn">Delete</button>
                    <button class="btn btn-primary btn-sm update-btn">Update</button>
                    </div>
                </div>
                </div>
            </div>
            <!-- Add more product cards here -->
            <div class="col-md-4">
                <div class="card mb-3">
                <img src="https://th.bing.com/th/id/R.ab432de6064393929012c754dff927fd?rik=9tCmOjWbuW18Uw&riu=http%3a%2f%2fwww.searchhomeremedy.com%2fwp-content%2fuploads%2f2012%2f07%2fHoney1.jpg&ehk=1Rm70p0GBya2vbR7QvlMYgfwL%2f4LuHU9kG7GRd%2f%2bpqU%3d&risl=&pid=ImgRaw&r=0" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Title</h5>
                    <p class="card-text">Product Description</p>
                    <div class="d-flex justify-content-between">
                    <span class="text-muted">Old Price: $99.99</span>
                    <h6 class="text-success">Actual Price: $79.99</h6>
                    </div>
                    <div class="mt-3">
                    <button class="btn btn-danger btn-sm mr-2 delete-btn">Delete</button>
                    <button class="btn btn-primary btn-sm update-btn">Update</button>
                    </div>
                </div>
                </div>
            </div>

            <!-- Add more product cards here -->
            <div class="col-md-4">
                <div class="card mb-3">
                <img src="https://th.bing.com/th/id/R.ab432de6064393929012c754dff927fd?rik=9tCmOjWbuW18Uw&riu=http%3a%2f%2fwww.searchhomeremedy.com%2fwp-content%2fuploads%2f2012%2f07%2fHoney1.jpg&ehk=1Rm70p0GBya2vbR7QvlMYgfwL%2f4LuHU9kG7GRd%2f%2bpqU%3d&risl=&pid=ImgRaw&r=0" class="card-img-top" alt="Product Image">
                <div class="card-body">
                    <h5 class="card-title">Product Title</h5>
                    <p class="card-text">Product Description</p>
                    <div class="d-flex justify-content-between">
                    <span class="text-muted">Old Price: $99.99</span>
                    <h6 class="text-success">Actual Price: $79.99</h6>
                    </div>
                    <div class="mt-3">
                    <button class="btn btn-danger btn-sm mr-2 delete-btn">Delete</button>
                    <button class="btn btn-primary btn-sm update-btn">Update</button>
                    </div>
                </div>
                </div>
            </div>
            
            </div>
        </div>

       


                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
