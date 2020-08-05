<?php
if (Auth::user()){
     $cartitems = \Cart::session(auth()->id())->getContent();
    }
    //  dd($cartitems);
 ?>
 <!DOCTYPE html>
 <head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YouNick</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>
 <!-- Header Section Begin -->
    <header class="header-section">

        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{url('/')}}">
                                <!-- <img src="img/logo.png" alt=""> -->
                                <h3><b>YouNick</b></h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <div class="input-group">
                                <input type="text" placeholder="What do you need?">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="{{ route('cart.index')}}">
                                    <i class="icon_bag_alt"></i>
                                    @auth

                                    <span>{{Cart::session(auth()->id())->getContent()->count()}}</span>


                                    @endauth
                                    @guest
                                    <span>0</span>
                                    @endguest
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                    @auth

                                                        @foreach ($cartitems as $item)
                                                        <tr>
                                                            <td class="si-pic"><img style=" width: 121px;border-radius:10%;" src="/product_front_img/{{ $item['associatedModel']->product_front_img}}" alt=""></td>
                                                            <td class="si-text">
                                                                <div class="product-selected">
                                                                    <p>{{$item->price}}</p>
                                                                    <h6>{{$item->name}}</h6>
                                                                </div>
                                                            </td>
                                                            <td class="si-close">
                                                                <i class="ti-close"></i>
                                                            </td>
                                                        </tr>
                                                        @endforeach

                                                    @endauth
                                                    @guest
                                                    <tr></tr>
                                                    @endguest


                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        @auth

                                        <h5>{{Cart::session(auth()->id())->getTotal()}}</h5>

                                        @endauth
                                        @guest
                                           <h5>0</h5>

                                       @endguest
                                    </div>
                                    <div class="select-button">
                                    <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">
                                @auth

                                 ₹{{Cart::session(auth()->id())->getTotal()}}</h5>

                                @endauth
                            </li>
                            <!-- <li class="cart-price">$150.00</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Women’s Clothing</a></li>
                            <li><a href="#">Men’s Clothing</a></li>
                            <li><a href="#">Underwear</a></li>
                            <li><a href="#">Kid's Clothing</a></li>
                            <li><a href="#">Brand Fashion</a></li>
                            <li><a href="#">Accessories/Shoes</a></li>
                            <li><a href="#">Luxury Brands</a></li>
                            <li><a href="#">Brand Outdoor Apparel</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class=""><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{ url('shop')}}">Shop</a></li>
                        <li><a href="#">Collection</a>
                            <ul class="dropdown">
                                <li><a href="#">Men's</a></li>
                                <li><a href="#">Women's</a></li>
                                <li><a href="#">Kid's</a></li>
                            </ul>
                        </li>
                        {{-- <li><a href="{{url('blog')}}">Blog</a></li> --}}
                        <li><a href="{{url('contact')}}">Contact</a></li>
                        <li><a href="#">Admin panel</a>
                            <ul class="dropdown">
                                <li><a href="{{url('home')}}">Dashboard</a></li>
                                {{-- <li><a href="{{url('shopping-cart')}}">Shopping Cart</a></li>
                                <li><a href="{{url('check-out')}}">Checkout</a></li>
                                <li><a href="{{url('faq')}}">Faq</a></li>
                                <li><a href="{{url('register')}}">Register</a></li>
                                <li><a href="{{url('login')}}">Login</a></li> --}}
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Header End -->
