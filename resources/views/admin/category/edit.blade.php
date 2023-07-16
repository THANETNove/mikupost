@extends('layouts.admin.appAdmin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">หมวดหมู่</h1>



    <div class="col-lg-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="" class="text-decoration-none">
                    <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-laugh-wink"></i> &nbsp; หมวดหมู่
                    </h6>
                </a>


            </div>
            <div class="card-body">
                <div class="row justify-content-center">

                    <div class="col-xl-5 col-lg-5 col-md-5">

                        <div class="my-5">
                            <div class="card-body p-0">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div>

                                            <form class="user" id="myForm" method="POST"
                                                action="{{ route('update-category',$data[0]->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <input id="category" type="text"
                                                        class="form-control form-control-user @error('category') is-invalid @enderror"
                                                        name="category" value="{{$data[0]->categories_name}}" required
                                                        autocomplete="category" placeholder="หมวดหมู่" autofocus>

                                                    @error('category')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>


                                                <button type="submit" id="submitBtn" class=" btn btn-primary
                                                    btn-user btn-block">
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