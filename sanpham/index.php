<?php 
	require '../db.php';
	session_start();
	if(!empty($_GET)){
		$maHSX = $_GET['dong-san-pham'];
		$sql_hsx = "select * from dongsanpham";
		if($maHSX != ''){
			$sql_hsx = $sql_hsx. " where maHang='$maHSX'";
		}
		$stmt = $conn->prepare($sql_hsx);
		$stmt->execute();
		$dongsanpham = $stmt->fetchAll();
		foreach ($dongsanpham as $value) {
			$tenHSX = $value['tenHang'];
		}
	} else {
		$maHSX = 'MH1';
		$sql_hsx = "select * from dongsanpham where maHang='$maHSX'";
		$stmt = $conn->prepare($sql_hsx);
		$stmt->execute();
		$dongsanpham = $stmt->fetchAll();
		foreach ($dongsanpham as $value) {
			$tenHSX = $value['tenHang'];
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dòng sản phẩm <?= $tenHSX ?></title>
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
		.anh{
			object-fit: fill;			
			/* filter: drop-shadow(0 0 5px blue); */
			image-rendering: pixelated;
			max-width:200px;
			max-height:200px
		}
	</style>
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
	<?php 
		$item_per_page = 4;
		if (isset($_GET['page'])){
			$current_page = $_GET['page'];
		} else {
			$current_page = 1;
		}
		$start = ($current_page-1)*$item_per_page;
		$end = $start+$item_per_page;
	?>
	<div class="row">
		<div class="container">
			<h3 class="list-group-item active le-duoi"><?= $tenHSX ?></h3>
			<?php 
				$sql = "select * from sanpham where maHang='$maHSX' ORDER BY ngayTao DESC";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				$sp = $stmt->fetchAll();
				for ($i = $start; $i < count($sp) && $i < $end; $i++) {
					$maSanPham = $sp[$i]['maSanPham'];
					$tenSanPham = $sp[$i]['tenSanPham'];
					$moTa = $sp[$i]['moTa'];
					$gia = $sp[$i]['gia'];
					$hinhAnh = $sp[$i]['hinhAnh'];
			?>
					<div class="col-sm-6 col-md-3">
						<div class="thumbnail">
							<img src="<?php echo $hinhAnh ?>" alt="<?= $tenSanPham ?> " width="200" height="200" class="anh">
							<div class="caption">
								<h3><?php echo $tenSanPham ?></h3>
								<p><?php echo $moTa ?></p>
								<p><a href="../sanpham/sanpham.php?ma-san-pham=<?= $maSanPham ?>" class="btn btn-primary" role="button">Mua ngay</a> <span class="btn btn-default" role="button"><?php echo $gia.' VNĐ' ?></p>
							</div>
						</div>
					</div>
			<?php 
			} ?>
		</div>
	</div>
	<!-- ket thuc san pham -->
	<!-- phân trang -->
			<hr>
	<div class="row text-center">
		<div class="container">
			<div class="col-md-12">
				<ul class="pagination">
					<li><a href="index.php?dong-san-pham=<?= $maHSX ?>&page=1">&laquo</a></li>
					<?php 	
						$tongsanpham = count($sp);
						$tongtrang = count($sp)/$item_per_page;
						if ($tongsanpham % $item_per_page !=0) {
						$tongtrang = $tongtrang +1;
						} 
						for ($i = 1; $i <= $tongtrang ; $i++) {
					?>
					<?php if ($i!=$current_page): ?>
						<li class=""><a href="index.php?dong-san-pham=<?= $maHSX ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php endif ?>
					<?php if ($i==$current_page): ?>
						<li class="active"><a href="index.php?dong-san-pham=<?= $maHSX ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
					<?php endif ?>
					<?php } ?>
					<li><a href="index.php?dong-san-pham=<?= $maHSX ?>&page=<?= $i-1 ?>">&raquo</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- hết phân trang -->
	<hr>
	<div class="container text-center">Copy @2022</div>
</body>
</html>