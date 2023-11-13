<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Ayman Fikry" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Multi-purpose Business html5 template" />
    <title>CapcAI</title>
    <link href="assets/images/favicon/favicon.png" rel="icon" />
    <!--  Fonts ==
    -->
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CSource+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i"
        rel="stylesheet" />
    <!--  Stylesheets==
    -->
    <link href="assets/css/vendor.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />

    <!--  Slick Slider
    -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header class="header header-transparent header-sticky">
        <nav class="navbar navbar-sticky navbar-expand-lg" id="primary-menu">
            <div class="container"> <a class="logo navbar-brand" href="/"><img class="logo"
                        style="width: 120px; height:50px" src="assets/images/logo/logo-dark.png"
                        alt="Ebookyo Logo" /></a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarContent" aria-expanded="false"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarContent">

                </div>

                <!-- End Module Container  -->
            </div>
            <!-- End .nav-collapse-->
            </div>
            <!-- End .container-->
        </nav>
        <!-- End .navbar-->
    </header>

    @if ($invalid)
        {{ 'invalid' }}
    @endif

    <section class="vh-200">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img style=" height:350px; margin-left: 170px"  src="assets/images/login/picturemasmbak.png"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">

                    <form action="" method="post">
                        @csrf
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Email address</label>
                            <input type="email" name="email" id="" class="form-control form-control-lg"
                                required />
                            
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Password</label>
                            <input type="password" name="password" id="" class="form-control form-control-lg"
                                required />
                           
                        </div>

                        <div class="d-flex align-items-left mb-4">
                            <a>Don't have an account? &nbsp; </a><a href="register"> Register</a>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>



                    </form>
                </div>
            </div>
        </div>
    </section>

    
</body>

</html>
