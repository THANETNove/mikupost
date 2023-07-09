@extends('layouts.admin.appAdmin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">รายชื่อ Admin</h1>



    <div class="col-lg-12">
        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{url('/register-admin')}}" class="text-decoration-none">
                    <h6 class="m-0 font-weight-bold text-primary"> <i class="fa-solid fa-plus"></i> &nbsp;เพิ่ม รายชื่อ
                        Admin
                    </h6>


                </a>
                @if (session('message'))
                <p class="text-primary">{{ session('message') }}</p>
                @endif
                <p class="message-all" id="copy-message"></p>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach ($data as $dataAdmin)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>
                                <p> {{$dataAdmin->username}} &nbsp; <span class="copy-btn"
                                        data-text="{{$dataAdmin->username}}">คัดลอก</span></p>
                            </td>
                            <td>
                                <p>{{$dataAdmin->pass_admin}} &nbsp;
                                    <span class="copy-btn" data-text="{{$dataAdmin->pass_admin}}">คัดลอก</span>
                                </p>
                            </td>
                            <td>
                                <a onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่ ! ');"
                                    href="{{ url('/delete-admin', $dataAdmin->id) }}" class="btn btn-danger"
                                    data-toggle="tooltip" data-original-title="delete user">
                                    delete
                                </a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>

</div>
<script>
const copyBtns = document.querySelectorAll('.copy-btn');
copyBtns.forEach(copyBtn => {
    copyBtn.addEventListener('click', () => {
        const textToCopy = copyBtn.dataset.text;
        const tempInput = document.createElement('input');
        tempInput.value = textToCopy;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand('copy');
        document.body.removeChild(tempInput);
        /*   alert('คัดลอกข้อความสำเร็จ'); */
        var paragraph = document.getElementById("copy-message");
        var text = document.createTextNode("คัดลอกข้อความสำเร็จ");
        paragraph.appendChild(text);

        // ซ่อน Alert หลังจาก 3 วินาที (3000 มิลลิวินาที)
        setTimeout(() => {
            var textNode = paragraph.firstChild;
            paragraph.removeChild(textNode);
        }, 1000);
    });
});
</script>

@endsection