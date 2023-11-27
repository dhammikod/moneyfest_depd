<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CapcAI Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logo/.png" />
    <link rel="stylesheet" href="assets/css/dashboard.css" />
    <link rel="stylesheet" href="../assets/css/dashboard2.css" />
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
                            <a class="sidebar-link" href="./ui-forms.html" aria-expanded="false">
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
            <div class="container-fluid">
                <!--  Row 1 -->
                <div class="row">
                    <div class="col-lg-8 d-flex align-items-strech">
                        <div class="card w-100">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                                    <div class="mb-3 mb-sm-0">
                                        <h5 class="card-title fw-semibold">Revenue Overview</h5>
                                    </div>
                                    <div>
                                        <select id="month_select" class="form-select">

                                        </select>
                                        <select id="quartil_select" class="form-select">
                                            <option value="1">Q1</option>
                                            <option value="2">Q2</option>
                                            <option value="3">Q3</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Yearly Breakup -->
                                <div class="card overflow-hidden">
                                    <div class="card-body p-4">
                                        <h5 class="card-title mb-9 fw-semibold">Income</h5>
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h4 id="income_value" class="fw-semibold mb-3"></h4>
                                                <div id='income_logo' class="d-flex align-items-center mb-3">
                                                </div>
                                                <div id="income_year" class="d-flex align-items-center">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="d-flex justify-content-center">
                                                    <div id="breakup"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Yearly Breakup -->
                                <div class="card overflow-hidden">
                                    <div class="card-body p-4">
                                        <h5 class="card-title mb-9 fw-semibold">Expenses</h5>
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h4 id="expense_value" class="fw-semibold mb-3">$40,358</h4>
                                                <div id="expense_logo" class="d-flex align-items-center mb-3">
                                                    {{-- <span
                                                        class="me-1 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-arrow-down-left text-danger"></i>
                                                    </span> --}}
                                                    {{-- <p id='expense_percentage' class="text-dark me-1 fs-3 mb-0">-9%</p>
                                                    <p class="fs-3 mb-0">last year</p> --}}
                                                </div>
                                                <div id="expense_year" class="d-flex align-items-center">
                                                    {{-- <div class="me-4">
                                                        <span
                                                            class="round-8 bg-danger rounded-circle me-2 d-inline-block"></span>
                                                        <span class="fs-2">2023</span>
                                                    </div>
                                                    <div>
                                                        <span
                                                            class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                                                        <span class="fs-2">2023</span>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="d-flex justify-content-center">
                                                    <div id="breakups"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <div class="mb-4">
                                    <h5 class="card-title fw-semibold">Recent Transactions</h5>
                                </div>
                                <ul class="timeline-widget mb-0 position-relative mb-n5">
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">09:30</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1">Payment received from John Doe
                                            of $385.90</div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">10:00 am</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded
                                            <a href="javascript:void(0)"
                                                class="text-primary d-block fw-normal">#ML-3467</a>
                                        </div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1">Payment was made of $64.95 to
                                            Michael</div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded
                                            <a href="javascript:void(0)"
                                                class="text-primary d-block fw-normal">#ML-3467</a>
                                        </div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                                            <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New arrival
                                            recorded
                                        </div>
                                    </li>
                                    <li class="timeline-item d-flex position-relative overflow-hidden">
                                        <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
                                        <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                            <span
                                                class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                                        </div>
                                        <div class="timeline-desc fs-3 text-dark mt-n1">Payment Done</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <h5 class="card-title fw-semibold mb-4">Recent Transactions</h5>
                                <div class="table-responsive">
                                    <table class="table text-nowrap mb-0 align-middle">
                                        <thead class="text-dark fs-4">
                                            <tr>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">No</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Nama</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Catatan</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Jenis</h6>
                                                </th>
                                                <th class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">Total</h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $a = 1;
                                            @endphp
                                            @foreach ($transactions as $item)
                                                <tr>
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0">{{$a}}</h6>
                                                    </td>
                                                    @php
                                                        $a++;
                                                    @endphp
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-1">{{$item['nama']}}</h6>
                                                    </td>
                                                    <td class="border-bottom-0">
                                                        <p class="mb-0 fw-normal">{{$item['catatan']}}</p>
                                                    </td>
                                                    @if ($item['kategori'] == 'pengeluaran')
                                                    <td class="border-bottom-0">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <span
                                                                class="badge bg-danger rounded-3 fw-semibold">{{$item['kategori']}}</span>
                                                        </div>
                                                    </td>
                                                    @endif

                                                    @if ($item['kategori'] == 'pendapatan')
                                                    <td class="border-bottom-0">
                                                        <div class="d-flex align-items-center gap-2">
                                                            <span
                                                                class="badge bg-primary rounded-3 fw-semibold">{{$item['kategori']}}</span>
                                                        </div>
                                                    </td>
                                                    @endif
                                                    
                                                    <td class="border-bottom-0">
                                                        <h6 class="fw-semibold mb-0 fs-4">{{$item['nominal']*$item['jumlah']}}</h6>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{-- <tr>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">4</h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">Nirav Joshi</h6>
                                                    <span class="fw-normal">Frontend Engineer</span>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <p class="mb-0 fw-normal">Hosting Press HTML</p>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <span
                                                            class="badge bg-success rounded-3 fw-semibold">Critical</span>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0 fs-4">$2.4k</h6>
                                                </td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>
