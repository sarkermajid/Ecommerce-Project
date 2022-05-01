<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Admin Products | RedStore</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('images/logo.png')}}" alt="logo" width="125px"></a>
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
            <a href="{{ url('/cart') }}"><img src="{{ asset('images/cart.png')}}" width="30px" height="30px"></a>
            <img src="{{ asset('images/menu.png')}}" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>
</div>

<!-- Account Page -->
<h2 class="bg-dark display-4 text-white text-center">Admin Panel</h2>
<div class="account-page">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger">
            {{ session()->get('error') }}
        </div>
    @endif
    @if (session('delete'))
        <div class="alert alert-danger">
            {{ session('delete') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-xs-4">
                <div class="form-container">
                    <div class="form-btn">
                        <h3>Add Product</h3>
                        <hr style="border: none; background: #ff523b; height: 5px;">
                    </div>

                    <form id="LoginForm" method="POST" action="/products" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="name" placeholder="Product Name">
                        <input type="text" name="price" placeholder="Price">
                        <input type="text" name="amount" placeholder="Amount">
                        <input type="text" name="category_name" placeholder="Category">
                        <textarea name="details" id="" cols="33" rows="5" placeholder="Product Details"></textarea>
                        <input type="file" name="images[]" multiple>
                        <br>
                        <button type="submit" class="btn">Add Product</button>
                    </form>
                </div>
            </div>
            <div class="col-xs-6">
                <table class="table table-border table-dark table-stripe">
                    <thead>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Amount</th>
                        <th>Product Category</th>
                        <th>Product Details</th>
                        <th>Product Photo</th>
                        <th>Product Edit</th>
                        <th>Product Delete</th>
                    </thead>
                    <tbody>
                        @foreach ($returnProducts as $product)
                        <tr>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['price'] }}</td>
                            <td>{{ $product['amount'] }}</td>
                            <td>
                            @foreach ($returnCategorys as $category)
                                {{ $category['category_name'] }}
                            @endforeach
                            </td>
                            <td>{{ $product['details'] }}</td>
                            <td>
                                <img src="{{ asset($product['image']) }}" alt="image" height="60px" width="70px">
                            </td>
                            <td><a href="{{ url('edit_product/'.$product['id']) }}" class="btn btn-primary btn-sm">Edit</a></td>
                            <td><a href="{{ url('delete_product/'.$product['id']) }}" class="btn btn-danger btn-sm">Delete</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
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
