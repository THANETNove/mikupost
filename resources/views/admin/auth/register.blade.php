@extends('layouts.admin.appAdmin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">เพิ่ม Admin</h1>



    <div class="col-lg-12">
        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> <i class="fa-solid fa-users"></i> &nbsp;
                    Admin
                </h6>
            </div>
            <div class="card-body">
                <!-- Outer Row -->
                <div class="row justify-content-center">

                    <div class="col-xl-5 col-lg-5 col-md-5">

                        <div class="my-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <!--  <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                                    <div class="col-lg-12">
                                        <div>

                                            <form class="user" method="POST" action="{{ url('create-admin') }}">
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
                                                        name="email" value="{{ old('email') }}" required
                                                        placeholder="email" autocomplete="email">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input id="password" type="password"
                                                        class="form-control  form-control-user @error('password') is-invalid @enderror"
                                                        name="password" placeholder="password" required
                                                        autocomplete="new-password">
                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input id="password-confirm" type="password"
                                                        class="form-control form-control-user"
                                                        name="password_confirmation" required
                                                        placeholder="Confirm Password" autocomplete="new-password">
                                                </div>
                                                <div class="form-group" style="display:none">
                                                    <input id="password-confirm " type="text"
                                                        class="form-control form-control-user" name="status" value="1"
                                                        autocomplete="status">
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    {{ __('Register') }}
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


    </div>

</div>

@endsection