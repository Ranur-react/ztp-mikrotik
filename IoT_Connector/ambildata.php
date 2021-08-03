<?php 
include 'koneksi.php';
	
if (isset($_GET['data1'])) {
	# code...
	$d=$_GET['data1'];
}else{
	$d=0;
}




$tbview = mysqli_query($conn,"SELECT *,(LEFT(`tb_antrian`.`tanggal`,4)-LEFT(`tb_pasien`.`tgl`,4)) AS usia FROM tb_antrian JOIN tb_pasien ON id_ktp=id_pasien WHERE `tb_antrian`.`id_pasien`='$d' AND STATUS NOT IN('SELESAI_ANTRI') ORDER BY NO ASC;");
		$no=0;
		while ($key=mysqli_fetch_array($tbview)) 
	 {
	 	
	 	echo $key['no'];
	 	?>


<?php

	  } 

?>