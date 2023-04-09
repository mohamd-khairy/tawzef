        <!-- On Sale Start -->
        <div class="py-5 text-center">
            @foreach ($ads as $ad_wide)
                @if($loop->index == 2)
                <a href="{{ $ad_wide->link }}">
                    <img src="{{$ad_wide->image}}" alt="">
                </a>
                @endif
            @endforeach
            <div class="my-4">
                <span class="section-title"> {{ __('main.on_sale') }} </span>
            </div>
        </div>
        <div class="container-fluid">
            <div class="on-sale">
                @foreach ($on_sales as $on_sale)
                    @include('front.components.product',['product' => $on_sale])
                @endforeach
            </div>
        </div>
        <!-- On Sale End -->
