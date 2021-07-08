<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $title ?></h1>
          </div>
          <div class="card">
               <div class="card-header">
                    <h4>Tambah Foto</h4>
               </div>
               <div class="card-body">
                    <?= form_open_multipart('galeri/galeri_aksi') ?>
                    <div class="row justify-content-center">
                         <div class="col-12 col-md-6 col-lg-6">
                              <div class="form-group">
                                   <label for="judul">Judul *</label>
                                   <input type="text" name="judul" id="judul" class="form-control" value="<?= set_value('judul') ?>">
                                   <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                   <label for="album">Album *</label>
                                   <select name="album" id="album" class="form-control">
                                        <option value="">-- Pilih album --</option>
                                        <?php foreach ($album as $a) { ?>
                                             <option value="<?= $a->album_id ?>"><?= $a->album_nama ?></option>
                                        <?php } ?>
                                   </select>
                                   <?= form_error('album', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <div class="form-group">
                                   <label for="foto">Foto *</label>
                                   <input type="file" name="foto" id="foto" class="form-control">
                                   <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                              </div>
                              <div class="card-footer text-right">
                                   <a href="<?= base_url() ?>galeri" class="btn btn-warning mr-2">Kembali</a>
                                   <button class="btn btn-primary">Submit</button>
                              </div>
                         </div>
                    </div>
                    </form>
               </div>
          </div>
     </section>
</div>