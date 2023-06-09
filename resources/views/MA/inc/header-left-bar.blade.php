<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
    <!-- begin:: Aside Menu -->
    <div class="brand flex-column-auto" id="kt_brand">
        <!--begin::Logo-->
        @include('MA.inc.header-brand-logo')

        <!--end::Logo-->

    </div>
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid font-weight-bold" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu font-weight-bold" data-ktmenu-vertical="1" data-ktmenu-scroll="1">
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('home') }}"
                        class="kt-menu__link bg-none "><i
                            class="kt-menu__link-icon flaticon-home-2"><span></span></i><span
                            class="kt-menu__link-text">{{ trans('left_aside.dashboard') }}</span></a></li>
                @haspermission('index-users')
                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('users.index') }}"
                            class="kt-menu__link bg-none "><i
                                class="kt-menu__link-icon flaticon2-user"><span></span></i><span
                                class="kt-menu__link-text">{{ __('users.users') }}</span></a></li>
                @endhaspermission
                {{-- @haspermission('index-groups')
                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('groups.index') }}"
                            class="kt-menu__link bg-none "><i
                                class="kt-menu__link-icon flaticon-users-1"><span></span></i><span
                                class="kt-menu__link-text">{{ __('groups.groups') }}</span></a></li>
                @endhaspermission --}}

                @haspermission('index-settings-main-sliders')
                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('settings.main_sliders.index') }}"
                            class="kt-menu__link bg-none "><i
                                class="kt-menu__link-icon flaticon-photo-camera"><span></span></i><span
                                class="kt-menu__link-text">{{ trans('left_aside.mainsliders') }}</span></a>
                    </li>
                @endhaspermission
                @haspermission('index-careers')
                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('careers.index') }}"
                            class="kt-menu__link bg-none "><i
                                class="kt-menu__link-icon flaticon-photo-camera"><span></span></i><span
                                class="kt-menu__link-text">{{ trans('careers::career.careers') }}</span></a>
                    </li>
                @endhaspermission
                @haspermission('index-categories')
                    <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('categories.index') }}"
                            class="kt-menu__link bg-none ">
                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
                                class="kt-menu__link-text">{{ __('categories::category.category') }}</span></a></li>
                @endhaspermission
                @stack('header-menu-last')
                <li id="header_menu_last" class="hidden kt-menu__item  kt-menu__item--submenu kt-menu__item--rel"
                    data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;"
                        class="kt-menu__link bg-none kt-menu__toggle"><span class="kt-menu__link-text"><i
                                class="fas fa-ellipsis-h"></i></span></a>
                    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                        <ul class="kt-menu__subnav" data-if-content-not-empty-show="#header_menu_last">
                            @stack('header-menu-hidden-first')
                            @stack('header-menu-hidden-last')
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- end:: Aside Menu -->
</div>

<!-- end:: Aside -->
