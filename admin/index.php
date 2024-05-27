<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ADMIN</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.min.css" >
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="col-sm-6 col-sm-offset-3">
			<form action="login.php" method="POST" role="form">
				<legend><h2>Login</h2></legend>
			
				<div class="form-group">
					<label for="username">Username: </label>
					<input type="text" class="form-control" name="username" placeholder="Tên đăng nhập..." required="">
				</div>
			
				<div class="form-group">
					<label for="password">Password: </label>
					<input type="password" class="form-control" name="password" placeholder="Tên mật khẩu..." required="">
				</div>
			
				<button type="submit" class="btn btn-primary">Đăng nhập</button>
			</form>
		</div>
	</div>
</body>
</html>