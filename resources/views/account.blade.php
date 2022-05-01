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
{{--        <div class="row">--}}
{{--            <div class="col-2">--}}
{{--                <h1>Give Your Workout <br> A New Style!</h1>--}}
{{--                <p>Success isn't always about greatness. It;s about consistency. Consistent <br> hard work gains--}}
{{--                    success. Greatness will come.</p>--}}
{{--                <a href="" class="btn">Explore Now &#8594;</a>--}}
{{--            </div>--}}
{{--            <div class="col-2">--}}
{{--                <img src= "{{ asset('images/image1.png') }}">--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>

    <!-- Account Page -->
    <div class="account-page">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="{{ asset('images/image1.png')}}" width="70%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="register()">Register</span>
                            <span onclick="login()">Login</span>
                            <hr id="Indicator">
                        </div>
                        <form id="LoginForm" action="/users" method="GET">
                            @csrf
                            <input type="text" name="uname" placeholder="Username">
                            <input type="password" name="pass" placeholder="Password">
                            <button type="submit" class="btn">Login</button>
                            <a href="">Forget Password</a>
                        </form>

                        <form id="RegForm" action="/users" method="POST">
                            @csrf
                            <input type="text" name="uname" placeholder="Username" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="text" name="mobile" placeholder="Mobile" required>
                            <input type="password" name="pass" placeholder="Password" required>
                            <button type="submit" class="btn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
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
        <p class="copyright">Copyright 2020 - Samwit Adhikary</p>
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

    <!-- Toggle Form -->
    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");
        function register() {
            RegForm.style.transform = "translatex(300px)";
            LoginForm.style.transform = "translatex(300px)";
            Indicator.style.transform = "translateX(0px)";

        }
        function login() {
            RegForm.style.transform = "translatex(0px)";
            LoginForm.style.transform = "translatex(0px)";
            Indicator.style.transform = "translate(100px)";

        }
    </script>

</body>

</html>
