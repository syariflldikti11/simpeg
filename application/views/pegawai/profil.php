<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= $judul; ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?= base_url('admin'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">
        <?= $menu; ?>
      </a></li>
    <li class="active">
      <?= $sub_menu; ?>
    </li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="img-responsive pic-borderedle" width="100%" src="<?= base_url(); ?>/upload/<?= $d->file; ?>"
            alt="User profile picture">

          <h3 class="profile-username text-center">
            <?= $d->nama_pegawai; ?>
          </h3>
          <p class="text-muted text-center"><b>
              <?= $d->nama_jabatan; ?>
            </b></p>
          <p class="text-muted text-center"><b>TMT
              <?= $d->tmt; ?>
            </b></p>



          <a href="#" data-toggle="modal" data-target="#editpegawai" class="btn btn-warning btn-block"><b>Update Data
              Pegawai</b></a>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->


    </div>
    <div class="modal fade" id="editpegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
    aria-hidden="true">
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
                echo form_open_multipart('pegawai/update_pegawai'); ?>
                <div class="col-md-6">
                    <input type="hidden" class="form-control" value="<?= $d->id_pegawai; ?>" name="id_pegawai" required>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" class="form-control" name="nama_pegawai" value="<?= $d->nama_pegawai; ?>">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIP</label>
                        <input type="text" class="form-control" name="nip" value="<?= $d->nip; ?>">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIK</label>
                        <input type="text" class="form-control" name="nik" value="<?= $d->nik; ?>" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">KK</label>
                        <input type="text" class="form-control" name="kk" value="<?= $d->kk; ?>" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="<?= $d->tempat_lahir; ?>"
                            required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" value="<?= $d->tgl_lahir; ?>" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Agama</label>
                        <input type="text" class="form-control" name="agama" value="<?= $d->agama; ?>" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?= $d->alamat; ?>" required>

                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $d->email; ?>" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">No HP</label>
                        <input type="text" class="form-control" name="no_hp" value="<?= $d->no_hp; ?>" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Satus Kawin</label>
                        <select class="form-control" name="status_kawin">

                            <option>--Pilih Status Kawin--</option>
                            <option value="Menikah" <?php if ($d->status_kawin == 'Menikah') {
                                echo 'selected';
                            } ?>>
                                Menikah</option>
                            <option value="Belum Menikah" <?php if ($d->status_kawin == 'Belum Menikah') {
                                echo 'selected';
                            } ?>>Belum Menikah</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jabatan</label>
                        <select class="form-control" name="id_jabatan">

                            <option>--Pilih Jabatan--</option>
                            <?php foreach ($dt_jabatan as $t): ?>
                                <option value="<?= $t->id_jabatan; ?>" <?php if ($t->id_jabatan == $d->id_jabatan) {
                                      echo 'selected';
                                  } ?>><?= $t->nama_jabatan; ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Pendidikan Terakhir</label>
                        <input type="text" class="form-control" name="pendidikan_terakhir"
                            value="<?= $d->pendidikan_terakhir; ?>" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">TMT</label>
                        <input type="date" class="form-control" name="tmt" value="<?= $d->tmt; ?>" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Foto</label>
                        <input type="file" class="form-control" name="file">
                        <input type="hidden" class="form-control" name="old_file" value="<?= $d->file; ?>" required>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary btn-pill" value="Update">
            </div>
            </form>
        </div>
    </div>
</div>
    <!-- /.col -->
    <div class="col-md-9">
      <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#pribadi" data-toggle="tab">Data Pribadi</a></li>
          <li><a href="#keluarga" data-toggle="tab">Keluarga</a></li>
          <li><a href="#pendidikan" data-toggle="tab">Pendidikan</a></li>
          <li><a href="#arsip" data-toggle="tab">Arsip</a></li>
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
                  <?= $d->agama; ?>  

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
            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add" href="#">Tambah </a>
            <p>
            <table class="table table-datatable dataTable">
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
                $no = 1;
                foreach ($dt_keluarga as $c): ?>

                  <tr>
                    <td>
                      <?= $no++; ?>
                    </td>
                    <td>
                      <?= $c->jenis_keluarga; ?>
                    </td>
                    <td>
                      <?= $c->nama_keluarga; ?>
                    </td>
                    <td>
                      <?= $c->tempat_lahir_keluarga; ?>,
                      <?= $c->tgl_lahir_keluarga; ?>
                    </td>
                    <td>
                      <div align="center"><a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                          data-tooltip="tooltip" data-bs-placement="top" title="Delete"
                          onclick="return confirm('anda yakin ingin menghapus data ini')"
                          href="<?php echo base_url('pegawai/delete_keluarga/' . $c->id_keluarga . '/' . $id); ?>"><i
                            class="fa fa-trash fa-sm"></i></a> <a
                          class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-tooltip="tooltip"
                          data-bs-placement="top" title="Edit" href="javascript:;" data-toggle="modal" data-target="#edit"
                          data-id="<?= $c->id_keluarga ?>" data-nama_keluarga="<?= $c->nama_keluarga ?>"
                          data-tempat_lahir_keluarga="<?= $c->tempat_lahir_keluarga ?>"
                          data-tgl_lahir_keluarga="<?= $c->tgl_lahir_keluarga ?>">
                          <i class="fa fa-edit fa-sm"></i></a></div>
                    </td>
                  </tr>
                <?php endforeach; ?>

              </tbody>

            </table>
          </div>
          <!-- /.tab-pane -->
          <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
            aria-hidden="true">
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
                  echo form_open('pegawai/simpan_keluarga'); ?>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id_pegawai" value="<?= $id; ?>" required>
                    <label for="exampleInputEmail1">Hubungan Keluarga</label>
                    <select class="form-control" name="jenis_keluarga">

                      <option>--Pilih Hubungan Keluarga--</option>
                      <option value="Ayah">Ayah</option>
                      <option value="Ibu">Ibu</option>
                      <option value="Istri">Istri</option>
                      <option value="Anak">Anak</option>
                    </select>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama </label>
                    <input type="text" class="form-control" name="nama_keluarga" required>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tempat Lahir </label>
                    <input type="text" class="form-control" name="tempat_lahir_keluarga" required>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir </label>
                    <input type="date" class="form-control" name="tgl_lahir_keluarga" required>

                  </div>


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                  <input type="submit" name="submit" class="btn btn-primary btn-pill" value="Tambah">
                </div>
                </form>
              </div>
            </div>
          </div>

          <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalFormTitle">Edit Keluarga</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?php
                  echo validation_errors();
                  echo form_open('pegawai/update_keluarga'); ?>
                  <input type="hidden" class="form-control" id="id" name="id_keluarga" required>
                  <input type="hidden" class="form-control" name="id_pegawai" value="<?= $id; ?>" required>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama </label>
                    <input type="text" class="form-control" name="nama_keluarga" id="nama_keluarga" required>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tempat Lahir </label>
                    <input type="text" class="form-control" name="tempat_lahir_keluarga" id="tempat_lahir_keluarga"
                      required>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir </label>
                    <input type="date" class="form-control" name="tgl_lahir_keluarga" id="tgl_lahir_keluarga" required>

                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                  <input type="submit" name="submit" class="btn btn-primary btn-pill" value="Update">
                </div>
                </form>
              </div>
            </div>
          </div>
          <script>
            $(document).ready(function () {

              $('#edit').on('show.bs.modal', function (event) {
                var div = $(event.relatedTarget)
                var modal = $(this)

                // Isi nilai pada field
                modal.find('#id').attr("value", div.data('id'));
                modal.find('#nama_keluarga').attr("value", div.data('nama_keluarga'));
                modal.find('#tempat_lahir_keluarga').attr("value", div.data('tempat_lahir_keluarga'));
                modal.find('#tgl_lahir_keluarga').attr("value", div.data('tgl_lahir_keluarga'));
              });
            });
          </script>

          <div class="tab-pane" id="arsip">
            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addarsip" href="#">Tambah </a>
            <p>
            <table class="table table-datatable dataTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenis Arsip</th>
                  <th>Nama/Keterangan</th>
                  <th>File</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1; foreach ($dt_arsip as $g): ?>

                  <tr>
                    <td>
                      <?= $no++; ?>
                    </td>
                    <td>
                      <?= $g->nama_jenis_arsip; ?>
                    </td>
                    <td>
                      <?= $g->keterangan; ?>
                    </td>

                    <td>
                      <a target="_blank" href="<?= base_url(); ?>upload/<?= $g->file; ?>"><i
                          class="fa fa-file fa-sm"></i></a>
                    </td>


                    <td>
                      <div align="center"><a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                          data-tooltip="tooltip" data-bs-placement="top" title="Delete"
                          onclick="return confirm('anda yakin ingin menghapus data ini')"
                          href="<?php echo base_url('pegawai/delete_arsip_pegawai/' . $g->id_arsip_pegawai . '/' . $id); ?>"><i
                            class="fa fa-trash fa-sm"></i></a> <a
                          class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-tooltip="tooltip"
                          data-bs-placement="top" title="Edit" href="javascript:;" data-toggle="modal"
                          data-target="#editarsip" data-id="<?= $g->id_arsip_pegawai ?>"
                          data-keterangan="<?= $g->keterangan ?>" data-file="<?= $g->file ?>">
                          <i class="fa fa-edit fa-sm"></i></a></div>
                    </td>
                  </tr>
                <?php endforeach; ?>

              </tbody>

            </table>
          </div>
          <!-- /.tab-pane -->
          <div class="modal fade" id="addarsip" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalFormTitle">Tambah Arsip</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?php
                  echo validation_errors();
                  echo form_open_multipart('pegawai/simpan_arsip_pegawai'); ?>

                  <input type="hidden" class="form-control" name="id_pegawai" value="<?= $id; ?>" required>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Arsip</label>
                    <select class="form-control" name="id_jenis_arsip">

                      <option>--Pilih Jenis Arsip--</option>
                      <?php foreach ($dt_jenis_arsip as $t): ?>
                        <option value="<?= $t->id_jenis_arsip; ?>"><?= $t->nama_jenis_arsip; ?></option>
                      <?php endforeach; ?>
                    </select>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama/Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" required>

                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">File</label>
                    <input type="file" class="form-control" name="file" required>

                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                  <input type="submit" name="submit" class="btn btn-primary btn-pill" value="Tambah">
                </div>
                </form>
              </div>
            </div>
          </div>

          <div class="modal fade" id="editarsip" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalFormTitle">Edit Arsip Pegawai</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?php
                  echo validation_errors();
                  echo form_open_multipart('pegawai/update_arsip_pegawai'); ?>
                  <input type="hidden" class="form-control" id="id" name="id_arsip_pegawai" required>
                  <input type="hidden" class="form-control" name="id_pegawai" value="<?= $id; ?>" required>


                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama/Keterangan</label>
                    <input type="text" class="form-control" name="keterangan" id="keterangan" required>

                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">File</label>
                    <input type="file" class="form-control" name="file">

                  </div>
                  <input type="hidden" class="form-control" name="old_file" id="file" required>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                  <input type="submit" name="submit" class="btn btn-primary btn-pill" value="Update">
                </div>
                </form>
              </div>
            </div>
         
          
          <script>
            $(document).ready(function () {

              $('#editarsip').on('show.bs.modal', function (event) {
                var div = $(event.relatedTarget)
                var modal = $(this)

                // Isi nilai pada field
                modal.find('#id').attr("value", div.data('id'));
                modal.find('#keterangan').attr("value", div.data('keterangan'));
                modal.find('#file').attr("value", div.data('file'));

              });
            });
          </script>
</div>

          <div class="tab-pane" id="pendidikan">

            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addpend" href="#">Tambah </a>
            <p>
            <table class="table table-datatable dataTable">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Jenjang</th>
                  <th>Nama Sekolah</th>
                  <th>Jurusan</th>
                  <th>Tahun Lulus</th>
                  <th>No Ijazah</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1; foreach ($dt_pendidikan as $d): ?>

                  <tr>
                    <td>
                      <?= $no++; ?>
                    </td>
                    <td>
                      <?= $d->jenjang; ?>
                    </td>
                    <td>
                      <?= $d->nama_sekolah; ?>
                    </td>
                    <td>
                      <?= $d->jurusan; ?>
                    </td>
                    <td>
                      <?= $d->tahun_lulus; ?>
                    </td>
                    <td>
                      <?= $d->no_ijazah; ?>
                    </td>
                    <td>
                      <div align="center"><a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"
                          data-tooltip="tooltip" data-bs-placement="top" title="Delete"
                          onclick="return confirm('anda yakin ingin menghapus data ini')"
                          href="<?php echo base_url('pegawai/delete_pendidikan/' . $d->id_pendidikan . '/' . $id); ?>"><i
                            class="fa fa-trash fa-sm"></i></a> <a
                          class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm" data-tooltip="tooltip"
                          data-bs-placement="top" title="Edit" href="javascript:;" data-toggle="modal"
                          data-target="#editpend" data-id="<?= $d->id_pendidikan ?>" data-jurusan="<?= $d->jurusan ?>"
                          data-nama_sekolah="<?= $d->nama_sekolah ?>" data-tahun_lulus="<?= $d->tahun_lulus ?>"
                          data-no_ijazah="<?= $d->no_ijazah ?>">
                          <i class="fa fa-edit fa-sm"></i></a></div>
                    </td>
                  </tr>
                <?php endforeach; ?>

              </tbody>

            </table>
          </div>
          <!-- /.tab-pane -->
          <div class="modal fade" id="addpend" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalFormTitle">Tambah pendidikan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?php
                  echo validation_errors();
                  echo form_open('pegawai/simpan_pendidikan'); ?>
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="id_pegawai" value="<?= $id; ?>" required>
                    <label for="exampleInputEmail1">Jenjang pendidikan</label>
                    <select class="form-control" name="jenjang">

                      <option>--Pilih Jenjang--</option>
                      <option value="SD">SD</option>
                      <option value="SMP">SMP</option>
                      <option value="SMA/SMK">SMA/SMK</option>
                      <option value="D3">D3</option>
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                      <option value="Profesi">Profesi</option>
                    </select>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Sekolah</label>
                    <input type="text" class="form-control" name="nama_sekolah" required>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jurusan </label>
                    <input type="text" class="form-control" name="jurusan" required>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tahun Lulus</label>
                    <input type="number" class="form-control" name="tahun_lulus" required>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No Ijazah</label>
                    <input type="text" class="form-control" name="no_ijazah" required>

                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                  <input type="submit" name="submit" class="btn btn-primary btn-pill" value="Tambah">
                </div>
                </form>
              </div>
            </div>
          </div>

          <div class="modal fade" id="editpend" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalFormTitle">Edit Pendidikan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?php
                  echo validation_errors();
                  echo form_open('pegawai/update_pendidikan'); ?>
                  <input type="hidden" class="form-control" id="id" name="id_pendidikan" required>
                  <input type="hidden" class="form-control" name="id_pegawai" value="<?= $id; ?>" required>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nama Sekolah</label>
                    <input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" required>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jurusan </label>
                    <input type="text" class="form-control" name="jurusan" id="jurusan" required>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tahun Lulus</label>
                    <input type="number" class="form-control" name="tahun_lulus" id="tahun_lulus" required>

                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">No Ijazah</label>
                    <input type="text" class="form-control" name="no_ijazah" id="no_ijazah" required>

                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
                  <input type="submit" name="submit" class="btn btn-primary btn-pill" value="Update">
                </div>
                </form>
              </div>
            </div>
          </div>





          <script>
            $(document).ready(function () {

              $('#editpend').on('show.bs.modal', function (event) {
                var div = $(event.relatedTarget)
                var modal = $(this)

                // Isi nilai pada field
                modal.find('#id').attr("value", div.data('id'));
                modal.find('#nama_sekolah').attr("value", div.data('nama_sekolah'));
                modal.find('#jurusan').attr("value", div.data('jurusan'));
                modal.find('#tahun_lulus').attr("value", div.data('tahun_lulus'));
                modal.find('#no_ijazah').attr("value", div.data('no_ijazah'));
              });
            });
          </script>
   
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