    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div class="owl-carousel header-carousel position-relative">
            @foreach ($sliders as  $slider)
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset($slider->image ? 'storage/'.$slider->image : 'assets/app/media/img/bg/bg-1.jpg' ) }}" alt="" style="max-height: 400px;">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                        style="background: rgba(43, 57, 64, .5);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">{{$slider->title}}</h1>

                                    <a href="{{ route('front.careers') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search
                                        A Job</a>
                                    <a href="{{ route('front.categories') }}" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find By Category</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Carousel End -->
