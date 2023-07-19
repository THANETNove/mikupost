@extends('layouts.user.appWelcome')
@section('content')
<div class="box-top">

    <div class="untree_co-section" id="home-section">
        <div class="containerNav-body">
            <div class="untree_co-section" id="home-section">
                <!-- <div class="containerNav-body">
                    <div class="col-12 mt-3">
                        <form method="POST" action="{{ route('search-manges') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-10">
                                    <input class="form-control me-2  mb-3" type="search" name="search" id="search"
                                        placeholder="Search" aria-label="Search">
                                </div>
                                <div class="col-sm-4 col-md-2">
                                    <button class="btn btn-outline-success mb-3" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                     $dataCategories = DB::table('categories')
                            ->orderBy('id', 'ASC')
                            ->get();
                        ?>
                    <div class="row ml-2  mt-3 col-12">
                        @foreach ($dataCategories as $categories)
                        <div class="form-check col-3">
                            <input class="form-check-input" type="radio" name="categories_id" id="radio-categories"
                                value="{{$categories->id}}" id="flexRadioDefault1">
                            <label class="form-check-label white-text" for="flexRadioDefault1">
                                {{$categories->categories_name}}
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div> -->
                <div class="untree_co-section" id="home-section">
                    <div class="containerNav-body">
                        <div class="col-12 mt-3">
                            <form method="POST" action="{{ route('search-manges') }}" enctype="multipart/form-data"
                                id="searchForm">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-10">
                                        <input class="form-control me-2 mb-3" type="search" name="search" id="search"
                                            placeholder="Search" aria-label="Search">
                                    </div>
                                    <div class="col-sm-4 col-md-2">
                                        <button class="btn btn-outline-success mb-3" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php
                            $dataCategories = DB::table('categories')
                                    ->orderBy('id', 'ASC')
                                    ->get();
                            ?>
                        <div class="row ml-2 mt-3 col-12">
                            @foreach ($dataCategories as $categories)


                            @if(isset($id_ep))
                            <div class="form-check col-3">
                                <input class="form-check-input" type="radio" name="categories_id" id="radio-categories"
                                    value="{{$categories->id}}"
                                    <?php echo $id_ep == $categories->id ? 'checked' : ''; ?> id="flexRadioDefault1">
                                <label class="form-check-label white-text" for="flexRadioDefault1">
                                    {{$categories->categories_name}}
                                </label>
                            </div>
                            @else
                            <div class="form-check col-3">
                                <input class="form-check-input" type="radio" name="categories_id" id="radio-categories"
                                    value="{{$categories->id}}" id="flexRadioDefault1">
                                <label class="form-check-label white-text" for="flexRadioDefault1">
                                    {{$categories->categories_name}}
                                </label>
                            </div>
                            @endif


                            @endforeach
                        </div>
                    </div>
                </div>





                <div class="row  mt-5">
                    <div class="col-lg-12 ">
                        <div class="row container-manga-body changeGitHead">
                            <div>

                                <h3 class="heading">mikupost</h3>
                                <p class="caption2"><i class="fa-solid fa-palette" style="font-size: 16px;"></i>
                                    mikupost Category</p>
                            </div>
                            <div class="row changeGitHead">
                                <div class="change-git-body active2" id="change-git-body">
                                    <i class="fa-solid fa-grip-vertical "></i>
                                </div>
                                <div class="change-git-body-tow" id="change-git-body-tow">
                                    <i class=" fa-solid fa-list "></i>
                                </div>
                            </div>
                        </div>
                        <div class=" row container-manga-body">
                            @if(isset($data))
                            @foreach ($data as $dataMange)
                            <a href="{{ url('manga-cover-show',$dataMange->id) }}">
                                <div class="keyClass-service service-body-cover">
                                    <div class="cover-image-page">
                                        <?php
                                                $imagePath = env('FTP_URL_IMAGES_COVER').$dataMange->cover_photo;
                                                $imageUrl = Storage::disk('ftp')->url($imagePath);
                                                ?>
                                        <img src="{{$imageUrl}}" class="keyClass-cover cover-page" alt="">
                                    </div>
                                    <div class="service-contents">
                                        <p class="manga-title"> {{substr($dataMange->manga_name, 0, 70)}}</p>
                                        <p class="manga-ch">Ch.{{$dataMange->maxEpisodeId}} - ตอนที่
                                            {{$dataMange->maxEpisodeId}}</p>
                                        <p class="translators-name"> ผู้แปลที่- {{$dataMange->author}}</p>
                                        <?php
                                                $currentDateTime = new DateTime(); // วันที่และเวลาปัจจุบัน

                                                $targetDateTime = new DateTime($dataMange->updated_at); // วันที่และเวลาเป้าหมาย

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
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
var searchForm = document.getElementById("searchForm");
var radioInputs = document.querySelectorAll('input[name="categories_id"]');

radioInputs.forEach(function(radio) {
    radio.addEventListener("click", function() {
        searchForm.action = "{{ route('search-manges') }}/" + this.value;
        searchForm.method = "GET";
    });
});
</script>
@endsection