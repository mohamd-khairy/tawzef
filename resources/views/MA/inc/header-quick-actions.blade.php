
<!--begin: Quick actions -->
<div class="kt-header__topbar-item dropdown">
    <!-- <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,10px">
        <span class="kt-header__topbar-icon" data-skin="dark" data-toggle="kt-tooltip" data-placement="top" title="" data-original-title="{{__('main.add_new')}}"><i class="fa fa-plus"></i></span>
    </div> -->
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl kt-grid-nav--small-titles">
        <!--begin: Grid Nav -->
        <div class="kt-grid-nav kt-grid-nav--skin-light">
            <div class="kt-grid-nav__row">

            </div>
            <div class="kt-grid-nav__row">

            </div>
            <div class="kt-grid-nav__row kt-hide">

            </div>
            <div class="kt-grid-nav__row">
                @haspermission('create-inventory-unit')
                <a href="{{route('inventory.units.create')}}" data-load class="kt-grid-nav__item">
                    <span class="kt-grid-nav__icon font-color-navy"><i class="fas fa-building"></i></span>
                    <span class="kt-grid-nav__title font-color-navy">{{__('inventory::inventory.new_unit')}}</span>
                </a>
                @endhaspermission

                @haspermission('create-inventory-project')
                <a href="{{route('inventory.projects.create')}}" data-load class="kt-grid-nav__item">
                    <span class="kt-grid-nav__icon font-color-navy"><img src="{{asset('front/assets/img/fav.png')}}" style="width: 10%;" alt=""></span>
                    <span class="kt-grid-nav__title font-color-navy">{{__('inventory::inventory.new_project')}}</span>
                </a>
                @endhaspermission
            </div>
        </div>
        <!--end: Grid Nav -->
    </div>
</div>
<!--end: Quick actions -->