@extends('layouts.user.appWelcome')
@section('content')
<div class="box-top">
    <div class="untree_co-section" id="home-section">
        <div class="containerNav-body">
            <div class="row  mt-5">
                <div class="col-md-3 col-lg-2">
                    <div class="show-cover-page">
                        <?php
                                $imagePath = env('FTP_URL_IMAGES_COVER').$dataViews[0]->cover_photo;
                                $imageUrl = Storage::disk('ftp')->url($imagePath);
                             
                                ?>
                        <img src=" {{$imageUrl}}" class="show-cover-image" alt="">
                    </div>
                </div>
                <div class="col-md-6  col-lg-6 mb-4">
                    <div class="show-cover-tables">
                        <p class="title-detail">
                            {{ $dataViews[0]->manga_name}}
                        <div class="row">
                            <hr>
                            <div class="col-6">
                                <div class="row detail-box">
                                    <p class="title-cover-p">Author</p>
                                    <p class="caption-cover-p">{{$dataViews[0]->author}}</p>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="row detail-box">
                                    <p class="title-cover-p">First Release</p>
                                    <p class="caption-cover-p">
                                        <?php echo \Carbon\Carbon::parse($dataViews[0]->created_at)->format('d-m-Y'); ?>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <hr>
                            <div class="col-6">
                                <div class="row detail-box">
                                    <p class="title-cover-p">Artist</p>
                                    <p class="caption-cover-p">{{$dataViews[0]->artist}}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row detail-box">
                                    <p class="title-cover-p">Latest Update</p>
                                    <p class="caption-cover-p">
                                        <?php echo \Carbon\Carbon::parse($dataViews[0]->updated_at)->format('d-m-Y'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <hr>
                            <div class="col-6">
                                <div class="row detail-box">
                                    <p class="title-cover-p">Status </p>
                                    <p class="caption-cover-p">{{$dataViews[0]->status}}</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="row detail-box">
                                    <p class="title-cover-p">Views</p>
                                    <p class="caption-cover-p">
                                        <?php $formattedAmount = number_format($dataViews[0]->mangas_views,0,'', ','); ?>
                                        {{ $formattedAmount}}
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <hr>
                            <div class="col-12">
                                <div class="row detail-box">
                                    <p class="title-cover-p">Website</p>
                                    <a class="caption-cover-a" target="_blank"
                                        href="{{$dataViews[0]->website}}">{{$dataViews[0]->website}}</a>

                                </div>
                            </div>
                        </div>

                        <div class="description-box">
                            <p>{{$dataViews[0]->manga_details}}</p>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="manga-category-cover">
                            Adventure
                        </div>
                        <div class="manga-category-cover">
                            Gender Blender
                        </div>
                        <div class="manga-category-cover">
                            Comedy
                        </div>
                        <div class="manga-category-cover">
                            Second Life
                        </div>
                        <div class="manga-category-cover">
                            One Shot
                        </div>
                    </div>

                    <div class="show-cover-tables">
                        <div class="row chapter-manga">
                            <p>
                                <i class="fa-solid fa-list-ol"></i>
                                Chapter List
                            </p>

                            <div class="change-git-cover">
                                <i class="fa-solid fa-bars-staggered"></i>
                            </div>
                        </div>
                        <div class="row chapter-change mt-4">
                            @foreach ($dataViews as $data)
                            <a href="{{url('manga-chapter/122')}}">
                                <div class="change-box">
                                    <p class="chapter-span"><span class="chapter-p">Ch.{{$data->episodeId}} </span>-

                                        {{ $data->episode_name ? (substr($data->episode_name, 0, 30)) : (substr($data->manga_name, 0, 30)) }}
                                    </p>
                                    <div class="row chapter-p-by">
                                        <p><span class="chapter-by">By</span> {{$data->author}}</p>
                                        <p><span class="chapter-by">on</span> 2 days ago</p>
                                    </div>
                                </div>
                            </a>
                            @endforeach


                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-lg-3 order-lg-2 js-custom-dots">
                    <div class="box-contributor">
                        <p class="contributor-p"> Contributor</p>
                        <div class="row ml-3">
                            <div class="service-image-icon">
                                <img src="{{URL::asset('assets/icon/avatar_81874.jpeg')}}" class="image-icon" alt="">
                            </div>
                            <p class="contributor-name ">
                                ขอเราแปลนะ
                            </p>
                        </div>
                    </div>
                    <div class="mt-3 box-contributor-rules">
                        <p class="comment-rules">Comment Rules
                            <br>
                            <span class="comment-rules2">
                                &nbsp;&nbsp;- ขอความร่วมมือในการใช้ภาษาสุภาพ <br>
                                &nbsp;&nbsp;- ไม่แปะ Link เว็บภายนอก <br>
                                &nbsp;&nbsp;- Spoiled ด้วยวิธีการด้านล่างเท่านั้น <br>
                                หากพบเห็นการ Comment ที่ไม่เหมาะสม ทางแอดมินจะทำการแบนผู้ใช้งานระดับ Account ตลอดกาล
                                ขั้นตอนการ Spoil ที่ถูกต้อง
                                กดปุ่ม Copy to clipboard แล้ววาง (Paste) ในช่อง Chatbox ได้เลยครับ แก้ไข Wording จาก ...
                                เป็นข้อความที่ต้องการได้เลย (แอดลองไล่ Code ของตัว Comment แล้วถ้า Custom button
                                ประเมินแล้วน่าจะใช้เวลามากพอควร รบกวนใช้วิธีนี้ไปก่อนนะครับ) ตัวอย่างจากแอดนีโอ
                            </span>
                        </p>
                    </div>
                    <div class="box-contributor-ch">
                        <div class="mt-3 box-contributor-rules">
                            <p class="comment-rules">Comment</p>
                            <div class="mb-3">
                                <textarea class="form-control form-control-com" id="exampleFormControlTextarea1"
                                    placeholder="Your Comment  here..." rows="4"></textarea>
                            </div>
                            @guest
                            <a href="{{ route('login') }}">
                                <div class="sing-comment">
                                    Sing in
                                </div>
                            </a>
                            @else
                            <a href="">
                                <div class="sing-comment">
                                    Comment
                                </div>
                            </a>
                            @endguest

                            <div class="ml-3 mt-4">
                                <div>
                                    <div class="row">
                                        <div class="service-image-icon">
                                            <img src="{{URL::asset('assets/icon/avatar_81874.jpeg')}}"
                                                class="icon-comment" alt="">
                                        </div>
                                        <p class="comment-user-name">P-][ne Hua Fu</p>
                                    </div>
                                    <div class="comments-all">
                                        <p class="comment-time">6/30/2023 at 10:21 AM</p>
                                        <p class="comment-user ">
                                            เหมาะจะทำเป็นเวอร์ชั่นอนิเมะมาก เป็นแนวสโลไลฟ์แบบแปลกใหม่
                                        </p>
                                        <p class="reply-comment">Reply</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="service-image-icon">
                                            <img src="{{URL::asset('assets/icon/avatar_81874.jpeg')}}"
                                                class="icon-comment" alt="">
                                        </div>
                                        <p class="comment-user-name">P-][ne Hua Fu</p>
                                    </div>
                                    <div class="comments-all">
                                        <p class="comment-time">6/30/2023 at 10:21 AM</p>
                                        <p class="comment-user ">
                                            เหมาะจะทำเป็นเวอร์ชั่นอนิเมะมาก เป็นแนวสโลไลฟ์แบบแปลกใหม่
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="service-image-icon">
                                            <img src="{{URL::asset('assets/icon/avatar_81874.jpeg')}}"
                                                class="icon-comment" alt="">
                                        </div>
                                        <p class="comment-user-name">P-][ne Hua Fu</p>
                                    </div>
                                    <div class="comments-all">
                                        <p class="comment-time">6/30/2023 at 10:21 AM</p>
                                        <p class="comment-user ">
                                            เหมาะจะทำเป็นเวอร์ชั่นอนิเมะมาก เป็นแนวสโลไลฟ์แบบแปลกใหม่
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <div class="row">
                                        <div class="service-image-icon">
                                            <img src="{{URL::asset('assets/icon/avatar_81874.jpeg')}}"
                                                class="icon-comment" alt="">
                                        </div>
                                        <p class="comment-user-name">P-][ne Hua Fu</p>
                                    </div>
                                    <div class="comments-all">
                                        <p class="comment-time">6/30/2023 at 10:21 AM</p>
                                        <p class="comment-user ">
                                            เหมาะจะทำเป็นเวอร์ชั่นอนิเมะมาก เป็นแนวสโลไลฟ์แบบแปลกใหม่
                                        </p>
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