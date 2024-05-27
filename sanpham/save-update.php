<?php 
session_start();
require '../db.php';
if (!isset($_SESSION['admin'])) {
	header("Location: ../admin/index.php");
} else {
	if (!empty($_GET)) {
		$maSP = $_GET['ma-san-pham'];
	}
}
if (!empty($_POST)) {
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
	$sql_sanPham = "UPDATE `sanpham` SET `maHang`='$maHang',`tenSanPham`='$tenSanPham',`moTa`='$moTa',`gia`=$gia,`ngayTao`='$ngayTao' WHERE maSanPham='$maSP'";
	$sql_ctsp = "UPDATE `chitietsanpham` SET `trongLuong`='$trongLuong',`thuongHieu`='$thuongHieu',`thanhPhan`='$thanhPhan',`trangThai`='$trangThai',`mauSac`='$mauSac',`xuatXu`='$xuatXu' WHERE maSanPham='$maSP'";
	$stmt = $conn->prepare($sql_ctsp);
	$stmt->execute();
	$stmt->fetchAll();
	$stmt = $conn->prepare($sql_sanPham);
	$stmt->execute();
	$stmt->fetchAll();
	header("Location: ../index.php");
}
?>