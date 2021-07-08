<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $title ?></h1>
          </div>
          <div class="card">
               <div class="card-header">
                    <h4>Edit Data Osis</h4>
               </div>
               <div class="card-body">
                    <?php foreach ($siswa as $s) { ?>
                         <?= form_open_multipart('siswa/siswa_update') ?>
                         <div class="row justify-content-center">
                              <div class="col-12 col-md-6 col-lg-6">
                                   <div class="form-group">
                                        <label for="nis">NIS *</label>
                                        <input type="hidden" name="id" value="<?= $s->siswa_id ?>">
                                        <input type="number" class="form-control" id="nis" name="nis" value="<?= $s->siswa_nis ?>" autocomplete="off" autofocus>
                                        <?= form_error('nis', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="nama">Nama *</label>
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $s->siswa_nama; ?>" autocomplete="off">
                                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin *</label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                             <option value="">-- Pilih Jenis Kelamin --</option>
                                             <?php $jenis_kelamin = $this->input->post('jenis_kelamin') ? $this->input->post('jenis_kelamin') : $s->siswa_jenis_kelamin ?>
                                             <option value="L" <?= $jenis_kelamin == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                                             <option value="P" <?= $jenis_kelamin == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                                        </select>
                                        <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="jabatan">Jabatan *</label>
                                        <select name="jabatan" id="jabatan" class="form-control">
                                             <option value="">-- Pilih Jabatan --</option>
                                             <?php foreach ($jabatan as $j) { ?>
                                                  <option value="<?= $j->jabatan_id ?>" <?= $j->jabatan_id == $s->siswa_jabatan_id ? 'selected' : null ?>><?= $j->jabatan_nama ?></option>
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
                                                  <option value="<?= $k->kelas_id ?>" <?= $k->kelas_id == $s->siswa_kelas_id ? 'selected' : null ?>><?= $k->kelas_nama ?></option>
                                             <?php } ?>
                                        </select>
                                        <?= form_error('kelas', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="jurusan">Jurusan *</label>
                                        <select name="jurusan" id="jurusan" class="form-control">
                                             <option value="">-- Pilih Jurusan --</option>
                                             <?php foreach ($jurusan as $j) { ?>
                                                  <option value="<?= $j->jurusan_id ?>" <?= $j->jurusan_id == $s->siswa_jurusan_id ? 'selected' : null ?>><?= $j->jurusan_nama ?></option>
                                             <?php } ?>
                                        </select>
                                        <?= form_error('jurusan', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="status">Status *</label>
                                        <select name="status" id="status" class="form-control">
                                             <option value="">-- Pilih Status --</option>
                                             <?php $status = $this->input->post('status') ? $this->input->post('status') : $s->status ?>
                                             <option value="1" <?= $status == '1' ? 'selected' : ''; ?>>Aktif</option>
                                             <option value="0" <?= $status == '0' ? 'selected' : ''; ?>>Keluar</option>
                                        </select>
                                        <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="form-group">
                                        <label for="foto">Foto</label> <small>(Biarkan kosong bila tidak di isi!)</small><br>
                                        <?php if ($s->siswa_photo != null) { ?>
                                             <img src="<?= base_url() . 'gambar/osis/' . $s->siswa_photo ?>" width="30%">
                                        <?php } ?>
                                        <input type="file" name="foto" id="foto" class="form-control mt-2">
                                        <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                                   </div>
                                   <div class="card-footer text-right">
                                        <a href="<?= base_url() ?>siswa" class="btn btn-warning mr-2">Kembali</a>
                                        <button class="btn btn-primary">Submit</button>
                                   </div>
                              </div>
                              </form>
                         <?php } ?>
                         </div>
               </div>
          </div>
     </section>
</div>