<div class="dashboard__sidebar -base scroll-bar-1 border-right-light lg:px-30 mt0 height100 main-color-rtl pd">
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
</div>
