@extends('layouts.admin.appAdmin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">มังงะ</h1>



    <div class="col-lg-12">
        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{url('/create-episodes',$dataViews[0]->id)}}" class="text-decoration-none">
                    <h6 class="m-0 font-weight-bold text-primary"> <i class="fa-solid fa-plus"></i> &nbsp; เพิ่ม ตอน
                    </h6>
                </a>


            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <?php
                                $imagePath = env('FTP_URL_IMAGES_COVER').$dataViews[0]->cover_photo;
                                $imageUrl = Storage::disk('ftp')->url($imagePath);
                             
                                ?>
                            <img src="{{ $imageUrl }}" class="w-100" calt="Manga Cover">
                        </div>
                        <div class="col-8 row">
                            <div>
                                <h2>มังงะเรื่อง</h2>
                                <p>{{ $dataViews[0]->manga_name}}</p>
                            </div>
                            <div>
                                <h2>รายละเอียด</h2>
                                <p>{{ $dataViews[0]->manga_details}}</p>
                            </div>
                            <div class="row">
                                <div class="col-4 d-flex justify-content-between">
                                    <p class="font-weight-bolder">Author</p>
                                    <p>{{$dataViews[0]->author}}</p>
                                </div>
                                <div class="col-4  d-flex justify-content-between">
                                    <p class="font-weight-bolder">Status</p>
                                    <p>{{$dataViews[0]->status}}</p>
                                </div>
                                <div class="col-4  d-flex justify-content-between">
                                    <p class="font-weight-bolder">views</p>
                                    <p>{{$dataViews[0]->mangas_views}}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-4 d-flex justify-content-between">
                                    <p class="font-weight-bolder">updated_at</p>
                                    <p><?php echo \Carbon\Carbon::parse($dataViews[0]->mangas_updated_at)->format('d/m/Y'); ?>
                                    </p>
                                </div>
                                <div class="col-8 d-flex justify-content-between">
                                    <p class="font-weight-bolder">website</p>
                                    <p><a href="{{$dataViews[0]->website}}" target="_blank" class="text-decoration-none"
                                            rel="noopener noreferrer">{{$dataViews[0]->website}}</a></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ตอน</th>
                                <th scope="col">ชื่อตอน</th>
                                <th scope="col">ยอดดู</th>
                                <th scope="col">update</th>
                                <th scope="col">จำนวนตอน</th>
                                <th scope="col">Edit</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($dataViews as $data)
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$data->episodeId}} </td>
                                <td>{{$data->episode_name}} </td>
                                <td>{{$data->view}} </td>
                                <td> <?php echo \Carbon\Carbon::parse($data->updated_at)->format('d/m/Y'); ?>
                                </td>
                                <td></td>
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

                {!! $dataViews->links() !!}
            </div>
        </div>


    </div>

</div>
@endsection