
        <!-- ****** Header Area Start ****** -->
        <header class="header_area">
            <!-- Top Header Area Start -->
            <div class="top_header_area">
                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-end">

                        <div class="col-12 col-lg-7">
                            <div class="top_single_area d-flex align-items-center">
                                <!-- Logo Area -->
                                <div class="top_logo">
                                    {{-- config('app.backend_url') --}}
                                    <a href="#"><img src="{{config('app.frontend_url')}}/karl/img/core-img/logo.png" alt=""></a>
                                </div>
                                <!-- Cart & User & setting Area -->
                                <div class="header-cart-menu d-flex align-items-center ml-auto">
                                    <!-- Cart Area -->
                                    <?php   $carts = session()->get('cart');
                                       //  dd($carts);
                                        if( $carts !== null ){
                                           foreach ($carts as $cart) {
                                              $cartQuantity += $cart['quantity'];
                                           }
                                        }
                                    ?>
                                    <div class="cart">
                                        <a href="#" id="header-cart-btn" target="_blank"><span data-quantity="{{$cartQuantity }}" id="cart_quantity" class="cart_quantity">{{$cartQuantity}}</span> <i class="ti-bag"></i></a>
                                        <!-- Cart List Area Start -->
                                        <ul class="cart-list">
                                            <?php if( $carts !== null ){ ?>
                                            @foreach ($carts as $cart)
                                            <li>
                                                <a href="#" class="image"><img src="{{config('app.backend_url') . $cart['image'] }}" class="cart-thumb" alt=""></a>
                                                <div class="cart-item-desc">
                                                    <h6><a href="#">{{$cart['name']}}</a></h6>
                                                    <p>{{$cart['quantity']}}x - <span class="price">{{$cart['price']}}</span></p>
                                                </div>
                                                <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                            </li>
                                            @endforeach
                                            <?php } ?>

                                            <li class="total">
                                                <div class="row" style="padding:5px;margin: auto;">
                                                    <span class="pull-right">Total: $20.00</span>
                                                </div>
                                                <a href="{{ route('showCart') }}" class="btn btn-sm btn-cart">Your Cart</a>
                                                <a href="checkout-1.html" class="btn btn-sm btn-checkout">Checkout</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <?php
                                        $user = session()->get('user') ;
                                        if( $user !== null ){
                                    ?>
                                    <div class="user" style="margin-left:15px">
                                    @foreach ($user as $item)
                                    <!-- User Area -->
                                        <a href="#" id="header-user-btn" target="_blank">
                                            <i class="ti-user"></i>
                                            <span class="username">{{$item['name']}}</span>

                                        </a>
                                        <!-- Cart List Area Start -->
                                        <ul class="user-list">
                                            <li>
                                                <i class="ti-user mr-3"></i>
                                                My Profile
                                                <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                            </li>
                                            <li>
                                                <i class="ti-settings mr-3"></i>
                                                Setting
                                                <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                            </li>
                                            <li>
                                                <i class="ti-help-alt mr-3"></i>
                                                Help
                                                <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                            </li>
                                            <a href="{{route('logout') }}">
                                                <i class="ti-shift-left mr-3"></i>
                                                Sign out
                                                <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                            </a>
                                        </ul>
                                        @endforeach
                                    </div>
                                        <?php } else { ?>
                                    <!-- User Area -->
                                    <div class="user" style="margin-left:15px">
                                        <a href="#" id="header-user-btn" target="_blank">
                                            <i class="ti-user"></i>
                                            <span class="username"></span>

                                        </a>
                                        <!-- Cart List Area Start -->
                                        <ul class="user-list">
                                            <li>
                                                <i class="ti-user mr-3"></i>
                                                My Profile
                                                <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                            </li>
                                            <li>
                                                <i class="ti-settings mr-3"></i>
                                                Setting
                                                <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                            </li>
                                            <li>
                                                <i class="ti-help-alt mr-3"></i>
                                                Help
                                                <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                            </li>
                                            <a href="{{route('login') }}">
                                                <i class="ti-shift-left mr-3"></i>
                                                Login or Sign up
                                                <span class="dropdown-product-remove"><i class="icon-cross"></i></span>
                                            </a>
                                        </ul>
                                    </div>
                                        <?php } ?>

                                    <div class="header-right-side-menu ml-15">
                                        <a href="#" id="sideMenuBtn"><i class="ti-settings" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Top Header Area End -->
            <div class="main_header_area">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-12 d-md-flex justify-content-between">
                            <!-- Header Social Area -->
                            <div class="header-social-area">
                                <a href="#"><span class="karl-level">Share</span> <i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="{{getConfigValueFromSettingTable('facebook_link')}}"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                            <!-- Menu Area -->
                            <div class="main-menu-area">
                                <nav class="navbar navbar-expand-lg align-items-start">

                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#karl-navbar" aria-controls="karl-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i class="ti-settings"></i></span></button>

                                    <div class="collapse navbar-collapse align-items-start collapse" id="karl-navbar">
                                        <ul class="navbar-nav animated" id="nav">
                                            <li class="nav-item active"><a class="nav-link" href="{{ route('home.index') }}">Home</a></li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="karlDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category Product</a>
                                                <div class="dropdown-menu" aria-labelledby="karlDropdown">
                                                    @foreach($categories as $categoryParent)
                                                        <a class="nav-link dropdown-toggle" href="#" id="karlDropdown-{{$categoryParent->id}}" role="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">{{ $categoryParent->name }}</a>
                                                        @include('components.child_menu', ['categoryParent' => $categoryParent])
                                                    @endforeach
                                                </div>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#"><span class="karl-level">hot</span> Discount</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="karlDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Navigation</a>
                                                <div class="dropdown-menu" aria-labelledby="karlDropdown">
                                                    <a class="dropdown-item" href="{{ route('home.index') }}">Home</a>
                                                    <a class="dropdown-item" href="{{ route('product.index') }}">Shop</a>
                                                    <a class="dropdown-item" href="#">Product Details
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('cart.index') }}">Cart</a>
                                                    <a class="dropdown-item" href="{{ route('checkout.index') }}">Checkout</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                            <!-- Help Line -->
                            <div class="help-line">
                                <a href="tel:+346573556778"><i class="ti-headphone-alt"></i> {{ getConfigValueFromSettingTable('phone_contact') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- ****** Header Area End ****** -->
