
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
            <div class="text-center my-4">
                <h2>Troli Anda</h2>
            </div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Pilihan harga</th>
                        <th>Kuantitas</th>
                        <th>Subtotal</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartUsers as $cartUser)
                    <tr>
                        <td>
                            <div class="d-flex">
                                <div class="img">
                                    <img src="{{ asset('storage/'. $cartUser->product->image )}}" alt="" width="70px">
                                </div>
        
                                <div class="detail-product ml-3">
                                    <div>
                                        {{ $cartUser->product->name }}
                                    </div>
                                    <div>
                                        {{ $cartUser->product->kode_barang }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ $cartUser->product->harga }}
                        </td>
                        <td>
                            <div class="input-group">
                                <form action="{{ route('application.admin.cart.change-qty-coupon') }}" id="form-change-qty-coupon" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $cartUser->id }}" name="cart_user_id" id="cart_user_id">
                                    <button type="submit" id="btn-qty" hidden></button>
                                </form>
                                <input type="number" id="qty" name="quantity" class="form-control" value="{{ $cartUser->qty }}" onchange="changeQty(this.value);">
                            </div>
                        </td>
                        <td>
                            <div id="sub-total">
                                {{ $cartUser->sub_total }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                </button> -->

                                <form action="{{ route('application.admin.cart.delete-coupon') }}" id="form-delete-coupon" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $cartUser->id }}" name="cart_user_id" id="cart_user_id">
                                    <button type="submit" id="btn-close">
                                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <td></td>
                    <td></td>
                    <td>
                        Total
                    </td>
                    <td>
                        Rp.45.000
                    </td>
                    <td></td>
                </tfoot>
                <tfoot>
                    <td></td>
                    <td></td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#exampleModal">Gunakan Kode Diskon/Reward</a>
                    </td>
                    <td></td>
                    <td></td>
                </tfoot>
                
            </table>
            <!-- <a href="" data-toggle="modal" data-target="#exampleModal">Gunakan Kode Diskon</a> -->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex">
                                <form action="/application/admin/cart/get-coupon" method="POST" id="form_coupon">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="discount_code" name="discount_code">
                                    </div>
                                    <button class="btn btn-light" id="btm-terap" type="submit">Terapkan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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

        $("#btn-close").click(function() {
            $( "#form-delete-coupon" ).submit();
        });

        $("#btm-terap").click(function() {
            $("#exampleModal .close").click();
            $( "#form_coupon" ).submit();
        });

        function changeQty(value) {
            var qty = value;
            $("#qty-change").val(qty);

            $( "#form-change-qty-coupon" ).submit();
        }
    </script>
	</body>
</html>

