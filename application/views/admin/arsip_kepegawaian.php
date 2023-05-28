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
                                <th>Jenis Arsip</th>
                                <th>Keterangan</th>
                                <th>File</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                $no=1;
                foreach ($dt_arsip_kepegawaian as $d):?>
                  
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->nama_jenis_arsip; ?></td>
                        <td><?= $d->keterangan; ?></td>
                        <td><a target="_blank" href="<?= base_url();?>/upload/<?= $d->file; ?>"><i class="fa fa-file fa-sm"></i></a></td>
                        <td><div align="center"><a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_arsip_kepegawaian/'.$d->id_arsip_kepegawaian.'/'.$d->file);?>" 
><i class="fa fa-trash fa-sm"></i></a> <a class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Edit" href="#"
       data-toggle="modal" data-target="#edit<?= $d->id_arsip_kepegawaian ?>"   
          > 
<i class="fa fa-edit fa-sm"></i></a></div></td>
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
                    <h5 class="modal-title" id="exampleModalFormTitle">Tambah Arsip Kepegawaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open_multipart('admin/simpan_arsip_kepegawaian'); ?>
                   <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Arsip</label>
                        <select class="form-control"  name="id_jenis_arsip">
                       
                          <option>--Pilih Jenis Arsip--</option>
                        <?php foreach ($dt_jenis_arsip as $t) :?>
                          <option value="<?= $t->id_jenis_arsip; ?>"><?= $t->nama_jenis_arsip; ?></option>
                          <?php endforeach;?>
                          </select>
                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama/Keterangan</label>
                        <input type="text" class="form-control"  name="keterangan" required >
                        
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">File</label>
                        <input type="file" class="form-control"  name="file" required >
                        
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
                
                foreach ($dt_arsip_kepegawaian as $f): ?>
                     <div class="modal fade" id="edit<?= $f->id_arsip_kepegawaian; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Edit Arsip Kepegawaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open_multipart('admin/update_arsip_kepegawaian'); ?>
             <input type="hidden" class="form-control" value="<?= $f->id_arsip_kepegawaian; ?>" name="id_arsip_kepegawaian" required >
                      <div class="form-group">
                        <label for="exampleInputEmail1">Jenis Arsip</label>
                     
                       <select class="form-control"  name="id_jenis_arsip">
                       
                          <option>--Pilih Jenis Arsip--</option>
                        <?php foreach ($dt_jenis_arsip as $t) :?>
                          <option value="<?= $t->id_jenis_arsip; ?>" <?php if($t->id_jenis_arsip == $f->id_jenis_arsip) { echo 'selected'; } ?>><?= $t->nama_jenis_arsip; ?></option>
                          <?php endforeach;?>
                          </select>
                        
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama/Keterangan</label>
                        <input type="text" class="form-control"  name="keterangan" value="<?= $f->keterangan; ?>" required >
                        
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">File</label>
                        <input type="file" class="form-control"  name="file" >
                        
                      </div>
                      <input type="hidden" class="form-control" value="<?= $f->file; ?>" name="old_file" required >
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary btn-pill" value="Update">
                  </div>
                  </form>
                </div>
              </div>
            </div>
<?php endforeach; ?>