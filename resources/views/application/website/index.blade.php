
<!doctype html>
<html lang="en">
  <head>
  	<title>Shopping Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('template_website') }}/css/style.css">

	</head>
	<body>
		<div class="wrap">
			<div class="container">
				<div class="row justify-content-between">
						<div class="col d-flex justify-content-end">
							<div class="social-media">
				    		<p class="mb-0 d-flex">
				    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
				    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
				    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
				    			<a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
				    		</p>
			        </div>
						</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="index.html">Papermag <span>Magazine</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span> Menu
                </button>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Catalog</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                        <li class="nav-item"><a href="{{ route('application.admin.cart.index') }}" class="nav-link">Cart</a></li>
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->username }}</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown04">
                                    <a class="dropdown-item" href="#" id="logout-btn">Logout</a>
                                    <form action="/logout" id="form-logout" method="post">
                                        @csrf
                                        <button type="submit" hidden></button>
                                    </form>
                                </div>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown04">
                                    <a class="dropdown-item" href="/login">Login</a>
                                    <a class="dropdown-item" href="">Register</a>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END nav -->

        <div class="container shop-page">
            <div class="row my-5">
                    <!-- @foreach ( $products as $product)
                        <div class="col-4 card-product">
                            <input type="hidden" value="{{ $product->id }}" id="product_per_id">
                            <img src="{{ asset('storage/' . $product->image) }}">
    
                            <div class="text-center p-2">
                                <span style="font-weight: bold; font-size: 20px">{{ $product->name }}</span>
                            </div>
    
                            <button class="custom-at-cart-product rounded p-2">Add To Cart</button>
                        </div>
                    @endforeach -->

                    @foreach ( $products as $product)
                    <form action="{{ route('application.admin.cart.find', $product->id) }}" id="form-add-card" method="GET">
                        @csrf
                        <div class="col-4 card-product">
                            <img src="{{ asset('storage/' . $product->image) }}">
    
                            <div class="text-center p-2">
                                <span style="font-weight: bold; font-size: 20px">{{ $product->name }}</span>
                            </div>
                            <button class="custom-at-cart-product rounded p-2">Add To Cart</button>
                        </div>
                    </form>
                    @endforeach
             </div>
        </div>

	<script src="{{ asset('template_website') }}/js/jquery.min.js"></script>
    <script src="{{ asset('template_website') }}/js/popper.js"></script>
    <script src="{{ asset('template_website') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('template_website') }}/js/main.js"></script>

    <script type="text/javascript">
        $( document ).ready(function() {
            
        });

        $("#logout-btn").click(function() {
            $( "#form-logout" ).submit();
        });
    </script>
	</body>
</html>

