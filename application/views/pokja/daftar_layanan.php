<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-info">Data Ajuan Layanan Baru</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Tiket</th>
                            <th>Nama Lengkap</th>
                            <th>Standar</th>
                            <th>Bagian</th>
                            <th>Pokja</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_layanan as $dt) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $dt->no_tiket; ?></td>
                                <td><?= $dt->nama_pengusul; ?></td>
                                <td><?= $dt->nama_sp; ?></td>
                                <td><?= $dt->nama_bagian; ?></td>
                                <td><?= $dt->nama_pegawai; ?></td>
                                <td style="min-width: 100px;">
                                    <a href="<?php echo base_url('pokja/detail/' . $dt->id_layanan); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-eye fa-sm" data-toggle="tooltip" data-placement="top" title="Detail"></i></a>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>