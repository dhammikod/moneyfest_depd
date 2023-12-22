<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stock</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    {{-- Include bootstrap js popper --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Include Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Include DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <link rel="stylesheet" href="/assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/dashboard2.css">
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="/dashboard" class="text-nowrap logo-img">
                        <img src="../assets/images/logo/logo-dark.png" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/dashboard" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">FEATURES</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/pemasukan" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Income</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/pengeluaran" aria-expanded="false">
                                <span>
                                    <i class="ti ti-alert-circle"></i>
                                </span>
                                <span class="hide-menu">Expenses</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./pegawai" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                <span class="hide-menu">Salary</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/profit" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span class="hide-menu">Profit</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="/stok" aria-expanded="false">
                                <span>
                                    <i class="ti ti-typography"></i>
                                </span>
                                <span class="hide-menu">Stock</span>
                            </a>
                        </li>
                    </ul>
                    <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
                        <div class="d-flex">
                            <div class="unlimited-access-title me-3">
                                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                                <a href="#" target="_blank"
                                    class="btn btn-primary fs-2 fw-semibold lh-sm">Subscribe Now</a>
                            </div>
                            <div class="unlimited-access-img">
                                <img src="assets/images/background/rocket.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse"
                                href="javascript:void(0)">
                                <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="../assets/images/testimonials/avatar-1.png" alt=""
                                        width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-user fs-6"></i>
                                            <p class="mb-0 fs-3">My Profile</p>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="d-flex align-items-center gap-2 dropdown-item">
                                            <i class="ti ti-mail fs-6"></i>
                                            <p class="mb-0 fs-3">My Account</p>
                                        </a>
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-primary mx-3 mt-2 d-block">
                                                <a>Logout</a>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->

            <div class="container-fluid ">
                <div class="card w-100 h-100 position-relative overflow-hidden">
                    <div class="card-body" style="background-color: #CEDCEE">
                        
                            <div class="col-md-12">
                                <h5 class="card-title fw-semibold mb-4">Stock Product</h5>
                                <div class="card table-responsive">
                                    <div id="contacts" class="table-responsive">
                                        
                                            <table class="table table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="sort" data-sort="nama">Nama</th>
                                                        <th scope="col" class="sort" data-sort="jenis">Jenis
                                                        </th>
                                                        <th scope="col" class="sort" data-sort="deskripsi">
                                                            Deskripsi
                                                        </th>
                                                        <th scope="col" class="sort" data-sort="stok">Stok</th>
                                                        <th scope="col" class="sort" data-sort="harga_jual">
                                                            Harga
                                                            Jual</th>
                                                        <th scope="col" class="sort" data-sort="harga_beli">
                                                            Harga
                                                            Beli</th>
                                                        <th scope="col" class="sort" data-sort="terjual">Terjual
                                                        </th>
                                                        <th colspan="2">
                                                            <input type="text" class="search"
                                                                placeholder="Search Items" />
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list">
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($produks as $data)
                                                        <tr>
                                                            <td class="id" style="display:none;">
                                                                {{ $i }}
                                                            </td>
                                                            <td class="nama">{{ $data['nama'] }}</td>
                                                            <td class="jenis">{{ $data['jenis'] }}</td>
                                                            <td class="deksripsi">{{ $data['deskripsi'] }}</td>
                                                            <td class="stok">{{ $data['stok'] }}</td>
                                                            <td class="harga_jual">{{ $data['harga_jual'] }}</td>
                                                            <td class="harga_beli">{{ $data['harga_beli'] }}</td>
                                                            <td class="terjual">{{ $data['terjual'] }}</td>
                                                            <td class="edit"><button type="button"
                                                                    class="btn btn-warning" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal{{ $data['id'] }}">
                                                                    Edit
                                                                </button></td>
                                                            <td class="remove"><button type="button"
                                                                    class="btn btn-danger" data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal{{ $data['id'] }}">
                                                                    Delete
                                                                </button></td>
                                                        </tr>
                                                        @php
                                                            $i++;
                                                        @endphp

                                                        {{-- Modal section --}}
                                                        {{-- Modal section --}}
                                                        {{-- Modal section --}}
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal{{ $data['id'] }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">

                                                            <div class="modal-dialog">

                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <h2 style="font-weight: bold">Edit Item</h2>
                                                                        <form method="post" action=""
                                                                            style="text-align: center">
                                                                            @csrf
                                                                            <input type="hidden" name="edit"
                                                                                value="true">

                                                                            <input type="hidden" name="id"
                                                                                value="{{ $data['id'] }}">
                                                                            <input type="text" name="nama"
                                                                                id="nama"
                                                                                placeholder="Name of Income"
                                                                                value="{{ $data['nama'] }}" required
                                                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                                                            <input type="text" name="jenis"
                                                                                id="jenis" placeholder="Nominal"
                                                                                value="{{ $data['jenis'] }}" required
                                                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                                                            <input type="text" name="deskripsi"
                                                                                id="deskripsi" placeholder="Amount"
                                                                                value="{{ $data['deskripsi'] }}"
                                                                                required
                                                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                                                            <input type="text" name="stok"
                                                                                id="stok" placeholder="Amount"
                                                                                value="{{ $data['stok'] }}" required
                                                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                                                            <input type="number" name="harga_jual"
                                                                                id="harga_jual" placeholder="Unit"
                                                                                value="{{ $data['harga_jual'] }}"
                                                                                required
                                                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                                                            <input type="number" name="harga_beli"
                                                                                id="harga_beli"
                                                                                placeholder="harga_beli"
                                                                                value="{{ $data['harga_beli'] }}"
                                                                                required
                                                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                                                            <input type="number" name="terjual"
                                                                                id="terjual" placeholder="Notes"
                                                                                value="{{ $data['terjual'] }}"
                                                                                required
                                                                                style="border-color: #2F80ED; background-color: #E0E9F4">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            changes</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        {{-- Model Delete --}}
                                                        {{-- Model Delete --}}
                                                        {{-- Model Delete --}}
                                                        <div class="modal fade" id="deleteModal{{ $data['id'] }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">

                                                            <div class="modal-dialog">

                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>

                                                                    <div class="modal-body">
                                                                        <h2 style="font-weight: bold">Are you sure?
                                                                        </h2>
                                                                        <h5 style="font-weight: bold">Delete data</h2>
                                                                            <form method="post" action=""
                                                                                style="text-align: center">
                                                                                @csrf
                                                                                <input type="hidden" name="delete"
                                                                                    value="true">
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $data['id'] }}">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-danger">Delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                       
                                    </div>
                                </div>
                            </div>
                        

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                            Add New Item
                        </button>


                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true" style="text-align: center">>
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content text-center">
                                    <div class="modal-header text-center">
                                        <h3 style="font-weight: bold" class="modal-title text-center" id="staticBackdropLabel">
                                            Input New Item</h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">

                                        <form method="post" action="" class="mb-3"
                                            style="text-align: center">

                                            @csrf
                                            <input type="hidden" name="create" value="yes">

                                            <input type="hidden" name="user_id" value="{{ $user->id }}">

                                            
                                            <input type="text" class="form-control mb-2" name="nama" id="nama" placeholder="Nama"
                                                required style="border-color: #2F80ED; background-color: #E0E9F4">
                                            

                                            <input type="text" class="form-control mb-2" name="jenis" id="jenis" placeholder="Jenis"
                                                required style="border-color: #2F80ED; background-color: #E0E9F4">

                                            <input type="text" class="form-control mb-2" name="deskripsi" id="deskripsi"
                                                placeholder="Deskripsi" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">

                                            <input type="text" class="form-control mb-2" name="stok" id="Stok" placeholder="Stok"
                                                required style="border-color: #2F80ED; background-color: #E0E9F4">

                                            <input type="number" class="form-control mb-2" name="harga_jual" id="harga_jual"
                                                placeholder="Harga Jual" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">

                                            <input type="number" class="form-control mb-2" name="harga_beli" id="harga_beli"
                                                placeholder="Harga Beli" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">

                                            <input type="number" class="form-control mb-2" name="terjual" id="terjual"
                                                placeholder="Terjual" required
                                                style="border-color: #2F80ED; background-color: #E0E9F4">


                                    </div>
                                    <div class="modal-footer text-center">
                                        <button type="submit" class="btn btn-primary"
                                            style="padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold">SAVE</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
            <script src="../assets/js/sidebarmenu.js"></script>
            <script src="../assets/js/app.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
            <script src="/assets/js/stok.js"></script>
            <script src="../assets/js/dashboard.js"></script>
            <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
            <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="../assets/libs/simplebar/dist/simplebar.js"></script>


</body>

</html>
