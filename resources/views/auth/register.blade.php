@extends('layouts.admin.appAdminLogin')

@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-5 col-lg-5 col-md-5 mt-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!--  <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <a href="{{url('/')}}" class="text-decoration-none">
                                        <h1 class="h4 text-gray-900 mb-4">mikupost</h1>
                                    </a>
                                </div>
                                <form class="user" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="username" type="text"
                                            class="form-control form-control-user @error('username') is-invalid @enderror"
                                            name="username" value="{{ old('username') }}" required
                                            autocomplete="username" placeholder="username" autofocus>

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="email"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required placeholder="email"
                                            autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password"
                                            class="form-control  form-control-user @error('password') is-invalid @enderror"
                                            name="password" placeholder="password" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password-confirm" type="password"
                                            class="form-control form-control-user" name="password_confirmation" required
                                            placeholder="Confirm Password" autocomplete="new-password">
                                    </div>
                                    <div class="form-group" style="display:none">
                                        <input id="password-confirm " type="text" class="form-control form-control-user"
                                            name="status" value="0" autocomplete="status">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('Register') }}
                                    </button>
                                    <hr>
                                    <a href="{{url('/')}}" class="btn btn-google btn-user btn-block">
                                        <i class="fa-solid fa-house"></i></i> Go Back !
                                    </a>
                                    <a href="{{ route('login') }}" class="btn btn-facebook btn-user btn-block">
                                        <i class="fa-solid fa-right-to-bracket"></i> Login
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection