<?php
    $productMod = App\Models\Product::all();
?>
@extends('home.layouts.shop-template')
@section('product')
<div class="shop_grid_product_area">

                        <div class="row">
                            @foreach($productMod as $product)
                            <!-- Single Product -->
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="{{ asset($product->product_img) }}" alt="">
                                        <!-- Hover Thumb -->
                                        <img class="hover-img" src="{{ asset($product->product_img) }}" alt="">

                                        <!-- Favourite -->
                                        <div class="product-favourite">
                                            <a href="#" class="favme fa fa-heart"></a>
                                        </div>
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <span>topshop</span>
                                        <a href="single-product-details.html">
                                            <h6>{{$product->prouct_name}}</h6>
                                        </a>
                                        <p class="product-price"><span class="old-price">$75.00</span>{{$product->price}}</p>

                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="#" class="btn essence-btn">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
            

@endsection