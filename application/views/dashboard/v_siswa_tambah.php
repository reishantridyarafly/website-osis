<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $title ?></h1>
          </div>
          <div class="card">
               <div class="card-header">
                    <h4>Tambah Osis</h4>
               </div>
               <div class="card-body">
                    <!-- <form action="<?= base_url('dashboard/siswa_aksi') ?>" method="POST"> -->
                    <?= form_open_multipart('siswa/siswa_aksi') ?>
                    <div class="row justify-content-center">
                         <div class="col-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                   <label for="nis">NIS</label>
                                   <input type="number" class="form-control" id="nis" name="nis" value="<?= set_value('nis'); ?>" autocomplete="off" autofocus>
                                   <?= form_error('nis', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                   <label for="nama">Nama *</label>
                                   <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" autocomplete="off">
                                   <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                   <label for="jenis_kelamin">Jenis Kelamin *</label>
                                   <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                   </select>
                                   <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                   <label for="jabatan">Jabatan *</label>
                                   <select name="jabatan" id="jabatan" class="form-control">
                                        <option value="">-- Pilih Jabatan --</option>
                                        <?php foreach ($jabatan as $j) { ?>
                                             <option value="<?= $j->jabatan_id ?>"><?= $j->jabatan_nama ?></option>
                                        <?php } ?>
                                   </select>
                                   <?= form_error('jabatan', '<small class="text-danger">', '</small>'); ?>
                              </div>
                         </div>
                         <div class="col-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                   <label for="kelas">Kelas *</label>
                                   <select name="kelas" id="kelas" class="form-control">
                                        <option value="">-- Pilih Kelas --</option>
                                        <?php foreach ($kelas as $k) { ?>
                                             <option value="<?= $k->kelas_id ?>"><?= $k->kelas_nama ?></option>
                                        <?php } ?>
                                   </select>
                                   <?= form_error('kelas', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                   <label for="jurusan">Jurusan *</label>
                                   <select name="jurusan" id="jurusan" class="form-control">
                                        <option value="">-- Pilih Jurusan --</option>
                                        <?php foreach ($jurusan as $j) { ?>
                                             <option value="<?= $j->jurusan_id ?>"><?= $j->jurusan_nama ?></option>
                                        <?php } ?>
                                   </select>
                                   <?= form_error('jurusan', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                   <label for="foto">Foto <small>(3x4)</small></label>
                                   <input type="file" name="foto" id="foto" class="form-control">
                                   <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <div class="card-footer text-right">
                                   <a href="<?= base_url() ?>siswa" class="btn btn-warning mr-2">Kembali</a>
                                   <button class="btn btn-primary">Submit</button>
                              </div>
                         </div>
                    </div>
                    </form>
               </div>
          </div>
     </section>
</div>