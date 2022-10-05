@extends('layouts.master')

@section('title')
    <title>Karl Shop</title>
@endsection

@section('content')

        <!-- ****** Top Discount Area Start ****** -->
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
        <!-- ****** Top Discount Area End ****** -->

        {{-- //php $carts = session()->get('carts');  --}}
        {{-- ?php dd($carts); ?> --}}
        <div class="cart-wrapper">
            @include('cart.components.cart_component ')
        </div>

@endsection
