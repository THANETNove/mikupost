<nav class="site-nav site-nav2 dark js-site-navbar mb-5 site-navbar-target">
    <div class="containerNav-body">
        <div class="row container-manga-body">
            <div class="row col-lg-5 mb-3">
                <a href="{{url('/') }}" class="logo m-0 float-left mr-2">mikupost<span class="text-primary">.</span></a>

                <a href="#home-section" id="name-manga-chapter" class="name-manga-chapter ">
                </a>
            </div>
            <div class="row col-lg-7">
                <div class="settings-background mb-4" onclick="changeSettingsBackground(1)">
                    <i class="fa-solid fa-gear "></i>
                </div>
                <div class="ml-4 row origin-box">
                    <div class="ml-1 cursor-origin" onclick="changeOrigin('origin-1')">
                        <div class="origin originActive" id="origin-1">
                        </div>
                        <p class=" origin-p">Origin</p>
                    </div>
                    <div class="ml-1 cursor-origin" onclick="changeOrigin('origin-2')">
                        <div class="origin" id="origin-2">
                        </div>
                        <p class="origin-p">75%</p>
                    </div>
                    <div class="ml-1 cursor-origin" onclick="changeOrigin('origin-3')">
                        <div class="origin" id="origin-3">
                        </div>
                        <p class="origin-p">100%</p>
                    </div>
                </div>
                <div class="row ml-5 on-change-chapter  col-md-6 col-lg-6">
                    <div class="next-back-chapter" onclick="changeBackChapter(1)">
                        <i class="fa-solid fa-caret-left"></i>
                    </div>
                    <select class="form-control col-6 col-md-7" id="select-example" aria-label="Default select example"
                        onchange="changeNextBackChapter()">


                    </select>
                    <div class="next-back-chapter" onclick="changeNextChapter(1)">
                        <i class="fa-solid fa-caret-right"></i>
                    </div>
                </div>

            </div>

        </div>
</nav>