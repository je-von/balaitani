<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>BalaiTani</title>
</head>

<body class="position-relative min-vh-100">
    <nav class="d-flex justify-content-between border-bottom" style="padding:0 10%">
        <div class="left-nav d-flex ">
            <a href="/">
                <h1>BalaiTani</h1>
            </a>
            <form class="form-inline d-flex p-2" action="/search">
                <input class="form-control mr-sm-2 mx-4" type="search" placeholder="Search" aria-label="Search" name="title">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <div class="right-nav d-flex justify-content-around align-items-center">
            @if(!Auth::check())
            <a href="/register" class="mx-2"><button type="button" class="btn btn-success">Register</button></a>
            <a href="/login" class="mx-2"><button type="button" class="btn btn-success">Login</button></a>
            @else
            <a href="/logout" class="mx-2"><button type="button" class="btn btn-danger">Logout</button></a>
            @endif
        </div>
    </nav>
    <div>
        @yield('content')
    </div>
    <footer class="position-absolute bottom-0 w-100 border-top ">
        <div class="m-3 d-flex align-items-end">
            <h1>BalaiTani</h1>
            <p>&copy; BalaiTani. 2022</p>
        </div>
    </footer>
</body>

</html>