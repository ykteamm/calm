<header class="header -dashboard -dark-bg-dark-1 js-header">
  <div class="header__container py-20 px-30">
    <div class="row justify-between items-center">
      <div class="col-auto">
        <div class="d-flex items-center">
          <div class="header__explore text-dark-1">
            <button class="d-flex items-center js-dashboard-home-9-sidebar-toggle">
              <i class="icon -dark-text-white icon-explore"></i>
            </button>
          </div>

          <div class="header__logo ml-30 md:ml-20">
            <a data-barba href="index.html">
              <img class="-light-d-none" src="img/general/logo.svg" alt="logo">
              <img class="-dark-d-none" src="img/general/logo-dark.svg" alt="logo">
            </a>
          </div>
        </div>
      </div>

      <div class="col-auto">
        <div class="d-flex items-center">
          <div class="text-white d-flex items-center lg:d-none mr-15">
            {{-- <div class="dropdown bg-transparent px-0 py-0">
              <div class="d-flex items-center text-14 text-dark-1">
                All Pages <i class="text-9 icon-chevron-down ml-10"></i>
              </div>
              <div class="dropdown__item -dark-bg-dark-2 -dark-border-white-10">
                <div class="text-14 y-gap-15">
                  <div><a href="dashboard.html" class="d-block text-dark-1">Dashboard</a></div>
                  <div><a href="dshb-courses.html" class="d-block text-dark-1">My Courses</a></div>
                  <div><a href="dshb-bookmarks.html" class="d-block text-dark-1">Bookmarks</a></div>
                  <div><a href="dshb-listing.html" class="d-block text-dark-1">Add Listing</a></div>
                  <div><a href="dshb-reviews.html" class="d-block text-dark-1">Reviews</a></div>
                  <div><a href="dshb-settings.html" class="d-block text-dark-1">Settings</a></div>
                </div>
              </div>
            </div> --}}

            <div class="dropdown bg-transparent px-0 py-0">
              <div class="d-flex items-center text-14 text-dark-1">
                Lang <i class="text-9 icon-chevron-down ml-10"></i>
              </div>
              <div class="dropdown__item -dark-bg-dark-2 -dark-border-white-10">
                <div class="text-14 y-gap-15">
                  @foreach (getLanguages() as $lang)
                    <div><a href="{{route('change-locale', ['locale' => $lang->code])}}" class="d-block text-dark-1">{{$lang->name}}</a></div>
                  @endforeach
                </div>
              </div>
            </div>

            <div class="relative">
              <a href="#" class="d-flex items-center text-dark-1 ml-20" data-el-toggle=".js-courses-toggle">
                My Courses <i class="text-9 icon-chevron-down ml-10"></i>
              </a>

              <div class="toggle-element js-courses-toggle">
                <div class="toggle-bottom -courses bg-white -dark-bg-dark-1 shadow-4 border-light rounded-8 mt-20">
                  <div class="px-30 py-30">

                    <div class="d-flex mb-20">
                      <img class="size-80 fit-cover" src="img/menus/cart/1.png" alt="image">

                      <div class="ml-15">
                        <div class="text-dark-1 lh-15 fw-500">Complete Python Bootcamp From Zero to Hero in Python</div>
                        <div class="progress-bar mt-20">
                          <div class="progress-bar__bg bg-light-3"></div>
                          <div class="progress-bar__bar bg-purple-1 w-1/3"></div>
                        </div>
                      </div>
                    </div>

                    <div class="d-flex mb-20">
                      <img class="size-80 fit-cover" src="img/menus/cart/2.png" alt="image">

                      <div class="ml-15">
                        <div class="text-dark-1 lh-15 fw-500">The Ultimate Drawing Course Beginner to Advanced</div>
                        <div class="progress-bar mt-20">
                          <div class="progress-bar__bg bg-light-3"></div>
                          <div class="progress-bar__bar bg-purple-1 w-1/3"></div>
                        </div>
                      </div>
                    </div>


                    <div class="mt-20">
                      <a href="#" class="button py-20 -dark-1 text-white -dark-bg-purple-1 -dark-border-dark-2 col-12">Go to My Learning</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex items-center sm:d-none">
            <div class="relative">
              <button class="js-darkmode-toggle text-light-1 d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light">
                <i class="text-24 icon icon-night"></i>
              </button>
            </div>

            <div class="relative">
              <button data-maximize class="d-flex text-light-1 items-center justify-center size-50 rounded-16 -hover-dshb-header-light">
                <i class="text-24 icon icon-maximize"></i>
              </button>
            </div>


            <div class="relative ">
              <button class="d-flex items-center text-light-1 d-flex items-center justify-center size-50 rounded-16 -hover-dshb-header-light" data-el-toggle=".js-cart-toggle">
                <i class="text-20 icon icon-basket"></i>
              </button>

              <div class="toggle-element js-cart-toggle">
                <div class="header-cart bg-white -dark-bg-dark-1 rounded-8">
                  <div class="px-30 pt-30 pb-10">

                    <div class="row justify-between x-gap-40 pb-20">
                      <div class="col">
                        <div class="row x-gap-10 y-gap-10">
                          <div class="col-auto">
                            <img src="img/menus/cart/1.png" alt="image">
                          </div>

                          <div class="col">
                            <div class="text-dark-1 lh-15">The Ultimate Drawing Course Beginner to Advanced...</div>

                            <div class="d-flex items-center mt-10">
                              <div class="lh-12 fw-500 line-through text-light-1 mr-10">$179</div>
                              <div class="text-18 lh-12 fw-500 text-dark-1">$79</div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-auto">
                        <button><img src="img/menus/close.svg" alt="icon"></button>
                      </div>
                    </div>

                    <div class="row justify-between x-gap-40 pb-20">
                      <div class="col">
                        <div class="row x-gap-10 y-gap-10">
                          <div class="col-auto">
                            <img src="img/menus/cart/2.png" alt="image">
                          </div>

                          <div class="col">
                            <div class="text-dark-1 lh-15">User Experience Design Essentials - Adobe XD UI UX...</div>

                            <div class="d-flex items-center mt-10">
                              <div class="lh-12 fw-500 line-through text-light-1 mr-10">$179</div>
                              <div class="text-18 lh-12 fw-500 text-dark-1">$79</div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-auto">
                        <button><img src="img/menus/close.svg" alt="icon"></button>
                      </div>
                    </div>

                  </div>

                  <div class="px-30 pt-20 pb-30 border-top-light">
                    <div class="d-flex justify-between">
                      <div class="text-18 lh-12 text-dark-1 fw-500">Total:</div>
                      <div class="text-18 lh-12 text-dark-1 fw-500">$659</div>
                    </div>

                    <div class="row x-gap-20 y-gap-10 pt-30">
                      <div class="col-sm-6">
                        <button class="button py-20 -dark-1 text-white -dark-button-white col-12">View Cart</button>
                      </div>
                      <div class="col-sm-6">
                        <button class="button py-20 -purple-1 text-white col-12">Checkout</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="relative">
              <a href="#" class="d-flex items-center text-light-1 justify-center size-50 rounded-16 -hover-dshb-header-light" data-el-toggle=".js-msg-toggle">
                <i class="text-24 icon icon-email"></i>
              </a>
            </div>

            <div class="relative">
              <a href="#" class="d-flex items-center text-light-1 justify-center size-50 rounded-16 -hover-dshb-header-light" data-el-toggle=".js-notif-toggle">
                <i class="text-24 icon icon-notification"></i>
              </a>

              <div class="toggle-element js-notif-toggle">
                <div class="toggle-bottom -notifications bg-white -dark-bg-dark-1 shadow-4 border-light rounded-8 mt-10">
                  <div class="py-30 px-30">
                    <div class="y-gap-40">

                      <div class="d-flex items-center ">
                        <div class="shrink-0">
                          <img src="img/dashboard/actions/1.png" alt="image">
                        </div>
                        <div class="ml-12">
                          <h4 class="text-15 lh-1 fw-500">Your resume updated!</h4>
                          <div class="text-13 lh-1 mt-10">1 Hours Ago</div>
                        </div>
                      </div>

                      <div class="d-flex items-center border-top-light">
                        <div class="shrink-0">
                          <img src="img/dashboard/actions/2.png" alt="image">
                        </div>
                        <div class="ml-12">
                          <h4 class="text-15 lh-1 fw-500">You changed password</h4>
                          <div class="text-13 lh-1 mt-10">1 Hours Ago</div>
                        </div>
                      </div>

                      <div class="d-flex items-center border-top-light">
                        <div class="shrink-0">
                          <img src="img/dashboard/actions/3.png" alt="image">
                        </div>
                        <div class="ml-12">
                          <h4 class="text-15 lh-1 fw-500">Your account has been created successfully</h4>
                          <div class="text-13 lh-1 mt-10">1 Hours Ago</div>
                        </div>
                      </div>

                      <div class="d-flex items-center border-top-light">
                        <div class="shrink-0">
                          <img src="img/dashboard/actions/4.png" alt="image">
                        </div>
                        <div class="ml-12">
                          <h4 class="text-15 lh-1 fw-500">You applied for a job Front-end Developer</h4>
                          <div class="text-13 lh-1 mt-10">1 Hours Ago</div>
                        </div>
                      </div>

                      <div class="d-flex items-center border-top-light">
                        <div class="shrink-0">
                          <img src="img/dashboard/actions/5.png" alt="image">
                        </div>
                        <div class="ml-12">
                          <h4 class="text-15 lh-1 fw-500">Your course uploaded successfully</h4>
                          <div class="text-13 lh-1 mt-10">1 Hours Ago</div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="relative d-flex items-center ml-10">
            <a href="#" data-el-toggle=".js-profile-toggle">
              @if ($image = auth()->user()->image)
                <img class="size-50" src="{{asset($image->path)}}" alt="image">
              @else 
                <img class="size-50" src="img /misc/user-profile.png" alt="image">
              @endif
            </a>

            <div class="toggle-element js-profile-toggle">
              <div class="toggle-bottom -profile bg-white -dark-bg-dark-1 shadow-4 border-light rounded-8 mt-10">
                <div class="px-30 py-30">

                  <div class="sidebar -dashboard">

                    <div class="sidebar__item -is-active -dark-bg-dark-2">
                      <a href="dashboard.html" class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
                        <i class="text-20 icon-discovery mr-15"></i>
                        Dashboard
                      </a>
                    </div>

                    <div class="sidebar__item ">
                      <a href="dshb-courses.html" class="d-flex items-center text-17 lh-1 fw-500 ">
                        <i class="text-20 icon-play-button mr-15"></i>
                        My Courses
                      </a>
                    </div>

                    <div class="sidebar__item ">
                      <a href="dshb-bookmarks.html" class="d-flex items-center text-17 lh-1 fw-500 ">
                        <i class="text-20 icon-bookmark mr-15"></i>
                        Bookmarks
                      </a>
                    </div>

                    <div class="sidebar__item ">
                      <a href="dshb-messages.html" class="d-flex items-center text-17 lh-1 fw-500 ">
                        <i class="text-20 icon-message mr-15"></i>
                        Messages
                      </a>
                    </div>

                    <div class="sidebar__item ">
                      <a href="dshb-listing.html" class="d-flex items-center text-17 lh-1 fw-500 ">
                        <i class="text-20 icon-list mr-15"></i>
                        Create Course
                      </a>
                    </div>

                    <div class="sidebar__item ">
                      <a href="dshb-reviews.html" class="d-flex items-center text-17 lh-1 fw-500 ">
                        <i class="text-20 icon-comment mr-15"></i>
                        Reviews
                      </a>
                    </div>

                    <div class="sidebar__item ">
                      <a href="dshb-settings.html" class="d-flex items-center text-17 lh-1 fw-500 ">
                        <i class="text-20 icon-setting mr-15"></i>
                        Settings
                      </a>
                    </div>

                    <div class="sidebar__item ">
                      <a href="#" class="d-flex items-center text-17 lh-1 fw-500 ">
                        <i class="text-20 icon-power mr-15"></i>
                        Logout
                      </a>
                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>