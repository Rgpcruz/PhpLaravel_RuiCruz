@extends('layouts.fo_layout')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <p class="lead text-muted">Cesae Forum - Project developed during the web development course</p>
        </div>

        <hr class="my-4">
        <br><br>
        <div class="text-center">
            <h3 class="text-secondary">Developed by Rui Cruz</h3>
        <br>
            <a href="https://github.com/Rgpcruz" target="_blank" class="btn btn-dark btn-lg">
                <i class="fab fa-github"></i> Visit GitHub Profile
            </a>
        </div>
        <br>
        <hr class="my-4">

        <div class="text-center mt-4">
            <span class="badge bg-primary p-3 fs-4">Laravel Project</span>
        </div>

        @if (session('success'))
            <div class="alert alert-success mt-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection
