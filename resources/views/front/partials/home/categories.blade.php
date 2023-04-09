<div class="container-fluid">
    @if(count($product_categories))
        <div class="row">
            <div class="my-4">
                <span class="section-title"> {{__('main.explore_by_categories')}} </span>
            </div>
        </div>

        <div class="categories-container categories-slider">
            <div class="swiper-wrapper">
                @foreach ($product_categories as $product_cat )
                    <div class="category-box swiper-slide">
                        <a href="{{route('front.products',['category_id' => $product_cat->id])}}">
                            <img src="{{asset('storage/'.$product_cat->image)}}" class="w-100" alt="">
                        </a>
                    </div>
                @endforeach
            </div>

        </div>
    @endif

    @if(count($ads))
    <!-- Ads Start -->
    <div class="ads-container mt-5">
        @foreach ($ads as $ad)
            @if($loop->index < 2)
            <a class="ad-link px-2 my-3 col-lg-6 col-md-6 col-sm-12" href="{{ $ad->link }}">
                <div class="ad-box">
                    <img src="{{$ad->image}}" alt="">
                    <span class="ad-text">{{$ad->title}}</span>
                </div>
            </a>
            @endif
        @endforeach

    </div>
    @endif
    <!-- Ads End -->
    @if(count($new_arrivals))
    <!-- New Arrival Start -->
    <div class="new-arrival">
        <div class="py-5 text-center">
            <div class="my-4">
                <span class="section-title"> {{__('main.new_arrivals')}} </span>
            </div>
        </div>
        <div class="mt-3 mySwiper">
            <div class="swiper-wrapper">
                @foreach ($new_arrivals as $new_arrival)
                    <div class="swiper-slide">
                        @include('front.components.product',['product' => $new_arrival])
                    </div>
                @endforeach
            </div>
        </div>
        <div class="w-100">
            <div class="slider-arrows">
                <span class="pre-slide">
                    <img src="{{asset('front/assets/img/icons/prev.png')}}" alt="">
                </span>
                <span class="next-slide">
                    <img src="{{asset('front/assets/img/icons/next.png')}}" alt="">
                </span>
            </div>
        </div>
    </div>
    <!-- New Arrival End -->
    @endif
</div>
