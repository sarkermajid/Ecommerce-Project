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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
                <a href="{{ url('/cart')}} ><img src="{{ asset('images/cart.png')}}" width="30px" height="30px"></a>
                <img src="images/menu.png')}}" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>
    </div>
    <!-- Cart items details -->
    <div class="small-container cart-page">
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            @foreach ($carts as $cart)
            <tr>
                <td>
                    <div class="cart-info">
                        <img src="{{ asset($cart->options['image'])}}">
                        <div>
                            <p>{{ $cart->name }}</p>
                            <small>Price: {{ $cart->price }}</small>
                            <br>
                            <a href="{{ url('/remove_item/'.$cart->rowId) }}">Remove</a>
                        </div>
                    </div>
                </td>
                <td>{{ $cart->qty }}</td>
                <td>Total: {{ $cart->options['total'] }}</td>
            </tr>
            @endforeach
        </table>
        <div class="total-price">
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td>{{ $subTotal }}</td>
                </tr>
                <tr>
                    <td><Button class="btn">Checkout</Button></td>
                </tr>
            </table>
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
            <p class="copyright">Copyright 2022 - Sarkermajid</p>
        </div>
    </div>

    <!-- javascript -->
        <!-- javascript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
