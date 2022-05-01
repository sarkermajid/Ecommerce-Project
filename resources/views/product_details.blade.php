<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products | RedStore</title>
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
                <a href="{{ url('/')}}"><img src="{{ asset('images/logo.png')}}" alt="logo" width="125px"></a>
            </div>
            <nav>
                <ul id="MenuItems">
                    <li><a href="{{ url('/')}}">Home</a></li>
                    <li><a href="{{ url('/products')}}">Products</a></li>
                    {{-- <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li> --}}
                    <li><a href="{{ url('/account')}}">Account</a></li>
                </ul>
            </nav>
            <a href="{{ url('/cart')}}"><img src="{{ asset('images/cart.png')}}" width="30px" height="30px"></a>
            <img src="{{ asset('images/menu.png')}}" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>
</div>

    <!-- Single Products -->
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset($images[0])}}" width="100%" id="ProductImg">

                <div class="small-img-row">
                    @if (isset($images[0]))
                    <div class="small-img-col">
                        <img src="{{ asset($images[0])}}" width="100%" class="small-img">
                    </div>
                    @endif
                    @if(isset($images[1]))
                    <div class="small-img-col">
                        <img src="{{ asset($images[1])}}" width="100%" class="small-img">
                    </div>
                    @endif
                    @if(isset($images[2]))
                    <div class="small-img-col">
                        <img src="{{ asset($images[2])}}" width="100%" class="small-img">
                    </div>
                    @endif
                    @if(isset($images[3]))
                    <div class="small-img-col">
                        <img src="{{ asset($images[3])}}" width="100%" class="small-img">
                    </div>
                    @endif
                </div>

            </div>
            <div class="col-2">
                <p>{{ $product->category->category_name }}</p>
                <h1>{{ $product->name }}</h1>
                <h4>Price : {{ $product->price }}</h4>
                <form method="POST" action="/add_to_cart">
                    @csrf
                    <select name="size">
                        <option value="">Select Size</option>
                        <option value="XXL">XXL</option>
                        <option value="XL">XL</option>
                        <option value="L">L</option>
                        <option value="M">M</option>
                        <option value="S">S</option>
                    </select>
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" value="{{ $product->name }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <label for="">Quantity</label>
                    <input name="quantity" type="number" value="1">
                    <button type="submit" class="btn">Add To Cart</button>
                </form>
                <h3>Product Details <i class="fa fa-indent"></i></h3>
                <br>
                <p>{{ $product->details }}</p>
            </div>
        </div>
    </div>
    <!-- title -->
    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <a href="{{ url('products/') }}"><p>View More</p></a>
        </div>
    </div>
    <!-- Products -->
    <div class="small-container">
        <div class="row">
            @foreach ($related_products as $related_product)
            <div class="col-4">
                <a href="{{ url('products/'.$related_product->id) }}"><img src="{{ asset(explode('|',$related_product->image)[0])}}"></a>
                <h4>{{ $related_product->name }}</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>{{ $related_product->price }}</p>
            </div>
            @endforeach
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

    <!-- product gallery -->
    <script>
        var ProductImg = document.getElementById("ProductImg");
        var SmallImg = document.getElementsByClassName("small-img");

        SmallImg[0].onclick = function () {
            ProductImg.src = SmallImg[0].src;
        }
        SmallImg[1].onclick = function () {
            ProductImg.src = SmallImg[1].src;
        }
        SmallImg[2].onclick = function () {
            ProductImg.src = SmallImg[2].src;
        }
        SmallImg[3].onclick = function () {
            ProductImg.src = SmallImg[3].src;
        }

    </script>
</body>

</html>
