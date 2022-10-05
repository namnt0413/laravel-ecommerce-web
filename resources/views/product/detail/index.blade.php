@extends('layouts.master')

@section('title')
    <title>KarlShop</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
    <link rel="icon" href="{{ asset('karl/img/core-img/circle_logo.png') }}">
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('karl/css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('karl/style.css') }}">
    <link href="{{ asset('karl/css/responsive.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('karl/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('karl/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('karl/js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('karl/js/plugins.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('karl/js/active.js') }}"></script>
@endsection

@section('content')

        <section class="top-discount-area d-md-flex align-items-center">
            <!-- Single Discount Area -->
            <div class="single-discount-area">
                <h5>Free Shipping &amp; Returns</h5>
                <h6><a href="#">BUY NOW</a></h6>
            </div>
            <!-- Single Discount Area -->
            <div class="single-discount-area">
                <h5>20% Discount for all dresses</h5>
                <h6>USE CODE: Colorlib</h6>
            </div>
            <!-- Single Discount Area -->
            <div class="single-discount-area">
                <h5>20% Discount for students</h5>
                <h6>USE CODE: Colorlib</h6>
            </div>
        </section>

        <!-- <<<<<<<<<<<<<<<<<<<< Breadcumb Area Start <<<<<<<<<<<<<<<<<<<< -->
        <div class="breadcumb_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <ol class="breadcrumb d-flex align-items-center">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Dresses</a></li>
                            <li class="breadcrumb-item active">Long Dress</li>
                        </ol>
                        <!-- btn -->
                        <a href="#" class="backToHome d-block"><i class="fa fa-angle-double-left"></i> Back to Category</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- <<<<<<<<<<<<<<<<<<<< Breadcumb Area End <<<<<<<<<<<<<<<<<<<< -->

        <!-- <<<<<<<<<<<<<<<<<<<< Single Product Details Area Start >>>>>>>>>>>>>>>>>>>>>>>>> -->
        <section class="single_product_details_area section_padding_0_100">
            <div class="container">
                <div class="row">

                    @foreach($product as $item)
                    <div class="col-12 col-md-6">
                        <div class="single_product_thumb">

                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach ( $product_images as $product_image_key => $product_image)
                                    {{-- <li class="active" data-target="#product_details_slider" data-slide-to="{{$product_image_key}}" style="background-image: url(img/product-img/product-9.jpg);">
                                    </li> --}}
                                    <li data-target="#product_details_slider" data-slide-to="{{$product_image_key}}"
                                        style="background-image: url({{config('app.backend_url') . $product_image->detail_image_path }});">
                                    </li>
                                    @endforeach
                                </ol>

                                <div class="carousel-inner">
                                    {{-- <div class="carousel-item active">
                                        <a class="gallery_img" href="img/product-img/product-9.jpg">
                                            <img class="d-block w-100" src="img/product-img/product-9.jpg" alt="First slide">
                                        </a>
                                    </div> --}}
                                    @foreach ( $product_images as $product_image_key => $product_image)
                                    <div class="carousel-item {{ $product_image_key == 0 ? 'active' : '' }}">
                                        <a class="gallery_img" href="{{config('app.backend_url') . $product_image->detail_image_path }}">
                                        <img class="d-block w-100 height-600" src="{{config('app.backend_url') . $product_image->detail_image_path }}" alt="Second slide">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="single_product_desc">

                            <h4 class="title"><a href="#">{{$item->name}}</a></h4>

                            <h4 class="price">{{ number_format($item->price)}} VND</h4>

                            <p class="available">Available: <span class="text-muted">In Stock</span></p>

                            <div class="single_product_ratings mb-15">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            </div>

                            {{-- size --}}
                            <div class="widget size mb-50">
                                <h6 class="widget-title">Size</h6>
                                <div class="widget-desc">
                                    <ul>
                                        <li><a href="#">32</a></li>
                                        <li><a href="#">34</a></li>
                                        <li><a href="#">36</a></li>
                                        <li><a href="#">38</a></li>
                                        <li><a href="#">40</a></li>
                                        <li><a href="#">42</a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Add to Cart Form -->
                            <div class="cart clearfix mb-50 d-flex" >
                                <div class="quantity">
                                    <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">
                                    <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                </div>
                                <button name="addtocart" value="5" class="btn cart-submit d-block add-to-cart-btn"
                                    data-url="{{ route('addToCart' , ['id' => $item->id]) }}">
                                    Add to cart
                                </button>

                            </div>

                            <div id="accordion" role="tablist">
                                <div class="card">
                                    <div class="card-header" role="tab" id="headingOne">
                                        <h6 class="mb-0">
                                            <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Information</a>
                                        </h6>
                                    </div>

                                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            {!! html_entity_decode($item->content) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </section>
        <!-- <<<<<<<<<<<<<<<<<<<< Single Product Details Area End >>>>>>>>>>>>>>>>>>>>>>>>> -->

        <!-- ****** Quick View Modal Area Start ****** -->
        @include('components.product_modal')
        <!-- ****** Quick View Modal Area End ****** -->

        {{-- relation --}}
        <?php //dd($related_products , $category_id)  ?>
        <section class="you_may_like_area clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-center">
                            <h2>related Products</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="you_make_like_slider owl-carousel">

                            @foreach ( $related_products as $related_product )
                            <!-- Single gallery Item -->
                            <div class="single_gallery_item">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img class="height-400" src="{{config('app.backend_url') . $related_product->image_path }}" alt="">
                                    <div class="product-quicview">
                                        <a href="#" data-toggle="modal" data-target="#quickview"  class="toggle-modal"
                                            data-id="{{$related_product->id}}"  data-price="{{$related_product->price}}" data-name="{{ $related_product->name }}"
                                            data-image="{{$related_product->image_path}}" data-content="{{$related_product->content}}"
                                            ><i class="ti-plus"></i></a>
                                    </div>
                                </div>
                                <!-- Product Description -->
                                <div class="product-description">
                                    <h4 class="product-price">{{ number_format($related_product->price) }}</h4>
                                    <p>{{$related_product->name}}</p>
                                    <!-- Add to Cart -->
                                    <a href="#" class="add-to-cart-btn" data-url="{{ route('addToCart' , ['id' => $related_product->id]) }}" >ADD TO CART</a>

                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>

 @endsection
