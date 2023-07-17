@extends('layouts.user.appMangaChapter')
@section('content')
<div class="box-top2" id="scroll-top-ch">
    <div class="ch-image">
        <p class="ch-image-name" id="ch-image-name">{{substr($dataViews[0]->manga_name, 0, 40)}}</p>

        <p class="ch-image-time">Ch. {{$dataViews[0]->episodeId}} -
            {{ $dataViews[0]->episode_name ? (substr($dataViews[0]->episode_name, 0, 30)) : (substr($dataViews[0]->manga_name, 0, 30)) }}
        </p>
        <p id="id-ch" style="display: none;">{{$dataViews[0]->episodeId}}</p>
        <p id="id-man" style="display: none;">{{$dataViews[0]->mangesId}}</p>
        <p id="id-maxEpisodeId" style="display: none;">{{$maxEpisodeId}}</p>
        <p class="ch-image-my">{{$dataViews[0]->author}}</p>
    </div>
    <div class="image-chapter">

        <div class="row">
            <a href="#scroll-bottom-ch">
                <div class="bottom-ch-box">
                    <i class="fa-solid fa-comments"></i>
                </div>
            </a>
            <a href="#scroll-top-ch">
                <div class="top-ch-box">
                    <i class="fa-solid fa-arrow-up"></i>
                </div>
            </a>
        </div>
        <!--    <img src=" {{URL::asset('assets/image/1.webp')}}" class="chapter-width image-chapter-width-50" alt="">
        <img src=" {{URL::asset('assets/image/2.webp')}}" class="chapter-width image-chapter-width-50" alt=""> -->
        @foreach ($dataViews as $data)
        <?php
            $imagePath = env('FTP_URL_IMAGES_EPISODE').$data->episode_name_image;
            $imageUrl = Storage::disk('ftp')->url($imagePath);
        ?>
        <img src=" {{$imageUrl}}" class="chapter-width image-chapter-width-50" alt="">
        @endforeach

    </div>


    <div class="untree_co-section" id="home-section">
        <div class="containerNav-body">
            <div class="row  mt-5">
                <div class="col-lg-12">
                    <div class="row container-manga-body changeGitHead">
                        <div>
                            <h3 class="heading">Latest Comic</h3>
                            <p class="caption2"><i class="fa-solid fa-palette" style="font-size: 16px;"></i> General
                                Category</p>
                        </div>
                    </div>
                    <div class=" row container-manga-body">
                        @foreach ($dataRan as $dataRa)
                        <?php
                            $imagePath = env('FTP_URL_IMAGES_COVER').$dataRa->cover_photo;
                            $imageUrl = Storage::disk('ftp')->url($imagePath);
                        ?>
                        <a href="{{url('manga-cover-show/120')}}">
                            <div class="keyClass-service service-body-cover">
                                <div class="cover-image-page">
                                    <img src="{{$imageUrl}}" class="keyClass-cover cover-page" alt="">
                                </div>
                                <div class="service-contents">
                                    <p class="manga-title"> {{substr($dataRa->manga_name, 0, 40)}}</p>
                                    <p class="manga-ch">Ch.{{$dataRa->maxEpisodeId}} - ตอนที่ {{$dataRa->maxEpisodeId}}
                                    </p>
                                    <p class="translators-name"> ผู้แปลที่-
                                        <!--  {{substr($dataRa->author, 0, 30)}} -->
                                    </p>
                                    <?php
                                        $currentDateTime = new DateTime(); // วันที่และเวลาปัจจุบัน

                                        $targetDateTime = new DateTime($dataRa->updated_at); // วันที่และเวลาเป้าหมาย

                                        $timeDifference = $targetDateTime->diff($currentDateTime); // คำนวณความแตกต่างของเวลา
                                        $daysPassed = $timeDifference->format('%a'); // จำนวนวันที่ผ่านไป
                                        $hoursPassed = $timeDifference->format('%h'); // จำนวนชั่วโมงที่ผ่านไป
                                        ?>
                                    <p class="translators-name">
                                        <?php
                                            if ($daysPassed > 0) {
                                                echo "Update- " . $daysPassed . " วัน " . $hoursPassed . " ชั่วโมง";
                                            } else {
                                                echo "Update- " . $hoursPassed . " ชั่วโมง";
                                            }
                                            ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                        @endforeach




                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-contributor-ch " id="scroll-bottom-ch">
        <div class="mt-5 box-contributor-rules">
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

            <div class="ml-3 mt-4 ">
                <div>
                    <div class="row">
                        <div class="service-image-icon">
                            <img src="{{URL::asset('assets/icon/avatar_81874.jpeg')}}" class="icon-comment" alt="">
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
                            <img src="{{URL::asset('assets/icon/avatar_81874.jpeg')}}" class="icon-comment" alt="">
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
                            <img src="{{URL::asset('assets/icon/avatar_81874.jpeg')}}" class="icon-comment" alt="">
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
                            <img src="{{URL::asset('assets/icon/avatar_81874.jpeg')}}" class="icon-comment" alt="">
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



