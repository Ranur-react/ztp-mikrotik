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
	 	
                        
                        // echo $no;
                        if($no==$d){
                             if ( $key[10]>60) {
                                    ?>
                                    <br>
                                    <br>
                                    <table>
                                          <tr>
                                                <td width="200">Data Ke</td>
                                                <td>@ <?php echo $no; ?></td>
                                          </tr>
                                          <tr>
                                                <td>Loket </td>
                                                <td>@ <?php echo $n = "LANSIA"."<br>"; ?></td>
                                          </tr>
                                          <tr>
                                                <td>Nomor Antrian </td>
                                                <td>@ <?php echo $key[0]?></td>
                                          </tr>
                                          <tr>
                                                <td>ID RFID </td>
                                                <td>@ <?php echo $key[1]; ?></td>
                                          </tr>
                                          <tr>
                                                <td>Nama Pengantri </td>
                                                <td>@ <?php echo $key[6]; ?></td>
                                          </tr>
                                          <tr>
                                                <td>HP </td>
                                                <td>@ <?php echo $key[9]; ?></td>
                                          </tr>
                                          <tr>
                                                <td>Usia </td>
                                                <td>@ <?php echo $key[10]; ?></td>
                                          </tr>
                                          </table>
                                    <?php
                                    // echo $n = "Loket@ LANSIA"."<br><br>";
                                    // echo "No@".$key[0]."<br><br>";
                                    // echo "Usia@".$key[10]."<br><br>";

                                  }else{
                                     ?>
                                    <br>
                                    <br>
                                    <table>
                                          <tr>
                                                <td width="200">Data Ke</td>
                                                <td>@ <?php echo $no; ?></td>
                                          </tr>
                                          <tr>
                                                <td>Loket </td>
                                                <td>@ <?php echo $n = "UMUM"."<br>"; ?></td>
                                          </tr>
                                          <tr>
                                                <td>Nomor Antrian </td>
                                                <td>@ <?php echo $key[0]?></td>
                                          </tr>
                                          <tr>
                                                <td>ID RFID </td>
                                                <td>@ <?php echo $key[1]; ?></td>
                                          </tr>
                                          <tr>
                                                <td>Nama Pengantri </td>
                                                <td>@ <?php echo $key[6]; ?></td>
                                          </tr>
                                          <tr>
                                                <td>HP </td>
                                                <td>@ <?php echo $key[9]; ?></td>
                                          </tr>
                                          <tr>
                                                <td>Usia </td>
                                                <td>@ <?php echo $key[10]; ?></td>
                                          </tr>
                                          </table>
                                    <?php
                                  }       
                        }
                        


	  } ?>
	


	<?php



	
?>