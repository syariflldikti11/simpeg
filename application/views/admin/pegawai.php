<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= $menu; ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?= $judul; ?> <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add" href="#">Tambah </a></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="box-body">
                    <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                  <th>Opsi</th>
                                  <th>Nama</th>
                                <th>NIP</th>
                                <th>NIK</th>
                                <th>KK</th>
                                <th>TTL</th>
                                <th>Agama</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Status Kawin</th>
                                <th>Jabatan</th>
                                <th>Pendidikan</th>
                                <th>TMT</th>
                                <th>File</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                $no=1;
                foreach ($dt_pegawai as $d):?>
                  
                    <tr>
                        <td><?= $no++; ?></td>
                         <td><div align="center"><a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?= base_url('admin/delete_pegawai/'.$d->id_pegawai.'/'.$d->file);?>" 
><i class="fa fa-trash fa-sm"></i></a> <a class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Edit" href="#"
       data-toggle="modal" data-target="#edit<?= $d->id_pegawai ?>"   
          > 
<i class="fa fa-edit fa-sm"></i></a> <a class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Profil" 
href="<?= base_url('admin/profil/'.$d->id_pegawai);?>" 
><i class="fa fa-eye fa-sm"></i></a> </div></td>
                        <td><?= $d->nama_pegawai; ?></td>
                        <td><?= $d->nip; ?></td>
                        <td><?= $d->nik; ?></td>
                        <td><?= $d->kk; ?></td>
                        <td><?= $d->tempat_lahir; ?>, <?= $d->tgl_lahir; ?></td>
                        <td><?= $d->agama; ?></td>
                        <td><?= $d->alamat; ?></td>
                        <td><?= $d->email; ?></td>
                        <td><?= $d->no_hp; ?></td>
                        <td><?= $d->status_kawin; ?></td>
                        <td><?= $d->nama_jabatan; ?></td>
                           <td><?= $d->pendidikan_terakhir; ?></td>
                        <td><?= $d->tmt; ?></td>
                     
                        <td><a target="_blank" href="<?= base_url();?>/upload/<?= $d->file; ?>"><img src="<?= base_url();?>/upload/<?= $d->file; ?>" width="70px" height="50px"></a></td>
                       
                    </tr>
                   <?php endforeach; ?>
                          
                        </tbody>
                      
                    </table>
                  </div>
                </div>
                <!-- /.box-body -->
            </div>

            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Tambah Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open_multipart('admin/simpan_pegawai'); ?>
                     <div class="col-md-6">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control"  name="nama_pegawai"  >
                        
                      </div>
               <div class="form-group">
                        <label for="exampleInputEmail1">NIP</label>
                        <input type="text" class="form-control"  name="nip"  >
                        
                      </div>
             <div class="form-group">
                        <label for="exampleInputEmail1">NIK</label>
                        <input type="text" class="form-control"  name="nik" required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">KK</label>
                        <input type="text" class="form-control"  name="kk" required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Tempat Lahir</label>
                        <input type="text" class="form-control"  name="tempat_lahir" required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                        <input type="date" class="form-control"  name="tgl_lahir" required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Agama</label>
                        <input type="text" class="form-control"  name="agama" required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" class="form-control"  name="alamat" required  >
                        
                      </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
             
           <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control"  name="email" required  >
                        
                      </div>
             <div class="form-group">
                        <label for="exampleInputEmail1">No HP</label>
                        <input type="text" class="form-control"  name="no_hp" required  >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Satus Kawin</label>
                        <select class="form-control"  name="status_kawin">
                       
                          <option>--Pilih Status Kawin--</option>
                        <option value="Menikah">Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                          </select>
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Jabatan</label>
                        <select class="form-control"  name="id_jabatan">
                       
                          <option>--Pilih Jabatan--</option>
                        <?php foreach ($dt_jabatan as $t) :?>
                          <option value="<?= $t->id_jabatan; ?>"><?= $t->nama_jabatan; ?></option>
                          <?php endforeach;?>
                          </select>
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Pendidikan Terakhir</label>
                        <input type="text" class="form-control"  name="pendidikan_terakhir" required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">TMT</label>
                        <input type="date" class="form-control"  name="tgl_lahir" required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Foto</label>
                        <input type="file" class="form-control"  name="file" required  >
                        
                      </div>
                     
            </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                    <input type="submit"   class="btn btn-primary btn-pill" value="Tambah">
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <?php
                
                foreach ($dt_pegawai as $f): ?>
                    <div class="modal fade" id="edit<?= $f->id_pegawai; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Edit Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open_multipart('admin/update_pegawai'); ?>
                     <div class="col-md-6">
                      <input type="hidden" class="form-control" value="<?= $f->id_pegawai; ?>" name="id_pegawai" required >
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control"  name="nama_pegawai"  value="<?= $f->nama_pegawai; ?>"  >
                        
                      </div>
               <div class="form-group">
                        <label for="exampleInputEmail1">NIP</label>
                        <input type="text" class="form-control"  name="nip" value="<?= $f->nip; ?>"  >
                        
                      </div>
             <div class="form-group">
                        <label for="exampleInputEmail1">NIK</label>
                        <input type="text" class="form-control"  name="nik" value="<?= $f->nik; ?>" required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">KK</label>
                        <input type="text" class="form-control"  name="kk" value="<?= $f->kk; ?>" required >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Tempat Lahir</label>
                        <input type="text" class="form-control"  name="tempat_lahir" value="<?= $f->tempat_lahir; ?>" required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                        <input type="date" class="form-control"  name="tgl_lahir" value="<?= $f->tgl_lahir; ?>" required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Agama</label>
                        <input type="text" class="form-control"  name="agama" value="<?= $f->agama; ?>" required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" class="form-control"  name="alamat" value="<?= $f->alamat; ?>" required  >
                        
                      </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
             
           <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control"  name="email" value="<?= $f->email; ?>" required  >
                        
                      </div>
             <div class="form-group">
                        <label for="exampleInputEmail1">No HP</label>
                        <input type="text" class="form-control"  name="no_hp" value="<?= $f->no_hp; ?>" required  >
                        
                      </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Satus Kawin</label>
                        <select class="form-control"  name="status_kawin">
                       
                          <option>--Pilih Status Kawin--</option>
                        <option value="Menikah" <?php if($f->status_kawin == 'Menikah') { echo 'selected'; } ?>>Menikah</option>
                        <option value="Belum Menikah" <?php if($f->status_kawin == 'Belum Menikah') { echo 'selected'; } ?>>Belum Menikah</option>
                          </select>
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Jabatan</label>
                        <select class="form-control"  name="id_jabatan">
                       
                          <option>--Pilih Jabatan--</option>
                        <?php foreach ($dt_jabatan as $t) :?>
                         <option value="<?= $t->id_jabatan; ?>" <?php if($t->id_jabatan == $f->id_jabatan) { echo 'selected'; } ?>><?= $t->nama_jabatan; ?></option>
                          <?php endforeach;?>
                          </select>
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Pendidikan Terakhir</label>
                        <input type="text" class="form-control"  name="pendidikan_terakhir" value="<?= $f->pendidikan_terakhir; ?>" required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">TMT</label>
                        <input type="date" class="form-control"  name="tmt" value="<?= $f->tmt; ?>" required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Foto</label>
                        <input type="file" class="form-control"  name="file"  >
                        <input type="hidden" class="form-control"  name="old_file" value="<?= $f->file; ?>" required  >
                      </div>
                     
            </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                    <input type="submit"   class="btn btn-primary btn-pill" value="Update">
                  </div>
                  </form>
                </div>
              </div>
            </div>
<?php endforeach; ?>