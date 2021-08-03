
<?php include('modaltmp/Modal_delete.php'); ?>
<?php include('modaltmp/modal_edit.php'); ?>
<?php include('modaltmp/modalsersih.php'); ?>

 <div class="card shadow mb-4">
   <div class="card-header py-3">
     <h6 class="m-0 font-weight-bold text-primary" align="justfy">
      <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#id_modal-default-edit">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Antrian</span>
                  </a>
      <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#id_modal-default-bersih">
        <span class="icon text-white-50">
          <i class="fas fa-eraser"></i>
        </span>
        <span class="text">Bersihkan Antrian</span>
      </a>
         <?php echo date('D, d M Y'); ?>
     </h6>
   </div>
   <script src="<?php echo base_url('asset/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('asset/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
   <div class="card-body">
     <div class="table-responsive">
       <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
         <thead>
           <tr>
             <th>No ANTRIAN</th>
             <th >Nama</th>
             <th>Usia</th>
             <th  style=" vertical-align: middle;text-align: center;">Hp</th>
             <th style=" vertical-align: middle;text-align: center;">Foto</th>
             <th>STATUS</th>
           </tr>
         </thead>
         <tbody ">
                    <?php 
                    $no=0;
                    $n = "Loket";
                    $color="";
                    foreach ($tampildata->result_array() as $key) :
                        if ( $key['usia']>60) {
                          $n = "Loket LANSIA";
                          $color="background-color: rgba(250,0,255,0.2);color: rgba(0,0,0,0.6);";
                        }else{
                          $n = "Loket UMUM";
                          $color="";
                        }
                        $no++;
                        // echo $no;
                        if($no==1){
                                    if ( $key['usia']>60) {
                                    $n = "Loket LANSIA";
                                    $color="background-color: rgba(250,0,255,0.2);color: rgba(0,0,0,0.6);";
                                  }else{
                                    $n = "Loket UMUM";
                                    $color="background-color: rgba(0,0,255,0.5);color: rgba(0,0,0,0.8);";
                                  }
                        }elseif($no==2){
                                    if ( $key['usia']>60) {
                                    $n = "Loket LANSIA";
                                    $color="background-color: rgba(250,0,255,0.2);color: rgba(0,0,0,0.6);";
                                  }else{
                                    $n = "Loket UMUM";
                                    $color="background-color: rgba(0,0,255,0.3);color: rgba(0,0,0,0.7);";
                                  }
                        }elseif($no==3){
                                  if ( $key['usia']>60) {
                                    $n = "Loket LANSIA";
                                    // continue;
                                    $color="background-color: rgba(250,0,255,0.2);color: rgba(0,0,0,0.6);";
                                  }else{
                                    $n = "Loket UMUM";
                                    $color="background-color: rgba(0,0,255,0.2);color: rgba(0,0,0,0.6);";
                                    
                                  }
                        }
                     ?>
                    <tr style="<?php echo $color; ?>">
                      <td style=" vertical-align: middle;text-align: center;font-size: 24px"><?php echo $key['no']."<br>".$n; ?>.</td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $key['nama']; ?></td>
           <td style="vertical-align: middle;text-align: center;"><?php echo $key['usia']; ?></td>
           <td style="vertical-align: middle;text-align: center;">0<?php echo $key['hp']; ?></td>
           <td style="vertical-align: middle;text-align: center;"> <img class="img-profile rounded-circle" style="width: 100px;height: 100px;" src="<?php echo base_url('image/dockter.jpg') ?>"></td>
           <td style="vertical-align: middle;text-align: center;">
             <!-- <a href="#" class="btn btn-success btn-circle btn-sm" >
               <i class="fas fa-edit"></i>
             </a> -->

             <a href="#" onclick="get('<?php echo $key['no']; ?>')" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#id_modal-default-hapus">
               <i class="fas fa-trash"></i>
             </a>
           </td>
           </tr>
         <?php endforeach; ?>
         </tbody>
         <tfoot>
           <tr>
             <th>Reload</th>
             <th colspan="9"></th>
           </tr>
         </tfoot>
       </table>
     </div>
   </div>
 </div>
 <!-- #Recomded Form Model-->
 <script type="text/javascript">
   var id = 1;

   function get(v) {
     id = v;
   }

   function hapus() {
     location.href = ('<?php echo site_url('Antrian/hapus/'); ?>' + id);
   }
   function Kosongkan(){
     location.href = ('<?php echo site_url('Antrian/Kosongkan/'); ?>');
   }
 </script>