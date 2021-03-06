<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossOrigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>BalaiTani</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans');

        * {
            font-family: "Open Sans", sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-weight: bolder;
        }

        .page-item.active .page-link {
            color: #ffff;
            background-color: #198754;
            border-color: #198754;
        }

        .page-link {
            color: #198754;
        }

        .navbar {
            background: rgb(4, 73, 4);
            background: linear-gradient(50deg, rgba(4, 73, 4, 1) 0%, rgba(74, 131, 15, 1) 31%, rgba(0, 162, 181, 1) 100%);
            border-radius: 0 0 15px 15px;
            position: fixed;
            width: 100%;
            z-index: 999;
            top: 0;
        }

        footer {
            background: rgb(4, 73, 4);
            background: linear-gradient(50deg, rgba(4, 73, 4, 1) 0%, rgba(74, 131, 15, 1) 31%, rgba(0, 162, 181, 1) 100%);
            border-radius: 15px 15px 0 0;
        }

        .search {
            background-color: transparent !important;
            color: white !important;
        }

        .search::placeholder {
            color: white
        }

        .content {
            min-height: 100vh;
        }

        tfoot>tr>td {
            padding: 0.25rem !important;
            border: 0;
        }

        .fw-medium {
            font-weight: 600;
        }

        .banner::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://assets.bwbx.io/images/users/iqjWHBFdfxIU/iJpChCw.ofIg/v1/1200x-1.jpg');
            background-size: cover;
            filter: grayscale(100%) contrast(0.4) blur(2px) brightness(0.5);
            background-position-y: center
        }

        @media screen and (max-width: 840px) {
            .details {
                flex-direction: column;
                align-items: center;
            }

        }

    </style>
</head>

<body class="position-relative min-vh-100">
    <nav class="d-flex justify-content-between align-items-center border-bottom navbar" style="padding:0 10%">
        <div class="left-nav d-flex align-items-center">
            <a href="/">
                <img class="m-1" src="{{ url('asset/logo-white.png') }}" alt="BalaiTani" width="150">
            </a>
            <form class="form-inline d-flex p-2" method="GET" action="/search">
                <div class="input-group">
                    <input type="text" class="form-control search" placeholder="Search crops..." name="keyword">
                    <button class="btn btn-outline-light search" type="submit"><i class="fal fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="right-nav d-flex justify-content-around align-items-center ">

            @if (!Auth::check())
                <a href="/register" class="mx-2 text-white btn">Register</a>
                <a href="/login" class="mx-2 text-white btn">Login</a>
            @else
                <div class="nav-item dropdown">
                    <a class="text-white nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Welcome, <b>{{ auth()->user()->name }}</b>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="/cart">My
                                Cart <i class="fal fa-shopping-cart"></i></a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="/transactions">Transactions <i class="fal fa-file-invoice-dollar"></i></a>
                        </li>
                        @if (auth()->user()->role == 'user')
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="/register-seller">Register Seller <i class="fal fa-plus-circle"></i></a>
                            </li>
                        @elseif (auth()->user()->role == 'seller')
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="/product/add">Sell Product <i class="fal fa-plus-circle"></i></a>
                            </li>
                        @elseif (auth()->user()->role == 'admin')
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="/verify-seller">Verify Seller <i class="fal fa-plus-circle"></i></a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="/verify-transaction">Verify Transaction <i class="fal fa-plus-circle"></i></a>
                            </li>
                        @endif
                        <li>
                            <a class="dropdown-item d-flex align-items-center justify-content-between text-danger"
                                href="/logout">Logout <i class="fal fa-sign-out"></i></a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </nav>
    <div class="pt-5 content d-flex align-items-center justify-content-center">
        <div class="w-100 h-100">
            @yield('content')
        </div>
    </div>
    <footer class="w-100 border-top mt-5">
        <div class="d-flex align-items-center justify-content-center text-white">
            <p class="m-2">&copy; BalaiTani 2022</p>
        </div>
    </footer>
</body>

</html>
