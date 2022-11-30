
<!doctype html>
<html lang="en">
  <head>
  	<title>Shopping Regist</title>
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
						<h3 class="text-center mb-4" style="color: #000;">Form Registration</h3>
						<form action="#" class="login-form">
							<div class="form-group d-flex">
								<input type="text" class="form-control rounded-left" placeholder="First Name" required>
							</div>
							<div class="form-group d-flex">
								<input type="text" class="form-control rounded-left" placeholder="Last Name" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control rounded-left" placeholder="Username" required>
							</div>
							<div class="form-group d-flex">
								<input type="email" class="form-control rounded-left" placeholder="Email" required>
							</div>
							<div class="form-group d-flex">
								<input type="password" class="form-control rounded-left" placeholder="Password" required>
							</div>
							<div class="form-group text-right">
								<div>
									<a href="{{ route('login-form') }}" style="color: #000;">Have Any Account ?</a>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="custom-at-cart-product rounded submit p-3 px-5">Registration</button>
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

