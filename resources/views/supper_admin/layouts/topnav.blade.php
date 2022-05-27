<nav class="navbar fixed-top">
    <!-- Begin Search Box-->
    <!--   <div class="search-box">
          <button class="dismiss"><i class="ion-close-round"></i></button>
          <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="Search something ..." class="form-control">
          </form>
      </div> -->
    <!-- End Search Box-->
    <!-- Begin Topbar -->
    <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
        <!-- Begin Logo -->
        <div class="navbar-header">
            <!-- Toggle Button -->
            <a id="toggle-btn" href="#" class="menu-btn active">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <!-- End Toggle -->
            <a href="{{url('/')}}" class="navbar-brand">
                <div class="brand-image brand-big">
                    <img src="{{ asset(env('PUBLIC_URL'). 'website/assets/images/logo.png')}}" style="width:auto;" alt="logo" class="logo-big">
                </div>
                <div class="brand-image brand-small">
                    <img src="{{ asset(env('PUBLIC_URL'). 'website/assets/images/logo.png')}}" alt="logo" style="width:185px;" class="logo-small">
                </div>
            </a>

        </div>
        <!-- End Logo -->
        <!-- Begin Navbar Menu -->
        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
            <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><img
                        <?php if(isset(Auth::user()->image) and Auth::user()->image != ''):?>
                        src="{{ asset('public/images/user_images/')}}/{{Auth::user()->image}}"

                        <?php else:?>
                        src="{{ asset(env('PUBLIC_URL'). 'website/assets/images/user.jpg')}}"
                        <?php endif?>
                        alt="..." class="avatar rounded-circle"></a>
                <ul aria-labelledby="user" class="user-size dropdown-menu">
                    <li class="welcome">
                                <p class="text-center">Hi, {{auth()->user()->name}}</p>
                        <a href="#" class="edit-profil"><i class="la la-gear"></i></a>
                        <img
                            <?php if(isset(Auth::user()->image) and Auth::user()->image != ''):?>
                            src="{{ asset('public/images/user_images/')}}/{{Auth::user()->image}}"

                            <?php else:?>
                            src="{{ asset(env('PUBLIC_URL'). 'website/assets/images/user.jpg')}}"
                            <?php endif?>
                            alt="..." class="rounded-circle">
                    </li>
                    <li>
                        <a href="{{route('edit_profile')}}" class="dropdown-item">
                          Update  Profile
                        </a>
                    </li>
                 <!--    <li>
                        <a href="{{route('home_page')}}" class="dropdown-item">
                            Website
                        </a>
                    </li> -->

                    <li class="separator"></li>

                    <li><a rel="nofollow" href="{{route('logout')}}" class="dropdown-item logout text-center"><i class="ti-power-off"></i></a></li>

                </ul>
            </li>
            <!-- End User -->
            <!-- Begin Quick Actions -->
            <!--  <li class="nav-item"><a href="#off-canvas" class="open-sidebar"><i class="la la-ellipsis-h"></i></a></li> -->
            <!-- End Quick Actions -->
        </ul>
        <!-- End Navbar Menu -->
    </div>
    <!-- End Topbar -->
</nav>
