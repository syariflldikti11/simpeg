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
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama Pegawai</th>
                                <th>Role</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                $no=1;
                foreach ($dt_user as $d):?>
                  
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->nik; ?></td>
                        <td><?= $d->nama_pegawai; ?></td>
                        <td><?php if($d->role==1) {echo 'Pegawai';} ?> <?php if($d->role==2) {echo 'Admin';} ?></td>
                        <td><div align="center"><a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_user/'.$d->id_pengguna);?>" 
><i class="fa fa-trash fa-sm"></i></a></div></td>
                    </tr>
                   <?php endforeach; ?>
                          
                        </tbody>
                      
                    </table>
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
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Tambah user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/simpan_user'); ?>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Pegawai</label>
                        <select class="form-control"  name="id_pegawai">
                       
                          <option>--Pilih Pegawai--</option>
                        <?php foreach ($dt_pegawai as $t) :?>
                          <option value="<?= $t->id_pegawai; ?>"><?= $t->nama_pegawai; ?></option>
                          <?php endforeach;?>
                          </select>
                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                       <input type="text" class="form-control" name="password">
                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Akses</label>
                        <select class="form-control"  name="role">
                       
                          <option value='1'>Pegawai</option>
                          <option value='2'>Admin</option>
                        </select>
                      </div>
                      
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit"  class="btn btn-primary btn-pill" value="Tambah">
                  </div>
                  </form>
                </div>
              </div>
            </div>


                 