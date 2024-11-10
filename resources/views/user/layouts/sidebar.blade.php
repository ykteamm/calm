{{-- <div class="dashboard__sidebar -base scroll-bar-1 border-right-light lg:px-30 mt0 height100 main-color-rtl pd">
    <div class="sidebar -base-sidebar">
        <div class="menu_div">
            <button type="button" id="close_btn" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="sidebar__inner top_width">
            <div>
                <div class="text-16 lh-1 fw-500 text-dark-1 mb-30 text-center">
                    <h2 class="font_family_a text-color-white-for">
                        Medidation
                    </h2>
                </div>
                <div>
                    <div class="sidebar__item text-color-white mb-20" style="padding: 0">
                        <a href="{{route('index')}}" class="-dark-sidebar-white d-flex items-center font_family_a text-20 ">
                            <div class="icon-circle mr-10">
                                <i class="fas fa-sun"></i>
                            </div>
                            {{__('common.home')}}
                        </a>
                    </div>

                    <div class="sidebar__item text-color-white mb-20" style="padding: 0">
                        <a href="{{route('meditators-all')}}" class="-dark-sidebar-white d-flex items-center font_family_a text-20 ">
                            <div class="icon-circle mr-10">
                                <i class="fas fa-sun"></i>
                            </div>
                            {{__('common.meditations')}}
                        </a>
                    </div>
                    <div class="sidebar__item text-color-white mb-20" style="padding: 0">
                        <a href="{{route('medicine.index')}}" class="-dark-sidebar-white font_family_a d-flex items-center text-20" >
                            <div class="icon-circle mr-10">
                                <i class="fas fa-sun"></i>
                            </div>
                            {{__('common.medicine')}}
                        </a>
                    </div>

                    <div class="sidebar__item text-color-white mb-20" style="padding: 0">
                        <a href="{{route('will.index')}}" class="-dark-sidebar-white font_family_a d-flex items-center text-20" >
                            <div class="icon-circle mr-10">
                                <i class="fas fa-sun"></i>
                            </div>
                            {{__('common.will')}}
                        </a>
                    </div>

                    <div class="sidebar__item text-color-white mb-20" style="padding: 0">
                        <a href="{{route('landscape')}}" class="-dark-sidebar-white font_family_a d-flex items-center text-20" >
                            <div class="icon-circle mr-10">
                                <i class="fas fa-sun"></i>
                            </div>
                            {{__('common.landscape')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<style>
    .cd__main{
   position: relative;
   width: 360px !important;
   height: 720px;
   border: 2px solid #bbb;
}
/* end demo only */
.mobile-bottom-nav {
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  will-change: transform;
  transform: translateZ(0);
  display: flex;
  height: 70px;
  box-shadow: 0 -2px 5px -2px #333;
  background-color: #fff;
}
.mobile-bottom-nav__item {
  flex-grow: 1;
  text-align: center;
  font-size: 15px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.mobile-bottom-nav__item--active {
  color: red;
}
.mobile-bottom-nav__item-content {
  display: flex;
  flex-direction: column;
}
    .mobile-bottom-nav__item-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        /*font-size: 12px;*/
    }

    .language-label {
        margin-bottom: 5px;
        font-size: 12px;
        font-weight: 500;
    }

    .language-select {
        padding: 2px 5px;
        font-size: 12px;
        border-radius: 5px;
        border: 1px solid #ccc;
        outline: none;
    }

    .language-select:focus {
        border-color: #007bff;
    }
</style>
<div>
    <nav class="mobile-bottom-nav">
        <div class="mobile-bottom-nav__item">
            <div class="mobile-bottom-nav__item-content">
                <a href="{{route('index')}}" style="display: contents">
                    <i class="fa fa-home" aria-hidden="true"></i>
                @lang('common.home')
                </a>

            </div>
        </div>
        <div class="mobile-bottom-nav__item">
            <div class="mobile-bottom-nav__item-content">
                <a href="{{route('meditators-all')}}" style="display: contents">
                <i class="fa fa-heartbeat" aria-hidden="true"></i>
                Coach
            </a>
            </div>
        </div>
        <div class="mobile-bottom-nav__item">
            <div class="mobile-bottom-nav__item-content">
                <a href="{{route('medicine.index')}}" style="display: contents">
                <i class="fa fa-leaf" aria-hidden="true"></i>
                    Diet Test
            </a>
            </div>
        </div>

        <div class="mobile-bottom-nav__item">
            <div class="mobile-bottom-nav__item-content">
                <a href="{{route('will.index')}}" style="display: contents">
                <i class="fa fa-asterisk" aria-hidden="true"></i>
                    Will
            </a>
            </div>
        </div>
{{--        <div class="mobile-bottom-nav__item">--}}
{{--            <div class="mobile-bottom-nav__item-content">--}}
{{--                <a href="{{route('landscape')}}" style="display: contents">--}}
{{--                <i class="fa fa-picture-o" aria-hidden="true"></i>--}}
{{--                Manzara--}}
{{--            </a>--}}

{{--            </div>--}}
{{--        </div>--}}

{{--        <li class="nav-item dropdown" style="list-style-type: none">--}}
{{--            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                <i class="fa-solid flag-language"></i>--}}
{{--                <span>{{ App::getLocale() }}</span>--}}
{{--            </a>--}}
{{--            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" data-bs-auto-close="outside">--}}
{{--                <li><a class="dropdown-item {{ App::getLocale() === 'uz' ? 'active' : '' }}" href="{{ route('lang', 'uz') }}">O'zbekcha</a></li>--}}
{{--                <li><a class="dropdown-item {{ App::getLocale() === 'ru' ? 'active' : '' }}" href="{{ route('lang', 'ru') }}">Русский</a></li>--}}
{{--                <li><a class="dropdown-item {{ App::getLocale() === 'en' ? 'active' : '' }}" href="{{ route('lang', 'en') }}">English</a></li>--}}
{{--            </ul>--}}
{{--        </li>--}}


    </nav>
</div>

