    <x-web-layout title="Menu Detail">
        <style>
            .star-rating {
                display: inline-block;
                font-size: 0;
                position: relative;
            }
            .star-rating::before {
                content: "★★★★★";
                font-size: 24px;
                color: #ccc;
            }
            .star-rating::after {
                content: "★★★★★";
                font-size: 24px;
                color: #f5c518;
                position: absolute;
                top: 0;
                left: 0;
                overflow: hidden;
                white-space: nowrap;
                width: 0;
            }
            .star-rating[data-rating="1"]::after { width: 20%; }
            .star-rating[data-rating="2"]::after { width: 40%; }
            .star-rating[data-rating="3"]::after { width: 60%; }
            .star-rating[data-rating="4"]::after { width: 80%; }
            .star-rating[data-rating="5"]::after { width: 100%; }
        </style>
        
        <div class="banner">
            <img src="{{ asset('assets/images/shop/3.jpeg') }}" class="img-responsive bg" alt="banner-top" title="banner-top">
            <div class="container">
                <div class="matter">
                    <div class="crumb">
                        <h2>Detail Menu</h2>
                        <ul class="list-inline">
                            <li><a href="{{ url('/') }}">Beranda</a></li>
                            <li><a href="{{ url('/daftarmenu') }}">Detail Menu</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 order col-sm-offset-3">
                        <form class="form-horizontal search-icon" method="post"></form>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="row shopdetail">
                            <div class="col-sm-5 mx-auto col-xs-12">
                                <div class="image">
                                    <img src="{{ asset('images/produk/' . $product->cover) }}" alt="image" title="image"
                                        class="img-responsive mx-auto d-block" style="width:100%; height:40vh" />
                                </div>
                            </div>
                            <div class="col-sm-7 col-xs-12">
                                <h2 style="font-size: 26px;">{{ $product->title }}</h2>
                                <h3 style="font-size: 20px;">Stok: {{ $product->stock }}</h3>
                                @php
                                $discountedPrice = $product->price; // Harga default
                                foreach ($pengumumans as $item) {
                                    if ($item->product_id == $product->id && $item->product) {
                                        $discountPercentage = intval($item->konten);
                                        $discountPercentage = max(0, min(100, $discountPercentage));
                                        $discountedPrice = $product->price * (1 - $discountPercentage / 100);
                                    }
                                }
                            @endphp
                        
                            <div class="price" style="font-size: 24px;">
                                @if ($discountedPrice != $product->price)
                                    <span style="text-decoration: line-through;">Rp. {{ $product->price }}</span>
                                    Diskon: {{ $discountPercentage }}% Off Harga Setelah Diskon: Rp. {{ $discountedPrice }}
                                @else
                                    Rp. {{ $product->price }}
                                @endif
                            </div>
                        
                            
                                <p style="font-size: 18px;">{{ $product->description }}</p>

                                <!-- Display Average Rating as Stars -->
                                <div class="avg-rating" style="font-size: 18px;">
                                    <span>Rata-Rata Rating Produk Ini:</span>
                                    <div class="star-rating" data-rating="{{ round($averageRating) }}">
                                        @if($averageRating)
                                            <span style="font-size: 18px;">{{ number_format($averageRating, 1) }}</span>
                                        @else
                                            <span>Belum ada Rating</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Display All Ratings -->
                                <div class="ratings">
                                    @foreach($ratings as $rating)
                                        <div class="rating">
                                            <div class="star-rating" data-rating="{{ $rating->rating }}"></div>
                                            <p>{{ $rating->comment }}</p>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="common">
                                    @if (Auth::check())
                                        @php
                                            $hasPurchased = App\Models\OrderDetail::whereHas('order', function ($query) {
                                                $query->where('user_id', auth()->id());
                                            })
                                                ->where('product_id', $product->id)
                                                ->exists();
                                        @endphp

                                        @if ($hasPurchased)
                                            <form method="POST" action="{{ route('web.rating.store', $product->id) }}">
                                                @csrf
                                                <div class="container">
                                                    <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                                                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                                                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
                                                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
                                                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn-primary" style="color: black;">Submit Rating</button>
                                            </form>
                                        @else
                                            <div class="alert alert-warning" role="alert">
                                                Anda harus membeli produk ini terlebih dahulu untuk memberikan rating.
                                            </div>
                                        @endif

                                        <form method="POST" action="{{ route('web.cart.add', $product->id) }}">
                                            @csrf
                                            <p class="qtypara pull-left">
                                                <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control qty" style="width: 50px;" />
                                            </p>
                                            <div class="buttons">
                                                <button type="button" class="btn-primary" onclick="location.href='{{ url('/daftarmenu') }}';">Kembali</button>
                                                <button type="submit" class="btn-primary">Keranjang</button>
                                            </div>
                                        </form>
                                    @else
                                        <div class="alert alert-warning" role="alert">
                                            Silakan login terlebih dahulu untuk menambahkan ke keranjang.
                                        </div>
                                    @endif
                                </div>

                                <script>
                                    document.getElementById('input-quantity').addEventListener('change', function() {
                                        var quantity = parseInt(this.value);
                                        if (isNaN(quantity) || quantity < 1) {
                                            this.value = 1;
                                        }
                                    });

                                    document.getElementById('rating-form').addEventListener('submit', function() {
                                        var ratingInputs = document.querySelectorAll('input[name="rating"]');
                                        ratingInputs.forEach(function(input) {
                                            input.disabled = true;
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-web-layout>
