<?php 
session_start();
require '../db.php';
if (!isset($_SESSION['admin'])) {
	header("Location: ../admin/index.php");
}
if (!empty($_POST)) {
	$maSanPham = $_POST['ma-San-Pham'];
	$tenSanPham = $_POST['ten-San-Pham'];
	$maHang = $_POST['ma-Hang'];
	$moTa = $_POST['mo-Ta'];
	$gia = $_POST['gia'];
	$trongLuong = $_POST['trong-luong'];
	$thuongHieu = $_POST['thuong-hieu'];
	$thanhPhan = $_POST['thanh-phan'];
	$trangThai = $_POST['trang-thai'];
	$mauSac = $_POST['mau-sac'];
	$xuatXu = $_POST['xuat-xu'];
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$ngayTao = date('Y/m/d');
	$Avatar = $_FILES['hinh-Anh'];
			 	$filename = null;
			 	if ($Avatar['size']>0) {
			 		$filename = 'media/img/sanpham/'.time()."-".$Avatar['name'];
			 		move_uploaded_file($Avatar['tmp_name'], $filename);
			 	}
	$sql_sanPham = "INSERT INTO `sanpham`(`maSanPham`, `maHang`, `tenSanPham`, `moTa`, `gia`, `hinhAnh`, `ngayTao`) VALUES ('$maSanPham','$maHang','$tenSanPham','$moTa',$gia,'$filename','$ngayTao')";
	$sql_ctsp = "INSERT INTO `chitietsanpham`(`maSanPham`, `trongLuong`, `thuongHieu`, `thanhPhan`, `trangThai`,  `mauSac`, `xuatXu`) VALUES ('$maSanPham','$trongLuong','$thuongHieu','$thanhPhan','$trangThai','$mauSac','$xuatXu')";
	$stmt = $conn->prepare($sql_sanPham);
	$stmt->execute();
	$stmt->fetchAll();
	$stmt = $conn->prepare($sql_ctsp);
	$stmt->execute();
	$stmt->fetchAll();
	header("Location: ../index.php");
}
?>