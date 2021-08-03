<?php 
include 'koneksi.php';
	
if (isset($_GET['data1'])) {
	# code...
	$d=$_GET['data1'];
}else{
	$d=0;
}




$tbview = mysqli_query($conn,"SELECT *,(LEFT(`tb_antrian`.`tanggal`,4)-LEFT(`tb_pasien`.`tgl`,4)) AS usia FROM tb_antrian JOIN tb_pasien ON id_ktp=id_pasien WHERE STATUS NOT IN('SELESAI_ANTRI') ORDER BY NO ASC;");



	# code...
	?>

	<?php
		$no=0;
		$id=0;
		$loket="";
		while ($key=mysqli_fetch_array($tbview)) 
	 { 
	 	$no++;

	 	$usia=$key[10];

	 	if($usia>60){
	 		$id=$key[0];
		$loket="LANSIA";
	 	}else{
	 		if($no==1){
	 			$id=$key[0];
				$loket="UMUM";

	 		}
	 	}
 	}

$T_Usia = mysqli_query($conn,"SELECT *,(LEFT(`tb_antrian`.`tanggal`,4)-LEFT(`tb_pasien`.`tgl`,4)) AS usia FROM tb_antrian JOIN tb_pasien ON id_ktp=id_pasien WHERE `tb_antrian`.`no`='$id' AND STATUS NOT IN('SELESAI_ANTRI') ORDER BY NO ASC;");

	while ($key=mysqli_fetch_array($T_Usia)) 
	 {
	 		include('tabel_cetak.php');
	 }



?>

