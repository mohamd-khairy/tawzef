    <!-- Search Start -->
    <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
        <div class="container">
            <div class="row g-2">
                <div class="col-md-10">
                    <div class="row g-2">
                        <div class="col-md-6">
                            <input type="text" class="form-control border-0" placeholder="Keyword" />
                        </div>
                        <div class="col-md-6">
                            <select class="form-select border-0">
                                <option selected>Category</option>
                                @foreach ($categories as $cat )

                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100">Search</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Search End -->
