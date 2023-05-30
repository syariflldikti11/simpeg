
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     <?= $judul; ?>
      </h1>
      <ol class="breadcrumb">
      <li><a href="<?= base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><?= $menu; ?></a></li>
        <li class="active"><?= $sub_menu; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="img-responsive pic-borderedle" width="100%" src="<?= base_url();?>/upload/<?= $d->file; ?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $d->nama_pegawai; ?></h3>
              <p class="text-muted text-center"><b><?= $d->nama_jabatan; ?></b></p>
              <p class="text-muted text-center"><b>TMT <?= $d->tmt; ?></b></p>

             

              <a href="#" class="btn btn-warning btn-block"><b>Ajukan Perubahan Data</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

     
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#pribadi" data-toggle="tab">Data Pribadi</a></li>
              <li><a href="#keluarga" data-toggle="tab">Keluarga</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="pribadi">
            <div class="row">
              <div class="col-md-6">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label> <br />
                        <?= $d->nama_pegawai; ?>
                        
                      </div>
               <div class="form-group">
                        <label for="exampleInputEmail1">NIP</label> <br />
                        <?= $d->nip; ?>
                        
                      </div>
             <div class="form-group">
                        <label for="exampleInputEmail1">NIK</label> <br />
                        <?= $d->nik; ?>
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">KK</label> <br />
                        <?= $d->kk; ?>
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Tempat Lahir</label> <br />
                        <?= $d->tempat_lahir; ?>
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Lahir</label> <br />
                        <?= $d->tgl_lahir; ?>
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Agama</label> <br />
                        <?= $d->agama; ?> required  >
                        
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label> <br />
                        <?= $d->alamat; ?>
                        
                      </div>
            </div>
            <div class="col-md-6">
             
             <div class="form-group">
                          <label for="exampleInputEmail1">Email</label> <br />
                          <?= $d->email; ?>
                          
                        </div>
               <div class="form-group">
                          <label for="exampleInputEmail1">No HP</label> <br />
                          <?= $d->no_hp; ?>
                          
                        </div>
                          <div class="form-group">
                          <label for="exampleInputEmail1">Satus Kawin</label> <br />
                          <?= $d->status_kawin; ?>
                          
                        </div>
                         <div class="form-group">
                          <label for="exampleInputEmail1">Jabatan</label> <br />
                          <?= $d->nama_jabatan; ?>
                        </div>
                         <div class="form-group">
                          <label for="exampleInputEmail1">Pendidikan Terakhir</label> <br />
                          <?= $d->pendidikan_terakhir; ?> 
                          
                        </div>
                         <div class="form-group">
                          <label for="exampleInputEmail1">TMT</label> <br />
                          <?= $d->tmt; ?>
                          
                        </div>
                        
                       
              </div>
            </div>
           
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="keluarga">
             <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add" href="#">Tambah </a><p>
              <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Nama</th>
                                <th>TTL</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                $no=1;
                foreach ($dt_keluarga as $c):?>
                  
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $c->jenis_keluarga; ?></td>
                        <td><?= $c->nama_keluarga; ?></td>
                        <td><?= $c->tempat_lahir_keluarga; ?>, <?= $c->tgl_lahir_keluarga; ?></td>
                        <td><div align="center"><a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_keluarga/'.$c->id_keluarga.'/'.$id);?>" 
><i class="fa fa-trash fa-sm"></i></a> <a class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Edit" href="javascript:;"
       data-toggle="modal" data-target="#edit"   
          data-id="<?= $c->id_keluarga ?>"
          data-nama_keluarga="<?= $c->nama_keluarga ?>"
          > 
<i class="fa fa-edit fa-sm"></i></a></div></td>
                    </tr>
                   <?php endforeach; ?>
                          
                        </tbody>
                      
                    </table>
              </div>
              <!-- /.tab-pane -->
              <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Tambah Keluarga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/simpan_keluarga'); ?>
    <div class="form-group">
    <input type="hidden" class="form-control"  name="id_pegawai" value="<?= $id; ?>" required  >
                        <label for="exampleInputEmail1">Hubungan Keluarga</label>
                        <select class="form-control"  name="jenis_keluarga">
                       
                          <option>--Pilih Hubungan Keluarga--</option>
                      <option value="Ayah">Ayah</option>
                      <option value="Ibu">Ibu</option>
                      <option value="Istri">Istri</option>
                      <option value="Anak">Anak</option>
                          </select>
                        
                      </div>
                   <div class="form-group">
                        <label for="exampleInputEmail1">Nama </label>
                        <input type="text" class="form-control"  name="nama_keluarga" required  >
                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tempat Lahir </label>
                        <input type="text" class="form-control"  name="tempat_lahir_keluarga" required  >
                        
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Lahir </label>
                        <input type="date" class="form-control"  name="tgl_lahir_keluarga" required  >
                        
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


              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->