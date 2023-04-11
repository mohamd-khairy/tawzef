@extends('front.layouts.main')
@section('content')
        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Jobs</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Jobs</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->
    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">

                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        @foreach ($careers as $career)
                            <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid border rounded"
                                            src="{{ $career->creator->image }}" alt=""
                                            style="width: 80px; height: 80px;">
                                        <div class="text-start ps-4">
                                            <h5 class="mb-3">{{ $career->title }}</h5>
                                            <span class="text-truncate me-3"><i
                                                    class="fa fa-map-marker-alt text-primary me-2"></i>{{ $career->location }}</span>
                                            <span class="text-truncate me-3"><i
                                                    class="far fa-clock text-primary me-2"></i>{{ $career->type }}</span>

                                        </div>
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            {{-- <a class="btn btn-light btn-square me-3" href=""><i
                                                class="far fa-heart text-primary"></i></a> --}}
                                                <a class="btn btn-primary" href="{{ route('front.careerSingle',['id' => $career->id]) }}">Apply Now</a>
                                            </div>
                                        {{-- <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Date
                                        Line: 01 Jan,
                                        2045</small> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->
@endsection
@push('scripts')
@endpush
