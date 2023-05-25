<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
<a data-toggle="modal"
    data-target="#add" href="#" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i
class="fas fa-plus-circle fa-sm"></i>
Data Baru</a>
</div>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info">Data Layanan PTS</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Tiket</th>
                        <th>Kode PT</th>
                        <th>Nama Layanan</th>
                        <th>Nama Pegawai</th>
                        <th>Status Layanan</th>
                        <th width="100px">Opsi</th>
                    </tr>
                </thead>
             
                <tbody>
               
                <?php
                $no=1;
                foreach ($dt_layanan_pts as $d):?>
                  
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->no_tiket; ?></td>
                        <td><?= $d->nama_pengusul; ?></td>
                        <td><?= $d->nama_sp; ?></td>
                        <td><?= $d->gelar_depan; ?><?= $d->nama_pegawai; ?> <?= $d->gelar_belakang; ?></td>
                        <td><?= $d->nama_status_layanan; ?></td>
                        <td><div align="center"><a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_layanan/'.$d->id_layanan);?>" 
><i class="fas fa-trash fa-sm"></i></a> <a class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="View" 
href="<?php echo base_url('admin/view_layanan/'.$d->id_layanan);?>" 
><i class="fas fa-eye fa-sm"></i></a></div></td>
                    </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>





