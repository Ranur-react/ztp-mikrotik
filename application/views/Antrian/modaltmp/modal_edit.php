<div class="modal fade" id="id_modal-default-edit">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="modal-content">
       <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header">
                <h3 align="right" class="box-title"><button type="button" class="btn  btn-circle btn-sm" data-dismiss="modal"><b>X</b></i></button></h3>
                <h3 class="text-uppercase" align="center">Tambah Pasien</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID CARD</th>
                        <th>NO NIK</th>
                        <th>Nama</th>
                        <th>Usia</th>
                        <th>Alamat</th>
                        <th>Hp</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody ">
                    <?php $n = 1;
                    foreach ($tampildatapasien as $key) : ?>
                    <tr >
                      <td style=" vertical-align: middle;text-align: center;"><?php echo $n++; ?>.</td>
                      <td style="vertical-align: middle;text-align: center;"><?php echo $key['id_ktp']; ?></td>
                      <td style="vertical-align: middle;text-align: center;"><?php echo $key['NIK']; ?></td>
                      <td style="vertical-align: middle;text-align: center;"><?php echo $key['nama']; ?></td>
                      <td style="vertical-align: middle;text-align: center;"><?php echo $key['tgl']; ?></td>
                      <td style="vertical-align: middle;text-align: center;"><?php echo $key['alamat']; ?></td>
                      <td style="vertical-align: middle;text-align: center;"><?php echo $key['hp']; ?></td>
                      <td style="vertical-align: middle;text-align: center;"> <img class="img-profile rounded-circle" style="width: 100px;height: 100px;" src="<?php echo base_url('image/dockter.jpg') ?>"></td>
                      <td style="vertical-align: middle;text-align: center;">
                        <a href="#" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#id_modal-default-edit" onclick="JavaScript:location.href=('<?php echo site_url('Antrian/tambah/').$key['id_ktp'] ?>')">
                          <i class="fas fa-check"></i>
                        </a>
                        <!-- <a href="#" onclick="get('<?php echo $key['id_ktp']; ?>')" class="btn btn-warning btn-circle btn-sm" data-toggle="modal" data-target="#id_modal-default-hapus">
                          <i class="fas fa-trash"></i>
                        </a> -->
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
                <p align="center">
                  <br></p>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div>
    </div>
      </div>
    </div>
  <div class="modal-dialog">
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>