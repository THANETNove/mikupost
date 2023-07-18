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
                            <p class="caption2"><i class="fa-solid fa-palette" style="font-size: 16px;"></i>
                                {{ $data_cate->categories_name}}
                                Category</p>
                        </div>
                        <div class="row changeGitHead">
                            <div class="change-git-body active2" id="change-git-body-{{$data_cate->id}}"
                                onclick="changeGitBody('noList',{{$data_cate->id}})">
                                <i class="fa-solid fa-grip-vertical "></i>
                            </div>
                            <div class="change-git-body-tow" id="change-git-body-tow-{{$data_cate->id}}"
                                onclick="changeGitBodyTow('List',{{$data_cate->id}})">
                                <i class=" fa-solid fa-list "></i>
                            </div>
                        </div>
                    </div>
                    <div class=" row container-manga-body " id="categories-{{$data_cate->id}}-image">
                    </div>

                    <div class="more-increase" onclick="getExpandData({{$data_cate->id}})">More</div>
                </div>

                <div class="col-lg-3 order-lg-2 js-custom-dots">
                    <div class=" body-color-right">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item " role="presentation">
                                <a class="nav-link active iconProviderLink" id="home-tab-{{$data_cate->id}}"
                                    data-bs-toggle="tab" data-bs-target="#home-tab-pane-{{$data_cate->id}}"
                                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                    <!--    <i class="fa fa-users" aria-hidden="true"></i> -->
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    Hot Provider
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link iconProviderLink" id="profile-tab-{{$data_cate->id}}"
                                    data-bs-toggle="tab" data-bs-target="#profile-tab-pane-{{$data_cate->id}}"
                                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><i
                                        class="fa fa-random" aria-hidden="true"></i>
                                    Random</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active mt-3" id="home-tab-pane-{{$data_cate->id}}"
                                role="tabpanel" aria-labelledby="home-tab" tabindex="0">
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
                            <div class="tab-pane fade  mt-3" role="tabpanel" aria-labelledby="profile-tab"
                                id="profile-tab-pane-{{$data_cate->id}}" tabindex="0">

                                <div id="profile-item-{{$data_cate->id}}">

                                </div>
                                <div class="reload-comment mb-3" onclick="randomData({{$data_cate->id}})"><i
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


@endsection