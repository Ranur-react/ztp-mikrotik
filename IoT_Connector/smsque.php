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
    while ($key=mysqli_fetch_array($tbview)) 
   { 
    $no++;

   
                        if($no==1){
                                    if ( $key[10]>60) { echo $key[9];  }
                                    else{
                                      echo $key[9];
                                      
                                }
                        }elseif($no==2){
                                     if ( $key[10]>60) {echo $key[9]; 
                                  }else{echo $key[9]; }
                        }elseif($no==3){
                                   if ( $key[10]>60) {echo $key[9]; 
                                  }else{echo $key[9]; 
                                  }
                        }


    } ?>
  


  <?php

      

  
?>