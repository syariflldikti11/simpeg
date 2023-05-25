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
        <h6 class="m-0 font-weight-bold text-info">Data Bagian</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bagian</th>
                        <th>Ketua Pokja</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
             
                <tbody>
               
                <?php
                $no=1;
                foreach ($dt_bagian as $d):?>
                  
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->nama_bagian; ?></td>
                        <td><?= $d->gelar_depan; ?><?= $d->nama_pegawai; ?> <?= $d->gelar_belakang; ?></td>
                        <td><div align="center"><a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
                      data-bs-placement="top"
                      title="Delete" 
                  onclick="return confirm('anda yakin ingin menghapus data ini')"
                   href="<?php echo base_url('admin/delete_bagian/'.$d->id_bagian);?>" 
                    ><i class="fas fa-trash fa-sm"></i></a> <a class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"  data-tooltip="tooltip"
                      data-bs-placement="top"
                      title="Edit" href="#" data-toggle="modal" data-target="#modaledit<?= $d->id_bagian ?>"
                          
                              > 
                   <i class="fas fa-edit fa-sm"></i></a></div></td>
                    </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>




<div class="modal" id="add" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Bagian</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<?php  
             echo validation_errors();                       
    echo form_open('admin/simpan_bagian'); ?>
                   
      <!-- Modal body -->
      <div class="modal-body">
       <div class="mb-3">
                        <label for="exampleInputEmail1">Nama Bagian</label>
                        <input type="text" class="form-control"  name="nama_sp" required >
                        
                      </div>
                      
                      <div class="mb-3">
                        <label for="exampleInputEmail1">Ketua Pokja</label>
                     
                       <select class="form-control"  name="id_pokja">
                       
                          <option>--Pilih Ketua --</option>
                        <?php foreach ($dt_pegawai as $t) :?>
                          <option value="<?= $t->nip; ?>"><?= $t->gelar_depan; ?><?= $t->nama_pegawai; ?> <?= $t->gelar_belakang; ?></option>
                          <?php endforeach;?>
                          </select>
                        
                      </div>
                       
                       
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Submit">

      </div>
</form>
    </div>
  </div>
</div>

<?php
                
                foreach ($dt_bagian as $f): ?>

<div class="modal" id="modaledit<?= $f->id_bagian; ?>" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Bagian</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
<?php  
             echo validation_errors();                       
    echo form_open('admin/update_bagian'); ?>
                   
      <!-- Modal body -->
      <div class="modal-body">
      <input type="hidden" class="form-control" value="<?= $f->id_bagian; ?>" name="id_bagian" required >
       <div class="mb-3">
                        <label for="exampleInputEmail1">Nama Bagian</label>
                        <input type="text" class="form-control" value="<?= $f->nama_bagian; ?>" name="nama_bagian" required >
                        
                      </div>
                     
                      <div class="mb-3">
                        <Ketua for="exampleInputEmail1">Ketua Pokja</label>
                     
                       <select class="form-control"  name="id_pokja">
                       
                          <option>--Pilih Ketua--</option>
                        <?php foreach ($dt_pegawai as $u) :?>
                          <option value="<?= $u->nip; ?>" <?php if($u->nip == $f->id_pokja) { echo 'selected'; } ?>><?= $u->nama_pegawai; ?> <?= $u->gelar_belakang; ?></option>
                          <?php endforeach;?>
                          </select>
                        
                      </div>
                      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         <input type="submit" name="submit"  class="btn btn-info btn-pill" value="Update">

      </div>
</form>
    </div>
  </div>
</div>
<?php endforeach; ?>