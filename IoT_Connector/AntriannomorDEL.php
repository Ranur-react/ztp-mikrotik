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
		$id=0;
	while ($key=mysqli_fetch_array($T_Usia)) 
	 {
	 		echo $key[0];
	 		 $id=$key[0];

	 }

		mysqli_query($conn,"UPDATE `tb_antrian` SET `status` ='SELESAI_ANTRI' WHERE `tb_antrian`.`no`='$id';");

                  mysqli_query($conn,"INSERT INTO `tb_antrianhistory` (`tb_antrianhistory`.`no`,`tb_antrianhistory`.`id`,`tb_antrianhistory`.`tgl`,`tb_antrianhistory`.`status`) SELECT * FROM `tb_antrian` WHERE `tb_antrian`.`no`='$id';");
                 

?>

