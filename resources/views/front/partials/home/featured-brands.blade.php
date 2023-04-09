@if (count($grouped_products))
    <!-- Rackets Start  -->
    @foreach ($grouped_products as $grouped_key => $grouped_product)
        <div class="py-5 text-center">
            <div class="my-4">
                <span class="section-title"> {{ \Modules\Products\ProductCategory::find($grouped_key)->name }} </span>
            </div>
            @if (count($grouped_product))
                <div class="filter-brands">
                    @foreach ($grouped_product as $brand_key => $grouped_pro)
                        <button class="brand-button my-2 {{$loop->index == 0  ? 'first-ber-cat': ''}}"
                            onclick="getProductData('{{$grouped_key}}','{{$brand_key}}')">{{ \Modules\Products\Brand::find($brand_key)->name }}</button>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="container-fluid data-container-{{ $grouped_key }}">

        </div>

    @endforeach
    <!-- Rackets End -->
    @push('scripts')
        <script>
            function getProductData(category_id, brand_id) {
                var url = "{{ route('front.productsByBrand') }}";
                url = url + `?category_id=${category_id}&brand_id=${brand_id}`;
                $.get(url).done(function(res) {
                    $(`.data-container-${category_id}`).html(res);
                });
            }

            $(document).ready(function(){
                $('.first-ber-cat').click();
            })
        </script>
    @endpush
@endif
