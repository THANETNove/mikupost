@extends('layouts.admin.appAdmin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">รายชื่อมังงะ</h1>



    <div class="col-lg-12">
        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{url('/create-manga')}}" class="text-decoration-none">
                    <h6 class="m-0 font-weight-bold text-primary"> <i class="fa-solid fa-plus"></i> &nbsp; อัพโหลด มังงะ
                    </h6>
                </a>
                @if (session('message'))
                <p class="text-primary">{{ session('message') }}</p>
                @endif
                @if (session('errorResponse'))
                <p class="text-red">{{ session('errorResponse') }}</p>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ภาพปกมังงะ</th>
                                <th scope="col">ชื่อเรื่อง</th>
                                <th scope="col">ยอดดู</th>
                                <th scope="col">update</th>
                                <th scope="col">ดูเพิ่มเติม</th>
                                <th scope="col">Edit</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($data as $dataMange)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$dataMange->cover_photo}} </td>
                                <td>{{$dataMange->manga_name}} </td>
                                <td>{{$dataMange->views}} </td>
                                <td>{{$dataMange->updated_at}} </td>
                                <td>ดูเพิ่มเติม</td>
                                <td>Edit</td>
                                <td>delete</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="margin-left: 1%">

                {!! $data->links() !!}

            </div>
        </div>


    </div>

</div>
@endsection