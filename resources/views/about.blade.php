@extends('layouts.layout')
@section('content')
    <style>
        .logo {
            width: 20vw
        }

        @media screen and (max-width: 840px) {
            .logo {
                width: 50vw
            }
        }

    </style>
    <div class="d-flex align-items-center flex-column container py-5">
        <img class="logo py-3" src="{{ url('asset/logo-black.png') }}" alt="BalaiTani">
        <div class="details d-flex p-3">
            <img src="asset/petani.png" alt="" style="width: 40vw; border-radius: 12px">
            <div class="px-4">
                <p class="h5" style="text-align: justify"><b>BalaiTani</b> is an application that connects
                    farmers with end consumers
                    directly. <b>BalaiTani</b>
                    does not sell any products directly and only farmers are allowed to sell here. <b>BalaiTani</b> does not
                    take any profit from the farmers (100% of the profits from the product sold are given to the farmers).
                    <b>BalaiTani</b> was
                    initiated by Beni, Jevon, and Louis.</p>
                <h5 class="pt-3">Vision :</h5>
                <ol>
                    <li>Welfare of farmers in Indonesia</li>
                    <li>Stabilizing food prices in Indonesia.</li>
                </ol>
                <h5>Mission :</h5>
                <ol>
                    <li>Meet customer expectations on application quality, especially on user experience aspects.</li>
                    <li>Marketing products so that farmers want to sell on our application.</li>
                    <li>Guiding farmers or consumers for those who are clueless to adapt to the internet.</li>
                </ol>

            </div>
        </div>
        <p>Social Media : <i>Coming Soon</i> </p>
    </div>
@endsection