<script>
//เปลี่ยนสี พื้อนหลัง
function changeSettingsBackground(newValue) {
    console.log("newValue", newValue);
    const element = document.getElementById('body-dark');
    const classNames = element.classList;
    const chName = document.getElementById('ch-image-name');


    if (classNames.value == 'body-dark') {
        element.classList.add("body-white");
        chName.classList.add("ch-name");
        element.classList.remove("body-dark");
    } else {
        element.classList.add("body-dark");
        chName.classList.remove("ch-name");
        element.classList.remove("body-white");
    }

}

// เปลี่ยนขนาดภาพ มังงะ
function changeOrigin(newValue) {

    //เลือกขนาดภาพ
    const elements = document.querySelectorAll('.origin');
    for (var i = 0; i < elements.length; i++) {
        elements[i].classList.remove("originActive");
    }
    const element = document.getElementById(newValue);
    element.classList.add("originActive");

    //เปลี่ยนขนาดภาพ

    const elementsImage = document.querySelectorAll('.chapter-width');
    if (newValue == "origin-1") {
        for (var k = 0; k < elementsImage.length; k++) {
            elementsImage[k].classList.remove("image-chapter-width-70");
            elementsImage[k].classList.remove("image-chapter-width-100");
            elementsImage[k].classList.add("image-chapter-width-50");
        }
    } else if (newValue == "origin-2") {
        for (var k = 0; k < elementsImage.length; k++) {
            elementsImage[k].classList.remove("image-chapter-width-50");
            elementsImage[k].classList.remove("image-chapter-width-100");
            elementsImage[k].classList.add("image-chapter-width-75");
        }
    } else {
        for (var k = 0; k < elementsImage.length; k++) {
            elementsImage[k].classList.remove("image-chapter-width-50");
            elementsImage[k].classList.remove("image-chapter-width-75");
            elementsImage[k].classList.add("image-chapter-width-100");
        }
    }

}


// เลือกตอนมังงะ

function changeNextBackChapter() {
    var selectElement = document.getElementById('select-example');
    var selectedValue = selectElement.value;

    let backChapterMan = document.getElementById("id-man").textContent;
    var newURL = "{{url('manga-chapter')}}" + '/' + encodeURIComponent(backChapterMan) + '/' +
        encodeURIComponent(selectedValue);
    window.location.href = newURL;

}
// ย้อนกลับตอนก่อนหน้า

function changeBackChapter(params) {
    let backChapterMan = document.getElementById("id-man").textContent;
    let backChapter = document.getElementById("id-ch").textContent;
    let backChapterCh = backChapter - 1;

    if (backChapterCh > 0) {
        var newURL = "{{url('manga-chapter')}}" + '/' + encodeURIComponent(backChapterMan) + '/' +
            encodeURIComponent(backChapterCh);
        window.location.href = newURL;
    }


}

// ไปตอนหน้า
function changeNextChapter(params) {
    let backChapterMan = document.getElementById("id-man").textContent;
    let backChapter = document.getElementById("id-ch").textContent;
    let maxEpisodeId = document.getElementById("id-maxEpisodeId").textContent;
    let backChapterCh = parseInt(backChapter) + 1;
    if (backChapterCh <= maxEpisodeId) {
        var newURL = "{{url('manga-chapter')}}" + '/' + encodeURIComponent(backChapterMan) + '/' +
            encodeURIComponent(backChapterCh);
        window.location.href = newURL;
    }



}

// Select  เเสดงตอนต้องหมด

document.addEventListener("DOMContentLoaded", function() {
    let backChapterMan = document.getElementById("id-man").textContent;
    let backChapter = document.getElementById("id-ch").textContent;
    var select = `<option value="0" disabled> Ch. All</option>`;

    $.ajax({
        url: '{{ url("episodes-all") }}/' + backChapterMan,
        type: 'GET',
        success: function(res) {
            res.forEach(function(item, index) {
                if (backChapter === item) {
                    select += `<option value="${item}" selected>Ch.${item}</option>`;
                } else {
                    select += `<option value="${item}">Ch.${item}</option>`;
                }
            });

            document.getElementById('select-example').innerHTML = select;
            document.getElementById('select-example').value =
                backChapter; // เลือกตัวเลือกที่มีค่าตรงกับ backChapter
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });



});
</script>

@endsection