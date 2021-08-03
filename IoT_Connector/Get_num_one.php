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
while ($key=mysqli_fetch_array($tbview)) 
{ 
	
$no++;
            echo "<br>@@____ Data Ke: ".$no."<br><br>";
            $umur=$key[10];
                        if ( $umur>60) {
                        // echo $no;
                        include('Lansia.php');

                  }else{
                        include('Umum.php');
                  }

} ?>
	


	<?php



	
?>