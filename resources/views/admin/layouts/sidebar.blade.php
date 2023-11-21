@php
    function classer($name)
    {
        if($name == \Illuminate\Support\Facades\Route::current()->getName()) {
            return ' -is-active -dark-bg-dark-2';
        }
    }   
@endphp
<div class="sidebar -dashboard">
    <div class="sidebar__item {{classer('admin.language.index')}}">
        <a href="{{route('admin.language.index')}}" class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
        <i class="text-20 icon-discovery mr-15"></i>
            Language
        </a>
    </div>

    <div class="sidebar__item {{classer('admin.menu.index')}}">
        <a href="{{route('admin.menu.index')}}" class="d-flex items-center text-17 lh-1 fw-500 -dark-text-white">
        <i class="text-20 icon-discovery mr-15"></i>
        Menu
        </a>
    </div>

    <div class="sidebar__item {{classer('admin.category.index')}}">
        <a href="{{route('admin.category.index')}}" class="d-flex items-center text-17 lh-1 fw-500 ">
        <i class="text-20 icon-play-button mr-15"></i>
        Category
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