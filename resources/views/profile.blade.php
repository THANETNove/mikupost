@extends('layouts.admin.appAdmin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">รายชื่อมังงะ</h1>



    <div class="col-lg-12">
        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-body row">

                <div class="container">
                    <div class="row">
                        <div class="col-4 service-image-icon">
                            <?php 
                       
                       if (count($affected) > 0 && $affected[0]->image_user) {
                               # code... FTP_URL_IMAGES_PROFILE
                            $imagePath = env('FTP_URL_IMAGES_PROFILE').$affected[0]->image_user;
                            $image = Storage::disk('ftp')->url($imagePath);
                      }else {
                             $image = URL::asset('assets/icon/avatar_81874.jpeg');
                              }
                  ?>
                            <img src="{{$image}}" class="icon-comment  col-12" alt=""
                                style="width: 400px; height: 350px;">
                        </div>
                        <div class="col-8">
                            @if (session('message'))
                            <p class="text-primary">{{ session('message') }}</p>
                            @endif
                            <h4>
                                ชื่อ: {{ Auth::user()->username }}
                            </h4>
                            <h4>
                                email: {{ Auth::user()->email }}
                            </h4>
                            <div class="col-6">
                                <form class="user" id="myForm" method="POST" action="{{ route('add-image-profile') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 mt-5">
                                        <label for="exampleFormControlInput1" class="form-label">เปลี่ยนรูปภาพ</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            name="image" id="exampleFormControlInput1" required
                                            placeholder="name@example.com">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }} jpg,png,jpeg,webp</strong>
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
@endsection