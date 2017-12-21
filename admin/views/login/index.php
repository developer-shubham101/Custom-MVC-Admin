<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-2">

		</div>
	</div>
	<div class="row login-container column-seperation">

		<div class="col-lg-6 col-lg-offset-3">

			<form class="login-form validate" action="" id="login-form" method="post">
				<div class="row">
					<div class="form-group col-md-10">
						<h5 class="">Sign In</h5>
					</div>
				</div>

				<div class="form-notify"></div>
				<div class="row">
					<div class="form-group col-md-10">
						<label class="form-label">Username</label>
						<input class="form-control" name="email" type="test" required>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-10">
						<label class="form-label">Password</label> <span class="help"></span>
						<input class="form-control" name="password" type="password" required>
					</div>
				</div>
				<!-- <div class="row">
					<div class="form-group col-md-10">
						<label class="form-label">user type</label> <span class="help"></span>
						<label><input type="radio" value="admin" required name="type"> Admin</label>
						<label><input type="radio" value="user" required name="type"> User</label>
					</div>
				</div> -->
				<div class="row">
					<div class="col-md-10">
						<input type="hidden" name="login" value="1">
						<button class="btn btn-primary btn-cons pull-right" type="submit">Login</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END CONTAINER -->