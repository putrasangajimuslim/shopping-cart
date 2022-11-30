
<!doctype html>
<html lang="en">
  <head>
  	<title>Shopping Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('template_auth') }}/css/style.css">

	</head>
	<body>
	<style>
		.form-control::placeholder {
			color: #000 !important;
		}
	</style>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
						<h3 class="text-center mb-4" style="color: #000;">Have an account?</h3>

						@if(Session::has('error_message'))
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								{{ loginError }}
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						@endif

						<form action="/login" class="login-form"  method="POST">
							@csrf
							<div class="form-group">
								<input type="email" class="form-control rounded-left" autofocus @error('email') @enderror placeholder="Email" 
								name="email" required>

								@error('email')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
							<div class="form-group d-flex">
								<input type="password" class="form-control rounded-left" placeholder="Password" @error('password') @enderror name="password" required>

								@error('password')
									<p role="alert" style='color:red'>
										{{ $message }}
									</p>
								@enderror
							</div>
							<div class="form-group text-right">
								<div>
									<a href="" style="color: #000;">Dont Have Account ?</a>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="custom-at-cart-product rounded submit p-3 px-5">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('template_auth') }}/js/jquery.min.js"></script>
  <script src="{{ asset('template_auth') }}/js/popper.js"></script>
  <script src="{{ asset('template_auth') }}/js/bootstrap.min.js"></script>
  <script src="{{ asset('template_auth') }}/js/main.js"></script>

	</body>
</html>

