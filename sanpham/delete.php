<?php 
session_start();
require '../db.php';
if (!isset($_SESSION['admin'])) {
	header("Location: ../admin/index.php");
} else {
	if (!empty($_GET)) {
		$maSP = $_GET['ma-san-pham'];
		$sqlsp = "select * from `sanpham` WHERE maSanPham='$maSP'";
		$stmt = $conn->prepare($sqlsp);
		$stmt->execute();
		$sp = $stmt->fetchAll();
		if (empty($sp)) {
			echo 'Không có sản phẩm này.';
			die();
		}
		foreach ($sp as $value) {
			$url = $value['hinhAnh'];
		}
		if (file_exists($url))
			{
			    unlink($url);
			}
		$sql = "DELETE FROM `chitietsanpham` WHERE maSanPham='$maSP'; DELETE FROM `sanpham` WHERE maSanPham='$maSP'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$stmt->fetchAll();
	}
	header("Location: ../index.php");
}
?>