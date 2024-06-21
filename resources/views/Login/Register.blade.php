@extends('Login.Template.app')
@section('title')
    Register
@endsection
@section('content')
    <div class="vh-100 d-flex">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <form action="{{route('login.register.send')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_handphone" class="form-label">No Handphone</label>
                                <input type="tel" name="no_handphone" class="form-control" id="no_handphone" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" min="8" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
