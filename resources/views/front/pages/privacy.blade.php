@extends('front.layouts.main')
@section('content')
<div class="container-fluid p-5">
    @foreach ($privacies as $privacy )
    <div class="title w-100 d-flex flex-wrap justify-content-center mb-4">
        <h2>
            {{$privacy->title}}
        </h2>
    </div>
        <div class="description">

            {!! nl2br($privacy->description) !!}
        </div>
        @endforeach
</div>
@endsection
