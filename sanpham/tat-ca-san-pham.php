<?php 
session_start();
require '../db.php';
if (!isset($_SESSION['admin'])) {
	header("Location: ../admin/index.php");
} else {?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tất cả các sản phẩm</title>
	<link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.min.css" >
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand chu-lon" href="../#">Cosmetics Store</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Sản phẩm</a></li>
					<li><a href="#">Liên hệ</a></li>
				</ul>
				<form action="search.php" method="get" class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input name="keywords" type="text" class="form-control" required="" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default">Tìm kiếm</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<?php if (isset($_SESSION['admin'])): ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['admin']['name']; ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="../sanpham/tat-ca-san-pham.php">Tất cả sản phẩm</a></li>
								<li><a href="../sanpham/them-san-pham.php">Thêm sản phẩm</a></li>
								<li><a href="../admin/logout.php">Logout</a></li>
							</ul>
						</li>
					<?php endif ?>
					<?php if (!isset($_SESSION['admin'])): ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo 'Account' ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="../admin/index.php">Login</a></li>
							</ul>
						</li>
					<?php endif ?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>
	<div class="container">
		<h2 class="text-center">Sửa sản phẩm.</h2>
		<ul class="list-group">
					
					<li class="list-group-item active">Danh sách</li>
					<?php 
					$sqlsp = "select * from sanpham";
					$stmt = $conn->prepare($sqlsp);
					$stmt->execute();
					$sanpham = $stmt->fetchAll();
					foreach ($sanpham as $value) {
						$maSP = $value[0];
						$tenSP = $value[2];
						?>
						<li class="list-group-item"><p class="col-md-2">[<?= $maSP ?>] </p><a class="col-md-7" href="../sanpham/index.php?dong-san-pham=<?= $maHang ?>"><?= $tenSP ?></a><a href="edit.php?ma-san-pham=<?= $maSP ?>" class="btn"><span class="glyphicon glyphicon-pencil"></span> Sửa</a>
							<a href="delete.php?ma-san-pham=<?= $maSP ?>" class="btn"><span class="glyphicon glyphicon-trash"></span> Xóa</a></li>
						<?php
					} ?>
				</ul>
</body>
</html>
<?php
}
?>