<?php 
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: ../admin/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm sản phẩm</title>
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
		<h2 class="text-center">Thêm sản phẩm mới.</h2>
		<form action="save.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="ma-San-Pham">Mã sản phẩm:</label>
			    <input type="text" class="form-control" required="" name="ma-San-Pham" placeholder="ss1, ss2...">
			</div>
			<div class="form-group">
				<label for="ten-San-Pham">Tên sản phẩm:</label>
			    <input type="text" class="form-control" required="" name="ten-San-Pham" placeholder="Son kem lì 3CE...">
			</div>
			<div class="form-group">
				<label for="ma-Hang">Mã loại hàng  (Chăm sóc da mặt, body,...) :</label>
			    <input type="text" class="form-control" required="" name="ma-Hang" placeholder="3CE,BBIA ...">
			</div>
			<div class="form-group">
				<label for="mo-ta">Mô tả:</label>
			    <input type="text" class="form-control" required="" name="mo-Ta" placeholder="mô tả sản phẩm từ 10 đến 20 từ...">
			</div>
			<div class="form-group">
				<label for="gia">Giá bán:</label>
			    <input type="number" class="form-control" required="" name="gia" placeholder="giá sản phẩm bằng số..." min="1">
			</div>
			<div class="form-group">
				<label for="trong-luong">Dung tích:</label>
			    <input type="text" class="form-control" required="" name="trong-luong" placeholder="500ML...">
			</div>
			<div class="form-group">
				<label for="thuong-hieu">Thương hiệu:</label>
			    <input type="text" class="form-control" required="" name="thuong-hieu" placeholder="thương hiệu...">
			</div>
			<div class="form-group">
				<label for="thanh-phan">Thành phần sản phẩm:</label>
			    <input type="text" class="form-control" required="" name="thanh-phan" placeholder="nhập thông số thành phần sản phẩm..." >
			</div>
			<div class="form-group">
				<label for="trang-thai">Trạng thái:</label>
			    <input type="text" class="form-control" required="" name="trang-thai" placeholder="tình trạng sản phẩm..." >
			</div>
			<div class="form-group">
				<label for="mau-sac">Màu sắc:</label>
			    <input type="text" class="form-control" required="" name="mau-sac" placeholder="Màu sắc..." >
			</div>
			<div class="form-group">
				<label for="xuat-xu">Xuất xứ:</label>
			    <input type="text" class="form-control" required="" name="xuat-xu" placeholder="xuất xứ..." >
			</div>
			<div class="form-group">
				<label for="hinh-Anh">Ảnh mô tả:</label>
			    <input type="file" class="form-control" name="hinh-Anh" required="">
			</div>
			<button type="submit" class="btn btn-success col-lg-offset-11"><span class="glyphicon glyphicon-plus"></span> Thêm</button>
			<br>
		</form>
	</div>
<hr>
	<div class="container text-center">Copy @2022</div>
</body>
</html>