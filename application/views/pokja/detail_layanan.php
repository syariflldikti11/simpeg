<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $judul; ?></h1>
    </div>
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Tiket </h6>

                </div>
                <!-- Card Body -->
                <?php
                foreach ($data_layanan as $dt) : ?>
                    <div class="card-body">
                        <form id="form_tiket" method="POST" action="#">
                            <input type="hidden" name="id_layanan" value="<?= $dt->id_layanan; ?>">
                            <div class="form-group">
                                <label for="nomor_tiket">Nomor Tiket </label>
                                <input type="text" name="nomor_tiket" class="form-control" id="no_tiket" value="<?= $dt->no_tiket; ?>" readonly>
                                <input type="hidden" id="status_tiket" name="status_tiket" value="BARU">
                            </div>
                            <div class="form-group">
                                <label for="standar_id">Layanan</label>
                                <textarea name="" id="" class="form-control" cols="30" rows="3" style="resize:none" readonly><?= $dt->nama_sp; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control " id="nama_lengkap" placeholder="Isi Nama Lengkap dengan Gelar" value="<?= $dt->nama_pengusul; ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control " id="email" placeholder="Isi dengan email valid" value="<?= $dt->email; ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="nomor_handphone">Nomor Handphone</label>
                                <input type="text" name="nomor_handphone" class="form-control " id="nomor_handphone" placeholder="Isi Dengan Nomor Handphone aktif" value="<?= $dt->no_hp; ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" class="form-control " id="pekerjaan" placeholder="Isi Dengan Pekerjaan" value="<?= $dt->pekerjaan; ?>" required readonly>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control " id="alamat" placeholder="Isi Dengan Alamat" value="<?= $dt->alamat; ?>" required readonly>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control " id="keterangan" placeholder="Isi Dengan keterangan" value="<?= $dt->ket; ?>" required readonly>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    <?php endforeach; ?>
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
                        <li>Syarat A</li>
                    </ol>
                </div>
            </div>

        </div>

        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Berkas </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered" id="index_table" width="100%" cellspacing="0">
                        <tr>

                            <th>Berkas</th>
                            <th>Nama Berkas</th>
                        </tr>

                        <tr>

                            <td> <a target="blank" href="<?= base_url(); ?>berkas/#">Lihat</a></td>
                            <td>Syarat A</td>
                        </tr>
                    </table>




                </div>
            </div>

        </div>
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Tiket</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered" id="index_table" width="100%" cellspacing="0">
                        <tr>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Catatan</th>
                        </tr>

                        <tr>
                            <td>30-04-2023</td>
                            <td> Nama status layanan</td>
                            <td>Catatan</td>

                        </tr>

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


                    <a target="blank" href="<?= base_url(); ?>berkas/#">Lihat</a>


                </div>
            </div>

        </div>

    </div>
    </div>