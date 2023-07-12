@extends('layouts.admin.appAdmin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">มังงะ</h1>



    <div class="col-lg-12">
        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="" class="text-decoration-none">
                    <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-laugh-wink"></i> &nbsp; มังงะ
                    </h6>
                </a>

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

                                            <form class="user" method="POST" action="{{ url('add-manga') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input id="cover_photo" type="file"
                                                        class="form-control  @error('cover_photo') is-invalid @enderror"
                                                        name="image" value="{{ old('cover_photo') }}"
                                                        autocomplete="cover_photo" placeholder="ภาพปกมังงะ" autofocus>

                                                    @error('cover_photo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <textarea
                                                        class="form-control  @error('manga_name') is-invalid @enderror"
                                                        value="{{ old('manga_name') }}" name="manga_name"
                                                        placeholder="ชื่อมังงะ" id="exampleFormControlTextarea1"
                                                        rows="3"></textarea>
                                                    @error('manga_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <textarea
                                                        class="form-control  @error('manga_details') is-invalid @enderror"
                                                        name="manga_details" value="{{ old('manga_details') }}"
                                                        placeholder="รายละเอียด" id="exampleFormControlTextarea1"
                                                        rows="3"></textarea>

                                                    @error('manga_details')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input id="author" type="text"
                                                        class="form-control form-control-user @error('author') is-invalid @enderror"
                                                        name="author" value="{{ old('author') }}" autocomplete="author"
                                                        placeholder="ผู้เขียน" autofocus>

                                                    @error('author')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <input id="status" type="text"
                                                        class="form-control form-control-user @error('status') is-invalid @enderror"
                                                        name="status" value="{{ old('status') }}" autocomplete="status"
                                                        placeholder="สถานะ" autofocus>

                                                    @error('status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input id="website" type="text"
                                                        class="form-control form-control-user @error('website') is-invalid @enderror"
                                                        name="website" value="{{ old('website') }}"
                                                        autocomplete="website" placeholder="url Website" autofocus>

                                                    @error('website')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input id="file" type="file"
                                                        class="form-control @error('file') is-invalid @enderror"
                                                        name="zip_file" value="{{ old('file') }}" autocomplete="file"
                                                        placeholder="file" autofocus>

                                                    @error('file')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                                    {{ __('บันทึก') }}
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