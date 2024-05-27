<?php 
	require '../db.php';
	session_start();
	if(!empty($_GET)){
		$maSP = $_GET['ma-san-pham'];
		$sql_msp = "select * from sanpham where maSanPham='$maSP'";
		$stmt = $conn->prepare($sql_msp);
		$stmt->execute();
		$dongsanpham = $stmt->fetchAll();
		foreach ($dongsanpham as $value) {
			$tenSP = $value['tenSanPham'];
			$gia = $value['gia'];
			$hinhAnh = $value['hinhAnh'];
			$ngayTao = $value['ngayTao'];
		}
	} else {
		die('Không tìm thấy sản phẩm');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $tenSP ?> | Cosmetics Store</title>
	<link rel="stylesheet" href="../bootstrap-3.3.7/css/bootstrap.min.css" >
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="../bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<style>
		.list-group a{
			text-decoration: none;
		}
		.chu-lon{
			font-size: 25px;
		}
		.le-duoi{
			margin-bottom: 5px;
			border-bottom-left-radius: 4px;
			border-bottom-right-radius: 4px;
		}
	</style>
</head>
<body>
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
	<!-- ket thuc nav -->
	<div class="row">
		<div class="container">
			<div class="col-md-4">
				<ul class="list-group">
					
					<li class="list-group-item active">DANH MỤC</li>
					<?php 
					$sqlhsx = "select * from dongsanpham";
					$stmt = $conn->prepare($sqlhsx);
					$stmt->execute();
					$dongsanpham = $stmt->fetchAll();
					foreach ($dongsanpham as $value) {
						$maHang = $value[0];
						$tenHang = $value[1];
						?>
						<li class="list-group-item"><a href="../sanpham/index.php?dong-san-pham=<?= $maHang ?>"><?= $tenHang ?></a></li>
						<?php
					} ?>
				</ul>
			</div>
			<div class="col-md-8">
			    <div id="carousel-simple" class="carousel slide" data-ride="carousel">
			      <!-- Indicators -->
			      <ol class="carousel-indicators">
			        <li data-target="#carousel-simple" data-slide-to="0" class="active"></li>
			        <li data-target="#carousel-simple" data-slide-to="1"></li>
			        <li data-target="#carousel-simple" data-slide-to="2"></li>
			        <li data-target="#carousel-simple" data-slide-to="3"></li>
			      </ol>

			      <!-- Wrapper for slides -->
			      <div class="carousel-inner" role="listbox">
			        <div class="item active">
			          <img src="media/img/1.jpg" alt="">
			        </div>
			        <div class="item">
			          <img src="media/img/2.jpg" alt="">
			        </div>
			        <div class="item">
			          <img src="media/img/3.jpg" alt="">
			        </div>
			        <div class="item">
			          <img src="media/img/4.jpg" alt="">
			        </div>
			      </div>

			      <!-- Controls -->
			      <a class="left carousel-control" href="/#carousel-simple" role="button" data-slide="prev">
			        <i class="fa fa-chevron-left" aria-hidden="true"></i>
			      </a>
			      <a class="right carousel-control" href="/#carousel-simple" role="button" data-slide="next">
			        <i class="fa fa-chevron-right" aria-hidden="true"></i>
			      </a>
			    </div>
			  </div>
		</div>
	</div>
	<!-- ket thuc header -->
	<hr>
	<div class="row">
		<div class="container">
			<li class="list-group-item active le-duoi">CHI TIẾT SẢN PHẨM</li>
			<div class="col-md-6">
				<h3 class="text-center"><strong>Mua sản phẩm</strong></h3>
				<div class="thumbnail">
					<img src="<?= $hinhAnh ?>" width="300" height="337">
					
				</div>
			</div>
			<div class="col-md-6">
				<ul class="list-group">
					<?php
					$sql_ctsp = "select * from chitietsanpham where maSanPham='$maSP'";
					$stmt = $conn->prepare($sql_ctsp);
					$stmt->execute();
					$ctsp = $stmt->fetchAll();
					foreach ($ctsp as $value) {
						?>
						<h3 class="text-center"><strong>Thông tin sản phẩm</strong></h3>
						<li class="list-group-item" style="font-weight: bold"><?= $tenSP ?></li>
						<li class="list-group-item disabled">Thương hiệu: <?= $value['thuongHieu'] ?></li>
						<li class="list-group-item ">Trọng lượng: <?= $value['trongLuong'] ?></li>
						<li class="list-group-item disabled">Màu sắc: <?= $value['mauSac'] ?> </li>
						<li class="list-group-item">Xuất xứ: <?= $value['xuatXu'] ?></li>
						<li class="list-group-item disabled">Thành Phần: <?= $value['thanhPhan'] ?> </li>
						<li class="list-group-item">Trạng thái: <?= $value['trangThai'] ?> </li>
						<li class="list-group-item disabled" style="font-weight:italic" >Giá: <?= $gia.' VNĐ' ?></li>
						<?php
					} ?>
				</ul>
				<div class="caption text-center">
						<p><a href="#" class="btn btn-primary" role="button">Mua ngay</a> </p>
				</div>
			</div>
			
		</div>
		<!-- <div class="container">
			<p>dfgfgfg</p>
		</div> -->
	</div>
	<?php if (isset($_SESSION['admin'])): ?>
		<a type="submit" class="btn btn-primary col-lg-offset-9" href="edit.php?ma-san-pham=<?= $maSP ?>"><span class="glyphicon glyphicon-edit"></span> Sửa sản phẩm</a>
		<a type="submit" class="btn btn-danger col-lg-offset-9" href="delete.php?ma-san-pham=<?= $maSP ?>"><span class="glyphicon glyphicon-trash"></span> Xóa sản phẩm</a>
			<br>
	<?php endif ?>
	<!-- hết phân trang -->
	<hr>
	<div class="container text-center">Copy @2022</div>
</body>
</html>