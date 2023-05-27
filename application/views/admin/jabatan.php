<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active"><?= $sub_menu; ?></li>
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
                                <th>Nama Jabatan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                $no=1;
                foreach ($dt_jabatan as $d):?>
                  
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d->nama_jabatan; ?></td>
                        <td><div align="center"><a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Delete" 
onclick="return confirm('anda yakin ingin menghapus data ini')"
href="<?php echo base_url('admin/delete_jabatan/'.$d->id_jabatan);?>" 
><i class="fa fa-trash fa-sm"></i></a> <a class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"  data-tooltip="tooltip"
  data-bs-placement="top"
  title="Edit" href="javascript:;"
       data-toggle="modal" data-target="#edit"   
          data-id="<?= $d->id_jabatan ?>"
          data-nama_jabatan="<?= $d->nama_jabatan ?>"
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
                    <h5 class="modal-title" id="exampleModalFormTitle">Tambah Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/simpan_jabatan'); ?>
                   <div class="form-group">
                        <label for="exampleInputEmail1">Nama Jabatan</label>
                        <input type="text" class="form-control"  name="nama_jabatan" required  >
                        
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


                     <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalFormTitle">Edit Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                     <?php  
             echo validation_errors();                       
    echo form_open('admin/update_jabatan'); ?>
                   <input type="hidden" class="form-control" id="id"  name="id_jabatan" required>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nama Jabatan</label>
                        <input type="text" class="form-control"  name="nama_jabatan" id="nama_jabatan" required >
                        
                      </div>
                     
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit"  class="btn btn-primary btn-pill" value="Update">
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <script>
    $(document).ready(function() {
      
        $('#edit').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget)
            var modal   = $(this)

            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#nama_jabatan').attr("value",div.data('nama_jabatan'));
        });
    });
</script>