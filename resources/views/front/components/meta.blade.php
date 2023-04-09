@push('meta')
<title>{{$meta->name}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="author" content="SportsArena">
<meta name="publisher" content="SportsArena">
<link rel="canonical" href="{{ Request::fullUrl() }}">
<meta name="title" content="{{isset($meta->created_at) ? ($meta->created_at ?? '') : ''}} {{ $meta->name }}" />
<meta name="keywords" content="{{ $meta->name }}" />
<meta name="description" content="{{isset($meta->created_at) ? ($meta->created_at ?? '') : ''}} {{ strip_tags($meta->description) }}" />
<!-- Twitter Card data -->
<meta name='twitter:app:country' content='EG' />
<meta name="twitter:site" content="@SportsArena" />
<meta name="twitter:creator" content="@SportsArena" />
<meta name="twitter:title" content="{{ $meta->name }}">
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:image" content="{{ asset('front/assets/img/logo.png') }}">
<meta name="twitter:description" content="{{isset($meta->created_at) ? ($meta->created_at ?? '') : ''}} {{ strip_tags($meta->description) }}" />
<!-- Open Graph data -->
<meta property="og:type" content="article" />
<meta property="og:site_name" content="Constguide">
<meta property="og:url" content="{{Request::url()}}" />
<meta property="og:title" content="{{$meta->name}}" />
<meta property="og:image" content="{{ asset('front/assets/img/logo.png') }}">
<meta property="og:description" content="{{ strip_tags($meta->description) }}" />
@endpush
