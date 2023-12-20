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
                    @foreach ($menus as $key => $value)
                        <div class="sidebar__item text-color-white mb-20" style="padding: 0">
                            <a href="{{route('menu-index', ['slug'=> $value->slug])}}" class="-dark-sidebar-white d-flex items-center font_family_a text-20 ">
                                <div class="icon-circle mr-10">
                                    {{--                                                <i class="icon-discovery"></i>--}}
                                    {{--                                                icon list--}}
                                    {{--                                                <i class="fas fa-home"></i>--}}
                                    {{--                                                <i class="far fa-moon"></i>--}}
                                    {{--                                                rotate 248deg--}}
                                    {{--                                                <i class="fab fa-opera"></i>--}}
                                    {{--                                                <i class="far fa-laugh"></i>--}}
                                    <i class="fas fa-sun"></i>
                                    {{--                                                before "\1F319" kun sarguzashti--}}
                                </div>
                                {{$value->translation->name}}
                            </a>
                        </div>
                    @endforeach

                    <div class="sidebar__item text-color-white mb-20" style="padding: 0">
                        <a href="{{route('landscape')}}" class="-dark-sidebar-white font_family_a d-flex items-center text-20" >
                            <div class="icon-circle mr-10">
                                {{--                                            <i class="icon-discovery"></i>--}}
                                <i class="fas fa-mountain"></i>
                            </div>
                            Manzara
                        </a>
                    </div>
                    <div class="sidebar__item text-color-white mb-20" style="padding: 0">
                        <a href="{{route('quiz.index')}}" class="-dark-sidebar-white font_family_a d-flex items-center text-20" >
                            <div class="icon-circle mr-10">
                                {{--                                            <i class="icon-discovery"></i>--}}
                                <i class="fas fa-sun"></i>
                            </div>
                            Quiz
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>