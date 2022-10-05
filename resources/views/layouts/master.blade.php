<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Karl Fashion</title>

    <!-- Favicon  -->
    <link rel="icon" href="karl/img/core-img/circle_logo.png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="karl/css/core-style.css">
    <link rel="stylesheet" href="karl/style.css">

    <!-- Responsive CSS -->
    <link href="karl/css/responsive.css" rel="stylesheet">

    @yield('css')
</head>

<body>
    <?php $cartQuantity = 0; ?>

    <div class="catagories-side-menu">
        <!-- Close Icon -->
        <div id="sideMenuClose">
            <i class="ti-close"></i>
        </div>
        <!--  Side Nav  -->
        <div class="nav-side-menu">
            <div class="menu-list">
                <h6>Settings</h6>
                <ul id="menu-content" class="menu-content collapse out">
                    <!-- Single Item -->
                    <li data-toggle="collapse" data-target="#women" class="collapsed active">
                        <a href="#">User<span class="arrow"></span></a>
                        <ul class="sub-menu collapse" id="women">
                            <li><a href="#">Midi Dresses</a></li>
                            <li><a href="#">Maxi Dresses</a></li>
                            <li><a href="#">Prom Dresses</a></li>
                            <li><a href="#">Little Black Dresses</a></li>
                            <li><a href="#">Mini Dresses</a></li>
                        </ul>
                    </li>
                    <!-- Single Item -->
                    <li data-toggle="collapse" data-target="#man" class="collapsed">
                        <a href="#">Language<span class="arrow"></span></a>
                        <ul class="sub-menu collapse" id="man">
                            <li><a href="#">Man Dresses</a></li>
                            <li><a href="#">Man Black Dresses</a></li>
                            <li><a href="#">Man Mini Dresses</a></li>
                        </ul>
                    </li>
                    <!-- Single Item -->
                    <li data-toggle="collapse" data-target="#kids" class="collapsed">
                        <a href="#">Theme<span class="arrow"></span></a>
                        <ul class="sub-menu collapse" id="kids">
                            <li><a href="#">Children Dresses</a></li>
                            <li><a href="#">Mini Dresses</a></li>
                        </ul>
                    </li>
                    <!-- Single Item -->
                    <li data-toggle="collapse" data-target="#bags" class="collapsed">
                        <a href="#">Help<span class="arrow"></span></a>
                        <ul class="sub-menu collapse" id="bags">
                            <li><a href="#">Bags</a></li>
                            <li><a href="#">Purses</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div id="wrapper">
        @include('components.header')
        @yield('content')
        @include('components.footer')
    </div>
    <!-- /.wrapper end -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="karl/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="karl/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="karl/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="karl/js/plugins.js"></script>
    <!-- Active js -->
    <script src="karl/js/active.js"></script>

    @yield('js')

    <script>
        function addToCart(event){
            event.preventDefault();
            let urlCart = $(this).data('url');
            let cartQuantity = $('#cart_quantity').data('quantity');
            cartQuantity += 1;
            // alert(cartQuantity);
            $.ajax({
                type: "GET",
                url: urlCart,
                dataType: 'json',
                success: function(data){
                    if( data.code === 200 ){
                        console.log(data);
                        // document.getElementById("quantity").innerHTML = "<?=$cartQuantity?>";
                         $('#cart_quantity').html(cartQuantity);
                        alert('Them san pham vao gio hang thanh cong');
                    }
                },
                error(){

                }
            })
        }

        function cartUpdate(event){
            event.preventDefault();
            let urlUpdateCart = $('.update-cart-url').data('url');
            // console.log(urlUpdateCart);
            let id = $(this).data('id'); // lay id cua product dang update
            let quantity = $(this).parents('tr').find('input').val(); // lay ra quantity = cach find cac input co cha la tr
            // alert(quantity);
            $.ajax({
                type: "GET",
                url: urlUpdateCart,
                data: {id: id, quantity: quantity},
                success: function(data){
                    if( data.code === 200 ){
                        $('.cart-wrapper').html(data.cart_component)
                        alert('Them san pham vao gio hang thanh cong');
                    }
                    // console.log(data);
                },
                error(){

                }
            })
        }

        function cartDelete(event){
            event.preventDefault();
            let urlDeleteCart = $('.delete-cart-url').data('url');
            let id = $(this).data('id'); // lay id cua product dang update
            // alert(urlDeleteCart);

            $.ajax({
                type: "GET",
                url: urlDeleteCart,
                data: {id: id},
                success: function(data){
                    if( data.code === 200 ){
                        $('.cart-wrapper').html(data.cart_component)
                        alert('Xoa san pham vao gio hang thanh cong');
                    }
                    // console.log(data);
                },
                error(){

                }
            })
        }

        function showModalProduct(event){
            event.preventDefault();
            let id = $(this).data('id');
            let name = $(this).data('name');
            let content = $(this).data('content');
            let price = $(this).data('price');
            let image = $(this).data('image');
            let image_url = '<img src="http://localhost:8000' + image + '" alt="">';
            let link_url = '<a href="http://localhost:8000/product/' + id + '">View Full Product Details</a>';
            let add_to_cart_url = '<a class="add-to-cart-btn" data-url="http://localhost:8000/add-to-cart/' + id + '" >ADD TO CART</a>';

            console.log(id, name, price , image_url, link_url, add_to_cart_url );
            // return;
            $('.id-modal').html(link_url);
            $('.name-modal').html(name);
            $('.content-modal').html(content);
            $('.image-modal').html(image_url);
            $('.price-modal').html(price);
            $('.cart-submit').html(add_to_cart_url);
        }

        $(function() {
            // alert('hello')
            $('.add-to-cart-btn').on('click', addToCart);

            $(document).on('click' , '.cart-update' , cartUpdate);
            $(document).on('click' , '.cart-delete' , cartDelete);
            $('.toggle-modal').on('click', showModalProduct);

        });

    </script>

</body>
</html>

