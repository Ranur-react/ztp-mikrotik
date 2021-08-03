<?php 
include 'koneksi.php';
$id=0;	
if (isset($_GET['data1'])) {
	# code...
	$id=$_GET['data1'];
}else{
	$id=0;
}


// echo $id;

$tbview = mysqli_query($conn,"SELECT * FROM `tb_pasien` WHERE `tb_pasien`.`id_ktp`='$id' ;");

$res=mysqli_fetch_array($tbview);

// echo $res['id_ktp'];
	
if (!empty($res['id_ktp'])) {
	 // $update= mysqli_query($conn,"UPDATE `tb_angka` SET `value` = '$tot' WHERE  id_card='$id';");
echo "HIGH";
// echo $id;
} 
else {
echo "LOW";
}

	
?>