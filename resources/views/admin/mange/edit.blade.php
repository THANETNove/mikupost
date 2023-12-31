@extends('layouts.admin.appAdmin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">เเก้ไข มังงะ</h1>



    <div class="col-lg-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="" class="text-decoration-none">
                    <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-laugh-wink"></i> &nbsp; มังงะ
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
                                                action="{{ route('update-manga',$data[0]->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <input id="cover_photo" type="file"
                                                        class="form-control  @error('image') is-invalid @enderror"
                                                        name="image" value="{{ old('image') }}" autocomplete="image"
                                                        placeholder="ภาพปกมังงะ" autofocus>

                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }} jpg,png,jpeg,webp</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">

                                                    <textarea
                                                        class="form-control  @error('manga_name') is-invalid @enderror"
                                                        name="manga_name" id="manga_name" placeholder="ชื่อมังงะ"
                                                        required rows="3">{{$data[0]->manga_name}}</textarea>
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
                                                        rows="3">{{$data[0]->manga_details}}</textarea>

                                                    @error('manga_details')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input id="author" type="text"
                                                        class="form-control form-control-user @error('author') is-invalid @enderror"
                                                        name="author" value="{{ $data[0]->author }}"
                                                        autocomplete="author" placeholder="ผู้เขียน" autofocus>

                                                    @error('author')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <input id="artist" type="text"
                                                        class="form-control form-control-user @error('artist') is-invalid @enderror"
                                                        name="artist" value="{{ $data[0]->artist }}"
                                                        autocomplete="artist" placeholder="ศิลปิน" autofocus>

                                                    @error('artist')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <input id="status" type="text"
                                                        class="form-control form-control-user @error('status') is-invalid @enderror"
                                                        name="status" value="{{ $data[0]->status }}"
                                                        autocomplete="status" placeholder="สถานะ" autofocus>

                                                    @error('status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <select
                                                        class="form-control @error('categories_id') is-invalid @enderror"
                                                        id="categories_id" name="categories_id[]" size="10"
                                                        aria-label="size 10 select example" multiple>
                                                        @foreach ($data_cat as $data_ca)
                                                        @php
                                                        $selectedOptions = json_decode($data[0]->categories_id);
                                                        $isSelected = in_array($data_ca->id, $selectedOptions);
                                                        @endphp

                                                        <option value="{{ $data_ca->id }}"
                                                            {{ $isSelected ? 'selected' : '' }}>
                                                            {{ $data_ca->categories_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>



                                                    @error('categories_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <input id="website" type="text"
                                                        class="form-control form-control-user @error('website') is-invalid @enderror"
                                                        name="website" value="{{ $data[0]->website }}"
                                                        autocomplete="website" placeholder="url Website" autofocus>

                                                    @error('website')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>


                                                <div id="progressBar" style="display: none;">

                                                    <div class="spinner-grow text-primary" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                    <div class="spinner-grow text-secondary" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                    <div class="spinner-grow text-success" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                    <div class="spinner-grow text-danger" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                    <div class="spinner-grow text-warning" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                    <div class="spinner-grow text-info" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                    <div class="spinner-grow text-dark" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                    <h2>กำลัง Uploading กรุณารอสักครู่</h2>
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
<style>
select option[selected="selected"] {
    background-color: red;
    color: white;
}
</style>
<script>
$(document).ready(function() {
    var formSubmitted = false; // เพิ่มตัวแปรเพื่อตรวจสอบการส่งฟอร์ม

    $('#myForm').submit(function(event) {
        if (formSubmitted) {
            event.preventDefault(); // ยกเลิกการส่งฟอร์มเมื่อถูกส่งครั้งที่สอง
            console.log('ฟอร์มถูกส่งไปแล้ว');
        } else {
            formSubmitted = true; // ตั้งค่าตัวแปรเมื่อฟอร์มถูกส่งครั้งแรก
            $('#progressBar').show();
            $('#submitBtn').prop('disabled', true);
            console.log('ส่งครั้งแรก');
        }
    });
});
</script>
@endsection