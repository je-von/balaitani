<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>BalaiTani</title>
    <style>
        .page-item.active .page-link {
            color: #ffff;
            background-color: #198754;
            border-color: #198754;
        }

        .page-link {
            color: #198754;
        }

    </style>
</head>

<body class="position-relative min-vh-100">
    <nav class="d-flex justify-content-between align-items-center border-bottom" style="padding:0 10%">
        <div class="left-nav d-flex align-items-center">
            <a href="/">
                <img src="asset/logo-black.png" alt="BalaiTani" width="150">
            </a>
            <form class="form-inline d-flex p-2" method="GET" action="/search">
                <input class="form-control mr-sm-2 mx-4" type="search" placeholder="Search crops..." aria-label="Search"
                    name="keyword">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <div class="right-nav d-flex justify-content-around align-items-center ">
            @if (!Auth::check())
                <a href="/register" class="mx-2"><button type="button"
                        class="btn btn-success">Register</button></a>
                <a href="/login" class="mx-2"><button type="button" class="btn btn-success">Login</button></a>
            @else
                <div>Welcome, <b>{{ auth()->user()->name }}</b></div>
                <a href="/logout" class="mx-2"><button type="button"
                        class="btn btn-danger">Logout</button></a>
            @endif
        </div>
    </nav>
    <div>
        @yield('content')
    </div>
    <footer class="w-100 border-top mt-5">
        <div class="m-3 d-flex align-items-end">
            <p>&copy; BalaiTani 2022</p>
        </div>
    </footer>
</body>

</html>
