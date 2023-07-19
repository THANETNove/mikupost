@extends('layouts.admin.appAdmin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">รายชื่อมังงะ</h1>



    <div class="col-lg-12">
        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User Uploads </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">username</th>
                                <th scope="col">email</th>
                                <th scope="col">สถานะ Uploads</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp

                            @foreach ($data as $user)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheck-{{$user->id}}"
                                            {{ $user->statusUploads == 1 ? 'checked' : '' }}>
                                    </div>

                                </td>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).on('change', 'input[type="checkbox"]', function() {
    var userId = $(this).attr('id').split('-')[1];
    var isChecked = $(this).prop('checked');
    console.log("isChecked", isChecked, userId);
    // ส่งค่าไปยังการอัปเดตผ่าน AJAX
    $.ajax({
        url: '{{ url("update-user-status") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            statusUploads: isChecked ? 1 : 0,
            id: userId,
        },
        success: function(response) {
            // ดำเนินการหลังจากการอัปเดตสถานะผู้ใช้
            console.log(response);
        },
        error: function(xhr, status, error) {
            // ดำเนินการในกรณีเกิดข้อผิดพลาด
            console.error(error);
        }
    });
});
</script>
@endsection