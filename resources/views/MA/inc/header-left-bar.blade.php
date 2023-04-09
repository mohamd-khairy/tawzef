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
                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
                    data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                        class="kt-menu__link bg-none kt-menu__toggle"><i
                            class="kt-menu__link-icon flaticon-layers"></i><span
                            class="kt-menu__link-text">{{ __('left_aside.management') }}</span><i
                            class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            @haspermission('index-users')
                                <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('users.index') }}"
                                        class="kt-menu__link bg-none "><i
                                            class="kt-menu__link-icon flaticon2-user"><span></span></i><span
                                            class="kt-menu__link-text">{{ __('users.users') }}</span></a></li>
                            @endhaspermission
                            @haspermission('index-groups')
                                <li class="kt-menu__item" aria-haspopup="true"><a href="{{ route('groups.index') }}"
                                        class="kt-menu__link bg-none "><i
                                            class="kt-menu__link-icon flaticon-users-1"><span></span></i><span
                                            class="kt-menu__link-text">{{ __('groups.groups') }}</span></a></li>
                            @endhaspermission
                            @haspermission('index-settings-contacts')
                                <li class="kt-menu__item " aria-haspopup="true" data-ktmenu-link-redirect="1"><a
                                        href="{{ route('settings.settings') }}" class="kt-menu__link bg-none "><i
                                            class="kt-menu__link-icon flaticon2-settings"><span></span></i><span
                                            class="kt-menu__link-text">{{ __('settings::settings.settings') }}</span></a>
                                </li>
                            @endhaspermission
                            @haspermission('index-subscribe-mails')
                                <li class="kt-menu__item " aria-haspopup="true" data-ktmenu-link-redirect="1"><a
                                        href="{{ route('contact_us.subscribes.index') }}" class="kt-menu__link "><i
                                            class="kt-menu__link-icon flaticon-email-black-circular-button"><span></span></i><span
                                            class="kt-menu__link-text">{{ __('contactus::contact_us.subscribes') }}</span></a>
                                </li>
                            @endhaspermission
                            @haspermission('index-settings-main-sliders')
                                <li class="kt-menu__item " aria-haspopup="true"><a
                                        href="{{ route('settings.main_sliders.index') }}" class="kt-menu__link bg-none "><i
                                            class="kt-menu__link-icon flaticon-photo-camera"><span></span></i><span
                                            class="kt-menu__link-text">{{ trans('left_aside.mainsliders') }}</span></a>
                                </li>
                            @endhaspermission

                            @haspermission('index-ads')
                                <li class="kt-menu__item " aria-haspopup="true" data-ktmenu-link-redirect="1"><a
                                        href="{{ route('ads.index') }}" class="kt-menu__link bg-none "><i
                                            class="kt-menu__link-icon flaticon-medal"></i><span
                                            class="kt-menu__link-text">{{ __('ads::ad.ads') }}</span></a>
                                </li>
                            @endhaspermission

                            @haspermission('index-seo')
                                <li class="kt-menu__item " aria-haspopup="true" data-ktmenu-link-redirect="1"><a
                                        href="{{ route('seo.index') }}" class="kt-menu__link bg-none "><i
                                            class="kt-menu__link-icon flaticon-dashboard"><span></span></i><span
                                            class="kt-menu__link-text">{{ __('seo::seo.seo') }}</span></a></li>
                            @endhaspermission
                            @haspermission('index-privacies')
                                <li class="kt-menu__item " aria-haspopup="true" data-ktmenu-link-redirect="1"><a
                                        href="{{route('privacies.modals.update',['id' => 1])}}" class="kt-menu__link bg-none "><i
                                            class="kt-menu__link-icon flaticon-map-location"><span></span></i><span
                                            class="kt-menu__link-text">{{ __('cms::cms.terms') }}</span></a>
                                </li>
                                <li class="kt-menu__item " aria-haspopup="true" data-ktmenu-link-redirect="1"><a
                                    href="{{route('privacies.modals.update',['id' => 2])}}" class="kt-menu__link bg-none "><i
                                        class="kt-menu__link-icon flaticon-map-location"><span></span></i><span
                                        class="kt-menu__link-text">{{ __('cms::cms.return_policy') }}</span></a>
                            </li>
                            @endhaspermission
                        </ul>
                    </div>
                </li>

                @haspermission('index-products')
                    <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
                        data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                            class="kt-menu__link bg-none kt-menu__toggle"><i
                                class="kt-menu__link-icon flaticon-grid-menu"></i><span
                                class="kt-menu__link-text">{{ __('products::product.products') }}</span><i
                                class="kt-menu__ver-arrow la la-angle-right"></i></a>
                        <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                            <ul class="kt-menu__subnav">
                                @haspermission('index-products-categories')
                                    <li class="kt-menu__item " aria-haspopup="true"><a
                                            href="{{ route('products.categories.index') }}" class="kt-menu__link bg-none "><i
                                                class="kt-menu__link-icon flaticon-map"></i><span
                                                class="kt-menu__link-text">{{ __('products::product.product_categories') }}</span></a>
                                    </li>
                                @endhaspermission
                                @haspermission('index-products-brands')
                                    <li class="kt-menu__item " aria-haspopup="true"><a
                                            href="{{ route('products.brands.index') }}" class="kt-menu__link bg-none "><i
                                                class="kt-menu__link-icon flaticon-confetti"></i><span
                                                class="kt-menu__link-text">{{ __('products::product.product_brands') }}</span></a>
                                    </li>
                                @endhaspermission
                                @haspermission('index-products')
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('products.index') }}"
                                            class="kt-menu__link bg-none "><i
                                                class="kt-menu__link-icon flaticon2-setup"></i><span
                                                class="kt-menu__link-text">{{ __('products::product.products') }}</span></a>
                                    </li>
                                @endhaspermission
                                @haspermission('index-products')
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('imports.index') }}"
                                            class="kt-menu__link bg-none "><i
                                                class="kt-menu__link-icon flaticon2-setup"></i><span
                                                class="kt-menu__link-text">{{ __('imports::imports.imports') }}</span></a>
                                    </li>
                                @endhaspermission
                                @haspermission('index-products-sizes')
                                <li class="kt-menu__item " aria-haspopup="true"><a
                                        href="{{ route('products.sizes.index') }}" class="kt-menu__link bg-none "><i
                                            class="kt-menu__link-icon flaticon-map"></i><span
                                            class="kt-menu__link-text">{{ __('products::product.sizes') }}</span></a>
                                </li>
                            @endhaspermission
                            </ul>
                        </div>
                    </li>
                @endhaspermission

                @haspermission('manage-orders')
                    <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"
                        data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
                            class="kt-menu__link bg-none kt-menu__toggle"><i
                                class="kt-menu__link-icon flaticon-open-box"></i><span
                                class="kt-menu__link-text">{{ __('orders::order.orders') }}</span><i
                                class="kt-menu__ver-arrow la la-angle-right"></i></a>
                        <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                            <ul class="kt-menu__subnav">
                                @haspermission('manage-order-statuses')
                                    <li class="kt-menu__item " aria-haspopup="true"><a
                                            href="{{ route('order.statuses.index') }}" class="kt-menu__link bg-none "><i
                                                class="kt-menu__link-icon flaticon-add-label-button"></i><span
                                                class="kt-menu__link-text">{{ __('orders::order.order_statuses') }}</span></a>
                                    </li>
                                @endhaspermission
                                @haspermission('manage-payment-methods')
                                    <li class="kt-menu__item " aria-haspopup="true"><a
                                            href="{{ route('orders.payment_methods.index') }}"
                                            class="kt-menu__link bg-none "><i
                                                class="kt-menu__link-icon flaticon2-shopping-cart"></i><span
                                                class="kt-menu__link-text">{{ __('orders::order.payment_methods') }}</span></a>
                                    </li>
                                @endhaspermission
                                @haspermission('manage-shipping-methods')
                                    <li class="kt-menu__item " aria-haspopup="true"><a
                                            href="{{ route('orders.shipping_methods.index') }}"
                                            class="kt-menu__link bg-none "><i
                                                class="kt-menu__link-icon flaticon2-shopping-cart"></i><span
                                                class="kt-menu__link-text">{{ __('orders::order.shipping_methods') }}</span></a>
                                    </li>
                                @endhaspermission
                                @haspermission('manage-coupon-codes')
                                    <li class="kt-menu__item " aria-haspopup="true"><a
                                            href="{{ route('orders.coupon_codes.index') }}" class="kt-menu__link bg-none "><i
                                                class="kt-menu__link-icon flaticon2-shopping-cart"></i><span
                                                class="kt-menu__link-text">{{ __('orders::order.coupon_codes') }}</span></a>
                                    </li>
                                @endhaspermission
                                @haspermission('index-locations')
                                    <li class="kt-menu__item " aria-haspopup="true" data-ktmenu-link-redirect="1"><a
                                            href="{{ route('locations.index') }}" class="kt-menu__link bg-none "><i
                                                class="kt-menu__link-icon flaticon-map-location"><span></span></i><span
                                                class="kt-menu__link-text">{{ __('locations::location.locations') }}</span></a>
                                    </li>
                                @endhaspermission
                                @haspermission('manage-orders')
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="{{ route('orders.index') }}"
                                            class="kt-menu__link bg-none "><i
                                                class="kt-menu__link-icon flaticon-add-label-button"></i><span
                                                class="kt-menu__link-text">{{ __('orders::order.orders') }}</span></a>
                                    </li>
                                @endhaspermission
                            </ul>
                        </div>
                    </li>
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
