@extends('layouts.admin.appAdmin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">เพิ่ม ตอนมังงะ</h1>



    <div class="col-lg-12">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="" class="text-decoration-none">
                    <h6 class="m-0 font-weight-bold text-primary"> <i class="fa-solid fa-arrow-left"></i> &nbsp; กลับ
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
                                                action="{{ route('add-episodes') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <textarea
                                                        class="form-control  @error('manga_name') is-invalid @enderror"
                                                        value="{{ old('manga_name') }}" name="manga_name"
                                                        id="manga_name"
                                                        placeholder="ชื่อตอนมังงะ    (* ถ้า ไม่มี ไม่ต้องใส่)"
                                                        id="exampleFormControlTextarea1" rows="3"></textarea>
                                                    @error('manga_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <input id="foldedManges" type="text"
                                                        class="form-control form-control-user @error('foldedManges') is-invalid @enderror"
                                                        name="foldedManges" autocomplete="foldedManges"
                                                        value="{{$data[0]->foldedManges}}" placeholder="foldedManges"
                                                        autofocus>
                                                </div>
                                                <div class="form-group" style="display:none">
                                                    <input id="foldedManges" type="text"
                                                        class="form-control form-control-user @error('foldedManges') is-invalid @enderror"
                                                        name="mangesId" autocomplete="foldedManges"
                                                        value="{{$data[0]->mangesId}}" placeholder="foldedManges"
                                                        autofocus>
                                                </div>
                                                <div class="form-group">
                                                    <input id="file" type="file"
                                                        class="form-control @error('zip_file') is-invalid @enderror"
                                                        name="zip_file" value="{{ old('zip_file') }}" required
                                                        autocomplete="file" placeholder="file" autofocus>

                                                    @error('zip_file')
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