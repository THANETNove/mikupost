@extends('layouts.appWelcome')
@section('content')
<div class="box-top">
    <div class="untree_co-section" id="home-section">
        <div class="containerNav-body">
            <div class="row  mt-5">
                <div class="col-lg-9 ">
                    <div class="row container-manga-body changeGitHead">
                        <div>
                            <h3 class="heading">Latest Comic</h3>
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
                    <div class=" row container-manga-body">
                        <a href="{{url('manga-cover-show/120')}}">
                            <div class="keyClass-service service-body-cover">
                                <div class="cover-image-page">
                                    <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                        class="keyClass-cover cover-page" alt="">
                                </div>
                                <div class="service-contents">
                                    <p class="manga-title"> Mechanical Buddy</p>
                                    <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                    <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                    <p class="translators-name">Update- 15 hours</p>
                                </div>
                            </div>
                        </a>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
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

    <div class="untree_co-section" id="home-section">
        <div class="containerNav-body">
            <div class="row  mt-5">
                <div class="col-lg-9 ">
                    <div class="row container-manga-body changeGitHead">
                        <div>
                            <h3 class="heading">Latest Comic</h3>
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
                    <div class=" row container-manga-body">
                        <a href="{{url('manga-cover-show/120')}}">
                            <div class="keyClass-service service-body-cover">
                                <div class="cover-image-page">
                                    <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                        class="keyClass-cover cover-page" alt="">
                                </div>
                                <div class="service-contents">
                                    <p class="manga-title"> Mechanical Buddy</p>
                                    <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                    <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                    <p class="translators-name">Update- 15 hours</p>
                                </div>
                            </div>
                        </a>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                        <div class="keyClass-service service-body-cover">
                            <div class="cover-image-page">
                                <img src="{{URL::asset('assets/icon/12928_cover.jpeg')}}"
                                    class="keyClass-cover cover-page" alt="">
                            </div>
                            <div class="service-contents">
                                <p class="manga-title"> Mechanical Buddy</p>
                                <p class="manga-ch">Ch.17 - ตอนที่ 17</p>
                                <p class="translators-name"> ผู้แปลที่- วิตสโลวไลฟ์</p>
                                <p class="translators-name">Update- 15 hours</p>
                            </div>
                        </div>
                    </div>

                    <div class="more-increase">More</div>
                </div>

                <div class="col-lg-3 order-lg-2 js-custom-dots">
                    <div class=" body-color-right">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item " role="presentation">
                                <a class="nav-link active iconProviderLink" id="home-tab-2" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane-2" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">
                                    <!--    <i class="fa fa-users" aria-hidden="true"></i> -->
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    Hot Provider
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link iconProviderLink" id="profile-tab-2" data-bs-toggle="tab"
                                    data-bs-target="#profile-tab-pane-2" type="button" role="tab"
                                    aria-controls="profile-tab-pane" aria-selected="false"><i class="fa fa-random"
                                        aria-hidden="true"></i>
                                    Random</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active mt-3" id="home-tab-pane-2" role="tabpanel"
                                aria-labelledby="home-tab-2" tabindex="0">
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
                            <div class="tab-pane fade  mt-3" id="profile-tab-pane-2" role="tabpanel"
                                aria-labelledby="profile-tab-2" tabindex="0">

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
                                            Consonantia
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
</div>



@endsection