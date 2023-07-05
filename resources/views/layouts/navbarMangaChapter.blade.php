<nav class="site-nav site-nav2 dark js-site-navbar mb-5 site-navbar-target">
            site-nav dark js-site-navbar mb-5 site-navbar-target
    <div class="containerNav-body">
        <div class="row container-manga-body">
            <div class="row col-lg-5 mb-3">
                <a href="{{url('/') }}" class="logo m-0 float-left">Landing<span class="text-primary">.</span></a>

                <a href="#home-section" id="name-manga-chapter" class="name-manga-chapter">
                    【หง่ำหง่ำค่ะ】สกิล『ยิ่งกินมอนสเตอร์เท่าไหร่ก็ยิ่ง』</a>
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
                <div class="row ml-5 on-change-chapter">
                    <div class="next-back-chapter" onclick="changeNextBackChapter(1)">
                        <i class="fa-solid fa-caret-left"></i>
                    </div>
                    <select class="form-control col-6 col-md-8" aria-label="Default select example"
                        onchange="changeNextBackChapter(1)">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <div class="next-back-chapter" onclick="changeNextBackChapter(1)">
                        <i class="fa-solid fa-caret-right"></i>
                    </div>
                </div>

            </div>

        </div>
</nav>