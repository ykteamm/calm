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
  height: 50px;
  box-shadow: 0 -2px 5px -2px #333;
  background-color: #fff;
}
.mobile-bottom-nav__item {
  flex-grow: 1;
  text-align: center;
  font-size: 12px;
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
</style>
<div>
    <nav class="mobile-bottom-nav">
        <div class="mobile-bottom-nav__item">
            <div class="mobile-bottom-nav__item-content">
                <a href="{{route('index')}}" style="display: contents">
                    <i class="fa fa-home" aria-hidden="true"></i>
                Asosiy
                </a>

            </div>
        </div>
        <div class="mobile-bottom-nav__item">
            <div class="mobile-bottom-nav__item-content">
                <a href="{{route('meditators-all')}}" style="display: contents">
                <i class="fa fa-heartbeat" aria-hidden="true"></i>
                Meditatsiya
            </a>
            </div>
        </div>
        <div class="mobile-bottom-nav__item">
            <div class="mobile-bottom-nav__item-content">
                <a href="{{route('medicine.index')}}" style="display: contents">
                <i class="fa fa-battery-three-quarters" aria-hidden="true"></i>
                Dori
            </a>
            </div>
        </div>

        <div class="mobile-bottom-nav__item">
            <div class="mobile-bottom-nav__item-content">
                <a href="{{route('will.index')}}" style="display: contents">
                <i class="fa fa-asterisk" aria-hidden="true"></i>
                Iroda
            </a>
            </div>
        </div>
        <div class="mobile-bottom-nav__item">
            <div class="mobile-bottom-nav__item-content">
                <a href="{{route('landscape')}}" style="display: contents">
                <i class="fa fa-picture-o" aria-hidden="true"></i>
                Manzara
            </a>

            </div>
        </div>
    </nav>
</div>
