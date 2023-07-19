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
                            {{substr($dataViews[0]->manga_name, 0, 70)}}

                        <div class="row">
                            <hr>
                            <div class="col-6">
                                <div class="row detail-box">
                                    <p class="title-cover-p">Author </p>
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
                        <?php
                            $data = DB::table('categories')
                            ->whereIn('id', json_decode($dataViews[0]->categories_id))
                            ->orderBy('id', 'ASC')
                            ->get();
                        ?>
                        @if(isset($data))
                        @foreach ($data as $data_cat)
                        <a href="{{url('search-categories',$data_cat->id)}}" class="">
                            <div class="manga-category-cover">
                                {{$data_cat->categories_name}}
                            </div>
                        </a>

                        @endforeach
                        @endif

                    </div>

                    <!--     <div class="show-cover-tables">
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
                            @foreach ($dataViews->sortBy('episodeId') as $data)
                            <a href="{{url('manga-chapter',[$data->mangesId, $data->episodeId])}}">
                                <div class="change-box">
                                    <p class="chapter-span"><span class="chapter-p">Ch.{{$data->episodeId}} </span>-

                                        {{ $data->episode_name ? (substr($data->episode_name, 0, 40)) : (substr($data->manga_name, 0, 40)) }}
                                    </p>
                                    <div class="row chapter-p-by">
                                        <p><span class="chapter-by">By</span> {{$data->author}}</p>
                                        <p><span class="chapter-by">on</span> 2 days ago</p>
                                    </div>
                                </div>
                            </a>
                            @endforeach



                        </div>
                    </div> -->

                    <div class="show-cover-tables">
                        <div class="row chapter-manga">
                            <p>
                                <i class="fa-solid fa-list-ol"></i>
                                Chapter List
                            </p>

                            <div class="change-git-cover" id="sort-icon-id">
                                <i id="sort-icon" class="fa-solid fa-bars-staggered"></i>
                            </div>
                        </div>
                        <div class="row chapter-change mt-4">
                            <!-- เพิ่ม id เพื่อระบุตำแหน่งของแต่ละรายการ -->
                            @php
                            $sortedDataViews = $dataViews->sortBy('episodeId');
                            $ascending = true;
                            @endphp

                            @foreach ($sortedDataViews as $data)
                            <a href="{{url('manga-chapter',[$data->mangesId, $data->episodeId])}}">
                                <div class="change-box" id="episode-{{$data->episodeId}}">
                                    <p class="chapter-span">
                                        <span class="chapter-p">Ch.{{$data->episodeId}} </span>-
                                        {{ $data->episode_name ? (substr($data->episode_name, 0, 40)) : (substr($data->manga_name, 0, 40)) }}
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
                                กดปุ่ม Copy to clipboard แล้ววาง (Paste) ในช่อง Chatbox ได้เลยครับ แก้ไข Wording จาก
                                ...
                                เป็นข้อความที่ต้องการได้เลย (แอดลองไล่ Code ของตัว Comment แล้วถ้า Custom button
                                ประเมินแล้วน่าจะใช้เวลามากพอควร รบกวนใช้วิธีนี้ไปก่อนนะครับ) ตัวอย่างจากแอดนีโอ
                            </span>
                        </p>
                    </div>
                    <div class="box-contributor-ch">
                        <div class="mt-3 box-contributor-rules">
                            <p class="comment-rules">Comment</p>
                            <form class="user" id="myForm" method="POST" action="{{ route('add-comment') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3" style="display: none;">
                                    <input id="author" type="text"
                                        class="form-control form-control-user @error('id_comment') is-invalid @enderror"
                                        name="id_comment" value="{{ $dataViews[0]->mangesId}}" autocomplete="author"
                                        placeholder="id_comment" autofocus>

                                </div>
                                <div class="mb-3">
                                    <textarea class="form-control form-control-com" id="exampleFormControlTextarea1"
                                        placeholder="Your Comment  here..." rows="4" name="comment" required></textarea>
                                </div>
                                @guest
                                <a href="{{ route('login') }}">
                                    <div class="sing-comment">
                                        Sing in
                                    </div>
                                </a>
                                @else

                                <button type="submit" class="sing-comment">
                                    {{ __(' Comment') }}
                                </button>
                                @endguest
                            </form>
                            <div class="ml-3 mt-4">
                                @foreach ($commentData as $commentAll)
                                <div>
                                    <div class="row">
                                        <div class="service-image-icon">

                                            <?php 
                                            if ($commentAll->image_user) {
                                                # code... FTP_URL_IMAGES_PROFILE
                                                $imagePath = env('FTP_URL_IMAGES_PROFILE').$commentAll->image_user;
                                                $image = Storage::disk('ftp')->url($imagePath);
                                            }else {
                                                $image = URL::asset('assets/icon/avatar_81874.jpeg');
                                            }
                                            ?>
                                            <img src="{{$image}}" class="icon-comment" alt="">
                                        </div>
                                        <p class="comment-user-name">{{$commentAll->username}}</p>
                                    </div>
                                    <div class="comments-all">
                                        <p class="comment-time"> {{$commentAll->created_at}}</p>
                                        <p class="comment-user ">
                                            {{$commentAll->comment}}
                                        </p>
                                    </div>
                                </div>
                                @endforeach


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
.chapter-change.ascending .change-box {
    order: 1;
}

.chapter-change.descending .change-box {
    order: -1;
}
</style>

<script>
var sortIcon = document.getElementById('sort-icon-id');
var chapterChange = document.querySelector('.chapter-change');

sortIcon.addEventListener('click', function() {
    var episodes = Array.from(chapterChange.querySelectorAll('.change-box'));

    if (chapterChange.classList.contains('ascending')) {
        chapterChange.classList.remove('ascending');
        chapterChange.classList.add('descending');
        episodes.sort(function(a, b) {
            return b.compareDocumentPosition(a) & Node.DOCUMENT_POSITION_PRECEDING ? -1 : 1;
        });
    } else {
        chapterChange.classList.remove('descending');
        chapterChange.classList.add('ascending');
        episodes.sort(function(a, b) {
            return a.compareDocumentPosition(b) & Node.DOCUMENT_POSITION_PRECEDING ? -1 : 1;
        });
    }

    episodes.forEach(function(episode) {
        chapterChange.appendChild(episode.parentNode);
    });
});
</script>








@endsection