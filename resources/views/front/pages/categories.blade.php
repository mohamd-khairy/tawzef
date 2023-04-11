@extends('front.layouts.main')
@section('content')

        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Categories</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Categories</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->
    <!-- Category Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
            <div class="row g-4">
                @foreach ($categories as  $category)
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.{{ $loop->index +1 }}s">
                    <a class="cat-item rounded p-4" href="">
                        {{-- <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i> --}}
                        <h6 class="mb-3">{{ $category->title }}</h6>
                        <p class="mb-0">{{ $category->careers()->count() }} Vacancy</p>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Category End -->
@endsection
@push('scripts')
@endpush
