<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Đăng nhập</title>
		<link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.min.css" >
		<script src="http://code.jquery.com/jquery.js"></script>
		<script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script>
		</head>
	<body>
		<?php 	
		session_start();
		if (!empty($_POST)) {
			require '../db.php';
				$sql = 'Select * from admin';
				$username = $_POST['username'];
				$password = $_POST['password'];
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				$users = $stmt->fetchAll();
				$kt = false;
				foreach ($users as $value) {
					$id = $value[0];
					$users = $value[1];
					$pass = $value[2];
					$name = $value[3];
					if ($username==$users&&$password==$pass) {
						$kt = true;
						break;
					}
				}
				if ($kt==true) {
					$_SESSION['admin'] = [
						"username" => $username,
						"name" => $name,
						"role" => 'admin'
					];
					header("Location: ../index.php");
				}else {
					?>
					<div class="col-xs-8 col-lg-offset-2 text-center">
					<?php 
					echo '<h2>Sai tên tài khoản hoặc mật khẩu!';
					echo '<br> <a href="index.php"><h3>Đăng nhập lại!</h3></a>'; 
						?>
					</div>
					<?php
				}
			}else{
				?>
				<div class="col-xs-8 col-lg-offset-2 text-center">
				<?php 
				echo '<h2>Lỗi! mời bạn đăng nhập lại!</h2>';
				echo '<br> <a href="index.php"><h3>Đăng nhập!</h3></a>'; 
					?>
				</div>
				<?php
			}
		 ?>
	</body>
</html>