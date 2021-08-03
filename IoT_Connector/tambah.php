<?php
include 'koneksi.php';
	
if (isset($_GET['data1'])) {
	# code...
	$id=$_GET['data1'];
	$tbview = mysqli_query($conn,"INSERT INTO `tb_pasien` (`id_ktp`,NIK,nama) VALUES ('$id','','')");
echo "Pasien Goo";
}else if (isset($_GET['data2'])) {
	# code...
	$id=$_GET['data2'];
	
			$q_count = mysqli_query($conn,"SELECT COUNT(`tb_antrian`.`no`) AS cnt FROM tb_antrian JOIN tb_pasien ON id_ktp=id_pasien  ORDER BY NO ASC;
			");
			$q_MX = mysqli_query($conn,"SELECT MAX(`tb_antrian`.`no`) AS Mx FROM tb_antrian ;");

		$i=0;
		$MX=0;
		while ($r=mysqli_fetch_array($q_count)) 
	 	{ 
			$i=$r['cnt'];
		}
		while ($r=mysqli_fetch_array($q_MX)) 
	 	{ 
			$Mx=$r['Mx'];
		}

		if($i<1){
			 mysqli_query($conn,"INSERT INTO tb_antrian values('1','$id',now(),'1')");
		}else{
			$s=$Mx+1;
// 			$q = mysqli_query($conn,"SELECT * FROM tb_antrian WHERE id_pasien='$id' AND tanggal=DATE_FORMAT(NOW(),'%Y-%m-%d') AND STATUS='1'");
// 			$data=mysqli_num_rows($q);
			echo $s;
				mysqli_query($conn,"INSERT INTO tb_antrian values('$s','$id',now(),'1')");
			

		}






echo "Antrian Goo";
}else{
    echo "Gagal goo gitu";
}





  ?>

