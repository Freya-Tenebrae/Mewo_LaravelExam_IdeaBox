@extends('layouts.app')
@section('content')
<div class="container my-5">
    <div class="row align-items-center rounded-3 border shadow-lg overflow-hidden">
            <div class="text-center text-lg-center">
                <br>

                <h1 class="display-4 fw-bold lh-1 mb-3">Boite à idées</h1>

                <p class="lead">
                    Bienvenue dans la Boite à idées.
                </p>

                @guest
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4 me-md-2">Connexion</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary btn-lg px-4">S'inscrire</a>
                    </div>
                @endguest
                @auth
                    <p class="lead">
                        Vous êtes connecté en tant que {{ Auth::user()->name }}.
                    </p>
                @endauth
                <br>
            </div>
    </div>
</div>
@endsection