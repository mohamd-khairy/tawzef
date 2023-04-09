@section('title', trans('settings::settings.settings'))

@include('dashboard.components.fast_modal')
@include('dashboard.styles.custom')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <!-- begin:: Content -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand fa fa-list"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            <span data-loadtitle>{{trans('settings::settings.settings')}}</span>
                            <small>{{trans('settings::settings.list')}}</small>
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">

                            {{--
                            &nbsp;
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-brand btn-icon-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="flaticon2-list"></i> Options
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__section kt-nav__section--first">
                                            <span class="kt-nav__section-text">Choose an action:</span>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-open-text-book"></i>
                                                <span class="kt-nav__link-text">Reservations</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-calendar-4"></i>
                                                <span class="kt-nav__link-text">Appointments</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-bell-alarm-symbol"></i>
                                                <span class="kt-nav__link-text">Reminders</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-contract"></i>
                                                <span class="kt-nav__link-text">Announcements</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-shopping-cart-1"></i>
                                                <span class="kt-nav__link-text">Orders</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__separator kt-nav__separator--fit">
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-rocket-1"></i>
                                                <span class="kt-nav__link-text">Projects</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-chat-1"></i>
                                                <span class="kt-nav__link-text">User Feedbacks</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <form action="{{route('settings.settings.update')}}" method="POST" id="update_setting_form" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator" data-async data-callback="updateContactCallback" data-parsley-validate enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$setting->id}}" />
                        <div class="m-portlet__body">
                            <div class="form-group row col-12">
                                <div class="col-6 mt-5">
                                    <label for="pixel_code">{{__('settings::settings.pixel_code')}}</label>
                                    <textarea rows="6" name="pixel_code" id="pixel_code" type="text" class="form-control" placeholder="{{__('settings::settings.pixel_code')}}" data-parsley-trigger="change focusout">{{$setting->pixel_code}}</textarea>
                                </div>
                                <div class="col-6 mt-5">
                                    <label for="tags_manager">{{__('settings::settings.tags_manager')}}</label>
                                    <textarea rows="6" name="tags_manager" id="tags_manager" type="text" class="form-control" placeholder="{{__('settings::settings.tags_manager')}}" data-parsley-trigger="change focusout">{{$setting->tags_manager}}</textarea>
                                </div>
                                <div class="col-6 mt-5">
                                    <label for="map">{{__('settings::settings.map')}}</label>
                                    <input name="map" id="map" type="file">
                                    <strong>Image dimensions : 1080 x 270</strong>
                                    <img src="{{asset('storage/'. $setting->map) }}" class="w-100" alt="">
                                </div>
                                {{-- <div class="col-6 mt-5">
                                    <label for="our_value_en">{{__('settings::settings.our_value_en')}}</label>
                                    <input name="our_value_en" id="our_value_en" type="text" class="form-control" value="{{$setting->our_value_en}}" placeholder="{{__('settings::settings.our_value_en')}}" data-parsley-trigger="change focusout">
                                </div>
                                <div class="col-6 mt-5">
                                    <label for="our_value_ar">{{__('settings::settings.our_value_ar')}}</label>
                                    <input name="our_value_ar" id="our_value_ar" type="text" class="form-control" value="{{$setting->our_value_ar}}" placeholder="{{__('settings::settings.our_value_ar')}}" data-parsley-trigger="change focusout">
                                </div>
                                <div class="col-6 mt-5">
                                    <label for="our_mission_en">{{__('settings::settings.our_mission_en')}}</label>
                                    <input name="our_mission_en" id="our_mission_en" type="text" class="form-control" placeholder="{{__('settings::settings.our_mission_en')}}" data-parsley-trigger="change focusout" value="{{$setting->our_mission_en}}">
                                </div>
                                <div class="col-6 mt-5">
                                    <label for="our_mission_ar">{{__('settings::settings.our_mission_ar')}}</label>
                                    <input name="our_mission_ar" id="our_mission_ar" type="text" class="form-control" placeholder="{{__('settings::settings.our_mission_ar')}}" data-parsley-trigger="change focusout" value="{{$setting->our_mission_ar}}">
                                </div>
                                <div class="col-6 mt-5">
                                    <label for="our_vision_en">{{__('settings::settings.our_vision_en')}}</label>
                                    <input name="our_vision_en" id="our_vision_en" type="text" class="form-control" placeholder="{{__('settings::settings.our_vision_en')}}" data-parsley-trigger="change focusout" value="{{$setting->our_vision_en}}">
                                </div>
                                <div class="col-6 mt-5">
                                    <label for="our_vision_ar">{{__('settings::settings.our_vision_ar')}}</label>
                                    <input name="our_vision_ar" id="our_vision_ar" type="text" class="form-control" placeholder="{{__('settings::settings.our_vision_ar')}}" data-parsley-trigger="change focusout" value="{{$setting->our_vision_ar}}">
                                </div>

                                <div class="col-1">
                                    <label for="enable_ar">{{__('settings::settings.enable_ar')}}</label>
                                    <input name="enable_ar" id="enable_ar" type="checkbox" @if($setting->enable_ar) checked @endif class="form-control">
                                </div> --}}

                            </div>
                            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions--solid">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-success btn-brand">{{trans('main.submit')}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>
        <!-- end:: Content -->
    </div>
    <!-- end:: Content -->
</div>