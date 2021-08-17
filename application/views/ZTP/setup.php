<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Device Details</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Board Info -->
            <div class="col-xl-2 col-md-6 mb-4">

                <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo base_url('img/') ?>/undraw_posting_photo.svg" alt="...">
                </div>
            </div>
            <div class="col-xl-8 col-md-6 mb-4">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Board Info</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 405px;">Indikator</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 200px;">Result</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Device Status</th>
                                    <th rowspan="1" colspan="1">Default Provisioned / ZTP Provisioned</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                foreach ($boardinfo as $data => $item) {

                                ?>
                                    <tr class="even">
                                        <td><?= $data ?></td>
                                        <td class="sorting_1"><?= $item  ?></td>
                                    </tr>
                                <?php

                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="row">
                    <div class="col-lg-12 mb-4">

                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo base_url('img/') ?>/undraw_posting_photo.svg" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Bridge -->
            <div class="col-xl-12 colc-md-6 mb-4">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Info Bridge Port Yang Digunakan </h6>
                    </div>
                    <?php

                    // var_dump($bridgeinfo)
                    // while ($d = mysqli_fetch_array($bridgeinfo)) {
                    //     echo "x";
                    // }
                    // foreach ($bridgeinfo as $data => $item) {
                    //     echo $item;
                    // }

                    ?>
                    <div class="card-body">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 405px;">Interface</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 405px;">Bridge</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 405px;">Status</th>
                                    <!-- <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 200px;">Result</th> -->
                                </tr>
                            </thead>
                            <tfoot>
                                <!-- <tr>
                                    <th rowspan="1" colspan="1">Device Status</th>
                                    <th rowspan="1" colspan="1">Default Provisioned / ZTP Provisioned</th>
                                </tr> -->
                            </tfoot>
                            <tbody>
                                <?php
                                foreach ($bridgeinfo as $data) {

                                    if ($data->interface == 'pwr-line1') {
                                        continue;
                                    }
                                ?>
                                    <tr class="even">
                                        <td><?= $data->interface ?></td>
                                        <td class="sorting_1"><?= $data->bridge  ?></td>
                                        <td>
                                            <div href="#" class="btn <?= $data->disabled == 'true' ? 'btn-danger' : 'btn-success' ?> btn-circle btn-lg">
                                                <i class="fas <?= $data->disabled == 'true' ? 'fa-times' : 'fa-check' ?>"></i>
                                            </div>

                                        </td>


                                    </tr>
                                <?php

                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
        <div class="row">

            <!-- address info -->
            <div class="col-xl-12 col-md-6 mb-4">

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Info IP Address Yang Digunakan</h6>
                    </div>
                    <?php

                    // var_dump($ipinfo)
                    // echo ;
                    // while (array_values($ipinfo)) {
                    //     echo "x";
                    // }
                    // foreach ($ipinfo as $data) {
                    //     echo $data->interface;
                    // }

                    ?>
                    <div class="card-body">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 405px;">Ip Address</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 405px;">Network</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 200px;">interface</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 200px;">Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <!-- <tr>
                                    <th rowspan="1" colspan="1">Device Status</th>
                                    <th rowspan="1" colspan="1">Default Provisioned / ZTP Provisioned</th>
                                </tr> -->
                            </tfoot>
                            <tbody>
                                <?php
                                foreach ($ipinfo as $data) {

                                ?>
                                    <tr class="even">
                                        <td><?= $data->address ?></td>
                                        <td><?= $data->network ?></td>
                                        <td><?= $data->interface ?></td>
                                        <td>
                                            <div href="#" class="btn <?= $data->disabled == 'true' ? 'btn-danger' : 'btn-success' ?> btn-circle btn-lg">
                                                <i class="fas <?= $data->disabled == 'true' ? 'fa-times' : 'fa-check' ?>"></i>
                                            </div>
                                        </td>

                                    </tr>
                                <?php

                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="text-center">
            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo base_url('img/') ?>/undraw_posting_photo.svg" alt="...">
        </div>
        <p>Lihat Informasi konfigurasi pada perangkat <a target="_blank" rel="nofollow" href="https://mikrotik.com/">Mikrotik </a> yang tersambung sekarang , Pastikan konfigurasi tidak mempengaruihi sistem automatsi yang akan dijalankan pada Konsep ZTP!</p>
        <a target="_blank" rel="nofollow" href="http://<?= $loginInfo['ip']; ?>/">Lihat Detail lebih lanjut pada WebFig perangkat <?= $loginInfo['ip']; ?> →</a>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">SETUP ZTP</h6>
    </div>
    <div class="card-body">


        <div class="text-center">
            <a href="<?= site_url('Setting') ?>" class="btn btn-google btn-block"><i class="fas fa-arrow-right"></i>
                Terapkan</a>
            <!-- <a href="#" class="btn btn-secondary btn-block"><i class="fas fa-check"></i>ZTP telah Diterapkan</a> -->
            <a href="<?= site_url('Reset') ?>" class="btn btn-secondary btn-block"><i class="fas fa-arrow-right"></i>Reset</a>
        </div>
        <p>Setup ZTP berhasil diterapkan pada perangkat</p>
    </div>
</div>