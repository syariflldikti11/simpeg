<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pantau Layanan </h1>
      
             
    </div>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Layanan</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                   
                        
                        <div class="form-group">
                            <label for="nomor_tiket">Nomor Tiket</label>
                            <input type="text" name="nomor_tiket" class="form-control" 
                                value="<?= $d->no_tiket; ?>" readonly>
                           
                        </div>
                        <div class="form-group">
                            <label for="standar_id">Layanan</label>
                            <textarea name=""  class="form-control" cols="30" rows="3" style="resize:none"
                                readonly><?= $d->nama_sp; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap"
                                class="form-control"
                                placeholder="Isi Nama Lengkap dengan Gelar"
                                value="<?= $d->nama_pengusul; ?>" readonly>
                              
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Isi dengan email valid"
                                value="<?= $d->email; ?>" readonly>
                              
                        </div>
                        <div class="form-group">
                            <label for="nomor_handphone">Nomor Handphone</label>
                            <input type="text" name="nomor_handphone"
                                class="form-control" id="nomor_handphone"
                                placeholder="Isi Dengan Nomor Handphone aktif"
                                value="<?= $d->no_hp; ?>" readonly>
                               
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" name="pekerjaan"
                                class="form-control"
                                placeholder="Isi Dengan Pekerjaan" value="<?= $d->pekerjaan; ?>" readonly>
                               
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Asal Institusi</label>
                            <input type="text" name="asal_institusi"
                                class="form-control"
                                value="<?= $d->asal_institusi; ?>" readonly>
                               
                        </div>
                        
                        <div class="form-group">
                            <label for="standar_id">Alamat</label>
                            <textarea name=""  class="form-control" cols="30" rows="3" style="resize:none"
                                readonly><?= $d->alamat; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="standar_id">Keterangan</label>
                            <textarea name=""  class="form-control" cols="30" rows="3" style="resize:none"
                                readonly><?= $d->alamat; ?></textarea>
                        </div>
       
                     
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-6 col-lg-6">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Syarat Pelayanan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <ol>
                        <?php
                               
                                    foreach ($dt_syarat as $c): ?>
                                <li><?= $c->nama_syarat; ?></li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                </div>
                
            </div>

            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Berkas Usulan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-bordered" id="index_table" width="100%" cellspacing="0">
                            <tr>
                               
                                <th>Berkas</th>
                                <th>Nama Berkas</th>
                                 <th>Opsi</th> 
                            </tr>
                            <?php
                               
                               foreach ($dt_dokumen as $m): ?>
                                <tr>
                           
                                 <td> <a class="btn btn-primary btn-sm shadow-sm" target="_blank" href="<?= base_url();?>berkas/<?= $m->file; ?>" ><i class="fa fa-file"></i></a></td>
                                    <td><?= $m->nama_syarat; ?></td>
                                    <td> <a class="btn btn-danger btn-sm shadow-sm"  data-tooltip="tooltip"
                      data-bs-placement="top"
                      title="Delete" 
                  onclick="return confirm('anda yakin ingin menghapus data ini')"
                   href="<?php echo base_url('umum/delete_berkas/'.$m->id_dokumen.'/'.$no_tiket.'/'.$m->file);?>" 
                    ><i class="fa fa-trash"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                       
                              
                                

                    </div>
                </div>
               
            </div>
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Riwayat Layanan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-bordered" id="index_table" width="100%" cellspacing="0">
                            <tr>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Catatan</th>
                            </tr>
                            <?php
                               
                               foreach ($dt_riwayat as $r): ?>
                                <tr>
                                    <td><?= $r->tgl_riwayat; ?></td>
                                    <td><?= $r->nama_status_layanan; ?></td>
                                    <td><?= $r->catatan; ?></td>
                                 
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Berkas Respon</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        
                               <?php
                               foreach ($dt_dokumen_respon as $s): ?>
                             <a class="btn btn-primary btn-sm shadow-sm" target="_blank" href="<?= base_url();?>berkas/<?= $s->file; ?>"><i class="fa fa-file"></i></a>
                               
                            <?php endforeach; ?>
                      
                              
                       

                    </div>
                </div>
               
            </div>

        </div>
    
        </div>