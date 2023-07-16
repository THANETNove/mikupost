@extends('layouts.user.appWelcome')
@section('content')
<div class="box-top">
    @foreach ($data as $data_cate)
    <div class="untree_co-section" id="home-section">
        <div class="containerNav-body">
            <div class="row  mt-5">
                <div class="col-lg-9 ">
                    <div class="row container-manga-body changeGitHead">
                        <div>
                            <h3 id="categories-{{$data_cate->id}}" class="categories_name heading">
                                {{ $data_cate->categories_name}}</h3>
                            <p class="caption2"><i class="fa-solid fa-palette" style="font-size: 16px;"></i> General
                                Category</p>
                        </div>
                        <div class="row changeGitHead">
                            <div class="change-git-body active2" id="change-git-body" onclick="changeRetVal('noList')">
                                <i class="fa-solid fa-grip-vertical "></i>
                            </div>
                            <div class="change-git-body-tow" id="change-git-body-tow" onclick="changeRetVal('List')">
                                <i class=" fa-solid fa-list "></i>
                            </div>
                        </div>
                    </div>
                    <div class=" row container-manga-body" id="categories-{{$data_cate->id}}-image">
                    </div>

                    <div class="more-increase">More</div>
                </div>

                <div class="col-lg-3 order-lg-2 js-custom-dots">
                    <div class=" body-color-right">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item " role="presentation">
                                <a class="nav-link active iconProviderLink" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">
                                    <!--    <i class="fa fa-users" aria-hidden="true"></i> -->
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    Hot Provider
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link iconProviderLink" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false"><i class="fa fa-random"
                                        aria-hidden="true"></i>
                                    Random</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active mt-3" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <a href="#" class="service-comment  horizontal d-flex" data-aos="fade-left"
                                    data-aos-delay="0">
                                    <div class="service-image-icon">
                                        <img src="{{URL::asset('assets/icon/avatar_81874.jpeg')}}" class="image-icon"
                                            alt="">
                                    </div>
                                    <div class="service-contents">
                                        <p class="name-comment">Modern Design</p>
                                        <p class="comment">Far far away, behind the word mountains, far from the
                                            countries
                                            Vokalia and
                                            Consonantia.
                                        </p>
                                    </div>
                                </a>

                                <a href="#" class="service-comment  horizontal d-flex" data-aos="fade-left"
                                    data-aos-delay="100">
                                    <div class="service-image-icon">
                                        <img src="{{URL::asset('assets/icon/avatar_81874.jpeg')}}" class="image-icon"
                                            alt="">
                                    </div>
                                    <div class="service-contents">
                                        <p class="name-comment">Modern Design</p>
                                        <p class="comment">Far far away, behind the word mountains, far from the
                                            countries
                                            Vokalia and
                                            Consonantia.
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="tab-pane fade  mt-3" id="profile-tab-pane" role="tabpanel"
                                aria-labelledby="profile-tab" tabindex="0">

                                <a href="#" class="service-comment  horizontal d-flex" data-aos="fade-left"
                                    data-aos-delay="100">
                                    <div class="cover-image">
                                        <img src="{{URL::asset('assets/icon/13002_cover.jpeg')}}" class="page-cover"
                                            alt="">
                                    </div>
                                    <div class="service-contents">
                                        <p class="name-comment">Modern Design</p>
                                        <p class="comment">Far far away, behind the word mountains, far from the
                                            countries
                                            Vokalia and
                                            Consonantia.
                                        </p>
                                    </div>
                                </a>

                                <div class="reload-comment" type="button" class="btn "><i
                                        class="fa-solid fa-rotate-right"></i>
                                    Reload</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach


</div>

@include('javascript.apiClass')


<script>
window.onload = function() {
    var elements = document.querySelectorAll('.categories_name');
    var idsAndClasses = [];

    elements.forEach(function(element) {
        var id = element.id;
        var classes = element.classList.toString();

        idsAndClasses.push({
            id: id,
            classes: classes
        });
    });

    console.log(idsAndClasses);

    idsAndClasses.forEach(function(item) {
        var idString = item.id;
        var parts = idString.split('-');
        var numberId = parts[1];

        console.log(numberId); // Output: 4
        $.ajax({
            url: '{{ url("get-manga-all") }}/' + numberId,
            type: 'GET',
            success: function(res) {
                // ดำเนินการกับข้อมูลที่ได้รับ
                res.forEach(function(item) {
                    var container = document.getElementById("categories-" + numberId +
                        "-image");

                    var link = document.createElement("a");
                    link.href = "{{ url('manga-cover-show/120') }}";
                    container.appendChild(link);

                    var div = document.createElement("div");
                    div.className = "keyClass-service service-body-cover";
                    link.appendChild(div);

                    var coverImage = document.createElement("div");
                    coverImage.className = "cover-image-page";
                    div.appendChild(coverImage);

                    var image = document.createElement("img");
                    image.src = "{{ URL::asset('assets/icon/12928_cover.jpeg') }}";
                    image.className = "keyClass-cover cover-page";
                    image.alt = "";
                    coverImage.appendChild(image);

                    var serviceContents = document.createElement("div");
                    serviceContents.className = "service-contents";
                    div.appendChild(serviceContents);

                    var mangaTitle = document.createElement("p");
                    mangaTitle.className = "manga-title";
                    mangaTitle.textContent = "Mechanical Buddy";
                    serviceContents.appendChild(mangaTitle);

                    var mangaChapter = document.createElement("p");
                    mangaChapter.className = "manga-ch";
                    mangaChapter.textContent = "Ch.17 - ตอนที่ 17";
                    serviceContents.appendChild(mangaChapter);

                    var translatorsName1 = document.createElement("p");
                    translatorsName1.className = "translators-name";
                    translatorsName1.textContent = "ผู้แปลที่- วิตสโลวไลฟ์";
                    serviceContents.appendChild(translatorsName1);

                    var translatorsName2 = document.createElement("p");
                    translatorsName2.className = "translators-name";
                    translatorsName2.textContent = "Update- 15 hours";
                    serviceContents.appendChild(translatorsName2);
                });


            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
};
</script>
@endsection