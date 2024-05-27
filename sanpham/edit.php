<?php 
session_start();
if (!isset($_SESSION['admin'])) {
	header("Location: ../admin/index.php");
} else {
	if (!empty($_GET)) {
		$maSP = $_GET['ma-san-pham'];
	}
}
?>
<?php 
	require '../db.php';
	$sql_edit = "select * from sanpham where maSanPham='$maSP'";
	$sql_edit2 = "select * from chitietsanpham where maSanPham='$maSP'";
	$stmt = $conn->prepare($sql_edit);
	$stmt->execute();
	$sanPham = $stmt->fetchAll();
	$stmt = $conn->prepare($sql_edit2);
	$stmt->execute();
	$ctsp = $stmt->fetchAll();
	foreach ($sanPham as $value) {
		$maSanPham = $value['maSanPham'];
		$tenSanPham = $value['tenSanPham'];
		$maHang = $value['maHang'];
		$moTa = $value['moTa'];
		$gia = $value['gia'];
		$url = $value['hinhAnh'];
		$ngayTao = $value['ngayTao'];
	}
	foreach ($ctsp as $value) {
		$trongLuong = $value['trongLuong'];
		$thuongHieu = $value['thuongHieu'];
		$thanhPhan = $value['thanhPhan'];
		$trangThai = $value['trangThai'];
		$mauSac = $value['mauSac'];
		$xuatXu = $value['xuatXu'];
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa sản phẩm <?= $maSP ?></title>
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
		<form action="save-update.php?ma-san-pham=<?= $maSP ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="ten-San-Pham">Tên sản phẩm:</label>
			    <input type="text" class="form-control" required="" name="ten-San-Pham" value="<?= $tenSanPham ?>">
			</div>
			<div class="form-group">
				<label for="ma-Hang">Mã dòng sản phẩm(Da mặt, body, thực phẩm chức năng) :</label>
			    <input type="text" class="form-control" required="" name="ma-Hang" value="<?= $maHang ?>">
			</div>
			<div class="form-group">
				<label for="mo-ta">Mô tả:</label>
			    <input type="text" class="form-control" required="" name="mo-Ta" value="<?= $moTa ?>">
			</div>
			<div class="form-group">
				<label for="gia">Giá bán:</label>
			    <input type="number" class="form-control" required="" name="gia" value="<?= $gia ?>" min="1">
			</div>
			<div class="form-group">
				<label for="trong-luong">Trọng lượng:</label>
			    <input type="text" class="form-control" required="" name="trong-luong" value="<?= $trongLuong ?>">
			</div>
			<div class="form-group">
				<label for="thuong-hieu">Thương hiệu:</label>
			    <input type="text" class="form-control" required="" name="thuong-hieu" value="<?= $thuongHieu ?>">
			</div>
			<div class="form-group">
				<label for="thanh-phan">Thành phần:</label>
			    <input type="text" class="form-control" required="" name="thanh-phan" value="<?= $thanhPhan ?>" min="1">
			</div>
			<div class="form-group">
				<label for="trang-thai">Trạng thái hàng:</label>
			    <input type="text" class="form-control" required="" name="trang-thai" value="<?= $trangThai ?>" min="1">
			</div>

			<div class="form-group">
				<label for="mau-sac">Màu sắc:</label>
			    <input type="text" class="form-control" required="" name="mau-sac" value="<?= $mauSac ?>" min="1">
			</div>
			<div class="form-group">
				<label for="xuat-xu">Xuất xứ:</label>
			    <input type="text" class="form-control" required="" name="xuat-xu" value="<?= $xuatXu ?>">
			</div>


			<button type="submit" class="btn btn-primary col-lg-offset-11"><span class="glyphicon glyphicon-edit"></span> Sửa</button>
			<br>
		</form>
	</div>
<hr>
	<div class="container text-center">Copy @2022</div>
</body>
</html>