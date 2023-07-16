@extends('layouts.admin.appAdmin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">หมวดหมู่</h1>



    <div class="col-lg-12">
        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{url('/create-category')}}" class="text-decoration-none">
                    <h6 class="m-0 font-weight-bold text-primary"> <i class="fa-solid fa-plus"></i> &nbsp; เพิ่มหมวดหมู่
                        มังงะ
                    </h6>
                </a>

                <!--  @if (isset($message))
                <p class="text-primary">{{ $message }}</p>
                @endif
                @if (request()->has('errorResponse'))
                <p class="text-danger">{{ request()->input('errorResponse') }}</p>
                @endif -->
                @if (session('message'))
                <p class="text-primary">{{ session('message') }}</p>
                @endif
                @if (session('messageDelete'))
                <p class="text-red">{{ session('messageDelete') }}</p>
                @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">หมวดหมู่</th>

                                <th scope="col">Edit</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($data as $dataCategory)

                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$dataCategory->categories_name}}</td>

                                <td>
                                    <a href="{{ url('edit-category', $dataCategory->id) }}"
                                        class="view-mange text-decoration-none" data-toggle="tooltip"
                                        data-original-title="Edit user" class="text-decoration-none">
                                        Edit
                                    </a>
                                </td>
                                <td> <a href="{{ route('delete-category', $dataCategory->id) }}"
                                        onClick="javascript:return confirm('คุณต้องการลบ  {{$dataCategory->categories_name}} ข้อมูลใช่หรือไม่ ! ');"
                                        class="view-mange text-red  text-decoration-none" data-toggle="tooltip"
                                        data-original-title="Edit episode">
                                        delete
                                    </a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="margin-left: 1%">
                <!-- 
                {!! $data->links() !!} -->

            </div>
        </div>


    </div>

</div>
@endsection