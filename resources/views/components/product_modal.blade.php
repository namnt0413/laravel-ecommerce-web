

<div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

            <div class="modal-body">
                <div class="quickview_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <div class="quickview_pro_img image-modal">
                                </div>
                                <div class="id-modal" href="#">
                                    <a href="product-details.html">View Full Product Details</a>
                                </div>
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="quickview_pro_des">
                                    <h4 class="name-modal" id="name-modal"></h4>
                                    <div class="top_seller_product_rating mb-15">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <h5 class="price-modal"><span>$130</span></h5>
                                    <p class="content-modal">

                                    </p>

                                </div>
                                <!-- Add to Cart Form -->
                                <div class="cart">
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-minus" aria-hidden="true"></i></span>

                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">

                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                    </div>
                                    <button class="cart-submit"></button>
                                    <!-- Wishlist -->
                                    <div class="modal_pro_wishlist">
                                        <a href="wishlist.html" target="_blank"><i class="ti-heart"></i></a>
                                    </div>
                                    <!-- Compare -->
                                    <div class="modal_pro_compare">
                                        <a href="compare.html" target="_blank"><i class="ti-stats-up"></i></a>
                                    </div>
                                </div>

                                <div class="share_wf mt-30">
                                    <p>Share With Friend</p>
                                    <div class="_icon">
                                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
