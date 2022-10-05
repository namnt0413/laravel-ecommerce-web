{{-- Recommend product --}}

<section class="you_may_like_area clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading text-center">
                    <h2>Hot Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="you_make_like_slider owl-carousel">

                @foreach($productsRecommend as $keyRecommend => $productsRecommendItem )
                    <!-- Single gallery Item -->
                    <div class="single_gallery_item">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img class="height-400" src="{{ config('app.backend_url') . $productsRecommendItem->image_path }}" alt="">
                            <div class="product-quicview">
                                <a href="#" data-toggle="modal" data-target="#quickview" class="toggle-modal"
                                data-id="{{$productsRecommendItem->id}}" data-name="{{$productsRecommendItem->name}}" data-price="{{$productsRecommendItem->price}}"
                                data-image="{{$productsRecommendItem->image_path}}" data-content="{{$productsRecommendItem->content}}"><i class="ti-plus"></i></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <h4 class="product-price">{{ number_format($productsRecommendItem->price) }}</h4>
                            <p>{{ $productsRecommendItem->name }}</p>
                            <!-- Add to Cart -->
                            <a href="#" class="add-to-cart-btn" data-url="{{ route('addToCart' , ['id' => $productsRecommendItem->id]) }}" >ADD TO CART</a>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
