<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedStore | Ecommerce Website Design</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="{{ url('/') }}"><img src= "{{ asset('images/logo.png') }}" alt="logo" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/products') }}">Products</a></li>
                    {{-- <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li> --}}
                    <li><a href="{{ url('/account') }}">Account</a></li>
                </ul>
            </nav>
            <a href="{{ url('/cart') }}"><img src= "{{ asset('images/cart.png') }}" width="30px" height="30px"></a>
            <img src= "{{ asset('images/menu.png') }}" class="menu-icon" onclick="menutoggle()">
        </div>
        <div class="row">
            <div class="col-2">
                <h1>Give Your Workout <br> A New Style!</h1>
                <p>Success isn't always about greatness. It;s about consistency. Consistent <br> hard work gains
                    success. Greatness will come.</p>
                <a href="" class="btn">Explore Now &#8594;</a>
            </div>
            <div class="col-2">
                <img src= "{{ asset('images/image1.png') }}">
            </div>
        </div>
    </div>
</div>

<!-- Feadtued Categories -->

<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <img src= "{{ asset('images/category-1.jpg') }}" >
            </div>
            <div class="col-3">
                <img src="{{ asset('images/category-2.jpg') }}">
            </div>
            <div class="col-3">
                <img src="{{ asset('images/category-3.jpg') }}">
            </div>
        </div>
    </div>
</div>

<!-- Featured Products -->

<div class="small-container">
    <h2 class="title">Featured Products</h2>
    <div class="row">
        @foreach ($featured_products as $featured_product)
        <div class="col-4">
            <a href="{{ url('/products/'.$featured_product->id) }}"><img src="{{ asset(explode('|',$featured_product->image)[0]) }}" height="300" width="200"></a>
            <h4>{{ $featured_product->name }}</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>{{ $featured_product->price }}</p>
        </div>
        @endforeach
    </div>
    <h2 class="title">Latest Products</h2>
    <div class="row">
        @foreach ($latest_products as $latest_product)
        <div class="col-4">
            <a href="{{ url('/products/'.$latest_product->id) }}"><img src="{{ asset(explode('|',$latest_product->image)[0]) }}" height="300" width="200"></a>
            <h4>{{ $latest_product->name }}</h4>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </div>
            <p>{{ $latest_product->price }}</p>
        </div>
        @endforeach
    </div>
</div>

<!-- Offer -->
<div class="offer">
    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset('images/exclusive.png') }}" class="offer-img">
            </div>
            <div class="col-2">
                <p>Exclusively Available on RedStore</p>
                <h1>Smart Band 4</h1>
                <small>The Mi Smart Band 4 fearures a 39.9%larger (than Mi Band 3) AMOLED color full-touch display
                    with adjustable brightness, so everything is clear as can be.<br></small>
                <a href="{{ url('/products') }}" class="btn">Buy Now &#8594;</a>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial -->
<div class="testimonial">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    industry's standard dummy text.</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <img src="{{ asset('images/user-1.png')}}">
                <h3>Sean Parker</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    industry's standard dummy text.</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <img src="{{ asset('images/user-2.png')}}">
                <h3>Mike Smith</h3>
            </div>
            <div class="col-3">
                <i class="fa fa-quote-left"></i>
                <p>Lorem ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    industry's standard dummy text.</p>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <img src="{{ asset('images/user-3.png')}}">
                <h3>Mabel Joe</h3>
            </div>
        </div>
    </div>
</div>

<!-- Brands -->

<div class="brands">
    <div class="small-container">
        <div class="row">
            <div class="col-5">
                <img src="{{ asset('images/logo-godrej.png')}}>
            </div>
            <div class="col-5">
                <img src="{{ asset('images/logo-oppo.png')}}">
            </div>
            <div class="col-5">
                <img src="{{ asset('images/logo-coca-cola.png')}}">
            </div>
            <div class="col-5">
                <img src="{{ asset('images/logo-paypal.png')}}">
            </div>
            <div class="col-5">
                <img src="{{ asset('images/logo-philips.png')}}">
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Download Our App</h3>
                <p>Download App for Android and ios mobile phone.</p>
                <div class="app-logo">
                    <img src="{{ asset('images/play-store.png')}}">
                    <img src="{{ asset('images/app-store.png')}}">
                </div>
            </div>
            <div class="footer-col-2">
                <img src="{{ asset('images/logo-white.png')}}">
                <p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Sports Accessible to the Many.
                </p>
            </div>
            <div class="footer-col-3">
                <h3>Useful Links</h3>
                <ul>
                    <li>Coupons</li>
                    <li>Blog Post</li>
                    <li>Return Policy</li>
                    <li>Join Affiliate</li>
                </ul>
            </div>
            <div class="footer-col-4">
                <h3>Follow Us</h3>
                <ul>
                    <li>Facebook</li>
                    <li>Twitter</li>
                    <li>Instagram</li>
                    <li>Youtube</li>
                </ul>
            </div>
        </div>
        <hr>
        <p class="copyright">Copyright 2022 - sarkermajid</p>
    </div>
</div>

<!-- javascript -->

<script>
    var MenuItems = document.getElementById("MenuItems");
    MenuItems.style.maxHeight = "0px";
    function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
            MenuItems.style.maxHeight = "200px"
        }
        else {
            MenuItems.style.maxHeight = "0px"
        }
    }
</script>

</body>

</html>
