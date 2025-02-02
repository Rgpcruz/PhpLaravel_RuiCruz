@extends('layouts.fo_layout')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">User Details</h2>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Adress</th>
                        <th scope="col">Password</th>
                        <th scope="col">NIF</th>x
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->nif }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
