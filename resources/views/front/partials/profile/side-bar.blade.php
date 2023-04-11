<div class="col-xl-4 mb-5 mb-xl-0 order-first order-xl-last">
    <div class="sidebar position-sticky">
        <div class="row">
            <div class="col-xl-12 col-sm-6">
                <div class="user-info">
                    <div class="user-img"><img src="{{URL::asset(auth()->user()->image)}}" alt="{{auth()->user()->full_name}}"></div>
                    <div class="user-name">
                        <h4 class="text-capitalize">{{auth()->user()->full_name}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-sm-6 mt-3 mt-xl-3 mt-lg-0 mt-md-0 mt-sm-0">
                <ul class="user-navigation text-capitalize">
                    <li>
                        <a href="{{route('front.profile.info')}}" class="{{ Route::currentRouteName() == 'front.profile.info' ? 'active' : '' }}">
                            <ion-icon name="create-outline"></ion-icon>
                            {{__('users.user_info')}}
                        </a>
                    </li>
                </ul>
            </div>
        </div> <!-- ./ row -->
    </div> <!-- ./ sidebar -->
</div>
