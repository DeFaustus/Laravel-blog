@extends('login.template_login')
@section('login')
    <br><br>
    <div class="container my-5">
        {{-- <section class="vh-100"> --}}
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="/auth/store" method="POST">
                        @csrf
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Nama :</label>
                            <input type="text" name="name" id="form3Example3"
                                class="form-control form-control-lg @error('name') is-invalid @enderror" placeholder=""
                                value="{{ old('name') }}" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Email address :</label>
                            <input type="text" name="email" id="form3Example3"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                placeholder="Enter a valid email address" value="{{ old('email') }}" />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Password : </label>
                            <input type="password" id="form3Example4" name="password"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                placeholder="Enter password" />
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Konfirmasi Password : </label>
                            <input type="password" id="form3Example4" name="password_confirmation"
                                class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                placeholder="Enter password" />
                            @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="text-center text-lg-start mt-4 pt-2 mb-4">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Sudah Punya Akun ? <a href="/auth/login"
                                    class="link-danger">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © 2020. All rights reserved.
            </div>
        </div>
        {{-- </section> --}}
    </div>
@endsection
