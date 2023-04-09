<div class="on-sale">
    @foreach ($products as $product)
        @include('front.components.product',['product' => $product])
    @endforeach
</div>
<div class="my-5 text-center">
    <button class="show-more" onclick="window.location.href='{{route('front.products',['category_id' => $category_id,'brand_id' => $brand_id])}}'">Show More</button>
</div>
