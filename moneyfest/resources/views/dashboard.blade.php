{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <link rel="stylesheet" href="assets/css/dashboard.css">
    
</head>

<body>
    <div style="margin: 20px">
        <div style="text-align: right; padding-bottom: 20px">
            <img src="assets/images/logo/logo-dark.png" alt="">
            <form action="/logout" method="post">
                @csrf
                <button type="submit"
                    style="font-size: 12px;  background: #2D36A1; color: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer;">Logout</button>
            </form>
        </div>
        <table>
            <tr>
                <th>
                    Kategori
                </th>
                <th>
                    Jumlah
                </th>
            </tr>
            @foreach ($kategories_sum as $item)
                <tr>
                    <td>
                        {{$item['kategori']}}
                    </td>
                    <td>
                        {{$item['total_category']}}
                    </td>
                </tr>
            @endforeach
        </table>
        <div style="display: flex; justify-content: flex-end">
            <form method="post" action="" class="form" style="text-align: center">
                <h2 style="font-weight: bold">Input New Transaction</h2>
                @csrf
                <input type="hidden" name="jenis" value="pendapatan">

                <select id="kategori" name="kategori" style="border-color: #2F80ED; background-color: #E0E9F4">
                    <!-- Options will be dynamically populated using JavaScript -->
                </select>

                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="text" name="name" id="name" placeholder="Name of Income" required
                    style="border-color: #2F80ED; background-color: #E0E9F4">
                <input type="number" name="nominal" id="nominal" placeholder="Nominal" required
                    style="border-color: #2F80ED; background-color: #E0E9F4">
                <input type="number" name="jumlah" id="jumlah" placeholder="Amount" required
                    style="border-color: #2F80ED; background-color: #E0E9F4">
                <input type="text" name="satuan" id="satuan" placeholder="Unit" required
                    style="border-color: #2F80ED; background-color: #E0E9F4">
                <input type="text" name="tanggal" id="tanggal" placeholder="Date" required
                    style="border-color: #2F80ED; background-color: #E0E9F4">
                <input type="text" name="catatan" id="catatan" placeholder="Notes" required
                    style="border-color: #2F80ED; background-color: #E0E9F4">

                <button type="submit"
                    style="background: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold">SAVE</button>
            </form>
        </div>


        <div style="margin: 20px" style="background-color: #E0E9F4">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category Type</th>
                        <th>Category</th>
                        <th>Nominal</th>
                        <th>Amount</th>
                        <th>Unit</th>
                        <th>Date</th>
                        <!-- Add more columns based on your data structure -->
                    </tr>
                </thead>
                <tbody>
                    <!-- DataTables will dynamically populate the table body -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="assets/js/autoload_form.js"></script>
</body>

</html> --}}





<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Income</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css" />
    <link rel="stylesheet" href="assets/css/dashboard2.css" />
    <link rel="stylesheet" href="assets/css/icon/icon.css">
    <link rel="stylesheet" href="assets/css/icon/tablericon.svg">
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
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
                    <a href="./dashboard" class="text-nowrap logo-img">
                        <img src="assets/images/logo/logo-dark.png" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./xxxxx.php" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./dashboard" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">Income</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./pengeluaran" aria-expanded="false">
                                <span>
                                    <i class="ti ti-alert-circle"></i>
                                </span>
                                <span class="hide-menu">Expense</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./ui-card.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-cards"></i>
                                </span>
                                <span class="hide-menu">Salary</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
                                <span>
                                    <i class="ti ti-file-description"></i>
                                </span>
                                <span class="hide-menu">Profit</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="./ui-typography.html" aria-expanded="false">
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
                                <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/"
                                    target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Subscribe Now</a>
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
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <div>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-primary"
                                        style="font-size: 12px;  background: #2D36A1; color: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer;">Logout</button>
                                </form>
                            </div>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->

            <div class="container-fluid">
                <div class="card w-100 h-100 position-relative overflow-hidden">
                    <div class="card-body" style="background-color: #CEDCEE">
                        <div style="display: flex; justify-content: flex-start">
                            <div class="col-md-4">
                                <h5 class="card-title fw-semibold mb-4">Income Patterns</h5>
                                <div class="card">
                                    <div class="card-body">
                                        <table>
                                            @foreach ($kategories_sum as $item)
                                                <tr>
                                                    <td>
                                                        <h5 class="card-title">{{ $item['kategori'] }}</h5>
                                                    </td>
                                                    <td>
                                                        <h6 class="card-subtitle mb-2 text-muted">{{ $item['total_category'] }}</h6>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: flex-end">
                            <form method="post" action="" class="form" style="text-align: center">
                                <h2 style="font-weight: bold; padding: 20px">Input New Income</h2>
                                @csrf
                                <input type="hidden" name="jenis" value="pendapatan">

                                <select id="kategori" name="kategori"
                                    style="border-color: #2F80ED; background-color: #E0E9F4">
                                    <!-- Options will be dynamically populated using JavaScript -->
                                </select>

                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <input type="text" name="name" id="name" placeholder="Name of Income"
                                    required style="border-color: #2F80ED; background-color: #E0E9F4">
                                <input type="number" name="nominal" id="nominal" placeholder="Nominal" required
                                    style="border-color: #2F80ED; background-color: #E0E9F4">
                                <input type="number" name="jumlah" id="jumlah" placeholder="Amount" required
                                    style="border-color: #2F80ED; background-color: #E0E9F4">
                                <input type="text" name="satuan" id="satuan" placeholder="Unit" required
                                    style="border-color: #2F80ED; background-color: #E0E9F4">
                                <input type="text" name="tanggal" id="tanggal" placeholder="Date" required
                                    style="border-color: #2F80ED; background-color: #E0E9F4">
                                <input type="text" name="catatan" id="catatan" placeholder="Notes" required
                                    style="border-color: #2F80ED; background-color: #E0E9F4">

                                <button type="submit"
                                    style="background: white; padding: 8px 12px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold">SAVE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="assets/js/autoload_form.js"></script>
</body>

</html>
