
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('backend') }}/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <li><button class="dropdown-item" href="">Logout</button></li>
                         </form>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Management</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('product.add') }}">Add Product</a>
                                    <a class="nav-link" href="{{ route('product.show') }}">Manage Product</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{ route('user.add') }}">Add User</a>
                                    <a class="nav-link" href="{{ route('user.show') }}">Manage User</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Products</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit Product Here</li>
                        </ol>
                        <div class="row">
                            <div class="col-md-10 offset-md-1">
                                <form  action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                        <div class="col-md-6 offset-md-3 border border-success p-3">
                                            <div class="form-group">
                                                 <input type="text" value="{{$product->pro_title}}" name="pro_title" class="form-control mt-3" placeholder="Product Title">
                                            </div>

                                             <div class="form-group">
                                                 <input type="text" value="{{$product->category}}" name="category" class="form-control mt-3" placeholder="Product Category">
                                             </div>

                                             <div class="form-group">
                                                 <input type="text" value="{{$product->brand}}" name="brand" class="form-control mt-3" placeholder="Product Brand">
                                             </div>

                                             <div class="form-group">
                                                 <textarea name="description" class="form-control mt-3" cols="30" rows="5" placeholder="Product Description">{{$product->description}}</textarea>
                                             </div>

                                             <div class="form-group">
                                                <img height="100" width="100"  src="{{asset('backend/productimg/'.$product->pic)}}" alt="" class="mt-3">
                                            </div>

                                             <div class="form-group">
                                                 <input class="form-control mt-3" type="file" name="pic" >
                                             </div>

                                             <div class="form-group">
                                                 <input type="text" value="{{$product->pro_price}}" name="pro_price" class=" form-control mt-3" placeholder="Product Price">
                                             </div>

                                             <div class="form-group">
                                               <select name="status" class="form-control mt-3">
                                                  <option value="">-----Select Status-----</option>
                                                  <option value="1" @if ($product->status==1) selected @endif>Active</option>
                                                   <option value="0" @if ($product->status==0) selected @endif>Inactive</option>
                                               </select>
                                             </div>

                                             <div class="form-group m-4">
                                                  <button class="btn btn-success form-control mt-3">Update Product</button>
                                             </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- row -->
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('backend') }}/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('backend') }}/assets/demo/chart-area-demo.js"></script>
        <script src="{{ asset('backend') }}/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{ asset('backend') }}/js/datatables-simple-demo.js"></script>
    </body>
</html>
