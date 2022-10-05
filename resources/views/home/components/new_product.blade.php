        <!-- ****** New Arrivals Area Start ****** -->
        <?php $product_index = 0; ?>
        <section class="new_arrivals_area section_padding_100_0 clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section_heading text-center">
                            <h2>New Arrivals</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="karl-projects-menu mb-100">
                <div class="text-center portfolio-menu">
                    <button class="btn active" data-filter="*">ALL</button>
                    @foreach($categories as $indexCategory => $categoryItem)

                        <button class="btn" data-filter=".category_{{$categoryItem->id}}">{{$categoryItem->name}}</button>

                    @endforeach
                </div>
            </div>

            <div class="container">
                <div class="row karl-new-arrivals">
                    @foreach ( $products as $product )
                        <!-- Single gallery Item Start -->
                        <div class="col-12 col-sm-6 col-md-4 single_gallery_item category_{{$product->parent_id}} wow fadeInUpBig" data-wow-delay="0.2s">
                            <!-- Product Image -->
                            <div class="product-img height">
                                <img class="height-400" src="{{config('app.backend_url') . $product->image_path }}" alt="">
                                <div class="product-quicview">
                                    <a href="#" data-toggle="modal" data-target="#quickview" class="toggle-modal"
                                    data-id="{{$product->id}}" data-name="{{$product->name}}" data-price="{{$product->price}}"
                                    data-image="{{$product->image_path}}" data-content="{{$product->content}}"
                                     ><i class="ti-plus"></i></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <h4 class="product-price">{{number_format($product->price)}} VND</h4>
                                <p>{{$product->name }}</p>
                                <!-- Add to Cart -->
                                <a href="#" class="add-to-cart-btn" data-url="{{ route('addToCart' , ['id' => $product->id]) }}" >ADD TO CART</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
        <!-- ****** New Arrivals Area End ****** -->
