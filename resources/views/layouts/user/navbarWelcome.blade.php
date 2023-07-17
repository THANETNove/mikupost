<nav class="site-nav dark js-site-navbar mb-5 site-navbar-target">
    <div class="containerNav-body">
        <div class="site-navigation">
            <a href="{{url('/') }}" class="logo m-0 float-left">mikupost<span class="text-primary">.</span></a>

            <ul class="js-clone-nav d-none d-lg-inline-block site-menu float-left">

                <?php
                  $data = DB::table('categories')
                  ->orderBy('categories_name','ASC')
                  ->get();
                  ?>
                @if(isset($data))
                @foreach ($data as $data_cat)
                <li class="active"><a href="{{url('search-categories',$data_cat->id)}}"
                        class="nav-link">{{$data_cat->categories_name}}</a></li>
                @endforeach
                @endif

                <!-- <li class=" has-children">
                        <a href="#" class="nav-link">Dropdown</a>
                        <ul class="dropdown">
                            <li><a href="#testimonials-section" class="nav-link">Testimonials</a></li>
                            <li><a href="elements.html" class="nav-link">Elements</a></li>
                            <li class="has-children">
                                <a href="#">Menu Two</a>
                                <ul class="dropdown">
                                    <li><a href="#" class="nav-link">Sub Menu One</a></li>
                                    <li><a href="#" class="nav-link">Sub Menu Two</a></li>
                                    <li><a href="#" class="nav-link">Sub Menu Three</a></li>
                                </ul>
                            </li>
                            <li><a href="#" class="nav-link">Menu Three</a></li>
                        </ul>
                </li>
                <li><a href="#features-section" class="nav-link">Features</a></li>
                <li><a href="#pricing-section" class="nav-link">Pricing</a></li>
                <li><a href="#about-section" class="nav-link">About</a></li>
                <li><a href="#contact-section" class="nav-link">Contact</a></li> -->
            </ul>

            <ul class="js-clone-nav d-none mt-1 d-lg-inline-block site-menu float-right">
                <li> <a href="{{url('search-manges')}}">
                        <i class="fa-solid fa-magnifying-glass fa-solid-glass"></i>
                    </a>
                </li>

                <!--  <li class="cta-button-outline"><a href="signin.html">Sign in</a></li>
                <li class="cta-button-outline"><a href="register.html">Register</a></li> -->

                @guest
                @if (Route::has('login'))
                <li class="cta-button-outline">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Sign in') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="cta-button-outline">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>



            <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block dark d-lg-none"
                data-toggle="collapse" data-target="#main-navbar">
                <span></span>
            </a>

        </div>
    </div>
</nav>